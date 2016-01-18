<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Brand extends Controller_BaseReqLogin
{
    public $userService;
    public $brandService;
    public $collectionService;
    public $orderService;

    public function before()
    {
        parent::before();

        $this->checkBrandUser();

        $this->userService = new Business_User();
        $this->brandService = new Business_Brand();
        $this->collectionService = new Business_Collection();
        $this->orderService = new Business_Order();
    }

    public function action_dashboard()
    {
        $view = View::factory('brand_dashboard');
        $view->set('user', $this->opUser);
        $userId = $this->opUser['id'];
        $view->set('userAttr', $this->opUser['userAttr']);
        $view->set('brandInfo', $this->brandService->getBrandInfo($userId));
        
       	$orderList = $this->orderService->getOrderList($userId, null, $this->opUser['role_type']);
        $view->set('orderList', array_slice($orderList, 0, 4));
        
        $collectionList = $this->collectionService->getAllCollectionList($userId);
        $view->set('collectionList', array_slice($collectionList, 0, 4));
        
        $this->response->body($view);
    }

    public function action_collection()
    {
        $view = View::factory('brand_collection');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->opUser['userAttr']);
        $view->set('brandInfo', $this->brandService->getBrandInfo($this->opUser['id']));
        
        $collectionList = $this->collectionService->getAllCollectionList($this->opUser['id']);
        $view->set('collectionList', array_slice($collectionList, 0, 4));
        
        $this->response->body($view);
    }

    public function action_lookbook()
    {
        $view = View::factory('brand_lookbook');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->opUser['userAttr']);
        $view->set('brandInfo', $this->brandService->getBrandInfo($this->opUser['id']));

        $this->response->body($view);
    }

    public function action_message()
    {
        $view = View::factory('user_message');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->opUser['userAttr']);
        $this->response->body($view);
    }
}
