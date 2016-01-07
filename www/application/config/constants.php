<?php defined('SYSPATH') || die('No direct script access.');

/**
 * 报告响应状态码
 */
define('STATUS_SUCCESS',    0);     // 正常/成功
define('STATUS_ERROR',      1);     // 错误/失败
define('STATUS_REDIRECT',   2);     // 重定向

/**
 * 数据库记录的状态常量
 */
define('STAT_NORMAL',    0);        // 正常
define('STAT_SUSPENDED', 1);        // 暂停
define('STAT_DELETED',   2);        // 删除

/**
 * 数据库记录的状态常量
 */
define('LOGIN_SUCCESS', 0);        // 登陆成功
define('LOGIN_FAILURE', 1);        // 登陆失败
define('LOGIN_ERRCODE', 2);       // 验证码错误

/**
 * query之间的分隔符
 */
define('WORD_SEPARATOR', "\n");

/**
 * 系统相关
 */
// define('SITE_DOMAIN', 'http://xiaotao.cloudapp.net');
// define('SITE_PORT', '');
// define('BASE_URI', 'web');
// define('WEB_ROOT', SITE_DOMAIN . '/' . BASE_URI);
// define('ROOT_DIR', '/home/dev_root/xshowroom/' . BASE_URI);
define('UPLOAD_DIR', 'data');


/**
 * ADMIN - MAILBOX
 */
define('ADMIN_EMAIL', 'info@xshowroom.com');
