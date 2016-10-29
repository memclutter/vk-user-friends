<?php

namespace app\modules\auth\mixins;

use app\modules\auth\Module;
use yii\authclient\clients\VKontakte;

trait AuthClientMixin
{
    /**
     * @param $id
     * @return \yii\authclient\ClientInterface|VKontakte
     */
    public static function getAuthClient($id)
    {
        return Module::getInstance()->getAuthClient($id);
    }
}