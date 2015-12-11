<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Lookbook
 * 
 * @author tangxiaotao
 */
class Model_Lookbook
{
    protected static $TABLE= 'lookbook';

    public function createLookbook($userId, $season, $lookbook)
    {
        $result = DB::insert(Model_Lookbook::$TABLE)
            ->columns(array(
                'user_id',
                'season',
                'lookbook',
            ))
            ->values(array(
                $userId,
                $season,
                $lookbook
            ))
            ->execute();

        return $result[0];
    }

    public function updateLookbook($userId, $season, $lookbook)
    {
        $result = DB::update(Model_Lookbook::$TABLE)
                    ->set(array('lookbook'=>$lookbook))
                    ->where('user_id', '=', $userId)
                    ->where('season', '=', $season)
                    ->execute();

        return $result[0];
    }

    public function getAllLookbookByUser($userId)
    {
        $result = DB::select()
                    ->from(Model_Lookbook::$TABLE)
                    ->where('user_id', '=', $userId)
                    ->where('lookbook', '<>', '')
                    ->execute()
                    ->as_array();
        
        return $result;
    }

    public function getSingleLookbook($userId, $season)
    {
        $result = DB::select()
                    ->from(Model_Lookbook::$TABLE)
                    ->where('user_id', '=', $userId)
                    ->where('season', '=', $season)
                    ->execute();

        return $result[0];
    }
}