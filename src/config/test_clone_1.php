<?php
$params = require __DIR__ . '/params.php';

/**
 * Application configuration shared by all test types
 */
$config = [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@tests' => '@app/../tests',
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql-clone-1;port=3306;dbname=test_performance_test',
            'username' => 'test',
            'password' => 'test',
            'charset' => 'utf8',
        ],
    ],
    'params' => $params,
];

return $config;
