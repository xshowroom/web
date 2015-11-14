<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Base extends Controller
{

	public function before()
	{
	    session_start();
	    $opUser = $_SESSION['opUser'];
		if (empty($opUser)) {
			echo json_encode(array(
                'status' => LOGIN_FAILURE,
                'msg' 	 => 'not login',
            ));
		}
	}

}
