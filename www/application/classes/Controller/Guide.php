<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Guide extends Controller_Base
{
    public function action_index()
    {
        $view = View::factory('guide');
        $this->response->body($view);
    }
}
