<?php
/** @var string $type */
/** @var \yii\db\ActiveRecord[] $items */
use yii\helpers\Html;


echo Html::tag('h3', 'Список');
if ($type === 'contact') {
    echo Html::beginTag('ul', ['class' => 'list-group']);
    foreach ($items as $item) {
        echo Html::tag(
            'li',
            Html::encode($item->name . ' ' . $item->surname),
            [
                'class' => 'list-group-item list-item',
                'data-id' => $item->id,
                'data-type' => 'contact',
            ]
        );
    }
    echo Html::endTag('ul');
    return;
}



if ($type === 'deal') {
    echo Html::beginTag('ul', ['class' => 'list-group']);
    foreach ($items as $item) {
        $label = $item->title;
        echo Html::tag(
            'li',
            Html::encode($label),
            [
                'class' => 'list-group-item list-item',
                'data-id' => $item->id,
                'data-type' => 'deal',
            ]
        );
    }
    echo Html::endTag('ul');
    return;
}

echo '';


