<?php defined('SYSPATH') or die('No direct script access.');


class Controller_User extends Controller_Base
{
    public function action_index()
    {

    }

    public function action_logout()
    {
        $this->destroy_session();
        echo "User has logout";
    }
}
