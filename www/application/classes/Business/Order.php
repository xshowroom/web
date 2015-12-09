<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author liyashuai
 */
class Business_Order
{
    public $orderModel;
    public $productionService;
    public $collectionService;
    public $buyerService;
    public $shopService;

    public function __construct()
    {
        $this->orderModel = new Model_Order();
        $this->productionService = new Business_Production();
        $this->collectionService = new Business_Collection();
        $this->buyerService = new Business_Buyer();
        $this->shopService = new Business_Shop();
    }

    public function addToCart($userId, $productionId)
    {
        $production = $this->productionService->getProduction($userId, $productionId);
        $collectionId = $production['collection_id'];

        $res = $this->orderModel->addToCart($userId, $collectionId, $productionId);

        return $res;
    }

    public function getProductionFromCart($userId, $productionId)
    {
        $productionInCart = $this->orderModel->getProductionFromCart($userId, $productionId);

        if (empty($productionInCart)) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        return $productionInCart;
    }

    public function getProductionListFromCart($userId)
    {
        $productionListInCart = $this->orderModel->getProductionListFromCart($userId);
        
        $res = array();
        foreach ($productionListInCart as $productionInCart) {
            $res[$productionInCart['collection_id']][] = $productionInCart['production_id'];
            // to-do
            // 根据productionId获取前端需要的production信息
        }

        return $res;
    }

    public function deleteFromCart($userId, $productionId)
    {
        $production = $this->productionService->getProduction($userId, $productionId);
        
        $productionInCart = $this->getProductionFromCart($userId, $production['id']);

        $res = $this->orderModel->deleteFromCart($productionInCart['id']);

        return $res;
    }

    public function createOrder($userId, $collectionId, $productionDetail, $comments, $description);
    {
        // item_amount && total_num
        $shippingAmount = $itemAmount = $totalNum = 0;
        $detail = json_decode($productionDetail);
        foreach ($detail as $productionId => $items) {
            $production = $this->productionService->getProduction($userId, $productionId);
            foreach ($items as $item) {
                $totalNum = $totalNum + $item['buy_num'];
                $itemAmount = $itemAmount + $item['buy_num'] * $production['retail_price']; // 批发价还是零售价
            }
        }

        $totalAmount = $shippingAmount + $itemAmount;

        $collection = $this->getCollectionInfo($userId, $collectionId); 

        if ($collection['mini_order'] > $totalAmount) { // 要不要加shipAmount
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $relation = $this->buyerService->getRelation($userId, $brandId);
        $shop = $this->shopService->getShopById($userId, $shopId);

        $order = array(
            'orderId' => $this->getOrderId(),
            'buyerId' => $userId,
            'shopId' => $relation['shop_id'],
            'brandId' => $collection['user_id'],
            'collectionId' => $collectionId,
            'productionDetail' => $productionDetail,
            'totalNum' => $totalNum,
            'itemAmount' => $itemAmount,
            'shippingAmount' => $shippingAmount,
            'totalAmount' => $totalAmount,
            'deliveryDate' => $collection['delivery_date'],
            'shopAddress' => $shop['address'],
            'comments' => $comments,
            'description' => $description,
        );

        $res = $this->orderModel->addOrder($order);

        return $order['orderId'];
        
    }

    public function getOrderId()
    {
        $time = date('ymdHis'). substr(microtime(), 2, 4);
        $rand = rand(1000, 9999);
        $orderId = $time. $rand;

        return $orderId;
    }

    public function getOrder($userId, $orderId)
    {
        $order = $this->orderModel->getById($orderId);
        if ($order['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        return $order;
    }

    public function getOrderList($userId, $status)
    {
        $orderList = $this->orderModel->getByUserId($userId);

        if ($status === null) {
            return $orderList;    
        }

        $finalOrderList = array();
        foreach ($orderList as $order) {
            if ($order['status'] == $status) {
                $finalOrderList[] = $order;
            }
        }

        return $finalOrderList;
    }
    
    public function updateStatus($userId, $orderId, $status)
    {
        $order = $this->getOrder($userId, $orderId);
        $res = $this->updateStatus($order['order_id'], $status);

        return $res;
    }

    public function deleteOrder($userId, $orderId)
    {
        $order = $this->getOrder($userId, $orderId);
        $res = $this->deleteOrder($order['order_id']);

        return $res;
    }
}