<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Brand
{
    public static $availableMap = array(
        '+1 day',
        '+1 week',
        '+4 week',
        '+8 week',
    );
    
    public $brandModel;
    public $collectionModel;
    public $productionModel;
    public $userModel;

    public function __construct()
    {
        $this->brandModel = new Model_Brand();
        $this->collectionModel = new Model_Collection();
        $this->productionModel = new Model_Production();
        $this->userModel  = new Model_User();
    }
    
    public function getAllBrand()
    {
        $brandList = $this->brandModel->getAllList();
        
        return $brandList;
    }
    
    private function doFilter($filter)
    {
        $brandList = $this->getAllBrand();
        
        // 所有的user_id
        $userIdList = array_column($brandList, 'user_id');
        
        // 如果有show查询条件，筛选出相应的user_id
        if (!empty($filter['show']) || !empty($filter['season']) || !empty($filter['available'])) {
            $collectionList = $this->collectionModel->getByFilter($filter);
            $tempIdList = array_column($collectionList, 'user_id');
            $userIdList = array_intersect($userIdList, $tempIdList);
        }
        
        // 如果有category查询条件，筛选出相应的user_id
        if (!empty($filter['category'])) {
            $productionList = $this->productionModel->getByCategory($filter['category']);
            $tempIdList = array_column($productionList, 'user_id');
            $userIdList = array_intersect($userIdList, $tempIdList);
        }
        
        // 如果有country查询条件，筛选出相应的user_id
        if (!empty($filter['country'])) {
            $country = explode(',', $filter['country']);
            $userAttrList = $this->userModel->getByCountry($country);
            $tempIdList = array_column($userAttrList, 'user_id');
            $userIdList = array_intersect($userIdList, $tempIdList);
        }
        
        $res = array();
        foreach ($userIdList as $user_id) {
            $res[] = $brandList[$user_id];
        }

        return $res;
    }
    
    private function doQuote($queryStr)
    {
        if (empty($queryStr)) {
            return false;
        }
        
        $arr = explode(',', $queryStr);
        
        $res = array_map(function ($val){
            return "'{$val}'";
        }, $arr);
        
        return implode(',', $res);
    }
    
    public function getBrandList()
    {
        $filter = array(
            'show'      => Request::current()->query('show'),
            'category'  => Request::current()->query('category'),
            'season'    => $this->doQuote(Request::current()->query('season')),
            'available' => self::$availableMap[Request::current()->query('available')],
            'country'   => Request::current()->query('country'),
        );
        
        $res = $this->doFilter($filter);
        
        $pageSize = Request::current()->query('pageSize');
        $pageSize = empty($pageSize) ? 0 : $pageSize;
        $offset = Request::current()->query('offset');
        $offset = empty($offset) ? 0 : $offset;
        $res = array_slice($res, $offset, $pageSize);
        
        return $res;
    }
    
    public function getBrandInfo($userId)
    {
        $brandInfo = $this->brandModel->getByUserId($userId);
        
        return $brandInfo;
    }
    
    public function queryBrand($name)
    {
        $brandList = $this->brandModel->getByName($name);
        
        $pageSize = Request::current()->query('pageSize');
        $pageSize = empty($pageSize) ? 0 : $pageSize;
        $offset = Request::current()->query('offset');
        $offset = empty($offset) ? 0 : $offset;
        $brandList = array_slice($brandList, $offset, $pageSize);
        
        return $brandList;
    }
}