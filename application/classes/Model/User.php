<?php defined('SYSPATH') || die('No direct script access.');

/**
 * 
 * @author shenpeipei
 * @author liyashuai
 */
class Model_User {

	const TYPE_USER_ADMIN = 0;
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
    
    /**
     * 查询email信息
     *
     * @param string $email
     * @return array
     */
    public function checkEmail($email)
    {
        $result = DB::select()
                    ->from('user')
                    ->where('email', '=', $email)
                    ->execute()
                    ->as_array();
    
        return empty($result) ? false : true;
    }
    
    /**
     * 查询brand信息
     *
     * @param string $brandName
     * @return array
     */
    public function checkBrand($brandName)
    {
        $result = DB::select()
                    ->from('brand')
                    ->where('brand_name', '=', $brandName)
                    ->execute()
                    ->as_array();
    
        return empty($result) ? false : true;
    }
    
    /**
     * 增加用户信息
     *
     * @param string $email
     * @param string $password
     * @param int $roleType
     * @return int
     */
    public function addUser($email, $password, $roleType)
    {
        $result = DB::insert('user')
                    ->columns(array(
                        'email',
                        'password',
                        'role_type',
                        'register_date',
                        'status',
                    ))
                    ->values(array(
                        $email,
                        $password,
                        $roleType,
                        date('Y-m-d H:i:s'),
                        STAT_NORMAL,
                    ))
                    ->execute();
        
        return $result[0];
    }
    
    /**
     * 增加用户属性信息
     *
     * @param int $userId
     * @param string $firstName
     * @param string $lastName
     * @param string $displayName
     * @param string $tel
     * @param string $mobile
     * @param string $companyName
     * @param string $companyAddr
     * @param string $companyCountry
     * @param string $companyZip
     * @param string $companyWebsite
     * @return int
     */
    public function addUserAttr($userId, $firstName, $lastName, $displayName, $tel, $mobile, $companyName, $companyAddr, $companyCountry, $companyZip, $companyTel, $companyWebsite)
    {
        $result = DB::insert('user_attr')
                    ->columns(array(
                        'user_id',
                        'first_name',
                        'last_name',
                        'display_name',
                        'telephone',
                        'mobile',
                        'company_name',
                        'company_address',
                        'company_country',
                        'company_zip',
                        'company_telephone',
                        'company_web_url',
                        'status',
                    ))
                    ->values(array(
                        $userId,
                        $firstName,
                        $lastName,
                        $displayName,
                        $tel,
                        $mobile,
                        $companyName,
                        $companyAddr,
                        $companyCountry,
                        $companyZip,
                        $companyTel,
                        $companyWebsite,
                        STAT_NORMAL,
                    ))
                    ->execute();
    
        return $result[0];
    }
    
    /**
     * 增加品牌信息
     *
     * @param int $userId
     * @param string $brandName
     * @param string $disignerName
     * @param string $brandUrl
     * @param string $brandImage
     * @return int
     */
    public function addBrandInfo($userId, $brandName, $disignerName, $brandUrl, $brandImage)
    {
        $result = DB::insert('brand')
                    ->columns(array(
                        'user_id',
                        'brand_name',
                        'disigner_name',
                        'brand_url',
                        'brand_image',
                        'status',
                    ))
                    ->values(array(
                        $userId,
                        $brandName,
                        $disignerName,
                        $brandUrl,
                        $brandImage,
                        STAT_NORMAL,
                    ))
                    ->execute();
    
        return $result[0];
    }
    
    /**
     * 增加商铺信息
     * 
     * @param int $userId
     * @param string $name
     * @param int $type
     * @param int $colType
     * @param string $brandList
     * @param string $website
     * @param string $address
     * @param string $country
     * @param string $zipcode
     * @param string $tel
     * @return int
     */
    public function addShopInfo($userId, $name, $type, $colType, $brandList, $website, $address, $country, $zipcode, $tel)
    {
        $result = DB::insert('shop')
                    ->columns(array(
                        'user_id',
                        'name',
                        'type',
                        'collection_type',
                        'brand_list',
                        'website',
                        'address',
                        'country',
                        'zip',
                        'telephone',
                        'status',
                    ))
                    ->values(array(
                        $userId,
                        $name,
                        $type,
                        $colType,
                        $brandList,
                        $website,
                        $address,
                        $country,
                        $zipcode,
                        $tel,
                        STAT_NORMAL,
                    ))
                    ->execute();
        
        return $result[0];
    }
}