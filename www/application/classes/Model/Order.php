<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Order
 * 
 * @author liyashuai
 */
class Model_Order
{
    const ORDER_STATUS_PENDING      = 0;
    const ORDER_STATUS_CONFIRMED    = 1;
    const ORDER_STATUS_DEPOSITED    = 2;
    const ORDER_STATUS_PREPARING    = 3;
    const ORDER_STATUS_PAYBALANCE   = 4;
    const ORDER_STATUS_SHIPPED      = 5;
    const ORDER_STATUS_COMPLETE     = 6;
    const ORDER_STATUS_FULLPAYMENT  = 7;
    
    public function addToCart($userId, $collectionId, $productionId)
    {
        $result = DB::insert('cart')
                    ->columns(array(
                        'buyer_id',
                        'collection_id',
                        'production_id',
                        'status',
                    ))
                    ->values(array(
                        $userId,
                        $collectionId,
                        $productionId,
                        STAT_NORMAL,
                    ))
                    ->execute();
        
        return $result[0];
    }

    public function getProductionFromCart($userId, $productionId)
    {
        $result = DB::select()
                    ->from('cart')
                    ->where('buyer_id', '=', $userId)
                    ->where('production_id', '=', $productionId)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }

    public function getProductionListFromCart($userId)
    {
        $result = DB::select()
                    ->from('cart')
                    ->where('buyer_id', '=', $userId)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
    }

    public function deleteFromCart($id)
    {
        $result = DB::update('cart')
                    ->set(array(
                        'status' => STAT_DELETED,
                    ))
                    ->where('id', '=', $id)
                    ->execute();
        
        return $result;
    }

    public function addOrder($order)
    {
        $result = DB::insert('order')
                    ->columns(array(
                        'order_id',
                        'buyer_id',
                        'buyer_name',
                        'user_id',
                        'shop_id',
                        'shop_name',
                        'brand_id',
                        'collection_id',
                        'production_detail',
                        'total_num',
                        'item_amount',
                        'shipping_amount',
                        'total_amount',
                        'buy_time',
                        'delivery_date',
                        'shop_address',
                        'comments',
                        'description',
                        'payment_type',
                        'update_time',
                        'order_status',
                        'status',
                    ))
                    ->values(array(
                        $order['orderId'],
                        $order['buyerId'],
                        $order['buyerName'],
                        $order['userId'],
                        $order['shopId'],
                        $order['shopName'],
                        $order['brandId'],
                        $order['collectionId'],
                        $order['productionDetail'],
                        $order['totalNum'],
                        $order['itemAmount'],
                        $order['shippingAmount'],
                        $order['totalAmount'],
                        date('Y-m-d H:i:s'),
                        $order['deliveryDate'],
                        $order['shopAddress'],
                        $order['comments'],
                        $order['description'],
                        $order['paymentType'],
                        date('Y-m-d H:i:s'),
                        self::ORDER_STATUS_PENDING,
                        STAT_NORMAL,
                    ))
                    ->execute();
        
        return $result[0];
    }

    public function getById($orderId)
    {
        $result = DB::select()
                    ->from('order')
                    ->where('order_id', '=', $orderId)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }
    
    public function updateStatus($orderId, $status)
    {
        $result = DB::update('order')
                    ->set(array(
                        'order_status' => $status,
                    ))
                    ->where('order_id', '=', $orderId)
                    ->execute();
        
        return $result;
    }

    public function updateShipInfo($orderId, $shipNo, $shipAmount)
    {
        $result = DB::update('order')
                    ->set(array(
                        'shipping_amount' => $shipAmount,
                        'shipping_no' => $shipNo,
                    ))
                    ->where('order_id', '=', $orderId)
                    ->execute();
        
        return $result;
    }

    public function updateInvoice($orderId, $invoiceUrl)
    {
        $result = DB::update('order')
                    ->set(array(
                        'invoice_url' => $invoiceUrl,
                    ))
                    ->where('order_id', '=', $orderId)
                    ->execute();
        
        return $result;
    }

    /*public function deleteOrder($orderId)
    {
        $result = DB::update('order')
                    ->set(array(
                        'status' => STAT_DELETED,
                    ))
                    ->where('order_id', '=', $orderId)
                    ->execute();
        
        return $result;
    }*/

    public function getByBuyerId($buyerId)
    {
        $result = DB::select()
                    ->from('order')
                    ->where('buyer_id', '=', $buyerId)
                    ->where('status', '=', STAT_NORMAL)
                    ->order_by('buy_time', 'DESC')
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result;
    }

    public function getByBrandId($userId)
    {
        $result = DB::select()
                    ->from('order')
                    ->where('user_id', '=', $userId)
                    ->where('status', '=', STAT_NORMAL)
                    ->order_by('buy_time', 'DESC')
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }
}