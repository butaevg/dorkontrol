<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'language'=>'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'C4s7M3LOvnLb8vs2x3axhba7TSlPlMJM', 
            'baseUrl' => '',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '' => 'page/index',
                'appeal' => 'appeal/index',
                '<action>'=>'page/<action>',
                'page/list/'=>'page/list',
                'page/create'=>'page/create',
                'page/update/<id:\d+>' => 'page/update', 
                'page/<slug:[a-z0-9_\-]+>' => 'page/view',
                'road/progress/<id:\d+>' => 'road/progress',
                'camera/<id:\d+>' => 'camera/view',
                'map/<id:\d+>' => 'map/view',
                'machine/delete/<id:\d+>' => 'machine/delete',
                'machine/<action>/<working:\d+>' => 'machine/<action>',   
                'org/<dep_id:\d+>/<cat:\d+>' => 'org/view',     
                'org/update/<id:\d+>' => 'org/update',     
                'psd/exec/<id:\d+>' => 'psd/exec',  
                'road/update/<id:\d+>' => 'road/update',    
                'road/reportlist/<road_id:\d+>' => 'road/reportlist', 
                'road/createreport/<road_id:\d+>' => 'road/createreport', 
                'road/upload/<report_id:\d+>' => 'road/upload',
                'docs/<category_id:\d+>' => 'docs/index',
                'docs/manage/<category_id:\d+>' => 'docs/manage',
                'docs/create' => 'docs/create',
                'docs/update/<id:\d+>' => 'docs/update',
                'docs/upload/<category_id:\d+>' => 'docs/upload', 
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'page/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'formatter' => [
            'timeZone' => 'UTC'
        ],
        'thumbnail' => [
            'class' => 'sadovojav\image\Thumbnail',
            'cachePath' => '@webroot/upload/thumbnails', 
            'basePath' => '@webroot/upload/', 
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'js/jquery-1.8.min.js',
                    ]
                ]
            ]
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
