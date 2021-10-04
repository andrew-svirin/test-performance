<?php
$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@tests' => '@app/../tests',
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql;port=3306;dbname=test_performance',
            'username' => 'test',
            'password' => 'test',
            'charset' => 'utf8',
        ],
    ],
    'params' => $params,
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\faker\FixtureController',
            'templatePath' => '@tests/templates/fixtures',
            'fixtureDataPath' => '@tests/fixtures/data',
            'namespace' => 'tests\fixtures',
        ],
    ],
];

return $config;
