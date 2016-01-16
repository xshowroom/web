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
        $this->checkBuyerUser();

        $collectionId = $this->request->param('id');
        $collectionInfo = $this->collectionService->getCollectionInfo($this->opUser['id'], $collectionId);

        $view = View::factory('product_create');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $view->set('collectionId', $collectionId);
        $view->set('collectionInfo', $collectionInfo);

    	$this->response->body($view);
    
    }
    
    public function action_edit()
    {
        $this->checkBrandUser();

        $productId = $this->request->param('id');
        $userId = $this->opUser['id'];

        $production = $this->productionService->getProduction($userId, $productId);
        $collection = $this->collectionService->getCollectionInfo($userId, $production['collection_id']);

        $view = View::factory('product_edit');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $view->set('productId', $productId);
        $view->set('collectionCategory', $collection['category']);

        $this->response->body($view);
    }
}
