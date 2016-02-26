<?php defined('SYSPATH') or die('No direct script access.');

/**
 * @author tangxiaotao
 */
class Business_Lookbook
{
    public $lookbookModel;

    public function __construct()
    {
        $this->lookbookModel = new Model_Lookbook();
    }

    /**
     * get all lookbook belong to a user
     *
     * @param $userId
     * @return object
     */
    public function getLookbookList($userId)
    {
        $lookbookList = $this->lookbookModel->getAllLookbookByUser($userId);

        $position =array(
            'dropdown__COLLECTION_SEASON__AW_14' => 0,
            'dropdown__COLLECTION_SEASON__PRE_SS_15' => 1,
            'dropdown__COLLECTION_SEASON__SS_15' => 2,
            'dropdown__COLLECTION_SEASON__AW_15' => 3,
            'dropdown__COLLECTION_SEASON__PRE_SS16' => 4,
            'dropdown__COLLECTION_SEASON__SPRING_16' => 5,
            'dropdown__COLLECTION_SEASON__SUMMER_16' => 6,
            'dropdown__COLLECTION_SEASON__SS_16' => 7,
            'dropdown__COLLECTION_SEASON__PRE_AW_16' => 8,
            'dropdown__COLLECTION_SEASON__AW_16' => 9,
        );

        foreach($lookbookList as $b=>$c) {
            $c['index'] = $position[$c['season']];
            $lookbookList[$b]=$c;
        }

        $this->sortArrByField($lookbookList, 'index', true);

        return $lookbookList;
    }

    function sortArrByField(&$array, $field, $desc = false){
        $fieldArr = array();
        foreach ($array as $k => $v) {
            $fieldArr[$k] = $v[$field];
        }
        $sort = $desc == false ? SORT_ASC : SORT_DESC;
        array_multisort($fieldArr, $sort, $array);
    }

    /**
     * save a lookbook
     *
     * @param $userId
     * @param $season
     * @param $lookbook
     * @return mixed
     */
    public function saveLookbook($userId, $season, $lookbook)
    {
         return $this->lookbookModel->createLookbook($userId, $season, $lookbook);
    }

    /**
     * delete a exist lookbook
     *
     * @param $userId
     * @param $lookbookId
     */
    public function deleteLookbook($userId, $lookbookId)
    {
        $lookbookItem = $this->lookbookModel->getLookbook($userId, $lookbookId);

        if ($lookbookItem)
        {
            $lookbookFilePath = $lookbookItem['lookbook'];
            $arr = explode('.', $lookbookFilePath);
            $extension = $arr[1];
            $lookbookSmallFilePath = $arr[0] . '_small'.'.'.$extension;

            Business_Upload::deleteFile($lookbookSmallFilePath);
            Business_Upload::deleteFile($lookbookFilePath);

            $this->lookbookModel->deleteLookbook($userId, $lookbookId);
        }
    }
}