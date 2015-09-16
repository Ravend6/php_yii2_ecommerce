<?php
return [
    'language' => 'ru',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 'urlManager' => [
        //     'class' => 'yii\web\UrlManager',
        //     // Disable index.php
        //     'showScriptName' => false,
        //     // Disable r= routes
        //     'enablePrettyUrl' => true,
        //     'rules' => [
        //         'admin/login' => 'site/login',
        //         '<action:(login|logout)>' => 'site/<action>',
        //         '<controller:\w+>/<id:\d+>' => '<controller>/view',
        //         '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        //         '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        //         'review' => 'site/review',
        //         'accessories' => 'site/accessories',
        //         '<slug_ru>' => 'site/slug',
        //     ],
        // ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    // 'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'ravendmailer@gmail.com',
                'password' => 'mailer666666',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
];
