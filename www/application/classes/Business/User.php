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
    
    public $userModel;
    public $msgService;

    public function __construct()
    {
        $this->userModel = new Model_User();
        $this->msgService = new Business_Message();
    }

    public function login($email, $pass)
    {
        $user = $this->userModel->getByEmailPass($email, md5($pass));

        if (!empty($user)) {
            $_SESSION['opUser'] = $user;
            unset($user['password']);
            $this->userModel->updateLoginTime($user['id']);
        }

        return $user;
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
            // generate welcome msg
            $this->msgService->createMessage($userId, __(Business_Message::AUTO_MSG_WELCOME_BRAND));

            // generate brand info
            $brandName     = Request::current()->post('brandName');
            $designerName  = Request::current()->post('designerName');
            $imagePath     = Request::current()->post('imagePath');
            $brandUrl      = $brandName;

            $extension = substr(strrchr($imagePath, '.'), 1);
            $realPathFile  = 'data/' . date('ymdHis'). substr(microtime(),2,4) . '.' . $extension;
            
            $brandExist = $this->checkBrand($brandName);
            if ($brandExist) {
                return null;
            }
            
            if (file_exists($imagePath)){
                try{
                    copy($imagePath, $realPathFile);
                    unlink($imagePath);
                } catch (Exception $e) {
                    return null;
                }                
            }

            $brandId = $this->userModel->addBrandInfo($userId, $brandName, $designerName, $brandUrl, $realPathFile);
            return $brandId;
        }
    }
    
    public function addBuyerUser()
    {
        $userId = $this->addCommonInfo();
        if (!$userId) {
            return null;
        } else {
            // generate welcome msg
            $this->msgService->createMessage($userId, __(Business_Message::AUTO_MSG_WELCOME_BRAND));

            // generate buyer info
            $name      = Request::current()->post('shopName');
            $type      = Request::current()->post('shopType');
            $colType   = Request::current()->post('collectionType');
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
    
    public function checkParam($key, $param)
    {
        switch ($key) {
            case 'email' :
                $res = $this->checkEmail($param);
                break;
            case 'brand':
                $res = $this->checkBrand($param);
                break;
            default:
                $res = $this->checkEmail($param);
                break;
        }

        if ($res) {
            return array(STATUS_ERROR, "{$key}_existed");
        } else {
            return array(STATUS_SUCCESS, 'check_ok');
        }
    }
} 
