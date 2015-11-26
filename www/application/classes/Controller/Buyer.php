<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Buyer extends Controller_BaseReqLogin
{
    public $userService;
    public $brandService;
    public $collectionService;

    public function before()
    {
        parent::before();

        $this->checkBuyerUser();

        $this->userService = new Business_User();
//         $this->brandService = new Business_Brand();
//         $this->collectionService = new Business_Collection();
    }

    public function action_profile()
    {
        $view = View::factory('user_profile');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));

        $this->response->body($view);
    }

    public function action_dashboard()
    {
        $view = View::factory('buyer_dashboard');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        
        $this->response->body($view);
    }

//     public function action_collection()
//     {
//         $view = View::factory('buyer_collection');
//         $view->set('user', $this->opUser);
//         $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        
//         $this->response->body($view);
//     }

    public function action_order()
    {
        $view = View::factory('buyer_order');
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
