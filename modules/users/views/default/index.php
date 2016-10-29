<?php

use yii\helpers\Html;
use app\modules\users\Module;

/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ArrayDataProvider */
/* @var $userIdentity \app\modules\users\models\User */

?>

<div class="row">
    <div class="col-sm-3">
        <p>
            <?= Html::img($userIdentity->photo, [
                'class' => 'img-circle',
            ]) ?>
            <b>
                <?= Html::encode($userIdentity->first_name) ?>
                <?= Html::encode($userIdentity->last_name) ?>
            </b>
        </p>
    </div>
    <div class="col-sm-9">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="media">
                <div class="media-left media-middle">
                    <a href="#">
                        <?= Html::img($model->photo_50, [
                            'class' => 'media-object',
                            'alt' => $model->first_name . ' ' . $model->last_name,
                        ]) ?>
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        <?= $model->first_name ?>
                        <?= $model->last_name ?>
                    </h4>
                    <?= $model->status ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>