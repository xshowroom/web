<?php defined('SYSPATH') or die('No direct script access.');

/**
 * @author liyashuai
 */
class Controller_Register extends Controller
{

	public $userService;

	public function before()
	{
		$this->userService = new Business_User();
	}

	public function action_index()
	{
	    $roleType = Request::current()->query('roleType');
        
        $res = $this->userService->addUser($roleType);

        $status = empty($res) ? STATUS_ERROR : STATUS_SUCCESS;
        $msg	= empty($res) ? 'register failed' : 'register success';

        echo json_encode(array(
            'status' => $status,
            'msg' 	 => $msg,
        ));
	}

}
