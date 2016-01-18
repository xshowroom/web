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
    public $brandService;
    public $collectionService;
    
    public function __construct()
    {
        $this->brandModel = new Model_Brand();
        $this->buyerModel = new Model_Buyer();
        $this->shopModel  = new Model_Shop();
        $this->collectionModel = new Model_Collection();
        $this->productionModel = new Model_Production();
        $this->brandService = new Business_Brand();
        $this->collectionService = new Business_Collection();
        $this->productionService = new Business_Production();
    }
    
    public function validateAuth($userId, $brandUserId)
    {
        $authList = $this->getAuthList($userId);
        $brandIdList = array_column($authList, 'brand_id');

        $brandList = $this->brandModel->getByBrandIdList(array_values($brandIdList));
        $brandUserIdList = array_column($brandList, 'user_id');
        
        if (!in_array($brandUserId, $brandUserIdList)) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
    }
    
    public function getAuthBrandList($userId)
    {
        $authBrandList = $this->getAuthList($userId);
        $brandIdList = array_column($authBrandList, 'brand_id');
        if (empty($brandIdList)) {
            return array();
        }
        
        $brandList = $this->brandModel->getByBrandIdList($brandIdList);
        return $brandList;
    }
    
    public function getBrandList($userId)
    {
        // 获取筛选条件下的所有brand
        $brandList = $this->brandService->getBrandList();
        
        // 获取我拥有的权限的brand
        $authBrandList = $this->buyerModel->getAuthListByUser($userId);
        $brandIdList = array_column($authBrandList, 'brand_id');
        
        // 过滤下
        $res = array();
        
        foreach ($brandList as $brand) {
            if (in_array($brand['id'], $brandIdList)) {
                $res[] = $brand;
            }
        }
        
        return $res;
    }
    
    public function getCollectionList($brandId)
    {
        $collectionStatList = $this->collectionService->getCollectionStatInfo($brandId);
        // 过滤掉未上线的
        foreach ($collectionStatList as $idx => $collection) {
            if ($collection['status'] != Model_Collection::TYPE_OF_ONLINE) {
                unset($collection[$idx]);
            }
        }
        return $collectionStatList;
    }
    
    public function getStoreList($userId)
    {
        $shopList = $this->shopModel->getByUserId($userId);
        return $shopList;
    }

    public function getAuthedStoreList($userId)
    {
        $shopList = $this->buyerModel->getAuthListByUser($userId);
        $shopIdList = array_column($shopList, 'shop_id');

        $authedShopList = $this->shopModel->getByIdList($shopIdList);

        return $authedShopList;
    }

    public function getCollectionInfo($userId, $collectionId)
    {
        $collection = $this->collectionModel->getByCollectionId($collectionId);
        
        // 判断用户是否有该品牌的权限
        $this->validateAuth($userId, $collection['user_id']);

        // buyer can only view when it is online
        if ($collection['status'] != Model_Collection::TYPE_OF_ONLINE) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

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

    public function batchApply($userId, $shopIdList, $brandId, $userType)
    {
        if ($userType != Model_User::TYPE_USER_BUYER) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        $applyingShopList = $this->buyerModel->getShopInApplying($userId, $brandId);
        $applyingShopIdList = array_column($applyingShopList, 'shop_id');

        $authedShopList = $this->buyerModel->getAuthListByUserAndBrand($userId, $brandId);
        $authedShopIdList = array_column($authedShopList, 'shop_id');

        $wellShopIdList = array_intersect($applyingShopIdList, $authedShopIdList);

        $shopIdArr = explode(',', $shopIdList);
        if (empty($shopIdArr) || empty($shopIdList)) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        foreach ($shopIdArr as $shopId) {
            if (!in_array($shopId, $wellShopIdList)) {
                $this->apply($userId, $shopId, $brandId);
            }    
        }

        return true;
    }

    public function apply($userId, $shopId, $brandId)
    {
        $brand = $this->brandModel->getById($brandId);
        // 品牌不存在或已删除
        if (empty($brand)) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $res = $this->buyerModel->apply($userId, $shopId, $brandId);
        return $res;
    }

    public function checkAuth($userId, $brandId)
    {
        $relationList = $this->getRelation($userId, $brandId);

        if (empty($relationList)) {
            return Model_Buyer::STATUS_BUYER_NOTAPPLIED;
        }

        foreach ($relationList as $relation) {
            if ((int)$relation['status'] == Model_Buyer::STATUS_NORMAL) {
                return Model_Buyer::STATUS_BUYER_AUTHED;
            }
        }

        return Model_Buyer::STATUS_BUYER_UNAUTHED;
    }

    public function getRelation($userId, $brandId)
    {
        $res = $this->buyerModel->getRelation($userId, $brandId);
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

    public function updateAuthStatusByMapId($mapId, $opUserId, $status)
    {
        $res = $this->buyerModel->updateAuthStatusByMapId($mapId, $opUserId, $status);
        return $res;
    }

    public function getShopInApplying($userId, $brandId)
    {
        $applyingShopList = $this->buyerModel->getShopInApplying($userId, $brandId);
        $shopIdList = array_column($applyingShopList, 'shop_id');

        $shopList = $this->shopModel->getByIdList($shopIdList);
        return $shopList;
    }

    public function getAuthedShopByCollection($userId, $collectionId)
    {
        $collection = $this->collectionModel->getByCollectionId($collectionId);
        $brand = $this->brandModel->getByUserId($collection['user_id']);
        $authedShopList = $this->buyerModel->getAuthListByUserAndBrand($userId, $brand['id']);
        $shopIdList = array_column($authedShopList, 'shop_id');

        $shopList = $this->shopModel->getByIdList($shopIdList);
        return $shopList;
    }

    public function getAuthedShop($userId, $brandId)
    {
        $authedShopList = $this->buyerModel->getAuthListByUserAndBrand($userId, $brandId);
        $shopIdList = array_column($authedShopList, 'shop_id');

        $shopList = $this->shopModel->getByIdList($shopIdList);
        return $shopList;
    }

    public function getShopWhichCanApply($userId, $brandId)
    {
        $applyingShopList = $this->buyerModel->getShopInApplying($userId, $brandId);
        $applyingShopIdList = array_column($applyingShopList, 'shop_id');

        $authedShopList = $this->buyerModel->getAuthListByUserAndBrand($userId, $brandId);
        $authedShopIdList = array_column($authedShopList, 'shop_id');

        $wellShopIdList = array_intersect($applyingShopIdList, $authedShopIdList);

        $allShopList = $this->shopModel->getByUserId($userId);

        $shopList = array();
        foreach ($allShopList as $shop) {
            if (!in_array($shop['id'], $wellShopIdList)) {
                $shopList[] = $shop;
            }
        }

        return $shopList;
    }
}