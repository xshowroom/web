<?php defined('SYSPATH') or die('No direct script access.');


class Controller_XSAdmin_Management extends Controller_XSAdmin_AdminBase
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
}
