<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Xsadmin_AdminBase extends Controller_Base
{
    public $adminUser;

    public function before()
    {
        parent::before();

        $this->adminUser = $_SESSION['opUser'];

        if(empty($this->adminUser) || $this->adminUser['role_type'] != Model_User::TYPE_USER_ADMIN) {
            $this->redirect('/xsadmin/login');
        }
    }
}
