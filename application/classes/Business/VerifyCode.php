<?php defined('SYSPATH') || die('No direct script access.');

/**
 * 验证码service类
 * 
 * @author shenpeipei
 */
class Business_VerifyCode
{
    static $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function __construct()
    {
        session_start();
    }

    /**
     * 生成随机字面火数字
     * 
     * @param int $len 验证码的值的位数
     * @return string 
     */
    public function getRandomText($len)
    {
        $code = '';
        for ($i = 0; $i < $len; $i++) { 
            $index = rand(0, 61);
            $code .= substr(self::$alphabet, $index, 1);
        }
        
        return $code;
    }

    /**
     * 生成验证码的值
     * 
     * @param int $len 验证码的值的位数
     * @return string 
     */
    public function generateCodeValue($len = 4)
    {
        $code = $this->getRandomText($len);
        
        $key = 'verifycode_' . session_id();
        $_SESSION[$key] = $code;
        
        return $code;
    }
    
    /**
     * 获取当前页面展现的验证码，从缓存中拿，如果获取不到，返回''
     *
     * @return string 验证码
     */
    public function getCodeValue()
    {
        $key = 'verifycode_' . session_id();
        $codeValue = $_SESSION[$key];
        
        return $codeValue;
    }
    
    /**
     * 删除缓存中的验证码
     * 
     * @return void
     */
    public function delCodeValue()
    {
        $key = 'verifycode_' . session_id();
        unset($_SESSION[$key]);
    }
    
    /**
     *
     * 验证码宽度
     *
     * @var int
     */
    const IMAGE_CODE_WIDTH = 50;
    
    /**
     *
     * 验证码高度
     *
     * @var int
     */
    const IMAGE_CODE_HEIGHT = 25;
    
    /**
     * 生成验证码图片
     * 
     * @param string $codeValue 验证码的值
     * @return void
     */
    public function generateCodeImage($codeValue)
    {
        $width = self::IMAGE_CODE_WIDTH;
        $height = self::IMAGE_CODE_HEIGHT;
        $image = Imagecreate($width, $height);
        
        // 颜色
        $hex_background = "ffffff";
        $hex_foreground = "ffffff"; //"3C67BF";
        $hex_fill_color = "ffffff"; //"DDE8FC";
        $hex_font_color = "000000"; //"0000CC";
        
        $b_rgb = $this->hex2rgb($hex_background);
        $f_rgb = $this->hex2rgb($hex_foreground);
        $c_rgb = $this->hex2rgb($hex_fill_color);
        $f_ggb = $this->hex2rgb($hex_font_color);
        
        $background = ImageColorAllocate($image, $b_rgb["r"], $b_rgb["g"], $b_rgb["b"]);
        $foreground = ImageColorAllocate($image, $f_rgb["r"], $f_rgb["g"], $f_rgb["b"]);
        $fillground = ImageColorAllocate($image, $c_rgb["r"], $c_rgb["g"], $c_rgb["b"]);
        $fontground = ImageColorAllocate($image, $f_ggb["r"], $f_ggb["g"], $f_ggb["b"]);
        
        ImageFilledRectangle($image, 0, 0, $width, $height, $fillground);
        Imageline($image, 0, 0, $width, 0, $foreground);
        Imageline($image, 0, 0, 0, $height, $foreground);
        Imageline($image, $width - 1, 0, $width - 1, $height - 1, $foreground);
        Imageline($image, 0, $height - 1, $width - 1, $height - 1, $foreground);
        
        ImageColorTransparent($image, $background);
        ImageInterlace($image, true);
        
        Imagestring($image, 5, 7, 3, $codeValue, $fontground);
        
        ImagePng($image);
        ImageDestroy($image);
    }
    
    /**
     * 将hex格式的颜色转化成rgb格式形式
     *
     * @param string $hex hex格式的颜色，如"ffffff"
     * @return array rgb格式的颜色形式，如['r' => $?, 'g' => $?, 'b' => $?]
     */
    private function hex2rgb($hex)
    {
        $rgbcolor = array(
            "r" => hexdec(substr($hex, 0, 2)),
            "g" => hexdec(substr($hex, 2, 2)),
            "b" => hexdec(substr($hex, 4, 2)),
        );
        
        return $rgbcolor;
    }
    
    /**
     * 确认验证码是否匹配
     * 
     * @param string $codeValue
     * @param bool $delete 是否删除缓存中验证码的值
     * @return bool
     */
    public function verify($codeValue, $delete = true)
    {
        $codeValue = trim($codeValue);
        
        // 获取当前验证码
        $realCodeValue = $this->getCodeValue();
        
        // 比较验证码是否相同
        $same = strcasecmp($codeValue, $realCodeValue);
        
        // 验证成功，删除缓存中的验证码
        if ($same == 0 && $delete == true) {
            $this->delCodeValue();
        }
        
        if ($same == 0) {
            return true;
        } else {
            return false;
        }
    }
}