<?php

namespace app\modules\common\controllers;

use yii\web\ErrorAction;

class ErrorController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => ErrorAction::class,
            ],
        ];
    }
}
