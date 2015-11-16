<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Shop extends Controller_Base
{
    public function action_index()
    {
        $view = View::factory('shop');
        $this->response->body($view);
    }
}
