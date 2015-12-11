<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Lookbook extends Controller_BaseReqLogin
{
    public $lookbookService;

    public function before()
    {
        parent::before();
        $this->lookbookService = new Business_Lookbook();
    }
    
    public function action_getList()
    {
        $userId = $this->opUser['id'];

        $res = $this->lookbookService->getLookbookList($userId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }

    public function action_saveLookbook($season, $lookbook)
    {
        $userId = $this->opUser['id'];

        $res = $this->lookbookService->saveLookbook($userId, $season, $lookbook);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
}