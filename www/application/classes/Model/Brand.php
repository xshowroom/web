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
                    ->where('status', '=', Model_User::STATUS_USER_NORMAL)
                    ->execute()
                    ->as_array('user_id');
        
        return $result;
    }
    
    public function getById($id)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('id', '=', $id)
                    ->where('status', '=', Model_User::STATUS_USER_NORMAL)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }
    
    public function getByName($name)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('brand_name', 'like', '%'.$name.'%')
                    ->where('status', '=', Model_User::STATUS_USER_NORMAL)
                    ->execute()
                    ->as_array('user_id');
        
        return $result;
    }

    public function getByCategory($category)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('category_type', '=', $category)
                    ->where('status', '=', Model_User::STATUS_USER_NORMAL)
                    ->execute()
                    ->as_array('user_id');

        return $result;
    }

    public function getByUrl($url)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('brand_url', '=', $url)
                    ->where('status', '=', Model_User::STATUS_USER_NORMAL)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }
    
    public function getByUserId($userId)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('user_id', '=', $userId)
                    ->execute()
                    ->as_array();
        
        return empty($result) ? array() : $result[0];
    }
    
    public function getByUserIdList($userIdList)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('user_id', 'IN', $userIdList)
                    ->where('status', '=', Model_User::STATUS_USER_NORMAL)
                    ->execute()
                    ->as_array();
        
        return $result;
    }
    
    public function getByBrandIdList($brandList)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('id', 'IN', $brandList)
                    ->where('status', '=', Model_User::STATUS_USER_NORMAL)
                    ->execute()
                    ->as_array('user_id');
    
        return $result;
    }

    public function updateBrandStatus($userId, $status)
    {
        $result = DB::update('brand')
            ->set(array('status' => $status))
            ->where('user_id', '=', $userId)
            ->execute();

        return $result[0];
    }

    public function getByFilter($filter)
    {
        $sql = "SELECT * FROM brand WHERE status = " . Model_User::STATUS_USER_NORMAL;

        if ($filter['show'] == 'dropdown__COLLECTION__WOMEN' || $filter['show'] == 'dropdown__COLLECTION__MEN') {
            $sql .= " AND category_type = '{$filter['show']}' ";
        }

        if (!empty($filter['query'])) {
            $sql .= " AND brand_name LIKE '%{$filter['query']}%'";
        }

        $result = DB::query(Database::SELECT, $sql)->execute()->as_array('user_id');

        return $result;
    }
}