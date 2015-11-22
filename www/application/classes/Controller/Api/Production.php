<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Production extends Controller_BaseReqLogin
{
    public $productionService;

    public function before()
    {
        parent::before();
        $this->productionService = new Business_Production();
    }
    
    public function action_list()
    {
        $userId     = $this->opUser['id'];
        $collectionId = Request::current()->query('id');
        $res = $this->productionService->getProductionList($userId, $collectionId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
}