<?php defined('SYSPATH') or die('No direct script access.');


class Controller_XSAdmin_AdminBase extends Controller_Base
{
    public $adminUser;

    public function before()
    {
        Controller_Base::before();

        $this->adminUser = $_SESSION['opUser'];

        // redirect to login if no user
        if(!empty($this->adminUser) && $this->adminUser['role_type'] != Business_User::ROLE_ADMIN) {
            $this->redirect('/admin/login');
        }
    }
}
