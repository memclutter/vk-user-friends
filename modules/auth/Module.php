<?php

namespace app\modules\auth;
use Yii;
use yii\authclient\Collection;
use yii\base\InvalidConfigException;

/**
 * auth module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\auth\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * @param $id
     * @return \yii\authclient\ClientInterface
     * @throws InvalidConfigException
     */
    public function getAuthClient($id)
    {
        if (!Yii::$app->has('authClientCollection')) {
            throw new InvalidConfigException('Auth client collection not configured');
        }

        /** @var Collection $authClientCollection */
        $authClientCollection = Yii::$app->get('authClientCollection');

        return $authClientCollection->getClient($id);
    }
}
