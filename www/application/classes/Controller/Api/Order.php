<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Order extends Controller_BaseReqLogin
{
    public $orderService;

    public function before()
    {
        parent::before();
        $this->orderService = new Business_Order();
    }

    public function action_addToCart()
    {
        $userId = $this->opUser['id'];
        $productionId = Request::current()->post('productionId');

        $res = $this->orderService->addToCart($userId, $productionId);       
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_getFromCart()
    {
        $userId = $this->opUser['id'];
        $productionId = Request::current()->query('productionId');

        $res = $this->orderService->getProductionFromCart($userId, $productionId);       

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_getListFromCart()
    {
        $userId = $this->opUser['id'];

        $res = $this->orderService->getProductionListFromCart($userId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_getListFromCartByCollection()
    {
        $userId = $this->opUser['id'];
        $collectionId = Request::current()->query('collectionId');

        $res = $this->orderService->getListFromCartByCollection($userId, $collectionId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_deleteFromCart()
    {
        $userId = $this->opUser['id'];
        $productionId = Request::current()->post('productionId');

        $res = $this->orderService->deleteFromCart($userId, $productionId);       
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_createOrder()
    {
        $userId = $this->opUser['id'];
        $collectionId = Request::current()->post('collectionId');
        $productionDetail = Request::current()->post('productionDetail');
        $comments = Request::current()->post('comments');
        $description = Request::current()->post('description');

        $res = $this->orderService->createOrder($userId, $collectionId, $productionDetail, $comments, $description);       
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_getOrder()
    {
        $userId = $this->opUser['id'];
        $orderId = Request::current()->post('orderId');

        $res = $this->orderService->getOrder($userId, $orderId);       
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_getOrderList()
    {
        $userId = $this->opUser['id'];
        $status = Request::current()->post('status');

        $res = $this->orderService->getOrderList($userId, $status);       
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_updateStatus()
    {
        $userId = $this->opUser['id'];
        $orderId = Request::current()->post('orderId');
        $status = Request::current()->post('orderStatus');

        $res = $this->orderService->updateStatus($userId, $orderId, $status);       
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_deleteOrder()
    {
        $userId = $this->opUser['id'];
        $orderId = Request::current()->post('orderId');

        $res = $this->orderService->deleteOrder($userId, $orderId);       
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }
}
