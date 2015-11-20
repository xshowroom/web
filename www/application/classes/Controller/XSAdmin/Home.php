<?php defined('SYSPATH') or die('No direct script access.');


class Controller_XSAdmin_Home extends Controller_XSAdmin_AdminBase
{
    public function before()
    {
        parent::before();
    }

    public function action_index()
    {
        Controller_Admin_AdminBase::before();


        echo "welcome admin";
        //$view = View::factory('admin_views/home');
        //$this->response->body($view);
    }
}
