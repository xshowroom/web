<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Buyer
{
    public $brandModel;
    public $buyerModel;
    public $shopModel;
    public $collectionModel;
    public $productionModel;
    public $productionService;
    
    public function __construct()
    {
        $this->brandModel = new Model_Brand();
        $this->buyerModel = new Model_Buyer();
        $this->shopModel  = new Model_Shop();
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
    
    public function queryBrand($userId, $name)
    {
        $brandList = $this->brandModel->getByName($name);
        
        return $brandList;
    }
    
    public function getAllBrandList($userId)
    {
        $authBrandList = $this->buyerModel->getAuthListByUser($userId);
        $brandIdList = array_column($authBrandList, 'brand_id');
        
        $brandList = $this->brandModel->getByBrandIdList($brandIdList);
        return $brandList;
    }
    
    private function doFilter($userId, $filter)
    {
        $authBrandList = $this->getAllBrandList($userId);
        
        // 所有的user_id
        $userIdList = array_column($authBrandList, 'user_id');
        
        // 如果有query查询条件
        if (!empty($filter['query'])) {
            $brandList = $this->brandModel->getByName($filter['query']);
            $tempIdList = array_column($brandList, 'user_id');
            $userIdList = array_intersect($userIdList, $tempIdList);
        }
        
        // 如果有show查询条件，筛选出相应的user_id
        if (!empty($filter['show'])) {
            $collectionList = $this->shopModel->getByFilter($filter);
            $tempIdList = array_column($collectionList, 'user_id');
            $userIdList = array_intersect($userIdList, $tempIdList);
        }
        
        // 如果有category查询条件，筛选出相应的user_id
//         if (!empty($filter['category'])) {
//             $productionList = $this->productionModel->getByCategory($filter['category']);
//             $tempIdList = array_column($productionList, 'user_id');
//             $userIdList = array_intersect($userIdList, $tempIdList);
//         }
        
        // 如果有country查询条件，筛选出相应的user_id
//         if (!empty($filter['country'])) {
//             $country = explode(',', $filter['country']);
//             $userAttrList = $this->userModel->getByCountry($country);
//             $tempIdList = array_column($userAttrList, 'user_id');
//             $userIdList = array_intersect($userIdList, $tempIdList);
//         }
        
        $res = array();
        foreach ($userIdList as $user_id) {
            $res[] = $authBrandList[$user_id];
        }

        return $res;
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
    
    public function getBrandList()
    {
        $filter = array(
            'show'      => Request::current()->query('show'),
            'country'   => Request::current()->query('country'),
            'query'     => Request::current()->query('query'),
        );
        
        $res = $this->doFilter($filter);
        
        $pageSize = Request::current()->query('pageSize');
        $pageSize = empty($pageSize) ? 0 : $pageSize;
        $offset = Request::current()->query('offset');
        $offset = empty($offset) ? 0 : $offset;
        $res = array_slice($res, $offset, $pageSize);
        
        return $res;
    }
    
    public function getStoreList($userId)
    {
        $shopList = $this->shopModel->getByUserId($userId);
        return $shopList;
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

        $auth = $this->buyerModel->getAuthListByUserAndBrand($userId, $brandId);
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

    public function getAuthList($userId)
    {
        $res = $this->buyerModel->getAuthListByUser($userId);
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