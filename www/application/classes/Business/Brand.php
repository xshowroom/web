<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Brand
{  
    public $brandModel;
    public $userModel;

    public function __construct()
    {
        $this->brandModel = new Model_Brand();
        $this->userModel  = new Model_User();
    }
    
    public function getAllBrand()
    {
        $brandList = $this->brandModel->getAllList();
        
        return $brandList;
    }
    
    public function getBrandInfo($userId)
    {
        $brandInfo = $this->brandModel->getByUserId($userId);
        
        return $brandInfo;
    }
    
    private function parseCondition()
    {
        
    }
    
    public function getBrandList()
    {
        
    }
}