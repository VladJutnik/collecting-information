<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'АНКЕТА ДЛЯ ОЦЕНКИ ОРГАНИЗАЦИИ ПИТАНИЯ ОБУЧАЮЩИХСЯ В ОБЩЕОБРАЗОВАТЕЛЬНЫХ ОРГАНИЗАЦИЯХ';
?>
<div class="director-index container">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div>
        <?if (Yii::$app->user->can('director_school') && Yii::$app->user->identity->region_id == '42') {
            if (!$status->id){
                echo Html::a('Добавить анкету', ['create'], ['class' => 'btn btn-success']);
            }
            echo Html::a('Добавить анкету', ['create'], ['class' => 'btn btn-success']);
        }?>
        <?= HTML::a('Шаблон анкеты', '@web/Опрос_руководителей_образовательных_организаций.pdf', ['target' => '_blank', 'class' => 'btn btn-warning']); ?>

      <!--  <?/*= Html::a('Добавить анкету', ['create'], ['class' => 'btn btn-success']);*/?>
        <?/*= HTML::a('Шаблон анкеты', '@web/Опрос_руководителей_образовательных_организаций.docx', ['target' => '_blank', 'class' => 'btn btn-warning']); */?>
    -->
    </div>

    <div class="table-responsive">
        <?= GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'options' => [
                    'class' => 'menus-table table-responsive',
                ],
                'tableOptions' => [
                    'class' => 'table table-bordered table-responsive',
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'federal_district_id',
                        'label' => 'Федеральный округ',
                        'value' => function ($model) {
                            return Yii::$app->myComponent->get_federal_name($model['federal_district_id']);
                        },
                        'headerOptions' => ['class' => 'grid_table_th'],
                        'contentOptions' => ['class' => ''],
                        'filter' => Yii::$app->myComponent->FederalDistrictItems(),
                        'visible' => $hasAccessFederalDistrict,
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
                        'visible' => $hasAccessRegion,
                    ],
                    [
                        'attribute' => 'municipality',
                        'label' => 'Муниципальное образование',
                        'value' => function ($model) {
                            return Yii::$app->myComponent->get_municipality_name($model['municipality']);
                        },
                        'headerOptions' => ['class' => 'grid_table_th'],
                        'contentOptions' => ['class' => ''],
                        'filter' => $municipality_items,
                        'visible' => $hasAccessMunicipality,
                    ],
                    [
                        'attribute' => 'organization_id',
                        'label' => 'Организация',
                        'value' => function ($model) {
                            return Yii::$app->myComponent->get_orgainization_name($model['organization_id']);
                        },
                        'headerOptions' => ['class' => 'grid_table_th'],
                        'contentOptions' => ['class' => ''],
                    ],
                    'create_at',
                    [
                        'header' => 'Посмотреть/отредактировать',
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {print}',
                        //'template' => '{view} {update}<br> <div class="mt-1">{exportk} {delete}</div>',
                        'contentOptions' => ['class' => 'action-column text-center'],
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                if (Yii::$app->user->can('admin') || Yii::$app->user->can('director_school') || Yii::$app->user->can('rospotrebnadzor')){
                                    return Html::a(
                                        '<span class="glyphicon glyphicon-eye-open"></span>',
                                        ['view?id=' . $model['id']],
                                        [
                                            'title' => Yii::t('yii', 'Посмотреть информацию'),
                                            'data-toggle' => 'tooltip',
                                            'class' => 'btn btn-sm btn-success',
                                        ]
                                    );
                                }
                            },
                            'update' => function ($url, $model, $key) {
                                if (Yii::$app->user->can('director_school') && Yii::$app->user->identity->region_id == '42'){
                                    return Html::a(
                                        '<span class="glyphicon glyphicon-pencil"></span>',
                                        ['create?id=' . $model['id']],
                                        [
                                            'title' => Yii::t('yii', 'Редактировать информацию'),
                                            'data-toggle' => 'tooltip',
                                            'class' => 'btn btn-sm btn-primary',
                                        ]
                                    );
                                }
                            },
                            'print' => function ($url, $model, $key) {
                                if (Yii::$app->user->can('admin') || Yii::$app->user->can('director_school') || Yii::$app->user->can('rospotrebnadzor')){
                                    return Html::a(
                                        '<span class="glyphicon glyphicon-list-alt"></span>',
                                        ['print-anket?id=' . $model['id']],
                                        [
                                            'title' => Yii::t('yii', 'Напечатать анкету'),
                                            'data-toggle' => 'tooltip',
                                            'class' => 'btn btn-sm btn-warning',
                                        ]
                                    );
                                }
                            },
                        ],
                    ],
                ],
            ]
        ); ?>
    </div>
</div>
