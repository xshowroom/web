<?php defined('SYSPATH') || die('No direct script access.');

/**
 * 
 * @author liyashuai
 */
class Model_Shop
{    
    /**
     * 增加商铺信息
     * 
     * @param int $userId
     * @param string $name
     * @param int $type
     * @param int $colType
     * @param string $brandList
     * @param string $website
     * @param string $address
     * @param string $country
     * @param string $zipcode
     * @param string $tel
     * @return int
     */
    public function addShopInfo($userId, $name, $type, $colType, $brandList, $website, $address, $country, $zipcode, $tel)
    {
        $result = DB::insert('shop')
                    ->columns(array(
                        'user_id',
                        'name',
                        'type',
                        'collection_type',
                        'brand_list',
                        'website',
                        'address',
                        'country',
                        'zip',
                        'telephone',
                        'status',
                    ))
                    ->values(array(
                        $userId,
                        $name,
                        $type,
                        $colType,
                        $brandList,
                        $website,
                        $address,
                        $country,
                        $zipcode,
                        $tel,
                        STAT_NORMAL,
                    ))
                    ->execute();
        
        return $result[0];
    }
}