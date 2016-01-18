<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Subscribe extends Controller_Base
{
    const MSG_SUBSCRIBE_SUCCESS = 'MSG_SUBSCRIBE_SUCCESS';
    const MSG_SUBSCRIBE_ERROR = 'MSG_SUBSCRIBE_ERROR';

    public $subscribeService;

    public function before()
    {
        $this->subscribeService = new Business_Subscribe();
    }

    public function subscribe()
    {
        $email = Request::current()->getParam('email');

        $res = $this->subscribeService->subscribe($email);

        echo json_encode(array(
            'status'   => $res? STATUS_SUCCESS : STATUS_ERROR,
            'msg'      => $res? __(self::MSG_SUBSCRIBE_SUCCESS) : __(MSG_SUBSCRIBE_ERROR),
        ));
    }

    public function unsubscribe()
    {
        $email = Request::current()->getParam('email');
        $hash = Request::current()->getParam('hash');

        $this->subscribeService->unsubscribe($email, $hash);

        echo json_encode(array(
            'status'   => STATUS_SUCCESS,
            'msg'      => __(self::MSG_SUBSCRIBE_SUCCESS),
        ));
    }
}
