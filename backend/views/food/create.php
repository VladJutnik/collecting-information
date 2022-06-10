<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Food */

$this->title = 'АНКЕТА ДЛЯ ОЦЕНКИ ОРГАНИЗАЦИИ ПИТАНИЯ ОБУЧАЮЩИХСЯ В ОБЩЕОБРАЗОВАТЕЛЬНЫХ ОРГАНИЗАЦИЯХ';
$this->params['breadcrumbs'][] = ['label' => 'Анкета', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$items = [
    0 => 'единое типовое меню',
    1 => 'типовое меню с добавлениями',
    2 => 'индивидуальное меню',
];
?>
<div class="food-create container">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <h5 class="text-center text-danger"><i>(опрос организаторов питания, заполняется интервьюером)</i></h5>

    <?php
    $form = ActiveForm::begin(); ?>

    <?=
    $this->render(
        '/food-table-6/create',
        [
            'model' => $foodTable6,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/food-table-7/create',
        [
            'model' => $foodTable7,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/food-table-8/create',
        [
            'model' => $foodTable8,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/food-table-9/create',
        [
            'model' => $foodTable9,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/food-table-10/create',
        [
            'model' => $foodTable10,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/food-table-11/create',
        [
            'model' => $foodTable11,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/food-table-12/create',
        [
            'model' => $foodTable12,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/food-table-13/create',
        [
            'model' => $foodTable13,
            'form' => $form,
        ]
    ); ?>

    <?= $form->field($model, 'interviewer_fio', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->textInput(['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6'])?>

    <?
    if (Yii::$app->user->can('food_organizer') && Yii::$app->user->identity->region_id == '42'){?>
        <div class="text-center mt-1">
            <?= Html::submitButton(
                'Сохранить',
                ['class' => 'btn main-button-3 w-75']
            ) ?>
        </div>
        <?
    }?>
    <?php
    ActiveForm::end(); ?>
</div>
