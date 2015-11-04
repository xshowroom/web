<?php defined('SYSPATH') or die('No direct script access.');

class Business_User
{
	public $userModel;

	public function __construct()
	{
		$this->userModel = new Model_User();
	}

	public function getUserInfo($email, $pass)
	{
		$user = $this->userModel->getByEmailPass($email, $pass);
		if (!empty($user)) {
			unset($user['password']);

			$_SESSION['opUser'] = $user;
		}

		return $user;
	}

} // End Welcome
