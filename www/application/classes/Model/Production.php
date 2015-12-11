<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Production
 * 
 * @author shenpeipei
 * @author liyashuai
 */
class Model_Production
{
    /**
     * 增加产品信息
     *
     * @return int
     */
    public function addProduction($userId, $name, $category, $collection, $styleNum, $wholePrice, $rtlPrice, $sizeRegion, $sizeCode, $color, $madeIn, $material, $careIns, $imagePaths)
    {
        $result = DB::insert('production')
                    ->columns(array(
                        'user_id',
                        'name',
                        'category',
                        'collection_id',
                        'style_num',
                        'whole_price',
                        'retail_price',
                        'size_region',
                        'size_code',
                        'color',
                        'made_in',
                        'material',
                        'care_instruction',
                        'image_url',
                        'status',
                    ))
                    ->values(array(
                        $userId,
                        $name,
                        $category,
                        $collection,
                        $styleNum,
                        $wholePrice,
                        $rtlPrice,
                        $sizeRegion,
                        $sizeCode,
                        $color,
                        $madeIn,
                        $material,
                        $careIns,
                        $imagePaths,
                        STAT_NORMAL,
                    ))
                    ->execute();
    
        return $result[0];
    }
    
    /**
     * 修改产品信息
     *
     * @return int
     */
    public function updateProduction($userId, $procuctionId, $name, $category, $collection, $styleNum, $wholePrice, $rtlPrice, $sizeRegion, $sizeCode, $color, $madeIn, $material, $careIns, $imagePaths)
    {
        $result = DB::update('production')
                    ->set(array(
                        'user_id' => $userId,
                        'name' => $name,
                        'category' => $category,
                        'collection_id' => $collection,
                        'style_num' => $styleNum,
                        'whole_price' => $wholePrice,
                        'retail_price' => $rtlPrice,
                        'size_region' => $sizeRegion,
                        'size_code' => $sizeCode,
                        'color' => $color,
                        'made_in' => $madeIn,
                        'material' => $material,
                        'care_instruction' => $careIns,
                        'image_url' => $imagePaths,
                    ))
                    ->where ('user_id', '=', $userId)
                    ->where ('collectiion', '=', $collection)
                    ->where ('id', '=', $procuctionId)
                    ->execute();
    
        return $result[0];
    }
    
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
    
    public function getByCollectionIdList($collectionIdList)
    {
        $result = DB::select()
                    ->from('production')
                    ->where('collection_id', 'IN', $collectionIdList)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array('id');
        
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
    
    public function checkName($userId, $productionName)
    {
        $result = DB::select()
                    ->from('production')
                    ->where('user_id', '=', $userId)
                    ->where('name', '=', $productionName)
                    ->where('status', '!=', STAT_DELETED)
                    ->execute()
                    ->as_array();
    
        return empty($result) ? false : true;
    }
    
    public function updateStatus($productionId, $status)
    {
        $result = DB::update('production')
            ->set(array(
                'status' => $status,
            ))
            ->where('id', '=', $productionId)
            ->where('status', '!=', STAT_DELETED)
            ->execute();
    
        return $result;
    }
    
    public function getByCategory($category)
    {
        $result = DB::select('user_id')
                    ->from('production')
                    ->where('category', '=', $category)
                    ->where('status', '=', STAT_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
        
    }
}