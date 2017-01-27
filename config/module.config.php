<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */
namespace Zf2Tus;

return array(
    'controllers' => array(
        'invokables' => array(
            __NAMESPACE__.'\Controller\Index' => __NAMESPACE__.'\Controller\IndexController',
        ),
    ),
    'view_manager' => [
        'template_path_stack' => [
            __NAMESPACE__ => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view'
        ]
    ],
    'uploading' => [
        'zf_tus_server' => [
            'storage_patch' => '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'storage',
            'allow_download_info' => false,
            'dirChmod' => octdec('0770'),
        ],
    ]
);
