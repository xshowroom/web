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
    public $productionService;
    
    public function __construct()
    {
        $this->brandModel = new Model_Brand();
        $this->buyerModel = new Model_Buyer();
        $this->collectionModel = new Model_Collection();
        $this->productionModel = new Model_Production();
        $this->productionService = new Business_Production();
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
        
        $realProduction = $this->productionService->getFormedProdution($production);

        return $realProduction;
    }

    public function apply($userId, $shopId, $brandId)
    {
        $brand = $this->brandModel->getByUserId($brandId);
        // 品牌不存在或已删除
        if (empty($brand) || $brand['status'] != STAT_NORMAL) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $auth = $this->buyerModel->getAuthList($userId);
        // 用户有shop已经申请过权限
        if (!empty($auth)) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $res = $this->buyerModel->apply($userId, $shopId, $brandId);
        return $res;
    }

    public function checkAuth($userId, $shopId, $brandId)
    {
        $res = $this->buyerModel->checkAuth($userId, $shopId, $brandId);
        return $res;
    }

    public function listByAuthStatus($status)
    {
        $res = $this->buyerModel->listByAuthStatus($status);
        return $res;
    }

    public function updateAuthStatus($userId, $shopId, $brandId, $opUserId, $status)
    {
        $res = $this->buyerModel->updateAuthStatus($userId, $shopId, $brandId, $opUserId, $status);
        return $res;
    }

    public function updateAuthStatusByShop($userId, $shopId, $opUserId, $status)
    {
        $res = $this->buyerModel->updateAuthStatusByShop($userId, $shopId, $opUserId, $status);
        return $res;
    }
}