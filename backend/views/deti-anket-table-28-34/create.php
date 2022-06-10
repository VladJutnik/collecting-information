<?php

use yii\bootstrap4\Html;

$items = [
    '' => '',
    '1' => 'да',
    '0' => 'нет',
    '2' => 'затрудняюсь с ответом',
];
?>
<div class="deti-anket-table-18-27-create">

    <?= $form->field($model, 'field26', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(Yii::$app->myComponent->always2(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

    <div id="field35-show">
        <?= $form->field($model, 'field27', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->watch(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">28. Если ребенок питается в школьной столовой, укажите что
            он ест?</h5>
        <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
            <?= $form->field($model, 'field28_1', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field28_2', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field28_3', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field28_4', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field28_5', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field28_6', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field28_7', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field28_8', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?/*= $form->field($model, 'field28_9', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) */?>
        </div>
        <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">29. Где Ваш ребенок обедает?</h5>
        <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
            <?= $form->field($model, 'field29_1', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field29_2', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field29_3', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field29_4', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field29_5', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field29_6', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        </div>

        <?= $form->field($model, 'field30', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->dinner(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">31. Полностью ли ребенок съедает порцию
            завтрака/обеда/полдника в школе?</h5>
        <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
            <?= $form->field($model, 'field31_1', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->completelyEatsUp(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field31_2', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->completelyEatsUp(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field31_3', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->completelyEatsUp(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        </div>

        <?= $form->field($model, 'field32', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->issuedPortion(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field33', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field34', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">34 б. Что не нравится в школьной столовой?</h5>
        <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
            <?= $form->field($model, 'field34_1', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field34_2', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field34_3', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field34_4', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field34_5', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field34_6', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field34_7', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field34_8', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field34_9', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        </div>
    </div>
    <div id="field35-hide">
        <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">35. Если ребенок не питается в столовой, то почему? – если
            питается (на вопрос 26 выбран вариант – питается), вопрос пропускается </h5>
        <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
            <?= $form->field($model, 'field35_1', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field35_2', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field35_3', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field35_4', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field35_5', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field35_6', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
            <?= $form->field($model, 'field35_7', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->textInput(['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        </div>
    </div>
</div>