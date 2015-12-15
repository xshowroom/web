<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Lookbook extends Controller_BaseReqLogin
{
    public $lookbookService;
    public $uploadService;

    public function before()
    {
        parent::before();
        $this->lookbookService = new Business_Lookbook();
        $this->uploadService = new Business_Upload();
    }
    
    public function action_getList()
    {
        $brandId = Request::current()->query('brandId');

        $res = $this->lookbookService->getLookbookList($brandId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_saveLookbook()
    {
        $userId = $this->opUser['id'];
        
        $season     = Request::current()->post('season');
        $lookbook   = Request::current()->post('lookbook');

        $lookbookPath = $this->uploadService->createResizeImage($lookbook, 'lookbook');
        $lookbookId = $this->lookbookService->saveLookbook($userId, $season, $lookbookPath);

        $data = array('id' => $lookbookId, 'lookbook' => $lookbookPath, 'season' => $season);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $data,
        ));
    }

    public function action_deleteLookbook()
    {
        $userId = $this->opUser['id'];
        $lookbookId = Request::current()->post('id');
    
        $res = $this->lookbookService->deleteLookbook($userId, $lookbookId);
    
    	echo json_encode(array(
    			'status' => STATUS_SUCCESS,
    			'msg'    => '',
    			'data'   => $res,
    	));
    }
    
}
