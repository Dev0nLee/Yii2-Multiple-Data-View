<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Deal;

/** @var yii\web\View $this */
/** @var app\models\Contact $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?php
    $dealItems = ArrayHelper::map(Deal::find()->all(), 'id', function ($d) { return $d->title . ' (' . Yii::$app->formatter->asDecimal($d->amount, 2) . ')'; });
    ?>
    <?= $form->field($model, 'deal_id')->listBox($dealItems, ['multiple' => true, 'size' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
