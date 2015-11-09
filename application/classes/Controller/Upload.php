<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Upload extends Controller
{

	public $uploadService;

	public function before()
	{
		$this->uploadService = new Business_Upload();
	}

	public function action_image()
	{
	    $res = $this->uploadService->image();
	    
        $status = empty($res) ? STATUS_ERROR : STATUS_SUCCESS;
        $msg	= empty($res) ? 'username or password is incorrect' : 'login success';
        
        echo json_encode(array(
            'status' => $status,
            'msg' 	 => $msg,
            'data'   => $res,
        ));
	}

} // End Welcome
