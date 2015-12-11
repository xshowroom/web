<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Brand
{
    public static $availableMap = array(
        'dropdown__AVAILABLE__LAST_DAY' => '+1 day',
        'dropdown__AVAILABLE__1_WEEK' => '+1 week',
        'dropdown__AVAILABLE__4_WEEK' => '+4 week',
        'dropdown__AVAILABLE__8_WEEK' => '+8 week',
        'dropdown__AVAILABLE__12_WEEK' => '+12 week',
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
        // 如果有query查询条件
        if (!empty($filter['query'])) {
            $brandList = $this->queryBrand($filter['query']);
        } else {
            $brandList = $this->getAllBrand();
        }
        
        if (empty($brandList)) {
            return array();
        }
        
        // 所有的user_id
        $userIdList = array_column($brandList, 'user_id');
        
        // 如果有show查询条件，筛选出相应的user_id
        if ((!empty($filter['show']) && $filter['show'] != 'dropdown__COLLECTION__ALL')|| !empty($filter['season']) || !empty($filter['available'])) {
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
            'query'     => Request::current()->query('query'),
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
        
        return $brandList;
    }
    
    public function getBrandInfoByUrl($url)
    {
        $brandInfo = $this->brandModel->getByUrl($url);
        return $brandInfo;
    }
}