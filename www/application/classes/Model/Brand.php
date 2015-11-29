<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Brand
 * 
 * @author shenpeipei
 * @author liyashuai
 */
class Model_Brand
{
    // 权限申请
    const STATUS_APPLYING   = -1;
    const STATUS_NORMAL     = 0;
    const STATUS_STOP       = 1;
    const STATUS_DELETED    = 2;

    public function getAllList()
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array('user_id');
        
        return $result;
    }
    
    public function getByName($name)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('brand_name', 'like', '%'.$name.'%')
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
    }
    
    public function getByUserId($userId)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('user_id', '=', $userId)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }
    
    public function getByUserIdList($userIdList)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('user_id', 'IN', $userIdList)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
    }
    
    public function getByBrandIdList($brandList)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('id', 'IN', $brandList)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
    
        return $result;
    }

    public function addApplication($userId, $brandId)
    {
        $result = DB::insert('buyer_brand_map')
                    ->columns(array(
                        'user_id',
                        'brand_id',
                        'update_time',
                        'status',
                    ))
                    ->values(array(
                        $userId,
                        $brandId,
                        date('Y-m-d H:i:s'),
                        self::STATUS_APPLYING,
                    ))
                    ->execute();
        
        return $result[0];
    }

    public function checkAuth($userId, $brandId)
    {
        $result = DB::select()
                    ->from('buyer_brand_map')
                    ->where('user_id', '=', $userId)
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
}