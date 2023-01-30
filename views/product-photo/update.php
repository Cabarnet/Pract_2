<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductPhoto $model */

$this->title = 'Update Product Photo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-photo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
