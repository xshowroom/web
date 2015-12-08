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
        
        return $collectionList;
    }
    
    private function doFilter($userId, $filter)
    {
        // 如果有show查询条件，筛选出相应的user_id
        if (!empty($filter['status']) || !empty($filter['season'])) {
            $collectionList = $this->collectionModel->getByFilter($filter);
        } else {
            $collectionList = $this->getAllCollectionList($userId);
        }
        
        foreach ($collectionList as $idx => $collection) {
            if (strtotime($collection['deadline']) <= strtotime(date('Y-m-d'))) {
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
            'status'    => Request::current()->query('status'),
            'season'    => $this->doQuote(Request::current()->query('season')),
        );
        
        $res = $this->doFilter($userId, $filter);
        
        $pageSize = Request::current()->query('pageSize');
        $pageSize = empty($pageSize) ? 0 : $pageSize;
        $offset = Request::current()->query('offset');
        $pageSize = empty($offset) ? 0 : $offset;
        $res = array_slice($res, $offset, $pageSize);
        
        return $res;
    }
    
    public function getCollectionStatInfo($brandId)
    {
        $brandInfo = $this->brandModel->getById($brandId);
        
        $collectionList = $this->getCollectionList($brandInfo['user_id']);
        $collectionIdList = array_column($collectionList, 'id');
        
        $productionList = $this->productionModel->getByCollectionIdList($collectionIdList);
        foreach ($productionList as $production) {
            $collectionList[$production['collection_id']]['production'][$production['category']] = array(
                'id' => (int)$production['id'],
                'name' => $production['name'],
                'image' => $production['image_url'],
            );
        }
        
        return $collectionList;
    }
    
    public function getCollectionInfo($userId, $collectionId)
    {
        $collection = $this->collectionModel->getByCollectionId($collectionId);
        if ($collection['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        return $collection;
    }
    
    public function addCollection($userId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath)
    {
        list($realPathFile, $mediumPathFile, $smallPathFile) = $this->uploadService->createThreeImage($imagePath);
        
        $collectionId = $this->collectionModel->addCollection($userId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $realPathFile, $mediumPathFile, $smallPathFile);
        
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
    
    public function checkCollectionName($userId, $collectionName)
    {
        $res = $this->collectionModel->checkName($userId, $collectionName);
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
    
    public function getAllCollectionImg($brandId, $season)
    {
        $brandInfo = $this->brandModel->getById($brandId);
        
        $collectionList = $this->collectionModel->getListBySeason($brandInfo['user_id'], $season);
        foreach ($collectionList as $collection) {
            $collectionImgList[] = array(
                'id' => (int)$collection['id'],
                'cover_image' => $collection['cover_image'],
                'cover_image_medium' => $collection['cover_image_medium'],
                'cover_image_small' => $collection['cover_image_small'],
            );
        }
        
        return $collectionImgList;
    }
    
}