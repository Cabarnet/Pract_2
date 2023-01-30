<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReviewVideo $model */

$this->title = 'Create Review Video';
$this->params['breadcrumbs'][] = ['label' => 'Review Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
