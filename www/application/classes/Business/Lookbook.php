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
     * get a specific message
     *
     * @param $userId
     * @param $season
     * @param $lookbook
     * @return mixed
     */
    public function saveLookbook($userId, $season, $lookbook)
    {
        $lookbookItem = $this->lookbookModel->getSingleLookbook($userId, $season);

        if (empty($lookbookItem))
        {
            $this->lookbookModel->createLookbook($userId, $season, $lookbook);
        }
        else
        {
            $this->lookbookModel->updateLookbook($userId, $season, $lookbook);
        }
    }
}