<?php

return array(
    'default' => array(
        'type'           => 'pdo',
        'connection'     => array(
            'dsn'        => 'mysql:host=localhost;port=3306;dbname=portfolio_db;charset=utf8mb4',
            'username'   => 'root',
            'password'   => '',
        ),
        'table_prefix'   => '',
        'charset'        => 'utf8mb4',
        'caching'        => false,
        'profiling'      => false,
        'readonly'       => false,
        'compress'       => false,
        'persistent'     => false,
        'attrs'          => array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
        ),
    ),
);