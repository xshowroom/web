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
        $msgList = $this->lookbookModel->getAllLookbookByUser($userId);

        return $msgList;
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