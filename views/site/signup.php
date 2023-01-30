<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Регистрация';
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Для регистрации пожалуйста заполните поля:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'login')->label('Логин') ?>
            <?= $form->field($model, 'date_born')->textInput(['placeholder' => '2000-12-30'])->label('Дата рождения (Год-Месяц-День)') ?>
            <?= $form->field($model, 'id_city')->dropDownList(['Не указан','Санкт-Петербург','Москва','Екатеринбург'])->label('Город') ?>
            <?= $form->field($model, 'id_currency')->dropDownList(['Рубль','Доллар','Евро','Bitcoin'])->label('Валюта') ?>
            <?= $form->field($model, 'phone')->textInput(['class' => 'form-control form-control-lg', 'type' => 'phone', 'placeholder' => '8-999-999-99-99'])->label('Телефон') ?>
            <?= $form->field($model, 'email')->textInput(['class' => 'form-control form-control-lg', 'type' => 'phone', 'placeholder' => 'example@example.ru'])->label('Почта') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>