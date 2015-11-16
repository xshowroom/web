<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Message
 *
 * this is a demo controller
 * will not use this one later
 * just for xiaotao's test
 */
class Controller_MessageDemo extends Controller
{
    public $messageService;

    public function before()
    {
        $this->messageService = new Business_Message();
    }

    public function action_createMessage()
    {
        $toUserId = 7;
        $messageBody = "<h2>hello</h2>";
        $this->messageService->createMessage($toUserId, $messageBody);
    }

    public function action_getMessageList()
    {
        $userId = 7;
        $msgList = $this->messageService->getMessageList($userId);

        foreach($msgList as $msg)
        {
            var_dump($msg);
        }
    }


}
