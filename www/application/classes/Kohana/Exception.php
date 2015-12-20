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
        Business_LogUtil::log('exception', $e->getMessage(), '', Business_LogUtil::PLOG_FATAL);

        // 处理error code和error message
        if ($e->getCode() === 404) {
            $errorCode = 404;
            $errorMsg = '您所查找的页面不存在';
            
            $errorMsg = HTML::entities($errorMsg);
            
            $opUser = $_SESSION['opUser'];
            
            $view = View::factory('errors/error_msg');
            
            if(!empty($opUser)) {
                $view->set('user', $opUser);
                $userService = new Business_User();
                $view->set('userAttr', $userService->getUserAttr($opUser['id']));
            }
            
            $view->set('errorCode', $errorCode);
            $view->set('errorMsg', $errorMsg);
            
            echo $view->render();
        } else {
            $errorInfo = Kohana::message('message','STATUS_ERROR');
            $errorMsg = $errorInfo['msg'];
            
            ob_clean();
            
            echo json_encode(array(
                'status' => STATUS_ERROR,
                'msg' => HTML::entities($errorMsg),
            ));
            
            ob_end_flush();
            flush();
        }

        exit(0);
    }
}