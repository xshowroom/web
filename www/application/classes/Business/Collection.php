<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Collection
{  
    public $collectionModel;
    public $productionModel;
    public $uploadService;

    public function __construct()
    {
        $this->collectionModel = new Model_Collection();
        $this->productionModel = new Model_Production();
        $this->uploadService = new Business_Upload();
    }
    
    public function getAllCollectionList($userId, $detail = 0)
    {
        $collectionList = $this->collectionModel->getListByUserId($userId);
        
        if (!empty($detail)) {
            foreach ($collectionList as $idx => $collection) {
                $productionList = $this->productionModel->getByCollectionId($collection['id']);
                $collectionList[$idx]['productions'] = $productionList;
            }
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
    
    private function createThreeImage($imagePath)
    {
        $extension = substr(strrchr($imagePath, '.'), 1);
        $realPathFile  = 'data/' . date('ymdHis'). substr(microtime(),2,4) . '.' . $extension;
        
        if (file_exists($imagePath)){
            try{
                copy($imagePath, $realPathFile);
                // 生成medium图和small图
                $mediumPathFile = $this->uploadService->resize($realPathFile, 0.75, 'medium');
                $smallPathFile = $this->uploadService->resize($realPathFile, 0.50, 'small');
            } catch (Exception $e) {
                $errorInfo = Kohana::message('message', 'IMAGE_ERROR');
                throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
            }
        }
        
        return array($realPathFile, $mediumPathFile, $smallPathFile);
    }
    
    public function addCollection($userId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath)
    {
        list($realPathFile, $mediumPathFile, $smallPathFile) = $this->createThreeImage($imagePath);
        
        $collectionId = $this->collectionModel->addCollection($userId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $realPathFile, $mediumPathFile, $smallPathFile);
        
        return $collectionId;
    }
    
    public function modifyCollection($userId, $collectionId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath)
    {
        list($realPathFile, $mediumPathFile, $smallPathFile) = $this->createThreeImage($imagePath);
        
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
}