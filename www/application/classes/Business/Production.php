<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 * @author liyashuai
 */
class Business_Production
{
    public $productionModel;
    public $collectionModel;
    public $uploadService;

    public function __construct()
    {
        $this->productionModel = new Model_Production();
        $this->collectionModel = new Model_Collection();
        $this->uploadService = new Business_Upload();
    }
    
    /**
     * 增加产品
     * 
     * @return int
     */
    public function addProduction($userId, $name, $category, $collectionId, $styleNum, $wholePrice, $rtlPrice, 
                                  $sizeRegion, $sizeCode, $color, $madeIn, $material, $careIns, $imagePaths)
    {
        $collection = $this->collectionModel->getByCollectionId($collectionId);
        if ($collection['status'] != Model_Collection::TYPE_OF_DRAFT) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        $colorArr = json_decode($color, true);
        $colorFinalArr = array(); // 怕用引用乱掉，又得调半天
        foreach ($colorArr as $color) {
            if ($color['type'] == 0) {
                $colorFinalArr[] = array(
                    'name' => $color['name'],
                    'value' => $color['value'],
                    'type' => $color['type'],
                );
            } else {
                list($realPathFile, $mediumPathFile, $smallPathFile) = $this->uploadService->createThreeImage($color['value']);
                $colorFinalArr[] = array(
                    'name' => $color['name'],
                    'value' => $realPathFile,
                    'type' => $color['type'],
                );
            }
            
        }
        $color = json_encode($colorFinalArr);
        
        $imagePathsArr = json_decode($imagePaths, true);
        $imagePathsFinalArr = array();
        foreach ($imagePathsArr as $imagePath) {
            list($realPathFile, $mediumPathFile, $smallPathFile) = $this->uploadService->createThreeImage($imagePath);
            $imagePathsFinalArr[] = $realPathFile;
        }
        $imagePaths = json_encode($imagePathsFinalArr);
        $productionId = $this->productionModel->addProduction($userId, $collection['brand_id'], $name, $category, $collectionId, $styleNum, $wholePrice, $rtlPrice, $sizeRegion, $sizeCode, $color, $madeIn, $material, $careIns, $imagePaths);
        return $productionId;
    }
    
    /**
     * 修改产品
     *
     * @return int
     */
    public function modifyProduction($userId, $productionId, $name, $category, $collectionId, $styleNum, $wholePrice, $rtlPrice,
                                     $sizeRegion, $sizeCode, $color, $madeIn, $material, $careIns, $imagePaths)
    {
        $production = $this->productionModel->getByProductionId($productionId);
        
        if (empty($production) ||
            $production['user_id'] != $userId ||
            $production['collection_id'] != $collectionId) {
            $errorInfo = Kohana::message('message', 'AUTH_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $colorArr = json_decode($color, true);
        $colorFinalArr = array(); // 怕用引用乱掉，又得调半天
        foreach ($colorArr as $color) {
            if ($color['type'] == 0) {
                $colorFinalArr[] = array(
                    'name' => $color['name'],
                    'value' => $color['value'],
                    'type' => $color['type'],
                );
            } else {
                list($realPathFile, $mediumPathFile, $smallPathFile) = $this->uploadService->createThreeImage($color['value']);
                $colorFinalArr[] = array(
                    'name' => $color['name'],
                    'value' => $realPathFile,
                    'type' => $color['type'],
                );
            }

        }
        $color = json_encode($colorFinalArr);

        $imagePathsArr = json_decode($imagePaths, true);
        $imagePathsFinalArr = array();
        foreach ($imagePathsArr as $imagePath) {
            list($realPathFile, $mediumPathFile, $smallPathFile) = $this->uploadService->createThreeImage($imagePath);
            $imagePathsFinalArr[] = $realPathFile;
        }
        $imagePaths = json_encode($imagePathsFinalArr);
        $res = $this->productionModel->updateProduction($userId, $productionId, $name, $category, $collectionId, $styleNum, $wholePrice, $rtlPrice, $sizeRegion, $sizeCode, $color, $madeIn, $material, $careIns, $imagePaths);
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
        
        $collection = $this->collectionModel->getByCollectionId($production['collection_id']);
        if ($status == Model_Collection::TYPE_OF_DELETE && $collection['status'] != Model_Collection::TYPE_OF_DRAFT) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
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
        $category = trim(Request::current()->getParam('category'));
        $priceMin = Request::current()->getParam('priceMin');
        $priceMax = Request::current()->getParam('priceMax');

        $productionList = $this->productionModel->getByCollectionId($collectionId);
        // 过滤并且添加字段        
        $realProductionList = array();
        foreach ($productionList as $idx => $production) {
            // 过滤掉不是该类别的产品&&过滤掉不是该价格范围内的产品
            if ((empty($category) || $production['category'] == $category) &&
                (empty($priceMin) || $production['retail_price'] >= (int)$priceMin) &&
                (empty($priceMax) || $production['retail_price'] <= (int)$priceMax)) {
                $realProductionList[] = $this->getFormedProdution($production);
            }
                
            unset($productionList[$idx]);         
        }
        
        return $realProductionList;
    }
    
    public function getProduction($userId, $productionId)
    {
        $production = $this->productionModel->getByProductionId($productionId);

        $realProduction = $this->getFormedProdution($production);

        return $realProduction;
    }

    public function getFormedProdution($production)
    {
        $imageUrlList = json_decode($production['image_url'], true);
//        if (empty($imageUrlList)) {
//            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
//            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
//        }
        $mediumImageUrlList = $smallImageUrlList = array();
        foreach ($imageUrlList as $url) {
            list($filename, $extension) = explode('.', $url);
            $mediumImageUrlList[] = $filename . '_medium.' . $extension;
            $smallImageUrlList[] = $filename . '_small.' . $extension;
        }

        $production['medium_image_url'] = $mediumImageUrlList;
        $production['small_image_url'] = $smallImageUrlList;
	    $production['image_url'] = $imageUrlList;
	
        return $production;
    }
    
}
