<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Order extends Controller_BaseReqLogin
{
    public $userService;
    public $buyerService;
    public $productionService;
    public $collectionService;
    public $orderModel;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
        $this->buyerService = new Business_Buyer();
        $this->productionService = new Business_Production();
        $this->collectionService = new Business_Collection();
        $this->orderModel = new Model_Order();
    }

    
    public function action_index()
    {
        $view = View::factory('order_index');
        $orderId = Request::current()->param('id');

        $orderInfo = $this->orderModel->getById($orderId);

        if(empty($orderInfo)) {
            $this->redirect_404();
        }

        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->opUser['userAttr']);
        $view->set('order', $orderInfo);
        $view->set('adminAccount', '123123123123123');
        

        $this->response->body($view);
    }
    
    public function action_create()
    {
        $this->checkBuyerUser();

        $collectionId = $this->request->param('id');

    	$view = View::factory('order_create');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->opUser['userAttr']);
    	$view->set('collection', $this->buyerService->getCollectionInfo($this->opUser['id'], $collectionId));
    	
    	$this->response->body($view);
    
    }
    
    
    public function action_list()
    {
    	$view = View::factory('order_list');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->opUser['userAttr']);
    	 
    	$this->response->body($view);
    }
}
