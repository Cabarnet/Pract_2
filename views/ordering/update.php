<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ordering $model */

$this->title = 'Update Ordering: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orderings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ordering-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
