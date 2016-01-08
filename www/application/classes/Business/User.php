<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author liyashuai
 * @author shenpeipei
 */
class Business_User
{

    public $userModel;
    public $brandModel;
    public $msgService;
    public $shopService;
    public $uploadService;

    public function __construct()
    {
        $this->userModel = new Model_User();
        $this->brandModel = new Model_Brand();
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

            if ($roleType == Model_User::TYPE_USER_BRAND) {
                $ret = $this->addBrandUser();
            } else if ($roleType == Model_User::TYPE_USER_BUYER) {
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
        $this->msgService->createMessage($userId, Model_Message::AUTO_MSG_WELCOME_BRAND);

        // generate brand info
        $brandName     = Request::current()->getParam('brandName');
        $designerName  = Request::current()->getParam('designerName');
        $imagePath     = Request::current()->getParam('imagePath');
        $brandUrl      = Request::current()->getParam('brandUrl');
        $categoryType  = Request::current()->getParam('categoryType');

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

        $brandId = $this->userModel->addBrandInfo($userId, $brandName, $designerName, $brandUrl, $mediumPathFile, $categoryType);
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
        $this->msgService->createMessage($userId, Model_Message::AUTO_MSG_WELCOME_BRAND);
        $shopId = $this->shopService->realAddShop($userId);
        return $shopId;
    }

    public function changePassword($userId, $new)
    {
        $this->userModel->changeUserPassword($userId, $new);
    }

    public function checkPassword($userId, $password)
    {
        $res = $this->userModel->checkPassword($userId, $password);
        return $res;
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

    public function checkBrandUrl($brandUrl, $excludeBrandId = 0)
    {
        $res = $this->userModel->checkBrandUrl($brandUrl, $excludeBrandId);
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
        $brand_count = $this->userModel->countUserByRole(Model_User::TYPE_USER_BRAND);
        $buyer_count = $this->userModel->countUserByRole(Model_User::TYPE_USER_BUYER);

        return $brand_count + $buyer_count;
    }

    public function listPendingUsers()
    {
        return $this->userModel->listUsersByStatus(Model_User::STATUS_USER_PENDING);
    }

    public function allowUser($userId)
    {
        $this->userModel->updateUserStatus($userId, Model_User::STATUS_USER_NORMAL);
        $this->userModel->updateUserAttrStatus($userId, Model_User::STATUS_USER_NORMAL);
        $this->brandModel->updateBrandStatus($userId, Model_User::STATUS_USER_NORMAL);

        return true;
    }

    public function rejectUser($userId)
    {
        $this->userModel->updateUserStatus($userId, Model_User::STATUS_USER_REJECTED);
        $this->userModel->updateUserAttrStatus($userId, Model_User::STATUS_USER_REJECTED);
        $this->brandModel->updateBrandStatus($userId, Model_User::STATUS_USER_NORMAL);

        return true;
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

    /**
     * @param $userId
     * @param $roleType
     * @return bool
     * @throws Kohana_Exception
     */
    public function updateUser($userId, $roleType)
    {
        try {
            Database::instance()->begin();

            $this->updateUserAttr($userId);

            if ($roleType == Model_User::TYPE_USER_BRAND) {
                $this->updateBrandInfo($userId);
            }

            Database::instance()->commit();

            return true;
        } catch (Exception $e) {
            Database::instance()->rollback();
            return false;
        }
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function updateUserAttr($userId)
    {
        $firstName      = Request::current()->getParam('firstName');
        $lastName       = Request::current()->getParam('lastName');
        $displayName    = Request::current()->getParam('displayName');
        $tel            = Request::current()->getParam('tel');
        $mobile         = Request::current()->getParam('mobile');
        $companyAddr    = Request::current()->getParam('companyAddr');
        $companyCountry = Request::current()->getParam('companyCountry');
        $companyZip     = Request::current()->getParam('companyZip');
        $companyTel     = Request::current()->getParam('companyTel');
        $companyWebsite = Request::current()->getParam('companyWebsite');

        $rowUpdated = $this->userModel->updateUserAttr($userId, $firstName, $lastName, $displayName, $tel, $mobile, $companyAddr, $companyCountry, $companyZip, $companyTel, $companyWebsite);
        return $rowUpdated;
    }

    /**
     * @param $userId
     * @return mixed
     * @throws Kohana_Exception
     */
    public function updateBrandInfo($userId)
    {
        // generate brand info
        $designerName  = Request::current()->getParam('designerName');
        $imagePath     = Request::current()->getParam('imagePath');
        $brandUrl      = Request::current()->getParam('brandUrl');
        $categoryType  = Request::current()->getParam('categoryType');
        $description   = Request::current()->getParam('description');

        $brandInfo = $this->brandModel->getByUserId($userId);
        if (empty($brandInfo)) {
            $errorInfo = Kohana::message('message', 'STATUS_ERROR');
            throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
        }

        // 如果url未更新,则不操作
        if ($brandInfo['brand_url'] != $brandUrl) {
            $brandUrl = urlencode($this->safeFileName($brandUrl));

            $brandUrlExist = $this->checkBrandUrl($brandUrl, $brandInfo['id']);
            if ($brandUrlExist) {
                $errorInfo = Kohana::message('message', 'STATUS_ERROR');
                throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
            }
        }

        // 如果图片未更新过,则不重新生成
        if ($brandInfo['brand_image'] != $imagePath) {
            list($realPathFile, $mediumPathFile, $smallPathFile) = $this->uploadService->createThreeImage($imagePath);
            $imagePath = $mediumPathFile;
        }

        $rowUpdated = $this->userModel->updateBrandInfo($userId, $designerName, $brandUrl, $imagePath, $categoryType, $description);

        return $rowUpdated;
    }
} 
