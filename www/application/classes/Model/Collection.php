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
    
    public function getByCollectionId($collectionId)
    {
        $result = DB::select()
                    ->from('collection')
                    ->where('id', '=', $collectionId)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
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
    
    /**
     * 增加用户信息
     *
     * @param string $email
     * @param string $password
     * @param int $roleType
     * @return int
     */
    public function addCollection($userId, $name, $category, $mode, $season, $miniOrder, $currency, $deadline, $deliveryDate, $description, $imageUrl,$imageMediumUrl,$imageSmallUrl)
    {
        $result = DB::insert('collection')
                    ->columns(array(
                        'user_id',
                        'name',
                        'category',
                        'mode',
                        'season',
                        'mini_order',
                        'currency',
                        'deadline',
                        'delivery_date',
                        'description',
                        'cover_image',
                        'cover_image_medium',
                        'cover_image_small',
                        'create_time',
                        'status',
                    ))
                    ->values(array(
                        $userId,
                        $name,
                        $category,
                        $mode,
                        $season,
                        $miniOrder,
                        $currency,
                        $deadline,
                        $deliveryDate,
                        $description,
                        $imageUrl,
                        $imageMediumUrl,
                        $imageSmallUrl,
                        date('Y-m-d H:i:s'),
                        STAT_NORMAL,
                    ))
                    ->execute();
    
        return $result[0];
    }
}