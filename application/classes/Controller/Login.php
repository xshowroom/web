<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller
{

    public $userService;
    public $codeService;

    public function before()
    {
        $this->userService = new Business_User();
        $this->codeService = new Business_VerifyCode();
    }

    public function action_index()
    {
        $email          = Request::current()->query('email');
        $password       = Request::current()->query('pass');
        $code           = Request::current()->query('code');

        // 验证码是否正确
        if (!$this->codeService->verify($code)) {
            echo json_encode(array(
                'status' => LOGIN_ERRCODE,
                'msg' => 'verify code is incorrect',
            ));
            exit(0);
        }

        $res = $this->userService->getUserInfo($email, $password);

        $status = empty($res) ? LOGIN_FAILURE : LOGIN_SUCCESS;
        $msg    = empty($res) ? 'username or password is incorrect' : 'login success';

        echo json_encode(array(
            'status'   => $status,
            'msg'      => $msg,
        ));
    }
    
    public function action_logout()
    {
        session_unset();
        session_destroy();
        header('Location: '. SITE_DOMAIN);
    }

}
