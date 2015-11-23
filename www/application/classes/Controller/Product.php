<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Product extends Controller_BaseReqLogin
{
    public $userService;
    public $productionService;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
        $this->productionService =new Business_Production();
    }

    
    public function action_index()
    {
        $view = View::factory('product_index');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));

        $userId = $this->opUser['id'];
        $productionId = Request::current()->param('id');
        $view->set('production', $this->productionService->getProduction($userId, $productionId));

        $this->response->body($view);

    }
    
    public function action_create()
    {
    	$view = View::factory('product_create');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
            
    	$this->response->body($view);
    
    }
}
