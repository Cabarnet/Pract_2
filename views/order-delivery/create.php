<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderDelivery $model */

$this->title = 'Create Order Delivery';
$this->params['breadcrumbs'][] = ['label' => 'Order Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-delivery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
