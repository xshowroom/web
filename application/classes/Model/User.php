<?php defined('SYSPATH') || die('No direct script access.');

/**
 * 
 * @author shenpeipei
 */
class Model_User {

	const TYPE_USER_GUEST = 0;
	const TYPE_USER_BRAND = 1;
	const TYPE_USER_BUYER = 2;

	/**
     * 查询单个用户信息
     * 
     * @param int $id
     * @return array
     */
    public function getById($id)
    {
        $result = DB::select()
					->from('user')
					->where('id', '=', $id)
					->execute();
        
        return empty($result) ? array() : $result[0];
    }

    /**
     * 查询单个用户信息
     * 
     * @param string $email
     * @param string $pass
     * @return array
     */
    public function getByEmailPass($email, $pass)
    {
    	$result = DB::select()
					->from('user')
					->where('email', '=', $email)
					->where('password', '=', $pass)
					->execute();
        
        return empty($result) ? array() : $result[0];
    }
}