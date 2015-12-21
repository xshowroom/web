<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Order extends Controller_BaseReqLogin
{
    public $userService;
    public $buyerService;
    public $productionService;
    public $collectionService;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
        $this->buyerService = new Business_Buyer();
        $this->productionService =new Business_Production();
        $this->collectionService =new Business_Collection();
    }

    
    public function action_index()
    {
        $view = View::factory('order_index');
        $orderId = Request::current()->param('id');
        
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $view->set('orderId', $orderId);

        $this->response->body($view);
    }
    
    public function action_create()
    {
        $collectionId = $this->request->param('id');

    	$view = View::factory('order_create');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
    	$view->set('collection', $this->buyerService->getCollectionInfo($this->opUser['id'], $collectionId));
    	
    	$this->response->body($view);
    
    }
    
    
    public function action_list()
    {
    	$view = View::factory('order_list');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
    	 
    	$this->response->body($view);
    }
}
