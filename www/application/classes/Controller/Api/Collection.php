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
        echo json_encode(array(
            'status' => $status,
            'msg'      => $msg,
        ));
    }
    
    public function action_add()
    {
        $userId     = $this->opUser['id'];
        $name       = Request::current()->post('name');
        $category   = Request::current()->post('category');
        $mode       = Request::current()->post('mode');
        $season     = Request::current()->post('season');
        $order      = Request::current()->post('order');
        $currency   = Request::current()->post('currency');
        $deadline   = Request::current()->post('deadline');
        $delivery   = Request::current()->post('delivery');
        $description = Request::current()->post('description');
        $imagePath  = Request::current()->post('image');
        
        $res = $this->collectionService->addCollection($userId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath);
        
        echo json_encode(array(
            'status' => $status,
            'msg'      => '',
            'data' => $res,
        ));
    }
    
    public function action_modify()
    {
        $userId     = $_SESSION['opUser']['id'];
        $collectionId = Request::current()->post('id');
        $name       = Request::current()->post('name');
        $category   = Request::current()->post('category');
        $mode       = Request::current()->post('mode');
        $season     = Request::current()->post('season');
        $order      = Request::current()->post('order');
        $currency   = Request::current()->post('currency');
        $deadline   = Request::current()->post('deadline');
        $delivery   = Request::current()->post('delivery');
        $description = Request::current()->post('description');
        $imagePath  = Request::current()->post('image');
        
        $res = $this->collectionService->modifyCollection($userId, $collectionId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath);
        
        echo json_encode(array(
            'status' => $status,
            'msg'      => '',
            'date' => $res,
        ));
    }
    
    public function action_delete()
    {
        $userId     = $this->opUser['id'];
        $collectionId = Request::current()->post('id');
        
        $res = $this->collectionService->modifyCollection($userId, $collectionId, $name, $category, $mode, $season, $order, $currency, $deadline, $delivery, $description, $imagePath);
        
        echo json_encode(array(
            'status' => $status,
            'msg'      => '',
            'date' => $res,
        ));
    }
    
    public function action_check()
    {
        $userId     = $this->opUser['id'];
        $collectionName = Request::current()->post('name');
        list($status, $msg) = $this->collectionService->checkCollectionName($userId, $collectionName);
        
        echo json_encode(array(
            'status'    => $status,
            'msg'       => __($msg),
        ));
    }
    
    public function action_enable()
    {
        $userId     = $this->opUser['id'];
        $collectionId = Request::current()->post('id');
        $res = $this->collectionService->updateStatus($userId, $collectionId, Model_Collection::TYPE_OF_ONLINE);
        
        echo json_encode(array(
            'status' => $status,
            'msg'      => '',
            'date' => $res,
        ));
    }
    
    public function action_close()
    {
        $userId     = $this->opUser['id'];
        $collectionId = Request::current()->post('id');
        $res = $this->collectionService->updateStatus($userId, $collectionId, Model_Collection::TYPE_OF_CLOSE);
    
        echo json_encode(array(
            'status' => $status,
            'msg'      => '',
            'date' => $res,
        ));
    }
}
