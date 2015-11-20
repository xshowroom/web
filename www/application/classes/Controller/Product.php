<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Product extends Controller_BaseReqLogin
{
    public $userService;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
    }

    
    public function action_index()
    {
// 		echo Request::current()->param('id');
        $view = View::factory('product_index');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $this->response->body($view);

    }
    
    public function action_create()
    {
    	// 		echo Request::current()->param('id');
    	$view = View::factory('product_create');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
    	$this->response->body($view);
    
    }
}
