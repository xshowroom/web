<?php defined('SYSPATH') || die('No direct access allowed.');

return array
(
    'default' => array
    (
        'type'       => 'MySQL',
            'connection' => array(
                'hostname'   => 'rds714462713h4vlbs02.mysql.rds.aliyuncs.com:3306',
                'database'   => 'xshowroom',
                'username'   => 'xsroot',
                'password'   => '123456',
                'persistent' => false,
            ),
            'table_prefix' => '',
            'charset'      => 'utf8',
            'caching'      => false,
    ),
);