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
                    ->execute();
        
        return $result;
    }
    
    public function getByCond()
    {
        
    }
}