<?php

use yii\helpers\Html;
use app\modules\users\Module;

/* @var $this yii\web\View */

?>

<div class="jumbotron">
    <p>
        <?= Module::t('views', 'login.index.content') ?>
    </p>
    <?= Html::a(Module::t('views', 'login.index.authorize'), ['/auth/default/index', 'authclient' => 'vk'], [
        'class' => 'btn btn-primary',
    ]) ?>
</div>