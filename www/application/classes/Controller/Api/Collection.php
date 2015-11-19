<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Collection extends Controller_Base
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
    
    public function action_add()
    {
        $userId     = $_SESSION['opUser']['id'];
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
            'msg'      => $msg,
        ));
    }
}
