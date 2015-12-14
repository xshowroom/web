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
            Business_Upload::deleteFile($lookbookItem['lookbook']);
            $this->lookbookModel->deleteLookbook($userId, $lookbookId);
        }
    }
}