<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Press extends Controller_Base
{
    public function action_index()
    {
        $view = View::factory('press');
     	$opUser = $_SESSION['opUser'];

        if(!empty($opUser)) {
            $view->set('user', $opUser);

            $userService = new Business_User();
            $view->set('userAttr', $userService->getUserAttr($opUser['id']));
        }
        $this->response->body($view);
    }

    public function action_detail()
    {
        $pressTitle = Request::current()->param('press_title');

        $view = View::factory('press_detail');
        $opUser = $_SESSION['opUser'];

        if(!empty($opUser)) {
            $view->set('user', $opUser);

            $userService = new Business_User();
            $view->set('userAttr', $userService->getUserAttr($opUser['id']));
        }

        $view->set('pressTitle', $pressTitle);

        $this->response->body($view);
    }
}
