<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Brand
{  
    public $brandModel;

    public function __construct()
    {
        $this->brandModel = new Model_Brand();
    }
    
    public function getAllBrand()
    {
        $brandList = $this->brandModel->getAllList();
        
        return $brandList;
    }
    
    private function parseCondition()
    {
        
    }
    
    public function getBrandList()
    {
        
    }
}