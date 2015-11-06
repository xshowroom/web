<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author liyashuai
 * @author shenpeipei
 */
class Business_User
{
	const ROLE_ADMIN = 0;
	const ROLE_BRAND = 1;
	const ROLE_BUYER = 2;
    
    public $userModel;

	public function __construct()
	{
		$this->userModel = new Model_User();
	}

	public function getUserInfo($email, $pass)
	{
		$user = $this->userModel->getByEmailPass($email, $pass);
		if (!empty($user)) {
			unset($user['password']);

			$_SESSION['opUser'] = $user;
		}

		return $user;
	}
	
	public function addUser($roleType)
	{
	    if ($roleType == self::ROLE_BRAND) {
	        $this->addBrandUser();
	    } else if ($roleType == self::ROLE_BUYER) {
	        $this->addBuyerUser();
	    }
	}
	
	public function addCommonInfo()
	{
	    $email          = Request::current()->query('email');
	    $password       = Request::current()->query('pass');
	    $roleType       = Request::current()->query('roleType');
	    $firstName      = Request::current()->query('firstName');
	    $lastName       = Request::current()->query('lastName');
	    $displayName    = Request::current()->query('displayName');
	    $tel            = Request::current()->query('tel');
	    $mobile         = Request::current()->query('mobile');
	    $companyName    = Request::current()->query('companyName');
	    $companyAddr    = Request::current()->query('companyAddr');
	    $companyCountry = Request::current()->query('companyCountry');
	    $companyZip     = Request::current()->query('companyZip');
	    $companyTel     = Request::current()->query('companyTel');
	    $companyWebsite = Request::current()->query('companyWebsite');
	    
	    $emailExist = $this->checkEmail($email);
	    if ($emailExist) {
	        return null;
	    }
	    
	    $userId = $this->userModel->addUser($email, md5($password), $roleType);
	    
        $this->userModel->addUserAttr($userId, $firstName, $lastName, $displayName, $tel, $mobile, $companyName,
                                     $companyAddr, $companyCountry, $companyZip, $companyTel, $companyWebsite);
	    
        return $userId;
	}

	public function addBrandUser()
	{
	    $userId = $this->addCommonInfo();
	    if (!$userId) {
	        return null;
	    } else {
	        $brandName     = Request::current()->query('brandName');
	        $disignerName  = Request::current()->query('disignerName');
	        $brandUrl      = WEB_ROOT . '/brand/' . $brandName;
	        $brandImage    = '';
	        
	        $brandId = $this->userModel->addBrandInfo($userId, $brandName, $disignerName, $brandUrl, $brandImage);
	        return $brandId;
	    }
	}
	
	public function addBuyerUser()
	{
	    $userId = $this->addCommonInfo();
	    if (!$userId) {
	        return null;
	    } else {
	        $name      = Request::current()->query('shopName');
	        $type      = Request::current()->query('shopType');
	        $colType   = Request::current()->query('collecionType');
	        $brandList = Request::current()->query('brandList');
	        $website   = Request::current()->query('shopWebsite');
	        $address   = Request::current()->query('shopAddress');
	        $country   = Request::current()->query('shopCountry');
	        $zipcode   = Request::current()->query('shopZipcode');
	        $tel       = Request::current()->query('shopTel');
	        
	        $shopId = $this->userModel->addShopInfo($userId, $name, $type, $colType, $brandList
                                                    $website, $address, $country, $zipcode, $tel);
	        return $shopId;
	    }
	}
	
	public function checkEmail($email)
	{
	    $res = $this->userModel->checkEmail($email);
	    return $res;
	}
} 
