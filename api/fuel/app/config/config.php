<?php

return array(
    'base_url'  => null,
    'url_suffix'  => '',
    'index_file' => 'index.php',
    'profiling'  => false,
    'caching' => false,
    'cache_dir' => APPPATH.'cache/',
    'cache_lifetime' => 3600,
    'ob_callback'  => null,
    'errors'  => array(
        'continue_on' => array(),
        'throttle' => 10,
        'notices' => true
    ),
    'language' => 'en',
    'language_fallback' => 'en',
    'locale' => 'en_US',
    'encoding'  => 'UTF-8',
    'server_gmt_offset'  => 0,
    'default_timezone'   => null,
    'log_threshold'    => Fuel::L_WARNING,
    'log_path'         => APPPATH.'logs/',
    'log_date_format'  => 'Y-m-d H:i:s',
    'security' => array(
        'csrf_autoload'    => false,
        'csrf_token_key'   => 'fuel_csrf_token',
        'csrf_expiration'  => 0,
        'uri_filter'       => array('htmlentities'),
        'input_filter'  => array(),
        'output_filter'  => array('htmlentities'),
        'auto_filter_output'  => true,
        'whitelisted_classes' => array(
            'Fuel\\Core\\Presenter',
            'Fuel\\Core\\Response',
            'Fuel\\Core\\View',
            'Fuel\\Core\\ViewModel',
            'Closure',
        ),
    ),
    'response' => array(
        'default_content_type' => 'application/json',
        'default_charset' => 'utf-8',
    ),
    'always_load' => array(
        'packages' => array(
            'orm',
        ),
        'config' => array(
            'db'
        ),
        'language' => array(),
        'modules' => array(),
    ),
    'module_paths' => array(
        APPPATH.'modules'.DS
    ),
    'package_paths' => array(
        PKGPATH,
    ),
);