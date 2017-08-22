<?php

$env = getenv('APP_ENV') ?: 'prod';
$isProd = 'prod' === $env;

return [
    'modules' => [
        'Zend\Router',
        'Zend\Validator',
        'Zend\Form',
        'BootstrapIntegration',
        'App',
    ],
    'module_listener_options' => [
        'module_paths' => ['./module', './vendor'],
        'config_glob_paths' => [__DIR__ . '/autoload/{{,*.}global,{,*.}local}.php'],
        'config_cache_enabled' => $isProd,
        'config_cache_key' => 'application.config.cache',
        'module_map_cache_enabled' => $isProd,
        'module_map_cache_key' => 'application.module.cache',
        'cache_dir' => 'data/cache/',
        'check_dependencies' => $isProd,
    ],
];