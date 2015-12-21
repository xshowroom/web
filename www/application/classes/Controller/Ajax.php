<?php defined('SYSPATH') || die('No direct script access.');
/**
 * 扩展Ajax请求控制器
 * 
 */
class Controller_Ajax extends Controller
{
    /**
     * Ajax请求入口
     * 
     * @return void
     */
    public function action_post()
    {
        $request = Request::current();
        $methods = trim($request->post('method'));
        
        // 未请求任何方法
        if (empty($methods))
        {
            echo json_encode(array(
                'status' => STATUS_ERROR,
                'msg' => '非常抱歉，系统出现错误，请稍后重试',
                'data' => '',
            ));
        }
        // 请求一个或多个方法
        else
        {
            $uriList = explode(',', $methods);
            array_walk($uriList, function (&$val){
                    $val = "api/$val";
            });
            
            ob_start();
            
            if (count($uriList) == 1) {
                $this->singleUriHandler($uriList[0]);
            } else {
                $needEchoComma = false;
                
                echo '[';
                foreach ($uriList as $uri) {
                    if ($needEchoComma) {
                        echo ',';
                    }
                    $this->singleUriHandler($uri);
                    $needEchoComma = true;
                }
                echo ']';
            }
            
            ob_end_flush();
        }
    }
    
    /**
     * 处理单个uri
     * 
     * @param string $uri
     * @return void
     */
    private function singleUriHandler($uri)
    {
        try
        {
            $st = microtime(true);
            
            Request::$initial = null;
            Request::factory($uri)->requested_with('xmlhttprequest')->post($_REQUEST)->execute();
            
            $et = microtime(true);
        }
        catch(Database_Exception $ex)
        {
            $file = $ex->getFile();
            $line = $ex->getLine();
            $msg = $ex->getMessage();
            $code = $ex->getCode();
            
            // 打log
            $msg = "mysqlerr:{$code}:{$msg}";
            Business_LogUtil::log('exception', $msg, "method:{$uri}:{$file}:{$line}", Business_LogUtil::PLOG_FATAL);
            
            // 请求出错也要输出对应的json
            echo json_encode(array(
                'status' => STATUS_ERROR,
                'msg' => '非常抱歉，系统出现错误，请稍后重试',
                'data' => '',
            ));
        }
        catch (Exception $ex)
        {
            $file = $ex->getFile();
            $line = $ex->getLine();
            $msg = $ex->getMessage();
            
            // 打log
            Business_LogUtil::log('exception', $msg, "method:{$uri}:{$file}:{$line}", Business_LogUtil::PLOG_FATAL);
            
            // 请求出错也要输出对应的json
            echo json_encode(array(
                'status' => STATUS_ERROR,
                'msg' => $msg,
                'data' => '',
            ));
        }
    }
    
    /**
     * 输出前把格式改成json
     * 
     * @see Kohana_Controller::after()
     * @return void
     */
    public function after()
    {
        // 设置header
        $this->response->headers('Content-Type', 'application/json; charset=utf-8');
    }
}