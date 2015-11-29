<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Buyer
 * 
 * @author shenpeipei
 * @author liyashuai
 */
class Model_Buyer
{
    public function getAuthList($userId)
    {
        $result = DB::select()
                    ->from('buyer_brand_map')
                    ->where('user_id', '=', $userId)
                    ->where('status', '=', Model_Brand::STATUS_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
    }
}