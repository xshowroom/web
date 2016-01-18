<?php defined('SYSPATH') or die('No direct script access.');


class Controller_About extends Controller_Base
{
    public function action_index()
    {
        $view = View::factory('about');
     	$opUser = $_SESSION['opUser'];

        if(!empty($opUser)) {
            $view->set('user', $opUser);
            $view->set('userAttr', $opUser['userAttr']);
        }
        $this->response->body($view);
    }
}
