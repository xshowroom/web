<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Admin extends Controller_BaseAdmin
{
    public $userService;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
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
}