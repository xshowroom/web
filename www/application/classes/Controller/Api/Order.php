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
        $productionId = Request::current()->getParam('productionId');

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
        $productionId = Request::current()->getParam('productionId');

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
        $collectionId = Request::current()->getParam('collectionId');

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
        $productionId = Request::current()->getParam('productionId');

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
        $collectionId = Request::current()->getParam('collectionId');
        $productionDetail = Request::current()->getParam('productionDetail');
        $comments = Request::current()->getParam('comments');
        $description = Request::current()->getParam('description');
        $address = Request::current()->getParam('address');
        $paymentType = Request::current()->getParam('paymentType');
        $shopId = Request::current()->getParam('shopId');

        $res = $this->orderService->createOrder($userId, $collectionId, $productionDetail, $comments, $description, $shopId, $address, $paymentType);       
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_getOrder()
    {
        $userId = $this->opUser['id'];
        $orderId = Request::current()->getParam('orderId');

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
        $status = Request::current()->getParam('status');
        $type = Request::current()->getParam('type');

        $res = $this->orderService->getOrderList($userId, $status, $type);       
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }

    public function action_updateStatus()
    {
        $userId = $this->opUser['id'];
        $orderId = Request::current()->getParam('orderId');
        $status = Request::current()->getParam('orderStatus');

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
        $orderId = Request::current()->getParam('orderId');

        $res = $this->orderService->deleteOrder($userId, $orderId);       
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'   => '',
            'data'  => $res,
        ));
    }
}
