<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'bucket' => env('AWS_BUCKET', 'server-files'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT', '192.168.150.50:9000'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', true),
            'throw' => false,
        ],

   	's3_sekolah1' => [
            'driver' => 's3',
            'key' => env('MINIO1_USERNAME'),
            'secret' => env('MINIO1_PASSWORD'),
            'region' => 'us-east-1', // Ganti dengan region yang sesuai
            'bucket' => 'sekolah1',
            'url' => env('MINIO_URL'),
            'endpoint' => env('MINIO_ENDPOINT', 'http://192.168.150.50:9000'),
            'use_path_style_endpoint' => true,
        ],

        's3_sekolah2' => [
            'driver' => 's3',
            'key' => env('MINIO_ACCESS_KEY'),
            'secret' => env('MINIO_SECRET_KEY'),
            'region' => 'us-east-1',
            'bucket' => 'sekolah2',
            'url' => env('MINIO_URL'),
            'endpoint' => env('MINIO_ENDPOINT', 'http://192.168.150.50:9000'),
            'use_path_style_endpoint' => true,
        ],

        's3_sekolah3' => [
            'driver' => 's3',
            'key' => env('MINIO_ACCESS_KEY'),
            'secret' => env('MINIO_SECRET_KEY'),
            'region' => 'us-east-1',
            'bucket' => 'sekolah3',
            'url' => env('MINIO_URL'),
            'endpoint' => env('MINIO_ENDPOINT', 'http://192.168.150.50:9000'),
            'use_path_style_endpoint' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
