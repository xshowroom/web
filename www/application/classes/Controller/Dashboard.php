<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Dashboard extends Controller_BaseReqLogin
{
    public function action_index()
    {
        echo "User login successfully!";

        var_dump($this->opUser);
    }
}
