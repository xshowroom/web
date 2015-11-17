<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Register extends Controller_Base
{
    public function action_brand()
    {
        $view = View::factory('register_brand');
        $this->response->body($view);
    }

    public function action_buyer()
    {
        $view = View::factory('register_buyer');
        $this->response->body($view);
    }
}
