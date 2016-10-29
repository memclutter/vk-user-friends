<?php

namespace app\modules\users\controllers;

class LoginController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
