<?php
namespace Zf2Tus;

return array(
    'uploading' => [
        'zf_tus_server' => [
            'storage_path' => __DIR__ . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'storage',
            'allow_download_info' => false,
            'dirChmod' => octdec('0770'),
            'chunk_size' => 2000000 // not used directly, only for configuring clients
        ],
    ]
);
