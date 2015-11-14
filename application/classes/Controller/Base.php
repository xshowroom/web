<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Base extends Controller
{

    const MSG_KEY = 'base_1';
    
	public function before()
	{
	    session_start();
	    $opUser = $_SESSION['opUser'];
        I18n::lang($_COOKIE['language']);
	    
		if (empty($opUser)) {
			echo json_encode(array(
                'status' => LOGIN_FAILURE,
                'msg' 	 => __(MSG_KEY),
            ));
		}
	}

}
