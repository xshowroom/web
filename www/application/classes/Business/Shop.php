<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author liyashuai
 */
class Business_Shop
{
    public $shopModel;
    public $userModel;
    public $msgService;

    public function __construct()
    {
        $this->shopModel = new Model_Shop();
        $this->userModel = new Model_User();
        $this->msgService = new Business_Message();
    }
    
    public function addShop($userId)
    {
        $user = $this->userModel->getById($userId);
        if (empty($user)) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        } else {
            // 拆出来供注册调用
            $shopId = $this->realAddShop($userId);
            return $shopId;
        }
    }

    public function realAddShop($userId)
    {
        // generate welcome msg
        $this->msgService->createMessage($userId, __(Business_Message::AUTO_MSG_WELCOME_BRAND));

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
}