<?php

use yii\helpers\Html;
use app\models\Contact;
use app\models\Deal;
use app\models\ContactDeal;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Contacts&Deals';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs(
    "window.appRoutes = {\n\tlist: '" . Url::to(['site/list']) . "',\n\tdetail: '" . Url::to(['site/detail']) . "'\n};",
    \yii\web\View::POS_HEAD
);
$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::class]]);
?>
<div class="site-index">


    <div class="body-content">


        <div class="row">
            <div class="col-lg-12 mb-3">
                <h2>Контакты и Сделки</h2>
            </div>
        </div>

        <table class="three-col-table" style="width:100%">
            <tbody>
                <tr>
                    <td id="menu-list" class="col-menu">
                        <h3>Меню</h3>
                        <ul id="menu" class="list-group">
                            <li class="list-group-item menu-item" data-id="contacts">Контакты</li>
                            <li class="list-group-item menu-item" data-id="deals">Сделки</li>
                        </ul>
                    </td>
                    <td class="col-lists" id="list"></td>
                    <td class="col-content" id="content" rowspan="3"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
