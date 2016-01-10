<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Shop extends Controller_Base
{
    /**
     *  This is a very unique page, for login user and not login all can view it
     */
    public function action_index()
    {
        $view = View::factory('shop');

        // get user info if login
        $opUser = $_SESSION['opUser'];

        if(!empty($opUser)) {
            // only buyer user can view this page with login status
            if ($opUser->role_type != Model_User::TYPE_USER_BUYER) {
                $this->destroy_session();
            }

            $view->set('user', $opUser);

            $userService = new Business_User();
            $view->set('userAttr', $userService->getUserAttr($opUser['id']));
        }

        $this->response->body($view);
    }
}
