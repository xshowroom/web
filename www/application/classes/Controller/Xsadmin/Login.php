<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Xsadmin_Login extends Controller_Base
{
    public function before()
    {
        parent::before();

        I18n::lang(Controller_Base::LANG_EN);
        setcookie('language',Controller_Base::LANG_EN);
    }

    public function action_index()
    {
        $this->destroy_session();

        $view = View::factory('admin_views/login');
        $this->response->body($view);
    }
}
