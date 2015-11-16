<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Login extends Controller_Base
{
    public function action_index()
    {
        $view = View::factory('login');
        $this->response->body($view);
    }
}
