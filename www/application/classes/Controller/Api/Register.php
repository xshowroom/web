<?php defined('SYSPATH') or die('No direct script access.');

/**
 * @author liyashuai
 */
class Controller_Api_Register extends Controller_Base
{

    const MSG_KEY_1 = 'register_failed';
    const MSG_KEY_2 = 'register_success';
    
    public $userService;

    public function before()
    {
        parent::before();

        $this->userService = new Business_User();
    }

    public function action_index()
    {
        $roleType = Request::current()->getParam('roleType');
        
        $res = $this->userService->addUser($roleType);

        $status = empty($res) ? STATUS_ERROR : STATUS_SUCCESS;
        $msg    = empty($res) ? __(self::MSG_KEY_1) : __(self::MSG_KEY_2);

        echo json_encode(array(
            'status' => $status,
            'msg'      => $msg,
        ));
    }
    
    public function action_checkParam()
    {
        $key = Request::current()->getParam('key');
        $param = Request::current()->getParam('param');

        list($status, $msg) = $this->userService->checkParam($key, $param);
        
        echo json_encode(array(
            'status'    => $status,
            'msg'       => __($msg),
        ));
    }

    public function action_checkInvitationCode()
    {
        $code = Request::current()->getParam('code');

        $codeList = array("12345", "54321");

        $isInvite =  in_array($code, $codeList);
        $status = $isInvite ? STATUS_ERROR : STATUS_SUCCESS;

        echo json_encode(array(
            'status'    => $status,
            'isInvite'  => $isInvite,
        ));
    }
}
