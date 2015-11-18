<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Collection
{  
    public $collectionModel;
    public $uploadService;

    public function __construct()
    {
        $this->collectionModel = new Model_Collection();
        $this->uploadService = new Business_Upload();
    }
    
    public function getAllCollectionList($userId)
    {
        $collectionList = $this->collectionModel->getListByUserId($userId);
        
        return $collectionList;
    }
    
    public function addCollection($userId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath)
    {
        $extension = substr(strrchr($imagePath, '.'), 1);
        $realPathFile  = 'data/' . date('ymdHis'). substr(microtime(),2,4) . '.' . $extension;
        
        if (file_exists($imagePath)){
            try{
                copy($imagePath, $realPathFile);
                // 生成medium图和small图
                $mediumPathFile = $this->uploadService->resize($realPathFile, 0.75, 'medium');
                $smallPathFile = $this->uploadService->resize($realPathFile, 0.50, 'small');
                unlink($imagePath);
            } catch (Exception $e) {
                return null;
            }
        }
        
        $collectionId = $this->collectionModel->addCollection($userId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $realPathFile, $mediumPathFile, $smallPathFile);
        return $collectionId;
    }
}