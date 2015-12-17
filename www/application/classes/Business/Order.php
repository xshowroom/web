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
    public $brandService;

    public function __construct()
    {
        $this->orderModel = new Model_Order();
        $this->productionService = new Business_Production();
        $this->collectionService = new Business_Collection();
        $this->buyerService = new Business_Buyer();
        $this->shopService = new Business_Shop();
        $this->brandService = new Business_Brand();
    }

    public function addToCart($userId, $productionId)
    {
        $production = $this->productionService->getProduction($userId, $productionId);
        $collectionId = $production['collection_id'];

        $productInCart = $this->getProductionFromCart($userId, $productionId);

        if (!empty($productInCart)) {
            return false;    
        }

        $res = $this->orderModel->addToCart($userId, $collectionId, $productionId);

        return $res;
    }

    public function getProductionFromCart($userId, $productionId)
    {
        $productionInCart = $this->orderModel->getProductionFromCart($userId, $productionId);

        return empty($productionInCart)? null : $productionInCart;
    }

    public function getProductionListFromCart($userId)
    {
        $productionListInCart = $this->orderModel->getProductionListFromCart($userId);

        $res = array();
        foreach ($productionListInCart as $productionInCart) {
            
            // 获取collection信息和brand信息
            $collectionId = $productionInCart['collection_id'];
            
            // 避免重复获取
            if (empty($res[$collectionId])) {
                $collection = $this->collectionService->getCollectionInfo($userId, $collectionId);
               
                // 防止collection信息为空
                if (empty($collection)) {
                    continue;
                }

                $res[$collectionId]['collectionInfo'] = $collection;

                $brand = $this->brandService->getBrandInfo($collection['user_id']);
                // 防止brand信息为空
                if (empty($brand)) {
                    continue;
                }

                $res[$collectionId]['brandName'] = $brand['brand_name'];
            }
            
            $production = $this->productionService->getProduction($userId, $productionInCart['production_id']);
            
            if(empty($production)) {
                continue;
            }

            $res[$collectionId]['productions'][] = array(
                'id' => $production['id'],
                'name' => $production['name'],
                'small_image_url' => $production['small_image_url'],
            );
        }

        return array_values($res);
    }

    public function getListFromCartByCollection($userId, $collectionId)
    {
        $collection = $this->collectionService->getCollectionInfo($userId, $collectionId);
        if (empty($collection)) {
            return null;
        }
        $deadline = $collection['deadline'];

        $productionListInCart = $this->orderModel->getProductionListFromCart($userId);

        $res = array();
        foreach ($productionListInCart as $productionInCart) {
            if ($productionInCart['collection_id'] == $collectionId) {
                $production = $this->productionService->getProduction($userId, $productionInCart['production_id']);
                if (empty($production)) {
                    return null;
                }

                $res[] = array(
                	'id' => $production['id'],
                    'name' => $production['name'],
                    'styleNum' => $production['style_num'],
                    'wholePrice' => $production['whole_price'],
                    'retailPrice' => $production['retail_price'],
                    'sizeRegion' => $production['size_region'],
                    'sizeCode' => json_decode($production['size_code']),
                    'color' => json_decode($production['color']),
                	'image' => $production['image_url'][0],
                );
            }
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

    public function createOrder($userId, $collectionId, $productionDetail, $comments, $description)
    {
        // 需要从购物车删除的产品id列表
        $productionIds = array();
        // item_amount && total_num
        $shippingAmount = $itemAmount = $totalNum = 0;
        $detail = json_decode($productionDetail, true);
        foreach ($detail as $productionId => $items) {
            $production = $this->productionService->getProduction($userId, $productionId);
            foreach ($items as $item) {
                $totalNum = $totalNum + $item['buy_num'];
                $itemAmount = $itemAmount + $item['buy_num'] * $production['whole_price']; // 批发价
            }
            $productionIds[] = $productionId;
        }

        $totalAmount = $shippingAmount + $itemAmount;

        $collection = $this->collectionService->getCollectionInfo($userId, $collectionId); 

        if ($collection['mini_order'] > $itemAmount) { // 要不要加shipAmount
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $relation = $this->buyerService->getRelation($userId, $collection['user_id']);
        $shop = $this->shopService->getShopById($userId, $relation['shop_id']);

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

        foreach ($productionIds as $productionId) {
            $this->deleteFromCart($userId, $productionId);
        }

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
        if ($order['buyer_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        return $order;
    }

    public function getOrderList($userId, $status, $type)
    {
        if ($type == Model_User::TYPE_USER_BRAND) {
            $orderList = $this->orderModel->getByBrandId($userId);
        } else {
            $orderList = $this->orderModel->getByBuyerId($userId);
        }

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
        $res = $this->orderModel->updateStatus($order['order_id'], $status);

        return $res;
    }

    public function deleteOrder($userId, $orderId)
    {
        $order = $this->getOrder($userId, $orderId);
        $res = $this->orderModel->deleteOrder($order['order_id']);

        return $res;
    }
}