<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Brand extends Controller_Api_ApiBase
{
    public $brandService;

    public function before()
    {
        $this->brandService = new Business_Brand();
    }

    public function action_list()
    {
        $res = $this->brandService->getAllBrand();
        
        echo json_encode(array(
            'status' => $status,
            'msg'      => $msg,
        ));
    }

}
