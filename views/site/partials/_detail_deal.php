<?php
/** @var app\models\Deal $model */
use yii\helpers\Html;

echo Html::tag('h3', 'Сделка');
echo '<table class="table table-bordered">';
echo '<tr><th>Id сделки</th><td>' . Html::encode($model->id) . '</td></tr>';
echo '<tr><th>Наименование</th><td>' . Html::encode($model->title) . '</td></tr>';
echo '<tr><th>Стоимость</th><td>' . Yii::$app->formatter->asDecimal($model->amount, 2) . '</td></tr>';
if ($model->contacts) {
    foreach ($model->contacts as $contact) {
        $label = $contact->name . ' ' . $contact->surname;
        echo '<tr><th>Id контакта ' . Html::encode($contact->id) . '</th>' . '<td>' . Html::encode($label) . '</td></tr>';
    }
} else {
    echo '</table>';
    echo Html::tag('h2', 'Нет контактов');
}
echo '</table>';


