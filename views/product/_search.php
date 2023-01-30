<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'id_photo') ?>

    <?= $form->field($model, 'is_discount') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'characteristic') ?>

    <?php // echo $form->field($model, 'way_of_use') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'date_of_creation') ?>

    <?php // echo $form->field($model, 'date_of_update') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'id_company') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
