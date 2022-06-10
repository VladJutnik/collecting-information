<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Director */

$this->title = 'Просмотр анкеты';
$this->params['breadcrumbs'][] = ['label' => 'Анкета', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    .table-anket-views {
        border-collapse: collapse; /*убираем пустые промежутки между ячейками*/
        border: 1px solid #000000; /*устанавливаем для таблицы внешнюю границу серого цвета толщиной 1px*/
        font-size: 12px;
        margin-right: 35px;
        font-family: serif !important;
    }
    .director-view {
        font-size: 12px;
        font-family: serif !important;
    }
</style>
<div class="director-view container">
    <div align="center"><b>АНКЕТА ДЛЯ ОЦЕНКИ ОРГАНИЗАЦИИ ПИТАНИЯ ОБУЧАЮЩИХСЯ В ОБЩЕОБРАЗОВАТЕЛЬНЫХ ОРГАНИЗАЦИЯХ</b></div>
    <div align="center"><i>(для родителей и детей)</i></div>
    <?
    if ($stausButtom == 1) {
        if (Yii::$app->user->can('admin')) {
            echo Html::a(
                'Отредактировать',
                ['create?id='.$model['id']],
                [
                    'title' => Yii::t('yii', 'Редактировать информацию'),
                    'data-toggle' => 'tooltip',
                    'class' => 'btn btn-sm btn-primary btn-block',
                ]
            );
        }
        echo Html::a(
            'Напечатать',
            ['print-anket?id='.$model['id']],
            [
                'title' => Yii::t('yii', 'Напечатать анкету'),
                'data-toggle' => 'tooltip',
                'class' => 'btn btn-sm btn-warning btn-block',
            ]
        );
    } ?>
    <div><b>Федеральный округ:</b> <?=Yii::$app->myComponent->get_federal_name($model->federal_district_id)?></div>
    <div><b>Cубъект федерации: </b> <?=Yii::$app->myComponent->get_region_name($model->region_id)?></div>
    <div><b>Муниципальное образование: </b> <?=Yii::$app->myComponent->get_municipality_name($model->municipality_id)?></div>
    <div><b>1. № анкеты: </b> <?=$model->number_anket?></div>
    <div><b>2. Школа: </b> <?=Yii::$app->myComponent->get_orgainization_name($model->organization_id)?></div>
    <div><b>3. Класс: </b> <?=$model->field1_1?></div>
    <div><b>4. Дата заполнения анкеты: </b> <?=$model->field1_2?></div>
    <div><b>5. Дата рождения ребенка: </b> <?=$model->field1_3?></div>
    <div><b>6. Возраст ребенка: </b> <?=$model->field1_4?></div>
    <div><b>7. Пол ребенка: </b> <?=$model->field1_5?></div>
    <div><b>8. Состав семьи: </b> <?=$model->field1_6?></div>
    <div><b>9. Образование мамы: </b> <?=$model->field1_7?></div>
    <div><b>10. Образование папы: </b> <?=$model->field1_8?></div>
    <div><b>11.	Оцените уровень доходов Вашей семьи: </b> <?=$model->field1_9?></div>
    <div><b>12.	В какую смену учится Ваш ребенок: </b> <?=$model->field1_10?></div>
    <div><b>13.	Сколько времени ребенок в среднем находится в школе в часах: </b> <?=$model->field1_11?></div>
    <div style = "margin-left: 10px">13.1. Посещает ли ребенок группу продленного дня? <?=$model->field1_12?></div>
    <div style = "margin-left: 10px">13.2. Посещает ли ребенок в школе дополнительные занятия, кружки, студии, спортивные секции? </b> <?=$model->field1_13?></div>
    <div style = "margin-left: 10px">13.3. Уходит домой сразу после уроков? <?=$model->field1_14?></div>
    <div><b>14.	Укажите сколько месяцев назад проводили измерение веса и роста у ребенка: </b> <?=$model->field1_15?></div>
    <div><b>15. Укажите какой был при последнем измерении вес и рост ребенка:</b></div>
    <div style = "margin-left: 10px">15.1. вес ребенка (в кг): <?=$model->field1_16?></div>
    <div style = "margin-left: 10px">15.2. рост ребенка (в см): <?=$model->field1_17?></div>
    <div><b>16. Укажите на момент исследования данные матери:</b></div>
    <div style = "margin-left: 10px">16.1. вес матери (в кг): <?=$model->field1_18?></div>
    <div style = "margin-left: 10px">16.2. рост матери (в см): <?=$model->field1_19?></div>
    <div><b>17. Укажите на момент исследования данные отца:</b></div>
    <div style = "margin-left: 10px">17.1. вес отца (в кг): <?=$model->field1_20?></div>
    <div style = "margin-left: 10px">17.2. рост отца (в см): <?=$model->field1_21?></div>

    <?=
    $this->render(
        '/deti-anket-table-18-27/view',
        [
            'model' => $DetiAnketTable1827,
        ]
    ); ?>
    <?=
    $this->render(
        '/deti-anket-table-28-34/view',
        [
            'model' => $DetiAnketTable2834,
        ]
    ); ?>
    <?=
    $this->render(
        '/deti-anket-table-35-44/view',
        [
            'model' => $DetiAnketTable3544,
        ]
    ); ?>
    <?=
    $this->render(
        '/deti-anket-table-45-48/view',
        [
            'model' => $DetiAnketTable4548,
        ]
    ); ?>
</div>
