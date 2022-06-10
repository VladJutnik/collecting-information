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
    <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">36. Как оплачивается питание (завтрак/обед) ребенка в
        школе?</h5>
    <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
        <?= $form->field($model, 'field36_1', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(
            Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
        ) ?>
        <?= $form->field($model, 'field36_2', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(
            Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
        ) ?>
        <?= $form->field($model, 'field36_3', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(
            Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
        ) ?>
    </div>
    <?= $form->field($model, 'field37', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(
        Yii::$app->myComponent->buyingFood(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
    ) ?>
    <div class="field37-custom">
        <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">38. Какую продукцию предпочитает обычно покупать Ваш
            ребенок в
            школьной столовой или буфете?</h5>
        <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
            <?= $form->field($model, 'field38_1', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_2', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_3', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_4', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_5', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_6', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_7', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_8', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_9', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_10', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_11', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_12', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_13', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_14', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_15', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_16', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_17', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field38_18', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNo2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
        </div>
        <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">39. Какую продукцию предпочитает обычно покупать Ваш
            ребенок в
            вендинговом аппарате?</h5>
        <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
            <?= $form->field($model, 'field39_1', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field39_2', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field39_3', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field39_4', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field39_5', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field39_6', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->dropdownList(
                Yii::$app->myComponent->statusYesNoZ2(),
                ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
            ) ?>
            <?= $form->field($model, 'field39_7', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->textInput(['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        </div>

        <?= $form->field($model, 'field40', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(
            Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
        ) ?>
        <?= $form->field($model, 'field40_1', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(
            Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
        ) ?>
    </div>
    <?= $form->field($model, 'field41', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(
        Yii::$app->myComponent->field41(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
    ) ?>
    <?= $form->field($model, 'field42', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(
        Yii::$app->myComponent->statusYesNoZ2(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
    ) ?>

    <?= $form->field($model, 'field43', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(
        Yii::$app->myComponent->mineralComplexes(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
    ) ?>

    <?= $form->field($model, 'field44', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(
        Yii::$app->myComponent->levelPhysical(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
    ) ?>

</div>