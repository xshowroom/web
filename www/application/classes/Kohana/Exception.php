<?php defined('SYSPATH') || die('No direct script access.');
/**
 * 自定义异常
 * 
 * @libin17
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
//         if ($e->getCode() > 1000)   // 业务异常
//         {
//             $errorMsg = $e->getMessage();
//         }
//         else
//         {
//             $errorInfo = Kohana::message('message','STATUS_ERROR');
//             $errorMsg = $errorInfo['msg'];
//         }
        
        // 处理error code和error message
        $errorCode = 500;
        if ($e->getCode() === 404) {
            $errorCode = 404;
        }
        if ($e->getCode() === 0) {
            $errorInfo = Kohana::message('message','STATUS_ERROR');
            $errorMsg = $errorInfo['msg'];
        } else {
            $errorMsg = $e->getMessage();
        }
        if ($errorCode == 404) {
            $errorMsg = '您所查找的页面不存在';
        }
        $errorMsg = HTML::entities($errorMsg);
        
        $view = View::factory('collection_create');
        $view->set('user', $this->opUser);
        $view->set('userAttr', $this->userService->getUserAttr($this->opUser['id']));
        $view->set('errorCode', $errorCode);
        $view->set('errorMsg', $errorMsg);
        
        $this->response->body($view);

        exit(0);
    }
}