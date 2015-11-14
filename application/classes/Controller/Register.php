<?php defined('SYSPATH') or die('No direct script access.');

/**
 * @author liyashuai
 */
class Controller_Register extends Controller
{

    const MSG_KEY_1 = 'register_failed';
    const MSG_KEY_2 = 'register_success';
    
    public $userService;

    public function before()
    {
        I18n::lang($_COOKIE['language']);
        $this->userService = new Business_User();
    }

    public function action_index()
    {
        $roleType = Request::current()->post('roleType');
        
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
        $key = Request::current()->param('key');
        $param = Request::current()->param('param');

        list($status, $msg) = $this->userService->checkParam($key, $param);
        
        echo json_encode(array(
            'status'    => $status,
            'msg'       => __($msg),
        ));
    }

}
