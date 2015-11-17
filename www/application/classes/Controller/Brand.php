<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Brand extends Controller_BaseReqLogin
{
    public $userService;

    public function before()
    {
        Controller_BaseReqLogin::before();
        $this->userService = new Business_User();
    }

    public function action_dashboard()
    {
        $view = View::factory('brand_dashboard');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $this->response->body($view);
    }
    public function action_collection()
    {
    	$view = View::factory('brand_collection');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
    	$this->response->body($view);
    }
    public function action_order()
    {
    	$view = View::factory('brand_order');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
    	$this->response->body($view);
    }
    public function action_message()
    {
    	$view = View::factory('brand_message');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
    	$this->response->body($view);
    }
}
