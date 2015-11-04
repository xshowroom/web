<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller
{

	public $userService;

	public function before()
	{
		$this->userService = new Business_User();
	}

	public function action_index()
	{
		$email 		= Request::current()->query('email');
        $password 	= Request::current()->query('pass');

        $res = $this->userService->getUserInfo($email, $password);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg' => '',
            'data' => $res,
        ));
	}

} // End Welcome
