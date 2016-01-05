<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Buyer extends Controller_BaseReqLogin
{
    public $userService;
    public $buyerService;
    public $orderService;
    // public $brandService;
    // public $collectionService;

    public function before()
    {
        parent::before();

        $this->checkBuyerUser();

        $this->userService = new Business_User();
        $this->buyerService = new Business_Buyer();
        $this->orderService = new Business_Order();
        // $this->brandService = new Business_Brand();
        // $this->collectionService = new Business_Collection();
    }

    public function action_profile()
    {
        $view = View::factory('user_profile');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));

        $this->response->body($view);
    }

    public function action_password()
    {
        $view = View::factory('user_password');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));

        $this->response->body($view);
    }

    public function action_dashboard()
    {
        $view = View::factory('buyer_dashboard');
        $view->set('user', $this->opUser);
        $userId = $this->opUser['id'];
        $view->set('userAttr', $this->userService->getUserAttr($userId));
        
        $view->set('authBrandList', array_slice($this->buyerService->getAuthBrandList($userId), 0, 6));
        
        $orderList = $this->orderService->getOrderList($userId, null, $this->opUser['role_type']);
        $view->set('orderList', array_slice($orderList, 0, 4));
        
        $storeList = $this->buyerService->getStoreList($userId);
        $view->set('storeList', array_slice($storeList, 0, 2));
        
        $this->response->body($view);
    }
    
    public function action_brand()
    {
    	$view = View::factory('buyer_brand');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        
        // $brandUrl = Request::current()->param('url');
        // $view->set('brandInfo', $this->brandService->getBrandInfoByUrl($brandUrl));
    
    	$this->response->body($view);
    }
	
    public function action_cart()
    {
    	$view = View::factory('buyer_cart');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
    	$this->response->body($view);
    }
    
    
    public function action_store()
    {
        $view = View::factory('buyer_store');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $this->response->body($view);
    }

    public function action_message()
    {
        $view = View::factory('user_message');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $this->response->body($view);
    }
}
