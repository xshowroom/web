<?php defined('SYSPATH') or die('No direct script access.');


class Controller_User extends Controller_BaseReqLogin
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
        $this->action_login();
    }

    public function action_login()
    {
        $roleType = (int)$this->opUser['role_type'];

        if ($roleType === Model_User::TYPE_USER_BRAND) {
            $this->redirect('/brand/dashboard');
        } elseif ($roleType === Model_User::TYPE_USER_BUYER) {
            $this->redirect('/buyer/dashboard');
        } elseif ($roleType === Model_User::TYPE_USER_ADMIN) {
            $this->redirect('/xsadmin/management');
        }

        $this->redirectLogin();
    }

    public function action_logout()
    {
        $this->destroy_session();

        $this->redirect('/home');
    }

    public function action_profile()
    {
        $roleType = (int)$this->opUser['role_type'];

        $view = View::factory('user_profile');
        $view->set('user', $this->opUser);

        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));

        if ($roleType === Model_User::TYPE_USER_BRAND) {
            $view->set('brandInfo', $this->brandService->getBrandInfo($this->opUser['id']));
        }

        $this->response->body($view);
    }

    public function action_password()
    {
        $roleType = (int)$this->opUser['role_type'];

        $view = View::factory('user_password');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->opUser['userAttr']);

        if ($roleType === Model_User::TYPE_USER_BRAND) {
            $view->set('brandInfo', $this->brandService->getBrandInfo($this->opUser['id']));
        }

        $this->response->body($view);
    }
}
