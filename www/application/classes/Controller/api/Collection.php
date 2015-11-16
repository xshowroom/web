<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Collection extends Controller_ApiBase
{
    public $collectionService;

    public function before()
    {
        $this->collectionService = new Business_Collection();
    }

    public function action_list()
    {
        echo json_encode(array(
            'status' => $status,
            'msg'      => $msg,
        ));
    }

}
