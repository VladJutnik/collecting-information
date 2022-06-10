<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Director */

$this->title = 'АНКЕТА ДЛЯ ОЦЕНКИ ОРГАНИЗАЦИИ ПИТАНИЯ ОБУЧАЮЩИХСЯ В ОБЩЕОБРАЗОВАТЕЛЬНЫХ ОРГАНИЗАЦИЯХ';
$this->params['breadcrumbs'][] = ['label' => 'Анкета', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="director-create container">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <h5 class="text-center text-danger"><i>(опрос руководителей образовательных организаций или ответственных за питание детей, заполняется интервьюером)</i></h5>

    <?php
    $form = ActiveForm::begin(); ?>
    <?=
    $this->render(
        '/director-table-4/create',
        [
            'model' => $directorTable4,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-5/create',
        [
            'model' => $directorTable5,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-6/create',
        [
            'model' => $directorTable6,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-7/create',
        [
            'model' => $directorTable7,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-8/create',
        [
            'model' => $directorTable8,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-9/create',
        [
            'model' => $directorTable9,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-10/create',
        [
            'model' => $directorTable10,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-11/create',
        [
            'model' => $directorTable11,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-12/create',
        [
            'model' => $directorTable12,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-13/create',
        [
            'model' => $directorTable13,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-14/create',
        [
            'model' => $directorTable14,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-15/create',
        [
            'model' => $directorTable15,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-16/create',
        [
            'model' => $directorTable16,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-17/create',
        [
            'model' => $directorTable17,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-18/create',
        [
            'model' => $directorTable18,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-19/create',
        [
            'model' => $directorTable19,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-20/create',
        [
            'model' => $directorTable20,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-21/create',
        [
            'model' => $directorTable21,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-23/create',
        [
            'model' => $directorTable23,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-24/create',
        [
            'model' => $directorTable24,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-25/create',
        [
            'model' => $directorTable25,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-26/create',
        [
            'model' => $directorTable26,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-27/create',
        [
            'model' => $directorTable27,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-28/create',
        [
            'model' => $directorTable28,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-29/create',
        [
            'model' => $directorTable29,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-30/create',
        [
            'model' => $directorTable30,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-31/create',
        [
            'model' => $directorTable31,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-32/create',
        [
            'model' => $directorTable32,
            'form' => $form,
        ]
    ); ?>
    <?=
    $this->render(
        '/director-table-33/create',
        [
            'model' => $directorTable33,
            'form' => $form,
        ]
    ); ?>
    <?php
    $items = [
        0 => 'единое типовое для субъекта Федерации',
        1 => 'типовое для региона, но адаптированное для школы (с отдельными изменениями)',
        2 => 'индивидуальное',
    ];
    ?>

    <?= $form->field($model, 'school_menu', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(
        $items,
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
    )->label('По какому основному меню работает школа?') ?>

    <?= $form->field($model, 'interviewer_fio', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->textInput(['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6'])?>
    <?
    if (Yii::$app->user->can('director_school') && Yii::$app->user->identity->region_id == '42'){?>
        <div class="form-group">
            <?= Html::submitButton(
                'Сохранить',
                ['class' => 'btn btn-outline-primary mt-3 px-5 radius-30 btn-block']
            )?>
        </div>
    <?
    }?>
    <?php
    ActiveForm::end(); ?>
</div>
