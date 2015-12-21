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
        try {
            $view = View::factory('home');
            $opUser = $_SESSION['opUser'];
            
            if(!empty($opUser)) {
                $view->set('user', $opUser);
                $view->set('userAttr', $this->userService->getUserAttr($opUser['id']));
            
                self::redirect('/user');
            }
            $this->response->body($view);
        } catch (Exception $e) {
            echo json_encode(array(
                'status' => STATUS_ERROR,
                'msg' => '非常抱歉，系统出现错误，请稍后重试',
                'data' => '',
            ));
        }
        
    }
    
    public function action_brand()
    {
    	$brandUrl = Request::current()->param('brand_url');
    	$view = View::factory('brand_index');
    	
    	$opUser = $_SESSION['opUser'];

	    if(!empty($opUser)) {
		    $view->set('user', $opUser);
		    $view->set('userAttr', $this->userService->getUserAttr($opUser['id']));
	    }
	    $brandService = new Business_Brand();
	    $brandInfo = $brandService->getBrandInfoByUrl($brandUrl);
	    $view->set('brandInfo', $brandInfo);
	    $view->set('brandAttr', $this->userService->getUserAttr($brandInfo['user_id']));

        
        $this->response->body($view);

    }
}
