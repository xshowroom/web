<?php defined('SYSPATH') or die('No direct script access.');


class Controller_BaseReqLogin extends Controller_Base
{
    public $opUser;

    public function before()
    {
        Controller_Base::before();

        $this->opUser = $_SESSION['opUser'];

        if(empty($opUser)) {
            $roleType = $this->opUser['role_type'];

            if($roleType != Business_User::ROLE_BRAND and $roleType != Business_User::ROLE_BUYER){
                $this->redirect('/login');
            }
        }
    }
}

