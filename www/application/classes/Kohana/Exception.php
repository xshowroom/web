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
        if ($e->getCode() > 1000)   // 业务异常
        {
            $errorMsg = $e->getMessage();
        }
        else
        {
            $errorInfo = Kohana::message('message','STATUS_ERROR');
            $errorMsg = $errorInfo['msg'];
        }
        
        // 返回结果
        ob_clean();
            
        echo json_encode(array(
            'status' => STATUS_ERROR,
            'msg' => HTML::entities($errorMsg),
        ));
        
        ob_end_flush();
        flush();
        exit(0);
    }
}