<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Production
{
    public $collectionModel;
    public $productionModel;

    public function __construct()
    {
        $this->collectionModel = new Model_Collection();
        $this->productionModel = new Model_Production();
    }
    
    public function getProductionList($userId, $collectionId)
    {
        // 验证用户是否拥有该collection
        $collection = $this->collectionModel->getByCollectionId($collectionId);
        if ($collection['user_id'] != $userId) {
            return array();
        }
        
        $productionList = $this->productionModel->getByCollectionId($collectionId);
        
        return $productionList;
    }
    
    public function getProduction($userId, $productionId)
    {
        $production = $this->productionModel->getByProductionId($productionId);
        
        // 验证用户是否有该
        if ($production['user_id'] != $userId) {
            return array();
        }
        
        return $production;
    }
    
}