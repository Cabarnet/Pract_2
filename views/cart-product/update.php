<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CartProduct $model */

$this->title = 'Update Cart Product: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cart Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cart-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
