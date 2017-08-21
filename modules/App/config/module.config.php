<?php

namespace App;

use Zend\Router\Http\Literal;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Front\FrontController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Front\FrontController::class => Factory\Front\FrontControllerFactory::class,
        ],
    ],
    'form_elements' => [
        'factories' => [
            Front\LanguageSelect::class => Factory\Front\LanguageSelectFactory::class,
        ],
    ],
    'view_manager' => [
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout'   => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'       => __DIR__ . '/../view/error/404.phtml',
            'error/index'     => __DIR__ . '/../view/error/index.phtml',
            'app/front/index' => __DIR__ . '/../view/app/front/index.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];