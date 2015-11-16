<?php defined('SYSPATH') OR die('No direct script access.');

class HTTP_Exception_404 extends Kohana_HTTP_Exception_404 {
    public function get_response()
    {
        // $view = View::factory('errors/404');

        // Remembering that `$this` is an instance of HTTP_Exception_404
        // $view->message = $this->getMessage();

        $view = View::factory('error_404');

        $response = Response::factory()
            ->status(404)
            ->body($view);

        return $response;
    }
}
