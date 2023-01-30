<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LikeRating $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="like-rating-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'count_like')->textInput() ?>

    <?= $form->field($model, 'count_dislikes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
