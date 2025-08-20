<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Contact;

/** @var yii\web\View $this */
/** @var app\models\Deal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="deal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?php
    $contactItems = ArrayHelper::map(Contact::find()->all(), 'id', function ($c) { return $c->name . ' ' . $c->surname; });
    ?>
    <?= $form->field($model, 'contact_id')->listBox($contactItems, ['multiple' => true, 'size' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
