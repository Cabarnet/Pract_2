<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ordering $model */

$this->title = 'Create Ordering';
$this->params['breadcrumbs'][] = ['label' => 'Orderings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordering-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
