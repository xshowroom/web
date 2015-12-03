<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Shop extends Controller_BaseReqLogin
{
    public $shopService;

    public function before()
    {
        parent::before();
        $this->shopService = new Business_Shop();
    }

    public function action_add()
    {
        $userId = $this->opUser['id'];
        $res = $this->shopService->addShop($userId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }
}
