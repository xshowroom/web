<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Buyer extends Controller_BaseReqLogin
{
    public $brandService;

    public function before()
    {
        parent::before();
        $this->brandService = new Business_Brand();
    }

    public function action_apply()
    {
        $userId  = $this->opUser['id'];
        $brandId = (int)trim(Request::current()->query('brandId'));
        $res = $this->brandService->apply($userId, $brandId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_checkAuth()
    {
        $userId  = $this->opUser['id'];
        $brandId = (int)trim(Request::current()->query('brandId'));
        $res = $this->brandService->checkAuth($userId, $brandId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
}
