<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Memail 模块
 * 
 */
require MODPATH.'thirdparty/phpmailer/class.phpmailer.php';

class Memail
{
    /**
     * default instance name
     */
    const DEFAULT_INSTANCE_NAME = 'default';
    
    /**
     * mailer
     * @var PHPMailer
     */
    private $mailer;

    /**
     * array of instances
     * 
     * @var array
     */
    public static $instances = array();
    
    /**
     * 单例
     * 
     * @param string $name 实例名
     * @return Memail
     */
    public static function instance($name = null)
    {
        if ($name == null) {
            $name = self::DEFAULT_INSTANCE_NAME;
        }

        if (!isset(self::$instances[$name])) {
            $config = Kohana::$config->load('memail')->get($name);
            Memail::$instances[$name] = new Memail($config);
        }

        return Memail::$instances[$name];
    }

    /**
     * 构造方法，初始化配置信息
     * 
     * @param array $config 配置
     */
    public function __construct($config = null)
    {
        $this->mailer = new PHPMailer();
        
        // 设置发件人
        if (isset($config['from'])) {
            $name = isset($config['fromName']) ? $config['fromName'] : '';
            $this->mailer->SetFrom($config['from'], $name);
        }

        // 设置字符集
        if (isset($config['charset'])) {
            $this->mailer->CharSet = $config['charset'];
        }
    }
    
    /**
     * 发送邮件
     * 
     * @param mixed $to
     * @param string $subject
     * @param string $message
     * @throws Kohana_Exception
     */
    public function send($to, $subject, $message)
    {
        $this->mailer->ClearAllRecipients();
        if (!is_array($to)) {
            $to = array($to);
        }
        foreach ($to as $address) {
            $this->mailer->AddAddress($address);
        }
        $this->mailer->Subject = "=?utf-8?B?" . base64_encode($subject) . "?=";
        $this->mailer->MsgHTML($message);
        
        if (!$this->mailer->Send()) {
            throw new Kohana_Exception('邮件发送失败！');
        }
    }
    
    /**
     * 更改发件人
     * 
     * @param string $from
     * @param string $name
     * @throws Kohana_Exception
     */
    public function setFrom($from, $name = '')
    {
        $this->mailer->SetFrom($from, $name);
    }
}