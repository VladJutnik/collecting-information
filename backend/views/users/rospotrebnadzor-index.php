<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Авторизация под школой и организаторами питания';
?>
<div class="user-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'userName',
                'label' => 'Пользователь',
                'value' => function ($model) {
                    return $model['userName'];
                },
                'headerOptions' => ['class' => 'grid_table_th'],
                'contentOptions' => ['class' => ''],
            ],
            [
                'attribute' => 'organizationTitle',
                'label' => 'Название организации',
                'value' => function ($model) {
                    return $model['organizationTitle'];
                },
                'headerOptions' => ['class' => 'grid_table_th'],
                'contentOptions' => ['class' => ''],
            ],
            [
                'attribute' => 'decryptionOrganizationType',
                'label' => 'Тип организации',
                'value' => function ($model) {
                    return $model['decryptionOrganizationType'];
                },
                'headerOptions' => ['class' => 'grid_table_th'],
                'contentOptions' => ['class' => ''],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                //'template' => '',
                'template' => '{login}',
                'contentOptions' => ['class' => 'action-column'],
                'buttons' => [
                    'login' => function ($url, $model, $key) {
                        if(Yii::$app->user->can('admin')|| Yii::$app->user->can('rospotrebnadzor')){
                            return Html::a('<span class="glyphicon glyphicon-log-in"></span> Войти под пользователем',
                                ['login-school'], [
                                'title' => 'Войти под школой',
                                'data-toggle'=>'tooltip',
                                'class'=>'btn btn-sm btn-primary',
                                'data' => [
                                    'method' => 'post',
                                    'params' => [
                                        'id' => $model['userId'],
                                    ],
                                ],
                            ]);
                        }
                    },
                ],
            ]

        ],
    ]); ?>


</div>
