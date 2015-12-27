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

    /**
     * User Status
     */
    const STATUS_USER_REJECTED = -2;
    const STATUS_USER_PENDING = -1;
    const STATUS_USER_NORMAL = 0;
    const STATUS_USER_SUSPENDED = 1;
    const STATUS_USER_DELETED = 2;


    public $userModel;
    public $msgService;
    public $shopService;
    public $uploadService;

    public function __construct()
    {
        $this->userModel = new Model_User();
        $this->msgService = new Business_Message();
        $this->shopService = new Business_Shop();
        $this->uploadService = new Business_Upload();
    }

    public function login($email, $pass)
    {
        $user = $this->userModel->getByEmailPass($email, md5($pass));
        if ($user['status'] == Model_User::STATUS_USER_PENDING) {
            throw new Kohana_Exception('not_active');
        }
        
        if (!empty($user)) {
            $_SESSION['opUser'] = $user;
            unset($user['password']);
            $this->userModel->updateLoginTime($user['id']);
        }

        return $user;
    }

    public function getUserById($userId)
    {
        return $this->userModel->getById($userId);
    }

    public function getUserAttr($userId)
    {
        return $this->userModel->getAttrByUserId($userId);
    }
    
    public function addUser($roleType)
    {
        $ret = null;

        // use transaction to avoid exception
        try {
            Database::instance()->begin();

            if ($roleType == self::ROLE_BRAND) {
                $ret = $this->addBrandUser();
            } else if ($roleType == self::ROLE_BUYER) {
                $ret = $this->addBuyerUser();
            }

            Database::instance()->commit();
        } catch (Exception $e) {
            Database::instance()->rollback();
        }

        return $ret;
    }
    
    public function addCommonInfo()
    {
        $email          = Request::current()->getParam('email');
        $password       = Request::current()->getParam('pass');
        $roleType       = Request::current()->getParam('roleType');
        $firstName      = Request::current()->getParam('firstName');
        $lastName       = Request::current()->getParam('lastName');
        $displayName    = Request::current()->getParam('displayName');
        $tel            = Request::current()->getParam('tel');
        $mobile         = Request::current()->getParam('mobile');
        $companyName    = Request::current()->getParam('companyName');
        $companyAddr    = Request::current()->getParam('companyAddr');
        $companyCountry = Request::current()->getParam('companyCountry');
        $companyZip     = Request::current()->getParam('companyZip');
        $companyTel     = Request::current()->getParam('companyTel');
        $companyWebsite = Request::current()->getParam('companyWebsite');
        
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
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        } 
        // generate welcome msg
        $this->msgService->createMessage($userId, Business_Message::AUTO_MSG_WELCOME_BRAND);

        // generate brand info
        $brandName     = Request::current()->getParam('brandName');
        $designerName  = Request::current()->getParam('designerName');
        $imagePath     = Request::current()->getParam('imagePath');
        $brandUrl      = Request::current()->getParam('brandUrl');

        $brandUrl = urlencode($this->safeFileName($brandUrl));
        
        $brandExist = $this->checkBrandName($brandName);
        if ($brandExist) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        $brandUrlExist = $this->checkBrandUrl($brandUrl);
        if ($brandUrlExist) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        
        list($realPathFile, $mediumPathFile, $smallPathFile) = $this->uploadService->createThreeImage($imagePath); 

        $brandId = $this->userModel->addBrandInfo($userId, $brandName, $designerName, $brandUrl, $mediumPathFile);
        return $brandId;
    }
    
    public function addBuyerUser()
    {
        $userId = $this->addCommonInfo();
        if (!$userId) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }
        // generate welcome msg
        $this->msgService->createMessage($userId, Business_Message::AUTO_MSG_WELCOME_BRAND);
        $shopId = $this->shopService->realAddShop($userId);
        return $shopId;
    }
    
    public function checkEmail($email)
    {
        $res = $this->userModel->checkEmail($email);
        return $res;
    }
    
    public function checkBrandName($brandName)
    {
        $res = $this->userModel->checkBrandName($brandName);
        return $res;
    }

    public function checkBrandUrl($brandUrl)
    {
        $res = $this->userModel->checkBrandUrl($brandUrl);
        return $res;
    }
    
    public function checkParam($key, $param)
    {
        switch ($key) {
            case 'email' :
                $res = $this->checkEmail($param);
                break;
            case 'brandName':
                $res = $this->checkBrandName($param);
                break;
            case 'brandUrl':
                $res = $this->checkBrandUrl($param);
                break;
            default:
                $res = $this->checkEmail($param);
                break;
        }

        if ($res) {
            return array(STATUS_ERROR, "{$key}_existed");
        }
        
        return array(STATUS_SUCCESS, 'check_ok');
    }

    public function countUserByRole($roleType)
    {
        return $this->userModel->countUserByRole($roleType);
    }

    public function countAllUser()
    {
        $brand_count = $this->userModel->countUserByRole(Business_User::ROLE_BRAND);
        $buyer_count = $this->userModel->countUserByRole(Business_User::ROLE_BUYER);

        return $brand_count + $buyer_count;
    }

    public function listPendingUsers()
    {
        return $this->userModel->listUsersByStatus(Business_User::STATUS_USER_PENDING);
    }

    public function allowUser($userId)
    {
        return $this->userModel->updateUserStatus($userId, Business_User::STATUS_USER_NORMAL);
    }

    public function rejectUser($userId)
    {
        return $this->userModel->updateUserStatus($userId, Business_User::STATUS_USER_REJECTED);
    }

    /**
     * 将文件名中的非法字符去掉
     * 
     * @param $fileName
     * @return string
     */
    public static function safeFileName($fileName) {
        $find = array("/", "\\", "?", "*", "<", ">", "|", ":", ";");
        $niceFileName = str_replace($find, '', $fileName);
        return $niceFileName;
    }
} 
