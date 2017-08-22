<?php return [
    'view_helpers' => [
        'invokables' => [
            \Zend\Form\View\Helper\FormRow::class => \BootstrapIntegration\View\Helper\FormRow::class,
            'formRow' => \BootstrapIntegration\View\Helper\FormRow::class,
        ],
    ],
];