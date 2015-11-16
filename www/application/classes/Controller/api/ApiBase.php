<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Api_ApiBase extends Controller
{

    const MSG_KEY = 'not_login';
    
	public function before()
	{
	    session_start();
	    $opUser = $_SESSION['opUser'];
        I18n::lang($_COOKIE['language']);

	}

}
