<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Base extends Controller
{
    public function before()
    {
        session_start();
        I18n::lang($_COOKIE['language']);
    }

    protected function destroy_session()
    {
        if(!empty($_SESSION['opUser'])) {
            session_unset();
            session_destroy();
        }
    }
}
