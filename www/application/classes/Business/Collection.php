<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Collection
{
    
    public $brandModel;
    public $collectionModel;
    public $productionModel;
    public $uploadService;
    public $productionService;

    public function __construct()
    {
        $this->brandModel = new Model_Brand();
        $this->collectionModel = new Model_Collection();
        $this->productionModel = new Model_Production();
        $this->uploadService = new Business_Upload();
        $this->productionService = new Business_Production();
    }
    
    public function getAllCollectionList($userId, $detail = 0)
    {
        $collectionList = $this->collectionModel->getListByUserId($userId);
        
        if (!empty($detail)) {
            foreach ($collectionList as $idx => $collection) {
                $productionList = $this->productionModel->getByCollectionId($collection['id']);
                $realProductionList = array();
                foreach ($productionList as $production) {
                    $realProductionList[] = $this->productionService->getFormedProdution($production);
                }
                $collectionList[$idx]['productions'] = $realProductionList;
            }
        }
        
        return array_values($collectionList);
    }
    
    private function doFilter($userId, $filter)
    {
        // 如果有show查询条件，筛选出相应的user_id
        if (!empty($filter['mode']) || !empty($filter['season'])) {
            $collectionList = $this->collectionModel->getByFilter($filter);
        } else {
            $collectionList = $this->getAllCollectionList($userId);
        }
        
        foreach ($collectionList as $idx => $collection) {
            if ($collection['user_id'] != $userId || strtotime($collection['deadline']) <= strtotime(date('Y-m-d')) || $collection['status'] != Model_Collection::TYPE_OF_ONLINE) {
                unset($collectionList[$idx]);
            }
        }
        
        return $collectionList;
    }
    
    private function doQuote($queryStr)
    {
        if (empty($queryStr)) {
            return false;
        }
    
        $arr = explode(',', $queryStr);
    
        $res = array_map(function ($val){
            return "'{$val}'";
        }, $arr);
    
            return implode(',', $res);
    }
    
    public function getCollectionList($userId)
    {
        $filter = array(
            'mode'    => Request::current()->getParam('mode'),
            'season'    => $this->doQuote(Request::current()->getParam('season')),
        );

        $res = $this->doFilter($userId, $filter);
        
        return $res;
    }
    
    public function getCollectionStatInfo($brandId)
    {
        $brandInfo = $this->brandModel->getById($brandId);
        if (empty($brandInfo)) {
            return array();
        }
        
        $collectionList = $this->getCollectionList($brandInfo['user_id']);
        if (empty($collectionList)) {
            return array();
        }
        
        foreach ($collectionList as $collection) {
            $resCollectionList[$collection['id']] = $collection;
        }
        $collectionIdList = array_column($resCollectionList, 'id');
        
        $productionList = $this->productionModel->getByCollectionIdList($collectionIdList);
        if (empty($productionList)) {
            return array();
        }
        
        foreach ($productionList as $production) {
            $resCollectionList[$production['collection_id']]['production'][$production['category']][] = array(
                'id' => (int)$production['id'],
                'name' => $production['name'],
                'image' => $production['image_url'],
            );
        }
        
        // 过滤掉没有production的collection
        foreach ($resCollectionList as $collection) {
            if (!empty($collection['production'])) {
                $res[] = $collection;
            }
        }
        
        $pageSize = Request::current()->getParam('pageSize');
        $pageSize = empty($pageSize) ? 0 : $pageSize;
        $offset = Request::current()->getParam('offset');
        $offset = empty($offset) ? 0 : $offset;
        $res = array_slice($res, $offset, $pageSize);
        
        return $res;
    }
    
    public function getCollectionInfo($userId, $collectionId)
    {
        $collection = $this->collectionModel->getByCollectionId($collectionId);
        
        return $collection;
    }
    
    public function addCollection($userId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath)
    {
        list($realPathFile, $mediumPathFile, $smallPathFile) = $this->uploadService->createThreeImage($imagePath);
        
        $brand = $this->brandModel->getByUserId($userId);

        $collectionId = $this->collectionModel->addCollection($userId, $brand['id'], $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $realPathFile, $mediumPathFile, $smallPathFile);
        
        return $collectionId;
    }
    
    public function modifyCollection($userId, $collectionId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath)
    {
        list($realPathFile, $mediumPathFile, $smallPathFile) = $this->uploadService->createThreeImage($imagePath);
        
        $collection = $this->collectionModel->getByCollectionId($collectionId);
        if (empty($collection) || $collection['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        $res = $this->collectionModel->updateCollection($userId, $collectionId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $realPathFile, $mediumPathFile, $smallPathFile);
        return $res;
    }
    
    public function removeCollection($userId, $collectionId)
    {
        $collection = $this->collectionModel->getByCollectionId($collectionId);
        if (empty($collection) || $collection['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        $res = $this->updateStatus($userId, $collectionId, Model_Collection::TYPE_OF_DELETE);
        return $res;
    }
    
    public function checkCollectionName($userId, $collectionName, $collectionId)
    {
        $res = false;

        if ($collectionId > 0) {
            $collectionInfo = $this->getCollectionInfo($userId, $collectionId);

            if (!empty($collectionInfo) && $collectionInfo['name'] == $collectionName) {
                $res = false;
            } else {
                $res = $this->collectionModel->checkName($userId, $collectionName);
            }
        }

        if ($res) {
            return array(STATUS_ERROR, 'name_existed');
        } else {
            return array(STATUS_SUCCESS, 'check_ok');
        }
    }
    
    public function updateStatus($userId, $collectionId, $status)
    {
        $collection = $this->collectionModel->getByCollectionId($collectionId);
        if (empty($collection) || $collection['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        if ($status == Model_Collection::TYPE_OF_DELETE && $collection['status'] != Model_Collection::TYPE_OF_DRAFT) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        $res = $this->collectionModel->updateStatus($collectionId, $status);
        return $res;
    }
    
    public function getAllCollectionImg($brandId)
    {
        $brandInfo = $this->brandModel->getById($brandId);
        
        $collectionList = $this->collectionModel->getListByUserId($brandInfo['user_id']);
        foreach ($collectionList as $collection) {
            $collectionImgList[$collection['season']][] = array(
                'id' => (int)$collection['id'],
                'cover_image' => $collection['cover_image'],
                'cover_image_medium' => $collection['cover_image_medium'],
                'cover_image_small' => $collection['cover_image_small'],
            );
        }
        
        return $collectionImgList;
    }
    
}