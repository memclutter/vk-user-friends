<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');
defined('HEROKU_APP') or define('HEROKU_APP', getenv('HEROKU_APP'));

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

if (!HEROKU_APP) {
    $dotenv = new \Dotenv\Dotenv(dirname(__DIR__));
    $dotenv->load();
}

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
