<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Shop extends Controller_BaseReqLogin
{
    public $shopService;

    public function before()
    {
        parent::before();
        $this->shopService = new Business_Shop();
    }

    public function action_save()
    {
        $userId = $this->opUser['id'];
        $shopId = Request::current()->getParam('shopId');
        if ($shopId > 0) {
            $res = $this->shopService->updateShop($userId, $shopId);
        } else {
            $res = $this->shopService->addShop($userId);
        }        
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_detail()
    {
        $userId = $this->opUser['id'];
        $shopId = Request::current()->getParam('shopId');

        $res = $this->shopService->getShopById($userId, $shopId);      
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_list()
    {
        $userId = $this->opUser['id'];
        $res = $this->shopService->getShopByUserId($userId);      
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_delete()
    {
        $userId = $this->opUser['id'];
        $shopId = Request::current()->getParam('shopId');
        $res = $this->shopService->deleteShop($userId, $shopId);      
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }
}
