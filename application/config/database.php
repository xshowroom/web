<?php defined('SYSPATH') || die('No direct access allowed.');

return array
(
    'default' => array
    (
        'proxy1' => array
        (
            'type'       => 'MySQL',
            'connection' => array(
                /**
                 * The following options are available for MySQL:
                 *
                 * string   hostname     server hostname, or socket
                 * string   database     database name
                 * string   username     database username
                 * string   password     database password
                 * boolean  persistent   use persistent connections?
                 * array    variables    system variables as "key => value" pairs
                 *
                 * Ports and sockets may be appended to the hostname.
                 */
                'hostname'   => 'xiaotao.cloudapp.net:3306',// 10.42.3.33:6008
                'database'   => 'xshowroom',
                'username'   => 'root',
                'password'   => '123456',
                'persistent' => false,
            ),
            'table_prefix' => '',
            'charset'      => 'utf8',
            'caching'      => false,
        ),
        
        'proxy2' => array
        (
            'type'       => 'MySQL',
            'connection' => array(
                'hostname'   => 'xiaotao.cloudapp.net:3306',
                'database'   => 'xshowroom',
                'username'   => 'root',
                'password'   => '123456',
                'persistent' => false,
            ),
            'table_prefix' => '',
            'charset'      => 'utf8',
            'caching'      => false,
        ),
    ),
);