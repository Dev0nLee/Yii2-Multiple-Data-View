<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Deal $model */

$this->title = 'Создать сделку';
$this->params['breadcrumbs'][] = ['label' => 'Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
