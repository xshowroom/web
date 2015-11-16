<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Message
 * 
 * @author tangxiaotao
 */
class Model_Message
{
    protected static $TABLE= 'message';

    const MSG_STATUS_DELETE = -1;
    const MSG_STATUS_UNREADY = 0;
    const MSG_STATUS_READ =  1;

    public function createMessage($toUserId, $messageBody)
    {
        $result = DB::insert(Model_Message::$TABLE)
            ->columns(array(
                'user_id',
                'status',
                'msg_body',
                'create_datetime',
            ))
            ->values(array(
                $toUserId,
                Model_Message::MSG_STATUS_UNREADY,
                $messageBody,
                date('Y-m-d H:i:s'),
            ))
            ->execute();

        return $result[0];
    }

    public function changeMessageStatus($userId, $messageId, $status)
    {
        $result = DB::update(Model_Message::$TABLE)
                    ->set(array('status'=>$status))
                    ->where('$user_id', '=', $userId)
                    ->where('id', '=', $messageId)
                    ->execute();

        return $result[0];
    }

    public function getAllMessagesByUser($userId)
    {
        $result = DB::select()
                    ->from(Model_Message::$TABLE)
                    ->where('user_id', '=', $userId)
                    ->where('status', '!=', Model_Message::MSG_STATUS_DELETE)
                    ->execute();
        
        return $result;
    }
    
    public function getMessageById($userId, $messageId)
    {
        $result = DB::select()
                    ->from(Model_Message::$TABLE)
                    ->where('$user_id', '=', $userId)
                    ->where('id', '=', $messageId)
                    ->execute();
        
        return $result[0];
    }
}