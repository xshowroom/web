<?php defined('SYSPATH') || die('No direct script access.');

return array(
    // 系统相关错误
    'STATUS_ERROR' => array( 'code' => STATUS_ERROR, 'msg' => '非常抱歉，系统出现错误，请稍后重试'),
    'AUTH_ERROR'   => array('code' => 2001, 'msg' => '你没有操作的权限'),
    'IMAGE_ERROR'  => array('code' => 2002, 'msg' => '生成图片出错'),
);