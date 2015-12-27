<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author liyashuai
 */
class Business_Shop
{
    public $shopModel;
    public $userModel;
    public $msgService;
    public $buyerService;
    public $brandService;
    public $uploadService;

    public function __construct()
    {
        $this->shopModel = new Model_Shop();
        $this->userModel = new Model_User();
        $this->msgService = new Business_Message();
        $this->buyerService = new Business_Buyer();
        $this->brandService = new Business_Brand();
        $this->uploadService = new Business_Upload();
    }
    
    public function addShop($userId)
    {
        $user = $this->userModel->getById($userId);
        if (empty($user) || $user['status'] != STAT_NORMAL || $user['role_type'] != Model_User::TYPE_USER_BUYER) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        // 拆出来供注册调用
        $shopId = $this->realAddShop($userId);
        return $shopId;
    }

    public function updateShop($userId, $shopId)
    {
        $user = $this->userModel->getById($userId);
        if (empty($user) || $user['status'] != STAT_NORMAL || $user['role_type'] != Model_User::TYPE_USER_BUYER) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $shop = $this->shopModel->getById($shopId);
        if (empty($shop) || $shop['status'] != STAT_NORMAL || $shop['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $res = $this->realUpdateShop($userId, $shopId);
        return $res;
    }

    public function realAddShop($userId)
    {
        // generate buyer info
        $name      = Request::current()->getParam('shopName');
        $type      = Request::current()->getParam('shopType');
        $colType   = Request::current()->getParam('collectionType');
        $brandList = Request::current()->getParam('brandList');
        $website   = Request::current()->getParam('shopWebsite');
        $address   = Request::current()->getParam('shopAddress');
        $country   = Request::current()->getParam('shopCountry');
        $zipcode   = Request::current()->getParam('shopZipcode');
        $tel       = Request::current()->getParam('shopTel');
        $images    = Request::current()->getParam('shopImage');
        $about     = Request::current()->getParam('shopAbout');
        
        // resize image
        $imageList = json_decode($images, true);
        if (!empty($imageList)) {
            foreach ($imageList as &$image) {
                $image = $this->uploadService->createResizeImage($image, 'medium'); 
            }
            unset($image);
        }
        $images = json_encode($imageList);
        
        $shopId = $this->shopModel->addShopInfo($userId, $name, $type, $colType, $brandList,
                                                $website, $address, $country, $zipcode, $tel, $images, $about);
        return $shopId;
    }

    public function realUpdateShop($userId, $shopId)
    {
        // generate buyer info
        $name      = Request::current()->getParam('shopName');
        $type      = Request::current()->getParam('shopType');
        $colType   = Request::current()->getParam('collectionType');
        $brandList = Request::current()->getParam('brandList');
        $website   = Request::current()->getParam('shopWebsite');
        $address   = Request::current()->getParam('shopAddress');
        $country   = Request::current()->getParam('shopCountry');
        $zipcode   = Request::current()->getParam('shopZipcode');
        $tel       = Request::current()->getParam('shopTel');
        $images    = Request::current()->getParam('shopImage');
        $about     = Request::current()->getParam('shopAbout');
        
        // resize image
        $imageList = json_decode($images, true);
        if (!empty($imageList)) {
            foreach ($imageList as &$image) {
                $image = $this->uploadService->createResizeImage($image, 'medium'); 
            }
            unset($image);
        }
        $images = json_encode($imageList);
        
        $res = $this->shopModel->updateShopInfo($userId, $shopId, $name, $type, $colType, $brandList,
                                                $website, $address, $country, $zipcode, $tel, $images, $about);
        return $res;
    }

    public function getShopById($userId, $shopId)
    {
        $shop = $this->shopModel->getById($shopId);
        if (empty($shop) || $shop['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        return $shop;
    }

    public function getShopByUserId($userId)
    {
        $shopList = $this->shopModel->getByUserId($userId);
        
        return $shopList;
    }

    public function deleteShop($userId, $shopId)
    {
        $shop = $this->shopModel->getById($shopId);
        if (empty($shop) || $shop['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $shopList = $this->shopModel->getByUserId($userId);
        if (count($shopList) <= 1) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        $res = $this->updateStatus($userId, $shopId, STAT_DELETED);

        $res = $this->buyerService->updateAuthStatusByShop($userId, $shopId, $userId, STAT_DELETED);

        return $res;
    }

    public function updateStatus($userId, $shopId, $status)
    {
        $res = $this->shopModel->updateStatus($shopId, $status);
        return $res;
    }

    public function listPendingShops()
    {
        $shopMapList = $this->shopModel->listShopsByStatus(Model_Shop::STATUS_SHOP_PENDING);

        $wellFormedShopMapList = array();

        foreach($shopMapList as $shopMap)
        {
            $wellFormedShopMapList[] = $this->buildShop($shopMap);
        }

        return $wellFormedShopMapList;
    }

    public function buildShop($shopMap)
    {
        $shopInfo = $this->shopModel->getById($shopMap['shop_id']);
        $brandInfo = $this->brandService->getBrandInfoByBrandId($shopMap['brand_id']);

        $shopMap['shop_info'] = $shopInfo;
        $shopMap['brand_info'] = $brandInfo;

        return $shopMap;
    }
}