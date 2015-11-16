<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Login extends Controller_Base
{

    const MSG_KEY_1 = 'image_err';
    const MSG_KEY_2 = 'not_login';
    const MSG_KEY_3 = 'logged in';
    
    public $userService;
    public $codeService;

    public function before()
    {
        I18n::lang($_COOKIE['language']);
        $this->userService = new Business_User();
        $this->codeService = new Business_VerifyCode();
    }

    public function action_index()
    {
        $email       = Request::current()->query('email');
        $password    = Request::current()->query('pass');
        $code        = Request::current()->query('code');

        // 验证码是否正确
        // if (!$this->codeService->verify($code)) {
        //    echo json_encode(array(
        //        'status' => LOGIN_ERRCODE,
        //        'msg' => __(self::MSG_KEY_1),
        //    ));
        //    exit(0);
        //}

        $res = $this->userService->login($email, $password);
        var_dump($_SESSION);

        $status = empty($res) ? LOGIN_FAILURE : LOGIN_SUCCESS;
        $msg    = empty($res) ? __(self::MSG_KEY_2) : __(self::MSG_KEY_3);

        echo json_encode(array(
            'status'   => $status,
            'msg'      => $msg,
        ));
    }
}
