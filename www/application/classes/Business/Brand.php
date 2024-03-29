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
        // 根据筛选条件查询brand表
        $brandList = $this->brandModel->getByFilter($filter);
        
        if (empty($brandList)) {
            return array();
        }
        
        // 所有的user_id
        $userIdList = array_column($brandList, 'user_id');

        // 如果有show查询条件，筛选出相应的user_id
        if (($filter['show'] == 'dropdown__COLLECTION__WHATS_NEW') || !empty($filter['season']) || !empty($filter['available'])) {
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
            'show'      => Request::current()->getParam('show'),
            'category'  => Request::current()->getParam('category'),
            'season'    => $this->doQuote(Request::current()->getParam('season')),
            'available' => self::$availableMap[Request::current()->getParam('available')],
            'country'   => Request::current()->getParam('country'),
            'query'     => Request::current()->getParam('query'),
        );
        
        $res = $this->doFilter($filter);
        
        return $res;
    }
    
    public function getBrandInfo($userId)
    {
        $brandInfo = $this->brandModel->getByUserId($userId);
        
        return $brandInfo;
    }

    public function getBrandInfoByBrandId($brandId)
    {
        $brandInfo = $this->brandModel->getById($brandId);

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