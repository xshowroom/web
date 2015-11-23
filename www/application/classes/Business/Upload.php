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
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            if (empty($extension)) {
                return null;
            }
            // 上传文件夹不存在则创建
            if (!is_dir(UPLOAD_DIR)) {
                mkdir(UPLOAD_DIR, 0777);
            }
            // 临时文件夹不存在则创建
            if (!is_dir(UPLOAD_DIR. '/tmp/')) {
                mkdir(UPLOAD_DIR. '/tmp/', 0777);
            }
            // 文件名随机
            $realPathFile = UPLOAD_DIR. '/tmp/' . date('ymdHis'). substr(microtime(),2,4). '.'. $extension;
            // 如果已经存在文件，可将其删除
            if (file_exists($realPathFile)){
                unlink($realPathFile);
            }
            // 将临时文件拷贝到指定位置
            $result = move_uploaded_file($file['tmp_name'], $realPathFile);
            chmod($realPathFile, 0777);
            if ($result === false) {
                return null;
            }
        } catch (Exception $e) {
            return null;
        }
        
        return $realPathFile;
    }
    
    public function resize($filename, $percent, $suffix = 'medium')
    {
        // 获取新的尺寸
        list($width, $height) = getimagesize($filename);
        $new_width = $width * $percent;
        $new_height = $height * $percent;
        
        // 重新取样
        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
        $temp = pathinfo($filename);
        $output = "{$temp['dirname']}/{$temp['filename']}_{$suffix}.{$temp['extension']}";
        
        // 输出
        imagejpeg($image_p, $output, 100);
        
        return $output;
    }
    
    public function createThreeImage($imagePath)
    {
        $extension = substr(strrchr($imagePath, '.'), 1);
        $realPathFile  = 'data/' . date('ymdHis'). substr(microtime(),2,4) . '.' . $extension;
    
        if (file_exists($imagePath)){
            try{
                copy($imagePath, $realPathFile);
                // 生成medium图和small图
                $mediumPathFile = $this->uploadService->resize($realPathFile, 0.5, 'medium');
                $smallPathFile = $this->uploadService->resize($realPathFile, 0.2, 'small');
            } catch (Exception $e) {
                $errorInfo = Kohana::message('message', 'IMAGE_ERROR');
                throw new Kohana_Exception($errorInfo['msg'], null, $errorInfo['code']);
            }
        }
    
        return array($realPathFile, $mediumPathFile, $smallPathFile);
    }
} 
