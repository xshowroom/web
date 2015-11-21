<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author shenpeipei
 */
class Business_Production
{
    public $productionModel;

    public function __construct()
    {
        $this->productionModel = new Model_Production();
    }
    
    public function getProductionList($userId, $collectionId)
    {
        $productionList = $this->productionModel->getByCollectionId($collectionId);
        foreach ($productionList as $idx => $production) {
            // 过滤掉不是该用户的产品
            if ($production['user_id'] != $userId) {
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