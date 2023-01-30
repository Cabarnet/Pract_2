<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserAddress $model */

$this->title = 'Create User Address';
$this->params['breadcrumbs'][] = ['label' => 'User Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
