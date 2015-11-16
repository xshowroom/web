<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Shop extends Controller_Base
{
    /**
     *  This is a very unique page, for login user and not login all can view it
     */
    public function action_index()
    {
        $view = View::factory('shop');
        
        $opUser = $_SESSION['opUser'];

        // get user info if login
        if(!empty($opUser)) {
            $view->set('user', $this->opUser);

            $userService = new Business_User();
            $view->set('userAttr', $userService->getUserAttr($opUser['id']));
        }

        $this->response->body($view);
    }
}
