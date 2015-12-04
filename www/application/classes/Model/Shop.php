<?php defined('SYSPATH') || die('No direct script access.');

/**
 * 
 * @author liyashuai
 */
class Model_Shop
{    
    public function getById($shopId)
    {
        $result = DB::select()
                    ->from('shop')
                    ->where('id', '=', $shopId)
                    ->where('status', '!=', STAT_DELETED)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }

    public function getByUserId($userId)
    {
        $result = DB::select()
                    ->from('shop')
                    ->where('user_id', '=', $userId)
                    ->where('status', '!=', STAT_DELETED)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }

    public function updateStatus($shopId, $status)
    {
        $result = DB::update('shop')
                    ->set(array(
                        'status' => $status,
                    ))
                    ->where('id', '=', $shopId)
                    ->execute();
        
        return $result;
    }

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

    public function updateShopInfo($userId, $shopId, $name, $type, $colType, $brandList, $website, $address, $country, $zipcode, $tel)
    {
        $result = DB::update('shop')
                    ->set(array(
                        'name' => $name,
                        'type' => $type,
                        'collection_type' => $colType,
                        'brand_list' => $brandLsit,
                        'website' => $website,
                        'address' => $address,
                        'country' => $country,
                        'zip' => $zipcode,
                        'telephone' => $tel,
                        'update_time' => date('Y-m-d H:i:s'),
                    ))
                    ->where('id', '=', $shopId)
                    ->where('user_id', '=', $userId)
                    ->execute();

        return $result;
    }
}