<?php

namespace app\modules\auth\controllers;

use app\modules\auth\models\AuthHandler;
use yii\authclient\AuthAction;
use yii\authclient\ClientInterface;
use yii\web\Controller;

/**
 * Default controller for the `auth` module
 */
class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => AuthAction::class,
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    public function onAuthSuccess(ClientInterface $client)
    {
        (new AuthHandler($client))->handle();
    }
}
