<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderStatus $model */

$this->title = 'Create Order Status';
$this->params['breadcrumbs'][] = ['label' => 'Order Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
