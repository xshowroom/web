<?php defined('SYSPATH') or die('No direct script access.');

/**
 * $author liyashuai
 */
class Controller_Api_Product extends Controller_BaseReqLogin
{
    public $productionService;

    public function before()
    {
        $this->productionService = new Business_Production();
    }

    public function action_list()
    {
        $userId = $_SESSION['opUser']['id'];
        $collectionId = Request::current()->post('collectionId');
        
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
        $productionId = Request::current()->post('productionId');
        
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
        $name       = Request::current()->post('name');
        $category   = Request::current()->post('category');
        $collection = Request::current()->post('collectionId');
        $styleNum   = Request::current()->post('styleNum');
        $wholePrice = Request::current()->post('wholePrice');
        $rtlPrice   = Request::current()->post('retailPrice');
        $sizeRegion = Request::current()->post('sizeRegion');
        $sizeCode   = Request::current()->post('sizeCode');
        $color      = Request::current()->post('color');
        $madeIn     = Request::current()->post('madeIn');
        $material   = Request::current()->post('material');
        $careIns    = Request::current()->post('careIns');
        $imagePaths = Request::current()->post('images');
        
        $res = $this->productionService->addProduction($userId, $name, $category,
               $collection, $styleNum, $wholePrice, $rtlPrice, $sizeRegion, $sizeCode,
               $color, $madeIn, $material, $careIns, $imagePaths);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'date'   => $res,
        ));
    }
    
    public function action_modify()
    {
        $userId     = $_SESSION['opUser']['id'];
        $production = Request::current()->post('id');
        $name       = Request::current()->post('name');
        $category   = Request::current()->post('category');
        $collection = Request::current()->post('collectionId');
        $styleNum   = Request::current()->post('styleNum');
        $wholePrice = Request::current()->post('wholePrice');
        $rtlPrice   = Request::current()->post('retailPrice');
        $sizeRegion = Request::current()->post('sizeRegion');
        $sizeCode   = Request::current()->post('sizeCode');
        $color      = Request::current()->post('color');
        $madeIn     = Request::current()->post('madeIn');
        $material   = Request::current()->post('material');
        $careIns    = Request::current()->post('careIns');
        $imagePaths = Request::current()->post('images');
        
        $res = $this->productionService->modifyProduction($userId, $production, $name, $category,
               $collection, $styleNum, $wholePrice, $rtlPrice, $sizeRegion, $sizeCode,
               $color, $madeIn, $material, $careIns, $imagePaths);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'date'   => $res,
        ));
    }
    
    public function action_delete()
    {
        $userId = $this->opUser['id'];
        $productionId = Request::current()->query('id');
        $res = $this->productionService->updateStatus($userId, $productionId, STAT_DELETED);
        
        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'      => '',
            'date' => $res,
        ));
    }
    
    public function action_check()
    {
        $productionName = Request::current()->post('name');
        list($status, $msg) = $this->productionService->checkProductionName($productionName);
        
        echo json_encode(array(
            'status'    => $status,
            'msg'       => __($msg),
        ));
    }
}
