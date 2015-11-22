<?php defined('SYSPATH') or die('No direct script access.');


class Controller_User extends Controller_BaseReqLogin
{
    public function action_index()
    {
        $this->action_profile();
    }

    public function action_login()
    {
        $roleType = (int)$this->opUser['role_type'];

        if($roleType === Business_User::ROLE_BRAND){
            $this->redirect('/brand/dashboard');
        } elseif ($roleType === Business_User::ROLE_BUYER) {
            $this->redirect('/buyer/dashboard');
        }elseif ($roleType === Business_User::ROLE_ADMIN){
            $this->redirect('/xsadmin/management');
        }

        $this->redirectLogin();
    }

    public function action_logout()
    {
        $this->destroy_session();

        $this->redirect('/home');
    }

    public function action_profile()
    {
        $roleType = (int)$this->opUser['role_type'];

        if($roleType === Business_User::ROLE_BRAND){
            $this->redirect('/brand/profile');
        } elseif ($roleType === Business_User::ROLE_BUYER) {
            $this->redirect('/buyer/profile');
        }
    }
}
