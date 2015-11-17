<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Collection
 * 
 * @author shenpeipei
 * @author liyashuai
 */
class Model_Collection
{
    
    public function getAllList()
    {
        $result = DB::select()
                    ->from('collection')
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
    }
    
    public function getListByUserId($userId)
    {
        $result = DB::select()
                    ->from('collection')
                    ->where('user_id', '=', $userId)
                    ->where('status', '=', STAT_NORMAL)
                    ->order_by('id', 'DESC')
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }
}