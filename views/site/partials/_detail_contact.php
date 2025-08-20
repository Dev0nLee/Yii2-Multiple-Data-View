<?php
/** @var app\models\Contact $model */
use yii\helpers\Html;

echo Html::tag('h3', 'Контакт');
echo '<table class="table table-bordered">';
echo '<tr><th>Id контакта</th><td>' . Html::encode($model->id) . '</td></tr>';
echo '<tr><th>Имя</th><td>' . Html::encode($model->name) . '</td></tr>';
echo '<tr><th>Фамилия</th><td>' . Html::encode($model->surname) . '</td></tr>';
if ($model->deals) {
    foreach ($model->deals as $deal) {
        $label = $deal->title . ' (' . Yii::$app->formatter->asDecimal($deal->amount, 2) . ')';
        echo '<tr><th>Id сделки ' . Html::encode($deal->id) . '</th>' . '<td>' . Html::encode($label) . '</td></tr>';
    }
} else {
    echo '</table>';
    echo Html::tag('h2', 'Нет сделок');
}

echo '</table>';




