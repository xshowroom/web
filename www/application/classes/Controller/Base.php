<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Base extends Controller
{
    public function before()
    {
        session_start();

        $lang = empty($_COOKIE['language']) ? 'zh-CN' : $_COOKIE['language'];

        I18n::lang($lang);
    }

    protected function destroy_session()
    {
        if(!empty($_SESSION['opUser'])) {
            session_unset();
            session_destroy();
        }
    }
}
