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
    
    private function wellFormatedBrand($brandList)
    {
        
    }
    
    public function getAllBrand()
    {
        $brandList = $this->brandModel->getAllList();
        $resList = $this->wellFormatedBrand($brandList);
        
        return $resList;
    }
    
}