<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Subscribe Service
 * 
 * @author xiaotaot
 */
class Business_Subscribe
{
    public $subscribeModel;

    public function __construct()
    {
        $this->subscribeModel = new Model_Subscribe();
    }

    public function subscribe($email)
    {
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";

        if (!preg_match($pattern, $email)){
            return false;
        }

        if ($this->subscribeModel->checkEmail($email)) {
            $this->subscribeModel->subscribe($email);
        }

        return true;
    }

    public function unsubscribe($email, $check)
    {
        $this->subscribeModel->unsubscribe($email, $check);

        return true;
    }
}