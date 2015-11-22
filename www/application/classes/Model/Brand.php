<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Brand
 * 
 * @author shenpeipei
 * @author liyashuai
 */
class Model_Brand
{
    public function getAllList()
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
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
                    ->where('user_id', 'IN', implode(",", $userIdList))
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
    }
}