<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Brand extends Controller_Base
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
        $pageSize = Request::current()->getParam('pageSize');
        $pageSize = empty($pageSize) ? 0 : $pageSize;
        $offset = Request::current()->getParam('offset');
        $offset = empty($offset) ? 0 : $offset;

        $res = array_slice($res, $offset, $pageSize);
       
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
    
    public function action_query()
    {
        $name = Request::current()->getParam('name');
        $res = $this->brandService->queryBrand($name);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
}
