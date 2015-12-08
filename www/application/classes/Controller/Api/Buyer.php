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
        $shopId  = (int)trim(Request::current()->query('shopId'));
        $brandId = (int)trim(Request::current()->query('brandId'));
        
        $res = $this->buyerService->apply($userId, $shopId, $brandId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_checkAuth()
    {
        $userId  = $this->opUser['id'];
        $shopId  = (int)trim(Request::current()->query('shopId'));
        $brandId = (int)trim(Request::current()->query('brandId'));
        
        $res = $this->buyerService->checkAuth($userId, $shopId, $brandId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_getAuthList()
    {
        $userId  = $this->opUser['id'];
        
        $res = $this->buyerService->getAuthListByUser($userId);
        
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
}
