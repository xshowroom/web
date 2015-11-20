<?php defined('SYSPATH') OR die('No direct script access.');

class HTTP_Exception_404 extends Kohana_HTTP_Exception_404 {

    public function get_response()
    {
        $view = View::factory('/errors/error_404');

        session_start();
        $opUser = $_SESSION['opUser'];

        if(!empty($opUser)) {
            $view->set('user', $opUser);
            $userService = new Business_User();
            $view->set('userAttr', $userService->getUserAttr($opUser['id']));
        }

        $response = Response::factory()
            ->status(404)
            ->body($view);

        return $response;
    }
}
