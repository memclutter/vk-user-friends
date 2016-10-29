<?php

namespace app\modules\common\components\console\controllers;

class MigrateController extends \yii\console\controllers\MigrateController
{
    public function confirm($message, $default = true)
    {
        return parent::confirm($message, $default);
    }
}