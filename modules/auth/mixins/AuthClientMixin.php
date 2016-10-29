<?php

namespace app\modules\auth\mixins;

use app\modules\auth\Module;

trait AuthClientMixin
{
    /**
     * @param $id
     * @return \yii\authclient\ClientInterface
     */
    public function getAuthClient($id)
    {
        return Module::getInstance()->getAuthClient($id);
    }
}