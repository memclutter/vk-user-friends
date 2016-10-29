<?php

namespace app\modules\users\controllers;

use app\modules\auth\mixins\AuthClientMixin;
use app\modules\users\models\Friend;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `users` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $userIdentity = Yii::$app->user->getIdentity();
        $dataProvider = new ArrayDataProvider([
            'allModels' => Friend::findFiveRandom(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'userIdentity' => $userIdentity,
        ]);
    }
}
