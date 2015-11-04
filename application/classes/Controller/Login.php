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
		$email 		= Request::current()->query('email');
        $password 	= Request::current()->query('pass');
        $code		= Request::current()->query('code');

        // 验证码是否正确
        if (!$this->codeService->verify($code, true)) {
        	echo json_encode(array(
	            'status' => STATUS_ERROR,
	            'msg' => 'verify code is incorrect',
	        ));
	        exit(0);
        }

        $res = $this->userService->getUserInfo($email, $password);

        $status = empty($res) ? STATUS_ERROR : STATUS_SUCCESS;

        echo json_encode(array(
            'status' => $status,
            'msg' => 'username or password is incorrect',
        ));
	}

} // End Welcome
