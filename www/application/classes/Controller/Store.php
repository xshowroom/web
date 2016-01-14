<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Store extends Controller_BaseReqLogin
{
    public $userService;

    public function before()
    {
        parent::before();

        $this->userService = new Business_User();
    }

    public function action_index()
    {
        $view = View::factory('store_index');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $storeId = Request::current()->param('id');
        $view->set('storeId', $storeId);
        $this->response->body($view);
    }
    
    public function action_create()
    {
        $this->checkBuyerUser();

    	$view = View::factory('store_create');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
    
    	$this->response->body($view);
    }
    
}
