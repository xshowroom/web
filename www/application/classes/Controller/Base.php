<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Base extends Controller
{
	public function before()
	{
	    session_start();
	    $opUser = $_SESSION['opUser'];
        I18n::lang($_COOKIE['language']);

	}

	protected function destroy_session()
	{
		session_unset();
		session_destroy();
	}
}
