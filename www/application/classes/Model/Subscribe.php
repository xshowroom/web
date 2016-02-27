<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Subscribe
 *
 * @author xiaotaot
 */
class Model_Subscribe
{
    protected static $TABLE = 'subscribe';

    const STATUS_SUBSCRIBE_NORMAL = 0;
    const STATUS_SUBSCRIBE_SUSPENDED = 1;

    public function checkEmail($email)
    {
        $result = DB::select()
            ->from(Model_Subscribe::$TABLE)
            ->where('email', '=', $email)
            ->execute()
            ->as_array();

        return empty($result) ? false : true;
    }

    public function subscribe($email)
    {
        $result = DB::insert(Model_Subscribe::$TABLE)
            ->columns(array(
                'email',
                'check',
                'status'
            ))
            ->values(array(
                $email,
                md5(date('ymdHis') . substr(microtime(), 2, 4)),
                Model_Subscribe::STATUS_SUBSCRIBE_NORMAL
            ))
            ->execute();

        return $result[0];
    }

    public function unsubscribe($email, $check)
    {
        $result = DB::update(Model_Subscribe::$TABLE)
            ->set(array('status' => Model_Subscribe::STATUS_SUBSCRIBE_SUSPENDED))
            ->where('email', '=', $email)
            ->where('check', '=', $check)
            ->execute();

        return $result[0];
    }
}