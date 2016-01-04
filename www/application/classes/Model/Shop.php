<?php defined('SYSPATH') || die('No direct script access.');

/**
 * 
 * @author liyashuai
 */
class Model_Shop
{
    const STATUS_SHOP_REJECTED = -2;
    const STATUS_SHOP_PENDING = -1;
    const STATUS_SHOP_NORMAL = 0;

    public function getById($shopId)
    {
        $result = DB::select()
                    ->from('shop')
                    ->where('id', '=', $shopId)
                    ->where('status', '=', Model_User::STATUS_USER_NORMAL)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }

    public function getByIdList($shopIdList)
    {
        $result = DB::select()
                    ->from('shop')
                    ->where('id', 'IN', $shopIdList)
                    ->where('status', '=', Model_User::STATUS_USER_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
    }

    public function getByUserId($userId)
    {
        $result = DB::select()
                    ->from('shop')
                    ->where('user_id', '=', $userId)
                    ->where('status', '=', Model_User::STATUS_USER_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
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
     * @param string $shipAddr
     * @param string $country
     * @param string $zipcode
     * @param string $tel
     * @param string $image
     * @param string $about
     * @return int
     */
    public function addShopInfo($userId, $name, $type, $colType, $brandList, $website, $address, $shipAddr, $country, $zipcode, $tel, $image, $about)
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
                        'ship_address',
                        'country',
                        'zip',
                        'telephone',
                        'image',
                        'about',
                        'create_time',
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
                        $shipAddr,
                        $country,
                        $zipcode,
                        $tel,
                        $image,
                        $about,
                        date('Y-m-d h:i:s'),
                        Model_User::STATUS_USER_NORMAL,
                    ))
                    ->execute();
        
        return $result[0];
    }

    public function updateShopInfo($userId, $shopId, $name, $type, $colType, $brandList, $website, $address, $shipAddr, $country, $zipcode, $tel, $image, $about)
    {
        $result = DB::update('shop')
                    ->set(array(
                        'name' => $name,
                        'type' => $type,
                        'collection_type' => $colType,
                        'brand_list' => $brandList,
                        'website' => $website,
                        'address' => $address,
                        'ship_address' => $shipAddr,
                        'country' => $country,
                        'zip' => $zipcode,
                        'telephone' => $tel,
                        'image' => $image,
                        'about' => $about,
                        'update_time' => date('Y-m-d H:i:s'),
                    ))
                    ->where('id', '=', $shopId)
                    ->where('user_id', '=', $userId)
                    ->execute();

        return $result;
    }
    
    public function getByFilter($filter)
    {
        $sql = "SELECT * FROM shop WHERE status = " . Model_User::STATUS_USER_NORMAL;
    
        if (!empty($filter['show'])) {
            if ($filter['show'] == 'all') {
                $sql .= " AND collection_type = 'dropdown__COLLECTION__WOMEN' OR collection_type = 'dropdown__COLLECTION__MEN' OR collection_type = 'dropdown__COLLECTION__ACCESSORIES' OR modify_time >= '". date('Y-m-d', strtotime('-3 month')) ."'";
            } elseif ($filter['show'] == 'new') {
                $sql .= " AND modify_time >= '". date('Y-m-d', strtotime('-3 month')) ."'";
            } elseif ($filter['show'] == 'dropdown__COLLECTION__WOMEN' || $filter['show'] == 'dropdown__COLLECTION__MEN' || $filter['show'] == 'dropdown__COLLECTION__ACCESSORIES') {
                $sql .= " AND collection_type = '{$filter['show']}' ";
            }
        }
        
        $result = DB::query(Database::SELECT, $sql)->execute()->as_array();
    
        return $result;
    }

    public function listShopsByStatus($status)
    {
        $result = DB::select()
            ->from('buyer_brand_map')
            ->where('status', '=', $status)
            ->execute()
            ->as_array();

        return $result;
    }
}