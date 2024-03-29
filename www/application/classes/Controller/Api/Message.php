<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Message extends Controller_BaseReqLogin
{
    public $messageService;

    public function before()
    {
        parent::before();
        $this->messageService = new Business_Message();
    }
    
    public function action_delete()
    {
        $userId = $this->opUser['id'];
        $msgId = Request::current()->getParam('id');
        $res = $this->messageService->deleteMessage($userId, $msgId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $msgId,
        ));
    }

    public function action_unreadCount()
    {
        $userId = $this->opUser['id'];

        $res = $this->messageService->getUnReadCount($userId);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
}