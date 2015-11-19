<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Production
 * 
 * @author shenpeipei
 * @author liyashuai
 */
class Model_Production
{
    public function getByCollectionId($collectionId)
    {
        $result = DB::select()
                    ->from('production')
                    ->where('collection_id', '=', $collectionId)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
    
        return $result;
    }
    
    public function getByProductionId($productionId)
    {
        $result = DB::select()
                    ->from('production')
                    ->where('id', '=', $productionId)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }
    
    public function getByUserId($userId)
    {
        $result = DB::select()
                    ->from('production')
                    ->where('user_id', '=', $userId)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
    }
}