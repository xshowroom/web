<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Guest extends Controller_Base
{
    public $brandService;
    public $collectionService;
    
    public function before()
    {
        parent::before();
        $this->brandService = new Business_Brand();
        $this->collectionService = new Business_Collection();
    }
    
    public function action_coverImgList()
    {
        $brandId = Request::current()->query('brandId');
        $season = Request::current()->query('season');
        
        $res = $this->collectionService->getAllCollectionImg($brandId, $season);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'      => '',
            'data' => $res,
        ));
    }
    
    public function action_checkAuth()
    {
        $userId  = $this->opUser['id'];
        //$shopId  = (int)trim(Request::current()->query('shopId'));
        $brandId = (int)trim(Request::current()->query('brandId'));
    
        $res = $this->buyerService->checkAuth($userId, $brandId);
    
        echo json_encode(array(
                'status' => STATUS_SUCCESS,
                'msg'    => '',
                'data'   => $res,
        ));
    }
}