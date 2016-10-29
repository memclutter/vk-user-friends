<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$i18n = require(__DIR__ . '/i18n.php');
$authClientCollection = require(__DIR__ . '/authClientCollection.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'auth', 'common'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'i18n' => $i18n,
        'authClientCollection' => $authClientCollection,
    ],
    'modules' => [
        'auth' => [
            'class' => 'app\modules\auth\Module',
        ],
        'common' => [
            'class' => 'app\modules\common\Module',
        ],
        'users' => [
            'class' => 'app\modules\users\Module',
        ],
    ],
    'params' => $params,
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
        'migrate' => [
            'class' => 'app\modules\common\components\console\controllers\MigrateController',
            'useTablePrefix' => true,
            'templateFile' => '@app/modules/common/views/migration.php',
            'generatorTemplateFiles' => [
                'create_table' => '@app/modules/common/views/createTableMigration.php',
                'drop_table' => '@app/modules/common/views/dropTableMigration.php',
                'add_column' => '@app/modules/common/views/addColumnMigration.php',
                'drop_column' => '@app/modules/common/views/dropColumnMigration.php',
                'create_junction' => '@app/modules/common/views/createTableMigration.php',
            ],
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
