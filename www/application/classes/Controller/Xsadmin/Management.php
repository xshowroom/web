<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Xsadmin_Management extends Controller_XSAdmin_AdminBase
{
    public $userService;
    public $collectionService;

    public function before()
    {
        parent::before();

        $this->userService = new Business_User();
        $this->collectionService =new Business_Collection();
    }

    public function action_index()
    {
        $this->action_statistics();
    }

    public function action_statistics()
    {
        $view = View::factory('admin_views/statistics');
        $view->set('user', $this->adminUser);

        $this->response->body($view);
    }

    public function action_users()
    {
        $view = View::factory('admin_views/user_mgr');
        $view->set('user', $this->adminUser);

        $this->response->body($view);
    }

    public function action_shops()
    {
        $view = View::factory('admin_views/shop_mgr');
        $view->set('user', $this->adminUser);

        $this->response->body($view);
    }

    public function action_orders()
    {
        $view = View::factory('admin_views/order_mgr');
        $view->set('user', $this->adminUser);

        $this->response->body($view);
    }
}
