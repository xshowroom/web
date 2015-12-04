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

    public function __construct()
    {
        $this->shopModel = new Model_Shop();
        $this->userModel = new Model_User();
        $this->msgService = new Business_Message();
        $this->buyerService = new Business_Buyer();
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
        $name      = Request::current()->post('shopName');
        $type      = Request::current()->post('shopType');
        $colType   = Request::current()->post('collectionType');
        $brandList = Request::current()->post('brandList');
        $website   = Request::current()->post('shopWebsite');
        $address   = Request::current()->post('shopAddress');
        $country   = Request::current()->post('shopCountry');
        $zipcode   = Request::current()->post('shopZipcode');
        $tel       = Request::current()->post('shopTel');
        
        $shopId = $this->shopModel->addShopInfo($userId, $name, $type, $colType, $brandList,
                                                $website, $address, $country, $zipcode, $tel);
        return $shopId;
    }

    public function realUpdateShop($userId, $shopId)
    {
        // generate buyer info
        $name      = Request::current()->post('shopName');
        $type      = Request::current()->post('shopType');
        $colType   = Request::current()->post('collectionType');
        $brandList = Request::current()->post('brandList');
        $website   = Request::current()->post('shopWebsite');
        $address   = Request::current()->post('shopAddress');
        $country   = Request::current()->post('shopCountry');
        $zipcode   = Request::current()->post('shopZipcode');
        $tel       = Request::current()->post('shopTel');
        
        $res = $this->shopModel->updateShopInfo($userId, $shopId, $name, $type, $colType, $brandList,
                                                $website, $address, $country, $zipcode, $tel);
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
        
        $res = $this->updateStatus($userId, $shopId, STAT_DELETED);

        $res = $this->buyerService->updateAuthStatusByShop($userId, $shopId, $userId, STAT_DELETED);

        return $res;
    }

    public function updateStatus($userId, $shopId, $status)
    {
        $res = $this->shopModel->updateStatus($shopId, $status);
        return $res;
    }
}