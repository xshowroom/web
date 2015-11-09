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
		$pass = md5($pass);
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
	        $ret = $this->addBrandUser();
	    } else if ($roleType == self::ROLE_BUYER) {
	        $ret = $this->addBuyerUser();
	    }
	    
	    return $ret;
	}
	
	public function addCommonInfo()
	{
	    $email          = Request::current()->post('email');
	    $password       = Request::current()->post('pass');
	    $roleType       = Request::current()->post('roleType');
	    $firstName      = Request::current()->post('firstName');
	    $lastName       = Request::current()->post('lastName');
	    $displayName    = Request::current()->post('displayName');
	    $tel            = Request::current()->post('tel');
	    $mobile         = Request::current()->post('mobile');
	    $companyName    = Request::current()->post('companyName');
	    $companyAddr    = Request::current()->post('companyAddr');
	    $companyCountry = Request::current()->post('companyCountry');
	    $companyZip     = Request::current()->post('companyZip');
	    $companyTel     = Request::current()->post('companyTel');
	    $companyWebsite = Request::current()->post('companyWebsite');
	    
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
	        $brandName     = Request::current()->post('brandName');
	        $disignerName  = Request::current()->post('disignerName');
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
	        $name      = Request::current()->post('shopName');
	        $type      = Request::current()->post('shopType');
	        $colType   = Request::current()->post('collecionType');
	        $brandList = Request::current()->post('brandList');
	        $website   = Request::current()->post('shopWebsite');
	        $address   = Request::current()->post('shopAddress');
	        $country   = Request::current()->post('shopCountry');
	        $zipcode   = Request::current()->post('shopZipcode');
	        $tel       = Request::current()->post('shopTel');
	        
	        $shopId = $this->userModel->addShopInfo($userId, $name, $type, $colType, $brandList,
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
