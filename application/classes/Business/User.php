<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author liyashuai
 * @author shenpeipei
 */
class Business_User
{
	/**
	 * 角色类型
	 */
    const ROLE_ADMIN = 0;
	const ROLE_BRAND = 1;
	const ROLE_BUYER = 2;
	
	// 上传超时
	const TIME_LIMIT = 60;
	
	// 上传最大内存使用
	const MEMORY_LIMIT = '1024M';
    
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
	    // brand包含图片上传，设置上传超时和上传最大内存
	    set_time_limit(self::TIME_LIMIT);
	    ini_set('memory_limit', self::MEMORY_LIMIT);
	    
	    // 判断请求大小并且验证请求中是否包含文件
	    if (Request::post_max_size_exceeded() || !isset( $_FILES["file"])) {
	        return null;
	    }
	    
	    $userId = $this->addCommonInfo();
	    if (!$userId) {
	        return null;
	    } else {
	        $brandName     = Request::current()->post('brandName');
	        $disigner$brandNameName  = Request::current()->post('disignerName');
	        $brandUrl      = WEB_ROOT . '/brand/' . $brandName;
	        
	        $brandExist = $this->checkBrand($brandName);
	        if ($brandExist) {
	            return null;
	        }
	        
	        // 处理图片上传
	        try {
	            $file = $_FILES['file'];
	            // 上传文件夹不存在则创建
	            if (!is_dir(UPLOAD_DIR)) {
	                mkdir($realPath, 0777);
	            }
	            // brandName唯一，因此可以做文件名
	            $realPathFile = UPLOAD_DIR. '/' . $brandName;
	            // 如果已经存在文件，可将其删除
	            if (file_exists($realPathFile)){
	                unlink($realPathFile);
	            }
	            // 将临时文件拷贝到指定位置
	            $result = move_uploaded_file($file['tmp_name'], $realPathFile);
	            if ($result === false) {
	                return null;
	            }
	        } catch (Exception $e) {
	            return null;
	        }
	        
	        $brandId = $this->userModel->addBrandInfo($userId, $brandName, $disignerName, $brandUrl, $realPathFile);
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
	
	public function checkBrand($brandName)
	{
	    $res = $this->userModel->checkBrand($brandName);
	    return $res;
	}
} 
