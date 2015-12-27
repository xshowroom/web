<?php defined('SYSPATH') or die('No direct script access.');


class Controller_BaseReqLogin extends Controller_Base
{
    public $opUser;

    public function before()
    {
        parent::before();

        $this->opUser = $_SESSION['opUser'];

        // redirect to login if no user
        if(empty($this->opUser)) {
            $this->redirectLogin();
        }

        // redirect to login if user role is wrong
        $roleType = (int)$this->opUser['role_type'];
        $allowedUserType = array(Model_User::TYPE_USER_ADMIN, Model_User::TYPE_USER_BRAND, Model_User::TYPE_USER_BUYER);

        if(! in_array($roleType, $allowedUserType, TRUE)){
            $this->redirectLogin();
        }
    }

    protected function redirectLogin()
    {
        $this->redirect('/login');
    }

    protected function checkBrandUser()
    {
        if ($this->opUser["role_type"] != Model_User::TYPE_USER_BRAND) {
            $this->redirect('/user');
        }
    }

    protected function checkBuyerUser()
    {
        if ($this->opUser["role_type"] != Model_User::TYPE_USER_BUYER) {
            $this->redirect('/user');
        }
    }
}

