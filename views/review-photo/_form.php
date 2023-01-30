<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReviewPhoto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-photo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_review')->textInput() ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
