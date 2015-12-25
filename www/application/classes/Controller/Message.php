<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Message extends Controller_BaseReqLogin
{
    public $userService;
    public $messageService;
    public $orderService;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
        $this->messageService = new Business_Message();
        $this->orderService = new Business_Order();
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
        $view->set('messageList', $this->messageService->getMessageList($this->opUser['id']));

        $this->response->body($view);
    }

    public function action_detail()
    {
        $msg_id = Request::current()->param('id');


        $message = $this->messageService->getMessageDetail($this->opUser['id'], $msg_id);

        if (empty($message)) {
            self::redirect(URL::site("message"));
        }

        $view = View::factory('user_message_detail');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $view->set('message', $message);
        $view->set('order', $this->orderService->buildOrderDetail($this->orderService->getOrderById($message['order_id'])));

        $this->response->body($view);
    }
}
