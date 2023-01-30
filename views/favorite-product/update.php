<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FavoriteProduct $model */

$this->title = 'Update Favorite Product: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Favorite Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favorite-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
