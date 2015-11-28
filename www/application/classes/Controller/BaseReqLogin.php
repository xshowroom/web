<?php defined('SYSPATH') or die('No direct script access.');


class Controller_BaseReqLogin extends Controller_Base
{
    public $opUser;

    public function before()
    {
        parent::before();

        $this->opUser = $_SESSION['opUser'];

        // redirect to login if no user
        if(!empty($opUser)) {
            $this->redirectLogin();
        }

        // redirect to login if user role is wrong
        $roleType = $this->opUser['role_type'];

        if($roleType != Business_User::ROLE_BRAND && $roleType != Business_User::ROLE_BUYER){
            $this->redirectLogin();
        }
    }

    protected function redirectLogin()
    {
        $this->redirect('/login');
    }

    protected function checkBrandUser()
    {
        if ($this->opUser["role_type"] != Business_User::ROLE_BRAND) {
            $this->redirect('/user');
        }
    }

    protected function checkBuyerUser()
    {
        if ($this->opUser["role_type"] != Business_User::ROLE_BUYER) {
            $this->redirect('/user');
        }
    }
}

