<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Home extends Controller_Base
{
    public $userService;
    public $brandService;

    public function before()
    {
        parent::before();

        $this->userService = new Business_User();
        $this->brandService = new Business_Brand();
    }
    
    public function action_index()
    {
        $view = View::factory('home');
        $opUser = $_SESSION['opUser'];
        
        if(!empty($opUser)) {
            $view->set('user', $opUser);
            $view->set('userAttr', $opUser['userAttr']);
        
            self::redirect('/user');
        }
        $this->response->body($view);
    }
    
    public function action_brand()
    {
        $brandUrl = Request::current()->param('brand_url');
        $view = View::factory('brand_index');

        $opUser = $_SESSION['opUser'];

        if(!empty($opUser)) {
            // only buyer user can view this page with login status
            if ($opUser['role_type'] == Model_User::TYPE_USER_BUYER) {
                $view->set('user', $opUser);
                $view->set('userAttr', $opUser['userAttr']);
            } else {
                $this->destroy_session();
            }
        }

        $brandInfo = $this->brandService->getBrandInfoByUrl($brandUrl);

        if(empty($brandInfo)){
            $this->redirect_404();
        }

        $view->set('brandInfo', $brandInfo);
        $view->set('brandAttr', $this->userService->getUserAttr($brandInfo['user_id']));

        
        $this->response->body($view);
    }
}
