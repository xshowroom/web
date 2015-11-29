<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Buyer
{
    public $brandModel;
    public $buyerModel;
    public $collectionModel;
    public $productionModel;
    
    public function __construct()
    {
        $this->brandModel = new Model_Brand();
        $this->buyerModel = new Model_Buyer();
        $this->collectionModel = new Model_Collection();
        $this->productionModel = new Model_Production();
    }
    
    public function validateAuth($userId, $brandUserId)
    {
        $authList = $this->buyerModel->getAuthList($userId);
        foreach ($authList as $row) {
            $brandIdList[] = $row['brand_id'];
        }
        $brandist = $this->brandModel->getByBrandIdList(array_values($brandIdList));
        foreach ($brandist as $brand) {
            $brandUserIdList[] = $brand['user_id'];
        }
        
        if (!in_array($brandUserId, $brandUserIdList)) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
    }
    
    public function getCollectionInfo($userId, $collectionId)
    {
        $collection = $this->collectionModel->getByCollectionId($collectionId);
        
        // 判断用户是否有该品牌的权限
        $this->validateAuth($userId, $collection['user_id']);
        
        return $collection;
    }
    
    public function getProduction($userId, $productionId)
    {
        $production = $this->productionModel->getByProductionId($productionId);
        
        // 判断用户是否有该品牌的权限
        $this->validateAuth($userId, $production['user_id']);
        
        return $production;
    }
}