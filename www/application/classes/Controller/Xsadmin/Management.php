<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Xsadmin_Management extends Controller_BaseAdmin
{
    public $userService;
    public $brandService;
    public $buyerService;
    public $shopService;
    public $orderService;
    public $collectionService;

    public function before()
    {
        parent::before();

        $this->userService = new Business_User();
        $this->brandService = new Business_Brand();
        $this->buyerService = new Business_Buyer();
        $this->shopService = new Business_Shop();
        $this->orderService = new Business_Order();
        $this->collectionService =new Business_Collection();
    }

    public function action_index()
    {
        $this->action_statistics();
    }

    public function action_statistics()
    {
        $view = View::factory('admin_views/statistics');

        $brandCount = $this->userService->countUserByRole(Model_User::TYPE_USER_BRAND);
        $buyerCount = $this->userService->countUserByRole(Model_User::TYPE_USER_BUYER);
        $allUserCount = $this->userService->countAllUser();
        $orderCount = $this->orderService->countOrder();

        $view->set('user', $this->adminUser);
        $view->set('brand_count', $brandCount);
        $view->set('buyer_count', $buyerCount);
        $view->set('all_user_count', $allUserCount);
        $view->set('order_count', $orderCount);

        $this->response->body($view);
    }

    public function action_users()
    {
        $view = View::factory('admin_views/user_mgr');
        $view->set('user', $this->adminUser);
        $view->set('pending_use_list', $this->userService->listPendingUsers());

        $this->response->body($view);
    }

    public function action_user_detail()
    {
        $userId = $this->request->param('id');

        $view = View::factory('admin_views/user_detail');
        $view->set('user',$this->userService->getUserById($userId));
        $view->set('userAttr', $this->userService->getUserAttr($userId));
        $view->set('brandInfo', $this->brandService->getBrandInfo($userId));

        $this->response->body($view);
    }

    public function action_shops()
    {
        $view = View::factory('admin_views/shop_mgr');
        $view->set('user', $this->adminUser);
        $view->set('pending_shop_list', $this->shopService->listPendingShops());
        $this->response->body($view);
    }

    public function action_orders()
    {
        $view = View::factory('admin_views/order_mgr');
        $view->set('user', $this->adminUser);

        $this->response->body($view);
    }
}
