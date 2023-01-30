<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderDelivery $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-delivery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'variant')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
