<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Brand extends Controller_BaseReqLogin
{
    public $brandService;

    public function before()
    {
        parent::before();
        $this->brandService = new Business_Brand();
    }

    public function action_list()
    {
        $res = $this->brandService->getBrandList();
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
    
    public function action_query()
    {
        $name = Request::current()->query('name');
        $res = $this->brandService->queryBrand($name);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

}
