<?php defined('SYSPATH') or die('No direct script access.');


class Controller_User extends Controller_Base
{
    public function action_index()
    {

    }

    public function action_login()
    {
        if(!empty($opUser)) {
            $this->redirect('/login');
        }

        // redirect by user role_type
        $opUser = $_SESSION['opUser'];
        $roleType = (int)$opUser['role_type'];

        if($roleType === Business_User::ROLE_BRAND){
            $this->redirect('/brand/dashboard');
        } elseif ($roleType === Business_User::ROLE_BUYER) {
            $this->redirect('/buyer/dashboard');
        }elseif ($roleType === Business_User::ROLE_ADMIN){
            $this->redirect('/xsadmin/home');
        }

        $this->redirect('/login');
    }

    public function action_logout()
    {
        $this->destroy_session();

        $this->redirect('/home');
    }
}
