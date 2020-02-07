<?php
namespace Zf2Tus;

use Zf2Tus\Controller\Factory\IndexControllerFactory;

return array(
    'controllers' => array(
        'factories' => array(
            __NAMESPACE__.'\Controller\Index' => IndexControllerFactory::class,
        ),
    ),
    'view_manager' => [
        'template_path_stack' => [
            __NAMESPACE__ => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view'
        ]
    ],
    'uploading' => [
        'zf_tus_server' => [
            'storage_path' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'storage',
            'allow_download_info' => false,
            'dirChmod' => octdec('0770'),
            'chunk_size' => 2000000 // not used directly, only for configuring clients
        ],
    ]
);
