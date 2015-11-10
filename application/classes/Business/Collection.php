<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Collection
{  
    public $collectionModel;

    public function __construct()
    {
        $this->collectionModel = new Model_Collection();
    }
    
}