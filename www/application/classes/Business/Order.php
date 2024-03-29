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
    public $messageService;
    public $userModel;

    public function __construct()
    {
        $this->orderModel = new Model_Order();
        $this->productionService = new Business_Production();
        $this->collectionService = new Business_Collection();
        $this->buyerService = new Business_Buyer();
        $this->shopService = new Business_Shop();
        $this->brandService = new Business_Brand();
        $this->messageService = new Business_Message();
        $this->userModel = new Model_User();
    }

    public function addToCart($userId, $productionId)
    {
        $production = $this->productionService->getProduction($userId, $productionId);
        if (empty($production)) {
            return false;    
        }

        $collectionId = $production['collection_id'];
        $collection = $this->collectionService->getCollectionInfo($userId, $collectionId);
        if (empty($collection) || $collection['status'] != Model_Collection::TYPE_OF_ONLINE) {
            return false;    
        }

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
               
                // 防止collection信息为空或者collection未生效
                if (empty($collection) || $collection['status'] != Model_Collection::TYPE_OF_ONLINE) {
                    continue;
                }

                $res[$collectionId]['collectionInfo'] = $collection;

                $brand = $this->brandService->getBrandInfo($collection['user_id']);
                // 防止brand信息为空
                if (empty($brand) || $brand['status'] != Model_User::STATUS_USER_NORMAL) {
                    unset($res[$collectionId]);
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
        if (empty($collection) || $collection['status'] != Model_Collection::TYPE_OF_ONLINE) {
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

    public function createOrder($userId, $userType, $collectionId, $productionDetail, $comments, $description, $shopId, $address, $paymentType)
    {
        if ($userType != Model_User::TYPE_USER_BUYER) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        // 需要从购物车删除的产品id列表
        $productionIds = array();
        // item_amount && total_num
        $shippingAmount = $itemAmount = $totalNum = 0;
        $detail = json_decode($productionDetail, true);
        foreach ($detail as $productionId => $items) {
            $production = $this->productionService->getProduction($userId, $productionId);
            if (empty($production) || $production['collection_id'] != $collectionId) {
                $errorInfo = Kohana::message('message', 'STATUS_ERROR');
                throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
            }
            foreach ($items as $item) {
                $totalNum = $totalNum + $item['buy_num'];
                $itemAmount = $itemAmount + $item['buy_num'] * $production['whole_price']; // 批发价
            }
            $productionIds[] = $productionId;
        }

        $totalAmount = $shippingAmount + $itemAmount;

        $collection = $this->collectionService->getCollectionInfo($userId, $collectionId);

        if (empty($collection) || $collection['status'] != Model_Collection::TYPE_OF_ONLINE) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        } 

        // 客户说暂时禁用最小订单金额
        //        if ($collection['mini_order'] > $itemAmount) {
        //            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
        //            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        //        }
        if ($itemAmount == 0) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        //$relation = $this->buyerService->getRelation($userId, $collection['user_id']);
        $shop = $this->shopService->getShopById($userId, $shopId);

        if (empty($shop)) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $user = $this->userModel->getAttrByUserId($userId);

        if (empty($user)) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $orderId = $this->getOrderId();

        $order = array(
            'orderId' => $orderId,
            'buyerId' => $userId,
            'buyerName' =>$user['display_name'],
            'userId' => $collection['user_id'],
            'shopId' => $shopId,
            'shopName' => $shop['name'],
            'brandId' => $collection['brand_id'],
            'collectionId' => $collectionId,
            'productionDetail' => $productionDetail,
            'totalNum' => $totalNum,
            'itemAmount' => $itemAmount,
            'shippingAmount' => $shippingAmount,
            'totalAmount' => $totalAmount,
            'deliveryDate' => $collection['delivery_date'],
            'shopAddress' => $address,
            'comments' => $comments,
            'description' => $description,
            'paymentType' => $paymentType,
        );

        $res = $this->orderModel->addOrder($order);

        foreach ($productionIds as $productionId) {
            $this->deleteFromCart($userId, $productionId);
        }

        // generate message
        $this->messageService->notifyOrderChange($userId, $orderId, Model_Order::ORDER_STATUS_PENDING);
        $this->messageService->notifyOrderChange($collection['user_id'], $orderId, Model_Order::ORDER_STATUS_PENDING);

        return $order['orderId'];
        
    }

    public function getOrderId()
    {
        $time = date('ymdHis'). substr(microtime(), 2, 4);
        $rand = rand(1000, 9999);
        $orderId = $time. $rand;

        return $orderId;
    }

    public function getOrderById($orderId)
    {
        return $this->orderModel->getById($orderId);
    }

    public function getOrder($userId, $orderId, $type)
    {  
        $order = $this->getOrderById($orderId);

        // 品牌用户拿别人订单报错
        if ($type == Model_User::TYPE_USER_BRAND && $order['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        } 

        // 买手拿别人订单报错
        if ($type == Model_User::TYPE_USER_BUYER && $order['buyer_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        $wellFormedOrder = $this->buildOrderDetail($order);
        
        return $wellFormedOrder;
    }

    public function getOrderList($userId, $status, $type)
    {
        if ($type == Model_User::TYPE_USER_BRAND) {
            $orderList = $this->orderModel->getByBrandId($userId);
        } elseif ($type == Model_User::TYPE_USER_BUYER)  {
            $orderList = $this->orderModel->getByBuyerId($userId);
        } else {
            $orderList = $this->orderModel->getByStatus($status);
        }
        
        $finalOrderList = array();
        
        if (!empty($status)) {
            foreach ($orderList as $order) {
                if ($order['order_status'] == $status) {
                    $finalOrderList[] = $order;
                }
            }    
        } else {
            $finalOrderList = $orderList;
        }
        
        $pageSize = Request::current()->getParam('pageSize');
        $pageSize = empty($pageSize) ? 0 : $pageSize;
        $offset = Request::current()->getParam('offset');
        $offset = empty($offset) ? 0 : $offset;
        
        if ($offset >= 0 && $pageSize > 0) {
            $finalOrderList = array_slice($finalOrderList, $offset, $pageSize);
        }

        $wellFormedOrderList = array();
        foreach ($finalOrderList as $order) {
            $wellFormedOrderList[] = $this->buildOrderDetail($order);
        }
        
        return $wellFormedOrderList;
    }
    
    public function updateStatus($userId, $orderId, $status, $type)
    {
        $order = $this->getOrder($userId, $orderId, $type);

        $buyerUserId =$order['buyer_id'];
        $brandUserId = $order['user_id'];
        $orderId = $order['order_id'];

        $collection = $this->collectionService->getCollectionInfo($brandUserId, $order['collection_id']);
        $isInStock = ($collection['mode'] == 'dropdown__COLLECTION_MODE__STOCK') ? true : false;

        switch ($status) {
            // 订单状态不会被改成pending
            case Model_Order::ORDER_STATUS_PENDING:
                $errorInfo = Kohana::message('message', 'AUTH_ERROR');
                throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
            // confirmed状态只能管理员修改&&前置状态必须是pending
            case Model_Order::ORDER_STATUS_CONFIRMED:
                if ($type != Model_User::TYPE_USER_ADMIN ||
                    $order['order_status'] != Model_Order::ORDER_STATUS_PENDING) {
                    $errorInfo = Kohana::message('message', 'AUTH_ERROR');
                    throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);           
                }

                // generate message to brand & buyer
                $this->messageService->notifyOrderChange($brandUserId, $orderId, Model_Order::ORDER_STATUS_CONFIRMED);
                $this->messageService->notifyOrderChange($buyerUserId, $orderId, Model_Order::ORDER_STATUS_CONFIRMED);

                break;
            // deposited状态只能是品牌商修改&&前置状态必须是confirmed&&现货不会出现该状态
            case Model_Order::ORDER_STATUS_DEPOSITED:
                if ($type != Model_User::TYPE_USER_BRAND ||
                    $order['order_status'] != Model_Order::ORDER_STATUS_CONFIRMED ||
                    $isInStock) {
                    $errorInfo = Kohana::message('message', 'AUTH_ERROR');
                    throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);           
                }

                // generate message to brand & buyer
                $this->messageService->notifyOrderChange($brandUserId, $orderId, Model_Order::ORDER_STATUS_DEPOSITED);
                $this->messageService->notifyOrderChange($buyerUserId, $orderId, Model_Order::ORDER_STATUS_DEPOSITED);

                break;
            // preparing状态只能是品牌商修改&&前置状态可能为deposited或者fullpayment(现货)
            case Model_Order::ORDER_STATUS_PREPARING:
                if ($type != Model_User::TYPE_USER_BRAND ||
                    ($isInStock && $order['order_status'] != Model_Order::ORDER_STATUS_FULLPAYMENT) ||
                    (!$isInStock && $order['order_status'] != Model_Order::ORDER_STATUS_DEPOSITED)) {
                    $errorInfo = Kohana::message('message', 'AUTH_ERROR');
                    throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
                }

                // generate message to brand & buyer
                $this->messageService->notifyOrderChange($brandUserId, $orderId, Model_Order::ORDER_STATUS_PREPARING);
                $this->messageService->notifyOrderChange($buyerUserId, $orderId, Model_Order::ORDER_STATUS_PREPARING);

                break;
            // paybalance状态只能是品牌商修改&&前置状态必须是preparing&&现货不会出现该状态
            case Model_Order::ORDER_STATUS_PAYBALANCE:
                if ($type != Model_User::TYPE_USER_BRAND ||
                    $order['order_status'] != Model_Order::ORDER_STATUS_PREPARING ||
                    $isInStock) {
                    $errorInfo = Kohana::message('message', 'AUTH_ERROR');
                    throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);           
                }

                // generate message to brand & buyer
                $this->messageService->notifyOrderChange($brandUserId, $orderId, Model_Order::ORDER_STATUS_PAYBALANCE);
                $this->messageService->notifyOrderChange($buyerUserId, $orderId, Model_Order::ORDER_STATUS_PAYBALANCE);

                break;
            // shipped状态只能是品牌商修改&&前置状态可能为preparing(现货)或者paybalance
            case Model_Order::ORDER_STATUS_SHIPPED:
                if ($type != Model_User::TYPE_USER_BRAND ||
                    ($isInStock && $order['order_status'] != Model_Order::ORDER_STATUS_PREPARING) ||
                    (!$isInStock && $order['order_status'] != Model_Order::ORDER_STATUS_PAYBALANCE)) {
                    $errorInfo = Kohana::message('message', 'AUTH_ERROR');
                    throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
                }

                // generate message to brand & buyer
                $this->messageService->notifyOrderChange($brandUserId, $orderId, Model_Order::ORDER_STATUS_SHIPPED);
                $this->messageService->notifyOrderChange($buyerUserId, $orderId, Model_Order::ORDER_STATUS_SHIPPED);

                break;
            // completed状态只能买手修改&&前置状态必须是pending
            case Model_Order::ORDER_STATUS_COMPLETE:
                if ($type != Model_User::TYPE_USER_BUYER ||
                    $order['order_status'] != Model_Order::ORDER_STATUS_SHIPPED) {
                    $errorInfo = Kohana::message('message', 'AUTH_ERROR');
                    throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);           
                }

                // generate message to brand & buyer
                $this->messageService->notifyOrderChange($brandUserId, $orderId, Model_Order::ORDER_STATUS_COMPLETE);
                $this->messageService->notifyOrderChange($buyerUserId, $orderId, Model_Order::ORDER_STATUS_COMPLETE);

                break;
            // fullpayment状态只能是品牌商修改&&前置状态必须是confirmed&&非现货不会出现该状态
            case Model_Order::ORDER_STATUS_FULLPAYMENT:
                if ($type != Model_User::TYPE_USER_BRAND ||
                    $order['order_status'] != Model_Order::ORDER_STATUS_CONFIRMED ||
                    !$isInStock) {
                    $errorInfo = Kohana::message('message', 'AUTH_ERROR');
                    throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);           
                }

                // generate message to brand & buyer
                $this->messageService->notifyOrderChange($brandUserId, $orderId, Model_Order::ORDER_STATUS_FULLPAYMENT);
                $this->messageService->notifyOrderChange($buyerUserId, $orderId, Model_Order::ORDER_STATUS_FULLPAYMENT);

                break;

            // 其他情况
            default:
                $errorInfo = Kohana::message('message', 'AUTH_ERROR');
                throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
                break;
        }

        $res = $this->orderModel->updateStatus($order['order_id'], $status);

        return $res;
    }

    /*public function deleteOrder($userId, $orderId)
    {
        $order = $this->getOrder($orderId);
        $res = $this->orderModel->deleteOrder($order['order_id']);

        return $res;
    }*/

    // 废弃
    public function updateShipInfo($userId, $orderId, $type, $shipNo, $shipAmount)
    {
        if ($type != Model_User::TYPE_USER_BRAND) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $order = $this->orderModel->getById($orderId);

        // 品牌用户拿别人订单报错
        if ($order['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $res = $this->orderModel->updateShipInfo($orderId, $shipNo, $shipAmount);

        return $res;
    }

    public function updateShipNo($userId, $orderId, $type, $shipNo)
    {
        if ($type != Model_User::TYPE_USER_BRAND) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $order = $this->orderModel->getById($orderId);

        // 品牌用户拿别人订单报错
        if ($order['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $res = $this->orderModel->updateShipNo($orderId, $shipNo);

        return $res;
    }

    public function updateShipAmount($userId, $orderId, $type, $shipAmount)
    {
        if ($type != Model_User::TYPE_USER_BRAND) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $order = $this->orderModel->getById($orderId);

        // 品牌用户拿别人订单报错
        if ($order['user_id'] != $userId || $order['order_status'] != Model_Order::ORDER_STATUS_PREPARING) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $res = $this->orderModel->updateShipAmount($orderId, $shipAmount);

        return $res;
    }

    public function updateComments($userId, $orderId, $type, $comments)
    {
        if ($type != Model_User::TYPE_USER_BRAND) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $order = $this->orderModel->getById($orderId);

        // 品牌用户拿别人订单报错
        if ($order['user_id'] != $userId || $order['order_status'] != Model_Order::ORDER_STATUS_PREPARING) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $res = $this->orderModel->updateComments($orderId, $comments);

        return $res;
    }

    public function buildOrderDetail($order)
    {
        $brand = $this->brandService->getBrandInfo($order['user_id']);
        if (empty($brand)) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        $order['brand_name'] = $brand['brand_name'];

        $collection = $this->collectionService->getCollectionInfo($order['user_id'], $order['collection_id']);
        if (empty($collection)) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        $order['collection_name'] = $collection['name'];
        $order['collection_mode'] = $collection['mode'];
        $order['currency'] = $collection['currency'];
        $order['cover_image_medium'] = $collection['cover_image_medium'];

        $productions = array();
        $productionDetail = json_decode($order['production_detail']);
        foreach ($productionDetail as $productionId => $detail) {
            $production = $this->productionService->getProduction($order['user_id'], $productionId);
            if (empty($production)) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
            }
            $productions[$productionId] = array(
                'styleNum' => $production['style_num'],
                'name' => $production['name'],
                'wholePrice' => (float)$production['whole_price'],
                'retailPrice' => (float)$production['retail_price'],
                'sizeRegion' => $production['size_region'],
                'sizeCode' => json_decode($production['size_code']),
                'color' => json_decode($production['color']),
                'image' => $production['image_url'][0],
                'detail' => $detail,
            );
        }

        $order['productions'] = $productions;

        return $order;
    }

    public function updateInvoice($userId, $orderId, $type, $invoiceUrl)
    {
        if (!file_exists($invoiceUrl)) {
            $errorInfo = Kohana::message('message', 'IMAGE_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        try {
            $extension = substr(strrchr($invoiceUrl, '.'), 1);
            $realPathFile  = 'data/' . date('ymdHis'). substr(microtime(),2,4) . '.' . $extension;
            copy($invoiceUrl, $realPathFile);
        } catch (Exception $e) {
            $errorInfo = Kohana::message('message', 'IMAGE_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        if ($type != Model_User::TYPE_USER_BRAND) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $order = $this->orderModel->getById($orderId);

        // 品牌用户拿别人订单报错
        if ($order['user_id'] != $userId || $order['order_status'] != Model_Order::ORDER_STATUS_PENDING) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $res = $this->orderModel->updateInvoice($orderId, $realPathFile);

        return $res;
    }

    public function countOrder()
    {
        return $this->orderModel->countOrder();
    }

    public function countOrderByStatus($status)
    {
        return $this->orderModel->countOrderByStatus($status);
    }
}
