<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model \common\models\Organization */
/* @var $food_organization \common\models\FoodOrganizer */
/* @var $org_items \common\models\Organization */

/*$model['organization_id'] = 5;

$user = \common\models\User::find()->with('organization',true);
print_r($user);
die();*/
$this->title = 'Прикреплённые организации';
?>

<div class="organization-index container">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p>
        <?
        if (Yii::$app->user->can('food_organizer') && Yii::$app->user->identity->region_id == '42'){?>
            <?= Html::a('Прикрепить организацию', ['create'], ['class' => 'btn btn-success']); ?>
        <?
        }?>
    </p>

    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'options' => [
                'class' => 'menus-table table-responsive',
            ],
            'tableOptions' => [
                'class' => 'table table-bordered table-responsive',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'organization_id',
                    'label' => 'Организация',
                    'value' => function ($model) {
                        return Yii::$app->myComponent->get_orgainization_name($model['organization_id']);
                    },
                    'headerOptions' => ['class' => 'grid_table_th'],
                    'contentOptions' => ['class' => ''],
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{edit} {delete}',
                    'contentOptions' => ['class' => 'action-column'],
                    'buttons' => [
                        'edit' => function ($url) {
                            if (Yii::$app->user->can('food_organizer') && Yii::$app->user->identity->region_id == '42'){
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                    'title' => Yii::t('yii', 'Редактировать'),
                                    'data-toggle' => 'tooltip',
                                    'class' => 'btn btn-sm btn-primary'
                                ]);
                            }
                        },
                        'delete' => function ($url) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('yii', 'Удалить'),
                                'data-toggle' => 'tooltip',
                                'class' => 'btn btn-sm btn-danger',
                                'data' => ['confirm' => 'Вы уверены, что хотите удалить прикрепленную организацию?'],
                            ]);
                        },
                    ],
                ]
            ],
        ]
    ); ?>
</div>