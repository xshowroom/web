<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author liyashuai
 */
class Business_Upload
{
    
    // 上传超时
    const TIME_LIMIT = 60;
    
    // 上传最大内存使用
    const MEMORY_LIMIT = '1024M';
    
    public function __construct()
    {
    }

    public function image()
    {
        // 图片上传需要设置上传超时和上传最大内存
        set_time_limit(self::TIME_LIMIT);
        ini_set('memory_limit', self::MEMORY_LIMIT);
         
        // 判断请求大小并且验证请求中是否包含文件
        if (Request::post_max_size_exceeded() || !isset( $_FILES["file"])) {
            return null;
        }
        
        // 处理图片上传
        try {
            $file = $_FILES['file'];
            // 上传文件夹不存在则创建
            if (!is_dir(UPLOAD_DIR)) {
                mkdir($realPath, 0777);
            }
            // 文件名随机
            $realPathFile = UPLOAD_DIR. '/tmp/' . date('ymdHis'). substr(microtime(),2,4);
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
        
        return $realPathFile;
    }
} 
