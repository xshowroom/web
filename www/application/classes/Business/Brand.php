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
        $userIdList = array();
        
        if (!empty($filter['show']) || !empty($filter['season']) || !empty($filter['available'])) {
            $collectionList = $this->collectionModel->getByFilter($filter);
            $tempIdList = array_column($collectionList, 'user_id');
            $userIdList = array_merge($userIdList, $tempIdList);
        }
        
        if (!empty($filter['category'])) {
            $productinList = $this->productionModel->getByCategory($filter['category']);
            $tempIdList = array_column($productinList, 'user_id');
            $userIdList = array_merge($userIdList, $tempIdList);
        }
        
        if (!empty($filter['country'])) {
            $userAttrList = $this->userModel->getByCountry($filter['country']);
            $tempIdList = array_column($userAttrList, 'user_id');
            $userIdList = array_merge($userIdList, $tempIdList);
        }
        
        return $userIdList;
    }
    
    private function doQuote($season)
    {
        if (empty($season)) {
            return false;
        }
        
        $arr = explode(',', $season);
        
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
        
        $userIdList = $this->doFilter($filter);
        if (empty($userIdList)) {
            return array();
        }
        
        $brandList = $this->brandModel->getByUserIdList($userIdList);
        
        return $brandList;
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
}