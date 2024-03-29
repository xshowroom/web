<?php defined('SYSPATH') || die('No direct script access.');

/**
 * Collection
 *
 * @author shenpeipei
 * @author liyashuai
 */
class Model_Collection
{
    const TYPE_OF_DRAFT = 0;
    const TYPE_OF_ONLINE = 1;
    const TYPE_OF_CLOSE = 2;
    const TYPE_OF_DELETE = 3;

    const MODE_OF_PRE_ORDER = 'dropdown__COLLECTION_MODE__PRE_ORDER';

    public function getAllList()
    {
        $result = DB::select()
            ->from('collection')
            ->where('status', '!=', self::TYPE_OF_DELETE)
            ->execute()
            ->as_array();

        return $result;
    }

    public function getByCollectionId($collectionId)
    {
        $result = DB::select()
            ->from('collection')
            ->where('id', '=', $collectionId)
            ->execute()
            ->as_array();

        return empty($result) ? array() : $result[0];
    }

    public function getListByUserId($userId)
    {
        $result = DB::select()
            ->from('collection')
            ->where('user_id', '=', $userId)
            ->where('status', '!=', self::TYPE_OF_DELETE)
            ->order_by('id', 'DESC')
            ->execute()
            ->as_array('id');

        return $result;
    }

    /**
     * 增加用户信息
     *
     * @param string $email
     * @param string $password
     * @param int $roleType
     * @return int
     */
    public function addCollection($userId, $brandId, $name, $category, $mode, $season, $miniOrder, $currency, $deadline, $deliveryDate, $description, $imageUrl, $imageMediumUrl, $imageSmallUrl)
    {
        $result = DB::insert('collection')
            ->columns(array(
                'user_id',
                'brand_id',
                'name',
                'category',
                'mode',
                'season',
                'mini_order',
                'currency',
                'deadline',
                'delivery_date',
                'description',
                'cover_image',
                'cover_image_medium',
                'cover_image_small',
                'create_time',
                'modify_time',
                'status',
            ))
            ->values(array(
                $userId,
                $brandId,
                $name,
                $category,
                $mode,
                $season,
                $miniOrder,
                $currency,
                $deadline,
                $deliveryDate,
                $description,
                $imageUrl,
                $imageMediumUrl,
                $imageSmallUrl,
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                STAT_NORMAL,
            ))
            ->execute();

        return $result[0];
    }

    public function updateCollection($userId, $collectionId, $name, $category, $mode, $season, $miniOrder, $currency, $deadline, $deliveryDate, $description, $imageUrl, $imageMediumUrl, $imageSmallUrl)
    {
        $result = DB::update('collection')
            ->set(array(
                'name' => $name,
                'category' => $category,
                'mode' => $mode,
                'season' => $season,
                'mini_order' => $miniOrder,
                'currency' => $currency,
                'deadline' => $deadline,
                'delivery_date' => $deliveryDate,
                'description' => $description,
                'cover_image' => $imageUrl,
                'cover_image_medium' => $imageMediumUrl,
                'cover_image_small' => $imageSmallUrl,
                'modify_time' => date('Y-m-d H:i:s'),
            ))
            ->where('user_id', '=', $userId)
            ->where('id', '=', $collectionId)
            ->execute();

        return $result;
    }

    public function checkName($userId, $collectionName)
    {
        $result = DB::select()
            ->from('collection')
            ->where('user_id', '=', $userId)
            ->where('name', '=', $collectionName)
            ->where('status', '!=', self::TYPE_OF_DELETE)
            ->execute()
            ->as_array();

        return empty($result) ? false : true;
    }

    public function updateStatus($collectionId, $status)
    {
        $result = DB::update('collection')
            ->set(array(
                'status' => $status,
                'modify_time' => date('Y-m-d H:i:s'),
            ))
            ->where('id', '=', $collectionId)
            ->where('status', '!=', self::TYPE_OF_DELETE)
            ->execute();

        return $result;
    }

    public function getByFilter($filter)
    {
        $query = DB::select()->from('collection')->where('status', '=', self::TYPE_OF_ONLINE);

        if ($filter['show'] == 'dropdown__COLLECTION__WHATS_NEW') {
            $query->and_where('modify_time', '>=', date('Y-m-d', strtotime('-3 month')));
        }

        if (!empty($filter['season'])) {
            $query->and_where('season', 'IN', explode(',', $filter['season']));
        }

        if (!empty($filter['available'])) {
            $query->and_where('deadline', 'BETWEEN', array(date('Y-m-d'), date('Y-m-d', strtotime($filter['available']))));
        }

        if (!empty($filter['mode'])) {
            $query->and_where('mode', '=', $filter['mode']);
        }

        $result = $query->execute()->as_array('id');

        return $result;
    }

    public function getListBySeason($userId, $season)
    {
        $result = DB::select()
            ->from('collection')
            ->where('user_id', '=', $userId)
            ->where('season', '=', $season)
            ->where('status', '!=', self::TYPE_OF_DELETE)
            ->execute()
            ->as_array();

        return $result;
    }
}