<?php defined('SYSPATH') || die('No direct script access.');
/**
 * 自定义异常
 * 
 */
class Kohana_Exception extends Kohana_Kohana_Exception
{
    /**
     * 构造函数
     * 
     * @param   string          $message    错误msg
     * @param   array           $variables  msg中的填充值
     * @param   integer|string  $code       错误code
     * @return  void
     */
    public function __construct($message, $variables = null, $code = 0)
    {
        parent::__construct($message, $variables, $code);
    }
    
    /**
     * 处理异常
     * 
     * @param Exception $e
     * @return void
     */
    public static function _handler(Exception $e)
    {
        Business_LogUtil::log('exception', $e->getMessage(), $e->getFile().':'.$e->getLine(), Business_LogUtil::PLOG_FATAL);

        // 处理error code和error message
        if ($e->getCode() === 404) {
            $errorCode = 404;
            $errorMsg = 'other__404_MSG';
        } else {
            $errorCode = 500;
            $errorInfo = Kohana::message('message','STATUS_ERROR');
            $errorMsg =  $errorInfo['msg'];
        }
        
        $view = View::factory('errors/error_msg');
        $errorMsg = HTML::entities($errorMsg);
        
        $opUser = $_SESSION['opUser'];
        $lang = empty($_COOKIE['language']) ? 'zh-CN' : $_COOKIE['language'];
        I18n::lang($lang);

        if(!empty($opUser)) {
            $view->set('user', $opUser);
            $userService = new Business_User();
            $view->set('userAttr', $userService->getUserAttr($opUser['id']));
        }
        
        $view->set('errorCode', $errorCode);
        $view->set('errorMsg', __($errorMsg));
        
        echo $view->render();
        
        exit(0);
    }
}