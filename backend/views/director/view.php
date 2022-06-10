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
    <div align="center"><i>(опрос руководителей образовательных организаций или ответственных за питание детей,
            заполняется интервьюером)</i></div>
    <?
    if ($stausButtom == 1) {
        if (Yii::$app->user->can('director_school') && Yii::$app->user->identity->region_id == '42') {
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
    <?=
    $this->render(
        '/director-table-4/doc-table-4',
        [
            'model' => $directorTable4,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-5/doc-table-5',
        [
            'model' => $directorTable5,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-6/doc-table-6',
        [
            'model' => $directorTable6,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-7/doc-table-7',
        [
            'model' => $directorTable7,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-8/doc-table-8',
        [
            'model' => $directorTable8,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-9/doc-table-9',
        [
            'model' => $directorTable9,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-10/doc-table-10',
        [
            'model' => $directorTable10,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-11/doc-table-11',
        [
            'model' => $directorTable11,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-12/doc-table-12',
        [
            'model' => $directorTable12,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-13/doc-table-13',
        [
            'model' => $directorTable13,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-14/doc-table-14',
        [
            'model' => $directorTable14,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-15/doc-table-15',
        [
            'model' => $directorTable15,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-16/doc-table-16',
        [
            'model' => $directorTable16,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-17/doc-table-17',
        [
            'model' => $directorTable17,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-18/doc-table-18',
        [
            'model' => $directorTable18,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-19/doc-table-19',
        [
            'model' => $directorTable19,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-20/doc-table-20',
        [
            'model' => $directorTable20,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-21/doc-table-21',
        [
            'model' => $directorTable21,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-23/doc-table-23',
        [
            'model' => $directorTable23,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-24/doc-table-24',
        [
            'model' => $directorTable24,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-25/doc-table-25',
        [
            'model' => $directorTable25,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-26/doc-table-26',
        [
            'model' => $directorTable26,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-27/doc-table-27',
        [
            'model' => $directorTable27,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-28/doc-table-28',
        [
            'model' => $directorTable28,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-29/doc-table-29',
        [
            'model' => $directorTable29,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-30/doc-table-30',
        [
            'model' => $directorTable30,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-31/doc-table-31',
        [
            'model' => $directorTable31,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-32/doc-table-32',
        [
            'model' => $directorTable32,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-33/doc-table-33',
        [
            'model' => $directorTable33,
        ]
    ); ?>

</div>
