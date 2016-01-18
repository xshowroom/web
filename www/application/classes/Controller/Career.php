<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Career extends Controller_Base
{
    public function action_index()
    {
        $view = View::factory('career');
     	$opUser = $_SESSION['opUser'];

        if(!empty($opUser)) {
            $view->set('user', $opUser);
            $view->set('userAttr', $this->opUser['userAttr']);
        }
        $this->response->body($view);
    }
}
