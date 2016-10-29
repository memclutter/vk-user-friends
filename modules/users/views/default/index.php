<?php

use yii\helpers\Html;
use app\modules\users\Module;

/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ArrayDataProvider */
/* @var $userIdentity \app\modules\users\models\User */

?>

<div class="row">
    <div class="col-sm-3">
        <div class="media">
            <div class="media-left media-middle">
                <a href="#">
                    <?= Html::img($userIdentity->photo, [
                        'class' => 'media-object img-rounded',
                        'alt' => $userIdentity->first_name . ' ' . $userIdentity->last_name,
                    ]) ?>
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <?= $userIdentity->first_name ?>
                    <?= $userIdentity->last_name ?>
                </h4>
                <p>
                    <?= Html::a(
                        '<span class="glyphicon glyphicon-log-out"></span> ' . Module::t('views', 'default.index.logout'),
                        ['/users/logout/index']
                    ) ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="media">
                <div class="media-left media-middle">
                    <a href="#">
                        <?= Html::img($model->photo_50, [
                            'class' => 'media-object img-rounded',
                            'alt' => $model->first_name . ' ' . $model->last_name,
                        ]) ?>
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        <?= $model->first_name ?>
                        <?= $model->last_name ?>
                    </h4>
                    <?php if ($model->online_mobile): ?>
                        <span class="glyphicon glyphicon-phone text-success"></span>
                    <?php elseif ($model->online): ?>
                        <span class="glyphicon glyphicon-globe text-success"></span>
                    <?php else: ?>
                        <span class="glyphicon glyphicon-globe"></span>
                    <?php endif ?>
                    <span class="text-muted">
                        <?= $model->status ?>
                    </span>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>