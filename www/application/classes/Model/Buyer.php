<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Buyer
 * 
 * @author shenpeipei
 * @author liyashuai
 */
class Model_Buyer
{
    // 权限申请
    const STATUS_APPLYING   = -1;
    const STATUS_NORMAL     = 0;
    const STATUS_STOP       = 1;
    const STATUS_DELETED    = 2;

    public function getAuthList($userId)
    {
        $result = DB::select()
                    ->from('buyer_brand_map')
                    ->where('user_id', '=', $userId)
                    ->where('status', '=', self::STATUS_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
    }

    public function apply($userId, $shopId, $brandId)
    {
        $result = DB::insert('buyer_brand_map')
                    ->columns(array(
                        'user_id',
                        'shop_id',
                        'op_user_id'
                        'brand_id',
                        'update_time',
                        'status',
                    ))
                    ->values(array(
                        $userId,
                        $shopId,
                        $userId,
                        $brandId,
                        date('Y-m-d H:i:s'),
                        self::STATUS_APPLYING,
                    ))
                    ->execute();
        
        return $result[0];
    }

    public function checkAuth($userId, $shopId, $brandId)
    {
        $result = DB::select()
                    ->from('buyer_brand_map')
                    ->where('user_id', '=', $userId)
                    ->where('shop_id', '=', $shopId)
                    ->where('brand_id', '=', $brandId)
                    ->where('status', '=', self::STAT_NORMAL)
                    ->execute()
                    ->as_array();

        if (!empty($result)) {
            return true;
        } else {
            return false;
        }
    }

    public function listByAuthStatus($status)
    {
        $result = DB::select()
                    ->form('buyer_brand_map')
                    ->where('status', '=', $status)
                    ->execute()
                    ->as_array();

        return $result;
    }

    public function updateAuthStatus($userId, $shopId, $brandId, $opUserId, $status)
    {
        $result = DB::update('buyer_brand_map')
                    ->set(array(
                        'op_user_id' => $opUserId,
                        'update_time' => date('Y-m-d H:i:s'),
                        'status'      => $status,
                    ))
                    ->where('user_id', '=', $userId)
                    ->where('shop_id', '=', $shopId)
                    ->where('brand_id', '=', $brandId)
                    ->execute();

        return $result;
    }

    public function updateAuthStatusByShop($userId, $shopId, $opUserId, $status)
    {
        $result = DB::update('buyer_brand_map')
                    ->set(array(
                        'op_user_id' => $opUserId,
                        'update_time' => date('Y-m-d H:i:s'),
                        'status'      => $status,
                    ))
                    ->where('user_id', '=', $userId)
                    ->where('shop_id', '=', $shopId)
                    ->execute();

        return $result;
    }
}