<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LikeRating $model */

$this->title = 'Create Like Rating';
$this->params['breadcrumbs'][] = ['label' => 'Like Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="like-rating-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
