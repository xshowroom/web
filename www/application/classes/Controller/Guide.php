<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Guide extends Controller_Base
{
    public function action_index()
    {
        $view = View::factory('guide');
     	$opUser = $_SESSION['opUser'];

        if(!empty($opUser)) {
            $view->set('user', $opUser);

            $userService = new Business_User();
            $view->set('userAttr', $userService->getUserAttr($opUser['id']));
        }
        $this->response->body($view);
    }
}
