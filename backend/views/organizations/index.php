<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $federal_items */

$this->title = 'Список организаций';
//$this->params['breadcrumbs'][] = ['label' => 'Анкета', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-report-horizontal-new">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => [
                'class' => 'menus-table table-responsive'
            ],
            'tableOptions' => [
                'class' => 'table table-bordered table-responsive'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'label' => 'Идентификатор организации',
                    'attribute' => 'number',
                    'value' => 'number',
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => ''],
                    //'filter' => Yii::$app->myComponent->FederalDistrictItems(),
                    'visible' => Yii::$app->user->can('admin'),
                ],[
                    'label' => 'Федеральный округ',
                    'attribute' => 'federal_district_id',
                    'value' => function ($model) {
                        return Yii::$app->myComponent->get_federal_name($model->federal_district_id);
                    },
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => ''],
                    'filter' => Yii::$app->myComponent->FederalDistrictItems(),
                    //'visible' => Yii::$app->user->can('admin'),
                ],
                [
                    'attribute' => 'region_id',
                    'label' => 'Регион',
                    'value' => function ($model) {
                        return Yii::$app->myComponent->get_region_name($model['region_id']);
                    },
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => ''],
                    'filter' => $region_items,
                    //'visible' => Yii::$app->user->can('admin'),
                ],
                [
                    'attribute' => 'municipality_id',
                    'label' => 'Муниципальное образование',
                    'value' => function ($model) {
                        return Yii::$app->myComponent->get_municipality_name($model['municipality_id']);
                    },
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => ''],
                    'filter' => $municipality_items,
                    //'visible' => Yii::$app->user->can('admin'),
                ],
                [
                    'attribute' => 'number',
                    'label' => 'Номер организации в системе',
                    'value' => 'number',
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => ''],
                    //'filter' => $municipality_items,
                    //'visible' => Yii::$app->user->can('admin'),
                ],
                [
                    'attribute' => 'title',
                    'label' => 'Наименовние организации',
                    'value' => 'title',
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => ''],
                    //'filter' => $municipality_items,
                    //'visible' => Yii::$app->user->can('admin'),
                ],
                [
                    'attribute' => 'sch2',
                    'label' => 'Планируемое количество 2 класс',
                    'value' => 'sch2',
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => 'text-center'],
                    //'filter' => $municipality_items,
                    //'visible' => Yii::$app->user->can('admin'),
                ],
                [
                    'attribute' => 'sch5',
                    'label' => 'Планируемое количество 5 класс',
                    'value' => 'sch5',
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => 'text-center'],
                    //'filter' => $municipality_items,
                    //'visible' => Yii::$app->user->can('admin'),
                ],
                [
                    'attribute' => 'sch10',
                    'label' => 'Планируемое количество 10 класс',
                    'value' => 'sch10',
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => 'text-center'],
                    //'filter' => $municipality_items,
                    //'visible' => Yii::$app->user->can('admin'),
                ],
                [
                    'attribute' => 'itog',
                    'label' => 'Итого (2,5,10 класс)',
                    'value' => 'itog',
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => 'text-center'],
                    //'filter' => $municipality_items,
                    //'visible' => Yii::$app->user->can('admin'),
                ],


                /*[
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'contentOptions' => ['class' => 'action-column'],
                    'buttons' => [
                        'update' => function ($url, $model, $key) {
                            return Html::a(
                                '<i class="fa fa-pencil" aria-hidden="true"></i>',
                                $url,
                                [
                                    'title' => Yii::t('yii', 'Редактировать'),
                                    'data-toggle' => 'tooltip',
                                    'class' => 'btn btn-sm btn-primary'
                                ]
                            );
                        },
                    ],
                ]*/
            ],
        ]
    ); ?>


</div>
