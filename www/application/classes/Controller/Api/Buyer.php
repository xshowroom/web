<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Buyer extends Controller_BaseReqLogin
{
    public $buyerService;

    public function before()
    {
        parent::before();
        $this->buyerService = new Business_Buyer();
    }

    public function action_apply()
    {
        $userId  = $this->opUser['id'];
        $shopId  = trim(Request::current()->query('shopIdList'));
        $brandId = (int)trim(Request::current()->query('brandId'));
        
        $res = $this->buyerService->batchApply($userId, $shopId, $brandId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_checkAuth()
    {
        $userId  = $this->opUser['id'];
        //$shopId  = (int)trim(Request::current()->query('shopId'));
        $brandId = (int)trim(Request::current()->query('brandId'));
        
        $res = $this->buyerService->checkAuth($userId, $brandId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
    
    public function action_getStoreList()
    {
        $userId  = $this->opUser['id'];
        
        $res = $this->buyerService->getStoreList($userId);
    
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_getAuthList()
    {
        $userId  = $this->opUser['id'];
        
        $res = $this->buyerService->getAuthList($userId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_getAuthedStoreList()
    {
        $userId = $this->opUser['id'];
        $res = $this->buyerService->getAuthedStoreList($userId);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
    
    public function action_getBrandList()
    {
        $userId  = $this->opUser['id'];
        $res = $this->buyerService->getBrandList($userId);
         
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
    
    public function action_getCollectionList()
    {
        $brandId = Request::current()->query('brandId');
        $res = $this->buyerService->getCollectionList($brandId);
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function getShopInApplying()
    {
        $userId = $this->opUser['id'];
        $brandId = Request::current()->query('brandId');
        
        $res = $this->buyerService->getShopInApplying($userId, $brandId);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function getAuthedShop()
    {
        $userId = $this->opUser['id'];
        $brandId = Request::current()->query('brandId');
        
        $res = $this->buyerService->getAuthedShop($userId, $brandId);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function getShopWhichCanApply()
    {
        $userId = $this->opUser['id'];
        $brandId = Request::current()->query('brandId');
        
        $res = $this->buyerService->getShopWhichCanApply($userId, $brandId);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
}
