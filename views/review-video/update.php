<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReviewVideo $model */

$this->title = 'Update Review Video: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Review Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="review-video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
