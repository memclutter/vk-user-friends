<?php

namespace app\modules\auth\models;

use app\modules\users\models\User;
use Yii;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;

class AuthHandler
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * AuthHandler constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function handle()
    {
        $attributes = $this->client->getUserAttributes();

        $socialId = ArrayHelper::getValue($attributes, 'id');
        $username = ArrayHelper::getValue($attributes, 'screen_name',
            ArrayHelper::getValue($attributes, 'nickname')
        );

        if (Yii::$app->user->isGuest) {
            $user = User::findOne([
                'social_id' => $socialId,
                'username' => $username,
            ]);

            if ($user) {
                $this->updateUserInfo($user);
            } else {
                $user = $this->signUpUser();
            }

            Yii::$app->user->login($user);
        }
    }

    private function signUpUser()
    {
        $attributes = $this->client->getUserAttributes();

        $socialId = ArrayHelper::getValue($attributes, 'id');
        $username = ArrayHelper::getValue($attributes, 'screen_name',
            ArrayHelper::getValue($attributes, 'nickname')
        );

        $user = new User([
            'social_id' => $socialId,
            'username' => $username,
            'first_name' => ArrayHelper::getValue($attributes, 'first_name'),
            'last_name' => ArrayHelper::getValue($attributes, 'last_name'),
        ]);

        $user->save();

        return $user;
    }

    private function updateUserInfo(User $user)
    {
        $attributes = $this->client->getUserAttributes();

        $user->first_name = ArrayHelper::getValue($attributes, 'first_name', $user->first_name);
        $user->last_name = ArrayHelper::getValue($attributes, 'last_name', $user->last_name);

        $user->save();
    }
}