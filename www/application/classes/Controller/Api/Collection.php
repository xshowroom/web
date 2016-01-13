<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Collection extends Controller_BaseReqLogin
{
    public $collectionService;

    public function before()
    {
        parent::before();
        $this->collectionService = new Business_Collection();
    }

    public function action_list()
    {
        $userId     = $this->opUser['id'];
        $detail     = empty(Request::current()->getParam('detail')) ? 0 : 1;
        $res = $this->collectionService->getAllCollectionList($userId, $detail);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }
    
    public function action_detail()
    {
        $userId     = $this->opUser['id'];
        $collectionId = Request::current()->getParam('id');
        $res = $this->collectionService->getCollectionInfo($userId, $collectionId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'  => $res,
        ));
    }
    
    public function action_add()
    {
        $userId     = $this->opUser['id'];
        $name       = Request::current()->getParam('name');
        $category   = Request::current()->getParam('category');
        $mode       = Request::current()->getParam('mode');
        $season     = Request::current()->getParam('season');
        $order      = Request::current()->getParam('order');
        $currency   = Request::current()->getParam('currency');
        $deadline   = Request::current()->getParam('deadline');
        $delivery   = Request::current()->getParam('delivery');
        $description = Request::current()->getParam('description');
        $imagePath  = Request::current()->getParam('image');
        
        $res = $this->collectionService->addCollection($userId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'      => '',
            'data' => $res,
        ));
    }
    
    public function action_modify()
    {
        $userId     = $this->opUser['id'];
        $collectionId = Request::current()->getParam('id');
        $name       = Request::current()->getParam('name');
        $category   = Request::current()->getParam('category');
        $mode       = Request::current()->getParam('mode');
        $season     = Request::current()->getParam('season');
        $order      = Request::current()->getParam('order');
        $currency   = Request::current()->getParam('currency');
        $deadline   = Request::current()->getParam('deadline');
        $delivery   = Request::current()->getParam('delivery');
        $description = Request::current()->getParam('description');
        $imagePath  = Request::current()->getParam('image');
        
        $res = $this->collectionService->modifyCollection($userId, $collectionId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'      => '',
            'data' => $res,
        ));
    }
    
    public function action_delete()
    {
        $userId     = $this->opUser['id'];
        $collectionId = Request::current()->getParam('id');
        
        $res = $this->collectionService->updateStatus($userId, $collectionId, Model_Collection::TYPE_OF_DELETE);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'      => '',
            'data' => $res,
        ));
    }
    
    public function action_check()
    {
        $userId     = $this->opUser['id'];
        
        $key = Request::current()->getParam('key');
        $value = Request::current()->getParam('param');
        $collectionId = Request::current()->getParam('collectionId');
        
        if ($key == 'name') {
        	list($status, $msg) = $this->collectionService->checkCollectionName($userId, $value, $collectionId);
        }
        
        echo json_encode(array(
            'status'    => $status,
            'msg'       => __($msg),
        ));
    }
    
    public function action_enable()
    {
        $userId     = $this->opUser['id'];
        $collectionId = Request::current()->getParam('id');
        $res = $this->collectionService->updateStatus($userId, $collectionId, Model_Collection::TYPE_OF_ONLINE);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'      => '',
            'data' => $res,
        ));
    }
    
    public function action_close()
    {
        $userId     = $this->opUser['id'];
        $collectionId = Request::current()->getParam('id');
        $res = $this->collectionService->updateStatus($userId, $collectionId, Model_Collection::TYPE_OF_CLOSE);
    
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'      => '',
            'data' => $res,
        ));
    }
    
    public function action_search()
    {
        $userId = $this->opUser['id'];
        $res = $this->collectionService->getCollectionList($userId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'      => '',
            'data' => $res,
        ));
    }
}
