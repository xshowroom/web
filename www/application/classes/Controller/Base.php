<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Base extends Controller
{
    const LANG_EN = "en";
    const LANG_ZH_CN = "zh_CN";

    public function before()
    {
        session_start();

        $this->decide_language();
    }

    private function decide_language()
    {
        $lang =  $_COOKIE['language'];

        if (empty($lang))
        {
            $langFromBrowser = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5);

            if (preg_match("/zh-c/i", $langFromBrowser))
                $lang = Controller_Base::LANG_ZH_CN;
            else if (preg_match("/zh/i", $langFromBrowser))
                $lang = Controller_Base::LANG_EN;
            else if (preg_match("/en/i", $langFromBrowser))
                $lang = Controller_Base::LANG_EN;
            else if (preg_match("/fr/i", $langFromBrowser))
                $lang = Controller_Base::LANG_EN;
            else if (preg_match("/de/i", $langFromBrowser))
                $lang = Controller_Base::LANG_EN;
            else if (preg_match("/jp/i", $langFromBrowser))
                $lang = Controller_Base::LANG_EN;
            else if (preg_match("/ko/i", $langFromBrowser))
                $lang = Controller_Base::LANG_EN;
            else if (preg_match("/es/i", $langFromBrowser))
                $lang = Controller_Base::LANG_EN;
            else if (preg_match("/sv/i", $langFromBrowser))
                $lang = Controller_Base::LANG_EN;
            else
                $lang = Controller_Base::LANG_EN;

            // set cookie
            setcookie("language",$lang);
        }

        // set language
        I18n::lang($lang);
    }

    protected function destroy_session()
    {
        if(!empty($_SESSION['opUser'])) {
            session_unset();
            session_destroy();
        }
    }

    protected function redirect_404()
    {
        throw new HTTP_Exception_404();
    }
}
