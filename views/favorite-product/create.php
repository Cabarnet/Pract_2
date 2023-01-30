<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FavoriteProduct $model */

$this->title = 'Create Favorite Product';
$this->params['breadcrumbs'][] = ['label' => 'Favorite Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favorite-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
