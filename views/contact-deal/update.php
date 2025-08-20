<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ContactDeal $model */

$this->title = 'Update Contact Deal: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contact Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-deal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
