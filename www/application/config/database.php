<?php defined('SYSPATH') || die('No direct access allowed.');

return array
(
    'default' => array
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
                'hostname'   => '168.63.141.144:3306',
                'database'   => 'xshowroom',
                'username'   => 'root',
                'password'   => '123456',
                'persistent' => false,
            ),
            'table_prefix' => '',
            'charset'      => 'utf8',
            'caching'      => false,
    ),
);