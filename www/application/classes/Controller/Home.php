<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Home extends Controller_Base
{
    public $userService;
    
    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
    }
    
    public function action_index()
    {
        $view = View::factory('home');
         $opUser = $_SESSION['opUser'];

        if(!empty($opUser)) {
            $view->set('user', $opUser);
            $view->set('userAttr', $this->userService->getUserAttr($opUser['id']));

            self::redirect('/user');
        }
        $this->response->body($view);
    }
    
    public function action_brand()
    {
    	$brandName = Request::current()->param('brand_url');
    	$view = View::factory('brand_index');
    	
    	$opUser = $_SESSION['opUser'];

	    if(!empty($opUser)) {
		    $view->set('user', $opUser);
		    $view->set('userAttr', $this->userService->getUserAttr($opUser['id']));


		    $brandService = new Business_Brand();
		    $brandInfo = $brandService->getBrandInfoByUrl($brandUrl);
		    $view->set('brandInfo', $brandInfo);
		    $view->set('brandAttr', $this->userService->getUserAttr($brandInfo['user_id']));

	    }

        
        $this->response->body($view);

    }
}
