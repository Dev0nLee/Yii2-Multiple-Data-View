<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ContactDeal $model */

$this->title = 'Create Contact Deal';
$this->params['breadcrumbs'][] = ['label' => 'Contact Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-deal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
