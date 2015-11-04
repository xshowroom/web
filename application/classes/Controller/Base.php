<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Base extends Controller
{

	public function before()
	{
		$opUser = $_SESSION['opUser'];
		if (empty($opUser)) {
			echo json_encode(array(
                'status' => STATUS_ERROR,
                'msg' 	 => 'not login',
            ));
		}
	}

}
