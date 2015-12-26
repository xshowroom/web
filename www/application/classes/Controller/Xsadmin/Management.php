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

    public function action_stores()
    {
        $view = View::factory('admin_views/store_mgr');
        $view->set('user', $this->adminUser);
        $view->set('pending_shop_list', $this->shopService->listPendingShops());
        $this->response->body($view);
    }

    public function action_orders()
    {
        $adminId = $this->adminUser['id'];
        $adminType = $this->adminUser['role_type'];

        $view = View::factory('admin_views/order_mgr');
        $view->set('user', $this->adminUser);
        $view->set('pending_order_list', $this->orderService->getOrderList($adminId, Model_Order::ORDER_STATUS_PENDING, $adminType));
        $view->set('confirmed_order_list', $this->orderService->getOrderList($adminId, Model_Order::ORDER_STATUS_CONFIRMED, $adminType));
        $view->set('balance_payment_order_list', $this->orderService->getOrderList($adminId, Model_Order::ORDER_STATUS_PAYBALANCE, $adminType));
        $view->set('full_payment_order_list', $this->orderService->getOrderList($adminId, Model_Order::ORDER_STATUS_FULLPAYMENT, $adminType));

        $this->response->body($view);
    }
}
