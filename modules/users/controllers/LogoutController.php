<?php

namespace app\modules\users\controllers;

use Yii;
use yii\web\Controller;

class LogoutController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}