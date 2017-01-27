<?php

namespace Zf2Tus;

return [
    'router' => [
        'routes' => [
            'attachments' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/attachments',
                    'defaults' => [
                        '__NAMESPACE__' => __NAMESPACE__.'\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/[:controller[/:action]]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'params' => array(
                                'type' => 'Wildcard',
                                'options' => [
                                    'key_value_delimiter' => '.',
                                    'param_delimiter' => '/',
                                ],
                                'may_terminate' => true,
                            ),
                        ],
                    ],
                ]
            ],
        ],
    ],
];