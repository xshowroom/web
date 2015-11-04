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
 * query之间的分隔符
 */
define('WORD_SEPARATOR', "\n");
