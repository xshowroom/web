<?php defined('SYSPATH') or die('No direct script access.');

/**
 * $author liyashuai
 */
class Controller_Api_Product extends Controller_BaseReqLogin
{
    public $productionService;

    public function before()
    {
        parent::before();
        $this->productionService = new Business_Production();
    }

    public function action_list()
    {
        $userId = $_SESSION['opUser']['id'];
        $collectionId = Request::current()->getParam('collectionId');
        
        $res = $this->productionService->getProductionList($userId, $collectionId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
    
    public function action_detail()
    {
        $userId = $_SESSION['opUser']['id'];
        $productionId = Request::current()->getParam('productionId');
        
        $res = $this->productionService->getProduction($userId, $productionId);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
    
    public function action_add()
    {
        $userId     = $_SESSION['opUser']['id'];
        $name       = Request::current()->getParam('name');
        $category   = Request::current()->getParam('category');
        $collection = Request::current()->getParam('collectionId');
        $styleNum   = Request::current()->getParam('styleNum');
        $wholePrice = Request::current()->getParam('wholePrice');
        $rtlPrice   = Request::current()->getParam('retailPrice');
        $sizeRegion = Request::current()->getParam('sizeRegion');
        $sizeCode   = Request::current()->getParam('sizeCode');
        $color      = Request::current()->getParam('color');
        $madeIn     = Request::current()->getParam('madeIn');
        $material   = Request::current()->getParam('material');
        $careIns    = Request::current()->getParam('careIns');
        $imagePaths = Request::current()->getParam('images');
        
        $res = $this->productionService->addProduction($userId, $name, $category,
               $collection, $styleNum, $wholePrice, $rtlPrice, $sizeRegion, $sizeCode,
               $color, $madeIn, $material, $careIns, $imagePaths);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
    
    public function action_modify()
    {
        $userId     = $_SESSION['opUser']['id'];
        $production = Request::current()->getParam('id');
        $name       = Request::current()->getParam('name');
        $category   = Request::current()->getParam('category');
        $collection = Request::current()->getParam('collectionId');
        $styleNum   = Request::current()->getParam('styleNum');
        $wholePrice = Request::current()->getParam('wholePrice');
        $rtlPrice   = Request::current()->getParam('retailPrice');
        $sizeRegion = Request::current()->getParam('sizeRegion');
        $sizeCode   = Request::current()->getParam('sizeCode');
        $color      = Request::current()->getParam('color');
        $madeIn     = Request::current()->getParam('madeIn');
        $material   = Request::current()->getParam('material');
        $careIns    = Request::current()->getParam('careIns');
        $imagePaths = Request::current()->getParam('images');
        
        $res = $this->productionService->modifyProduction($userId, $production, $name, $category,
               $collection, $styleNum, $wholePrice, $rtlPrice, $sizeRegion, $sizeCode,
               $color, $madeIn, $material, $careIns, $imagePaths);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
    
    public function action_delete()
    {
        $userId = $this->opUser['id'];
        $productionId = Request::current()->getParam('id');
        $res = $this->productionService->updateStatus($userId, $productionId, STAT_DELETED);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'      => '',
            'data' => $res,
        ));
    }
    
    public function action_check()
    {
        $productionName = Request::current()->getParam('name');
        list($status, $msg) = $this->productionService->checkProductionName($productionName);
        
        echo json_encode(array(
            'status'    => $status,
            'msg'       => __($msg),
        ));
    }
}
