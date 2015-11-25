<?php defined('SYSPATH') or die('No direct script access.');

/**
 * @author tangxiaotao
 */
class Business_Message
{
    /**
     * define some messages
     */
    const AUTO_MSG_WELCOME_BRAND = 'AUTO_MSG_WELCOME_BRAND';
    const AUTO_MSG_WELCOME_BUYER = 'AUTO_MSG_WELCOME_BUYER';
    const AUTO_MSG_ORDER_GENERATE = 'AUTO_MSG_ORDER_GENERATE';
    const AUTO_MSG_ORDER_STATUS_CHANGE = 'AUTO_MSG_ORDER_STATUS_CHANGE';

    // Message Status
    const MSG_STATUS_DELETE = -1;
    const MSG_STATUS_UNREADY = 0;
    const MSG_STATUS_READ =  1;

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

        if (empty($message))
        {
            return null;
        }

        if((int)$message["status"] === $this::MSG_STATUS_UNREADY ) {
            // set message to READ after user get it
            $this->messageModel->changeMessageStatus($userId, $messageId, Model_Message::MSG_STATUS_READ);
        }

        return $message;
    }

    /**
     * @param $userId
     * @param $messageId
     * @return bool
     */
    public function deleteMessage($userId, $messageId)
    {
        $message = $this->getMessageDetail($userId, $messageId);

        if (empty($message)) {
            return false;
        }

        $this->messageModel->changeMessageStatus($userId, $messageId, Model_Message::MSG_STATUS_DELETE);
        return true;
    }
}