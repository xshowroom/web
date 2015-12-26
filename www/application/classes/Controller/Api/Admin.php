<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Admin extends Controller_BaseAdmin
{
    public $userService;
    public $buyService;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
        $this->buyService = new Business_Buyer();
    }
    
    public function action_allowUser()
    {
        $userId = Request::current()->getParam('userId');
        $res = $this->userService->allowUser($userId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_rejectUser()
    {
        $userId = Request::current()->getParam('userId');
        $res = $this->userService->rejectUser($userId);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_allowStore()
    {
        $mapId = Request::current()->getParam('mapId');

        $res = $this->buyService->updateAuthStatusByMapId($mapId, $this->adminUser['id'], Model_Shop::STATUS_SHOP_NORMAL);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_rejectStore()
    {
        $mapId = Request::current()->getParam('mapId');

        $res = $this->buyService->updateAuthStatusByMapId($mapId, $this->adminUser['id'], Model_Shop::STATUS_SHOP_REJECTED);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
}