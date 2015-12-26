<?php defined('SYSPATH') or die('No direct script access.');


class Controller_BaseAdmin extends Controller_Base
{
    public $adminUser;

    public function before()
    {
        parent::before();

        I18n::lang('en');

        $this->adminUser = $_SESSION['opUser'];

        if(empty($this->adminUser) || $this->adminUser['role_type'] != Model_User::TYPE_USER_ADMIN) {
            $this-> redirectLogin();
        }
    }

    protected function redirectLogin()
    {
        $this->redirect('/xsadmin/login');
    }
}
