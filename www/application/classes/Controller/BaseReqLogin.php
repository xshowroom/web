<?php defined('SYSPATH') or die('No direct script access.');


class Controller_BaseReqLogin extends Controller_Base
{
    public $opUser;

    public function before()
    {
        Controller_Base::before();

        $this->opUser = $_SESSION['opUser'];

        // redirect to login if no user
        if(!empty($opUser)) {
            $this->redirect('/login');
        }

        // redirect to login if user role is wrong
        $roleType = $this->opUser['role_type'];

        if($roleType != Business_User::ROLE_BRAND and $roleType != Business_User::ROLE_BUYER){
            $this->redirectLogin();
        }
    }

    private function redirectLogin()
    {
        $this->redirect('/login');
    }

    protected function isBrandUser()
    {
        if ($this->opUser["role_type"] != Business_User::ROLE_BRAND) {
            $this->redirectLogin();
        }
    }

    protected function isBuyerUser()
    {
        if ($this->opUser["role_type"] != Business_User::ROLE_BUYER) {
            $this->redirectLogin();
        }
    }
}

