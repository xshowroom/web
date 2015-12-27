<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Product extends Controller_BaseReqLogin
{
    public $userService;
    public $buyerService;
    public $productionService;
    public $collectionService;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
        $this->buyerService = new Business_Buyer();
        $this->productionService =new Business_Production();
        $this->collectionService =new Business_Collection();
    }

    
    public function action_index()
    {
        $view = View::factory('product_index');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));

        $userId = $this->opUser['id'];
        $productionId = Request::current()->param('id');
        if ($this->opUser['role_type'] == Model_User::TYPE_USER_BRAND) {
            $production = $this->productionService->getProduction($userId, $productionId);
            $collection = $this->collectionService->getCollectionInfo($userId, $production['collection_id']);
        } else {
            $production = $this->buyerService->getProduction($userId, $productionId);
            $collection = $this->buyerService->getCollectionInfo($userId, $production['collection_id']);
        }
        $view->set('production', $production);
        $view->set('collection', $collection);
        $view->set('hasAuth', $collection['user_id'] == $userId);
        $this->response->body($view);

    }
    
    public function action_create()
    {
        $collectionId = $this->request->param('id');

        if (empty($id)) {
            // to do

        }
    	$view = View::factory('product_create');
    	$view->set('user', $this->opUser);
    	$view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
    	$view->set('collectionId', $collectionId);
    	
    	$this->response->body($view);
    
    }
}
