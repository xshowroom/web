<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Collection extends Controller_BaseReqLogin
{
    public $userService;
    public $buyerService;
    public $collectionService;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
        $this->buyerService = new Business_Buyer();
        $this->collectionService =new Business_Collection();
    }

    public function action_create()
    {
        $view = View::factory('collection_create');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $this->response->body($view);
    }
    
    public function action_index()
    {
        $view = View::factory('collection_index');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        
        $userId = $this->opUser['id'];
        $collectionId = Request::current()->param('id');
        
        if ($this->opUser['role_type'] == Model_User::TYPE_USER_BRAND) {
            $view->set('collection', $this->collectionService->getCollectionInfo($userId, $collectionId));
        } else {
            $view->set('collection', $this->buyerService->getCollectionInfo($userId, $collectionId));
        }
        
        $this->response->body($view);
    }

}
