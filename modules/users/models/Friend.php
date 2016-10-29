<?php

namespace app\modules\users\models;

use app\modules\auth\mixins\AuthClientMixin;
use app\modules\users\exceptions\FriendsNotFoundException;
use yii\base\Model;

class Friend extends Model
{
    use AuthClientMixin;

    public $uid;
    public $first_name;
    public $last_name;
    public $photo_50;
    public $photo_100;
    public $photo_200;
    public $online;
    public $status;
    public $user_id;
    public $lists;
    public $online_mobile;
    public $online_app;
    public $deactivated;
    public $status_audio;

    /**
     * @return Friend[]
     * @throws FriendsNotFoundException
     */
    public static function findFiveRandom()
    {
        $result = static::getAuthClient('vk')->api('friends.get', 'GET', [
            'count' => 5,
            'order' => 'random',
            'fields' => ['first_name', 'last_name', 'photo_50', 'photo_100', 'photo_200', 'online', 'status'],
        ]);

        if (!isset($result['response']) || empty($result['response'])) {
            throw new FriendsNotFoundException();
        }

        $friends = [];
        foreach ($result['response'] as $item) {
            $friends[] = new static($item);
        }

        return $friends;
    }
}