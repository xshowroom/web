<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Xsadmin_Login extends Controller_Base
{
    public function before()
    {
        parent::before();
    }

    public function action_index()
    {
        $this->destroy_session();

        $view = View::factory('admin_views/login');
        $this->response->body($view);
    }
}
