<?php defined('SYSPATH') or die('No direct script access.');

/**
 * @author tangxiaotao
 */
class Business_Message
{  
    public $messageModel;

    public function __construct()
    {
        $this->messageModel = new Model_Message();
    }

    /**
     * Create message for specific user
     *
     * @param $toUserId
     * @param $messageBody
     */
    public function createMessage($toUserId, $messageBody)
    {
        $this->messageModel->createMessage($toUserId, $messageBody);
    }

    /**
     * fetch all messages belong to a user
     *
     * @param $userId
     * @return object
     */
    public function getMessageList($userId)
    {
        $msgList = $this->messageModel->getAllMessagesByUser($userId);

        return $msgList;
    }

    /**
     * get a specific message
     *
     * @param $userId
     * @param $messageId
     * @return mixed
     */
    public function getMessageDetail($userId, $messageId)
    {
        $message = $this->messageModel->getMessageById($userId, $messageId);
        // set message to READ after user get it
        $this->messageModel->changeMessageStatus($userId, $messageId, Model_Message::MSG_STATUS_READ);

        return $message;
    }

    public function deleteMessage($userId, $messageId)
    {
        $this->messageModel->changeMessageStatus($userId, $messageId, Model_Message::MSG_STATUS_DELETE);
    }
}