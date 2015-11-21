<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Brand extends Controller_BaseReqLogin
{
    const CONDITION_SHOW_ALL = 0;
    const CONDITION_SHOW_NEW = 1;
    const CONDITION_SHOW_WOMAN = 2;
    const CONDITION_SHOW_MAN = 3;
    
    const CONDITION_CATEGORY_HAT        = 1;
    const CONDITION_CATEGORY_TOP        = 2;
    const CONDITION_CATEGORY_KNIT       = 3;
    const CONDITION_CATEGORY_SHIRT      = 4;
    const CONDITION_CATEGORY_DRESS      = 5;
    const CONDITION_CATEGORY_JUMPSUIT   = 6;
    const CONDITION_CATEGORY_COAT       = 7;
    // const CONDITION_CATEGORY_SHIRT      = 8;
    const CONDITION_CATEGORY_PANTS      = 9;
    const CONDITION_CATEGORY_BAG        = 10;
    
    const CONDITION_AVALIABLE_LASTDAY   = 0;
    const CONDITION_AVALIABLE_UP1WEEK   = 1;
    const CONDITION_AVALIABLE_UP4WEEK   = 2;
    const CONDITION_AVALIABLE_UP8WEEK   = 3;
    
    public $brandService;

    public function before()
    {
        $this->brandService = new Business_Brand();
    }

    public function action_list()
    {
        $show = Request::current()->query('show');
        if ($show == self::CONDITION_SHOW_ALL) {
            $res = $this->brandService->getAllBrand();
        } else {
            $res = $this->brandService->getBrandList();
        }
        
        
        echo json_encode(array(
            'status' => $status,
            'msg'    => $msg,
        ));
    }

}
