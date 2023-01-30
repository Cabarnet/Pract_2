<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReviewVideo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_review')->textInput() ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
