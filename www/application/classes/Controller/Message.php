<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Message extends Controller_BaseReqLogin
{
    public $userService;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
    }

    public function action_index()
    {
        $this->action_list();
    }

    public function action_list()
    {
        $view = View::factory('user_message');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $this->response->body($view);
    }

    public function action_detail()
    {
        $id = Request::current()->param('id');

        echo $id;
//        $view = View::factory('user_message_detail');
//        $view->set('user', $this->opUser);
//        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
//        $this->response->body($view);
    }
}
