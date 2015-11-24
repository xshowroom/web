<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 * @author liyashuai
 */
class Business_Production
{
    public $productionModel;

    public function __construct()
    {
        $this->productionModel = new Model_Production();
    }
    
    /**
     * 生成大中小三种尺寸的图片
     * 
     * @param string $imagePath
     * @return array
     */
    private function createThreeImage($imagePath)
    {
        $extension = substr(strrchr($imagePath, '.'), 1);
        $realPathFile  = 'data/' . date('ymdHis'). substr(microtime(),2,4) . '.' . $extension;
    
        if (file_exists($imagePath)){
            try{
                copy($imagePath, $realPathFile);
                // 生成medium图和small图
                $mediumPathFile = $this->uploadService->resize($realPathFile, 0.75, 'medium');
                $smallPathFile = $this->uploadService->resize($realPathFile, 0.50, 'small');
            } catch (Exception $e) {
                $errorInfo = Kohana::message('message', 'IMAGE_ERROR');
                throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
            }
        }
    
        return $realPathFile;
    }
    
    /**
     * 增加产品
     * 
     * @return int
     */
    public function addProduction($userId, $name, $category, $collection, $styleNum, $wholePrice, $rtlPrice, 
                                  $sizeRegion, $sizeCode, $color, $madeIn, $material, $careIns, $imagePaths)
    {
        $colorArr = json_decode($color, true);
        $colorFinalArr = array(); // 怕用引用乱掉，又得调半天
        foreach ($colorArr as $colorName => $colorPath) {
            $realPathFile = $this->createThreeImage($colorPath);
            $colorFinalArr[$colorName] = $realPathFile;
        }
        $color = json_encode($colorFinalArr);
        
        $imagePathsArr = json_decode($imagePaths, true);
        $imagePathsFinalArr = array();
        foreach ($imagePathsArr as $imagePath) {
            $realPathFile = $this->createThreeImage($imagePath);
            $imagePathsFinalArr[] = $realPathFile;
        }
        $imagePaths = json_encode($imagePathsFinalArr);
        $productionId = $this->productionModel->addProduction($userId, $name, $category, $collection, $styleNum, $wholePrice, $rtlPrice, $sizeRegion, $sizeCode, $color, $madeIn, $material, $careIns, $imagePaths);
        return $productionId;
    }
    
    /**
     * 修改产品
     *
     * @return int
     */
    public function modifyProduction($userId, $productionId, $name, $category, $collection, $styleNum, $wholePrice, $rtlPrice,
                                     $sizeRegion, $sizeCode, $color, $madeIn, $material, $careIns, $imagePaths)
    {
        $production = $this->productionModel->getByProductionId($productionId);
        
        if (empty($production) ||
            $production['user_id'] != $userId ||
            $production['collection_id'] != $collection) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        $res = $this->productionModel->updateProduction($userId, $productionId, $name, $category, $collection, $styleNum, $wholePrice, $rtlPrice, $sizeRegion, $sizeCode, $color, $madeIn, $material, $careIns, $imagePaths);
        return $res;
    }
    
    /**
     * 修改产品状态
     * 
     * @param int $userId
     * @param int $productionId
     * @param int $status
     * @return int
     */
    public function updateStatus($userId, $productionId, $status)
    {
        $production = $this->productionModel->getByProductionId($productionId);
        if (empty($production) || $production['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
    
        $res = $this->productionModel->updateStatus($productionId, $status);
        return $res;
    }
    
    /**
     * 检查产品是否重名
     * 
     * @param string $productionName
     * @return array
     */
    public function checkProductionName($userId, $collectionName)
    {
        $res = $this->productionModel->checkName($userId, $collectionName);
        if ($res) {
            return array(STATUS_ERROR, 'name_existed');
        } else {
            return array(STATUS_SUCCESS, 'check_ok');
        }
    }
    
    public function getProductionList($userId, $collectionId)
    {
        $category = trim(Request::current()->post('category'));
        $priceMin = Request::current()->post('priceMin');
        $priceMax = Request::current()->post('priceMax');

        $productionList = $this->productionModel->getByCollectionId($collectionId);
        foreach ($productionList as $idx => $production) {

            // 过滤掉不是该用户的产品&&过滤掉不是该类别的产品&&过滤掉不是该价格范围内的产品
            if ($production['user_id'] != $userId ||
                (!empty($category) && $production['category'] != $category) ||
                (!empty($priceMin) && $production['retail_price'] < (int)$priceMin) ||
                (!empty($priceMax) && $production['retail_price'] > (int)$priceMin)) {
                unset($productionList[$idx]);
            }

        }
        
        return $productionList;
    }
    
    public function getProduction($userId, $productionId)
    {
        $production = $this->productionModel->getByProductionId($productionId);
        
        // 验证用户是否有该产品
        if ($production['user_id'] != $userId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        return $production;
    }
    
}