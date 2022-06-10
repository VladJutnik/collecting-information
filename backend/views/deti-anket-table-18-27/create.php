<?php

use yii\bootstrap4\Html;

?>
<div class="deti-anket-table-18-27-create">
    <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">18. Имеются ли у Вашего ребенка следующие хронические
        заболевания:</h5>
    <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
        <?= $form->field($model, 'field18_1', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(
            Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
        ) ?>
        <?= $form->field($model, 'field18_2', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(
            Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']
        ) ?>
        <?= $form->field($model, 'field18_3', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_4', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_5', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_6', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_7', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_8', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_9', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_10', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_11', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_12', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_13', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_14', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_15', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_16', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_17', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field18_18', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->textInput(['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
    </div>
    <?= $form->field($model, 'field19', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(Yii::$app->myComponent->disaise(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
    <?= $form->field($model, 'field20', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
    <?= $form->field($model, 'field20_1', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
    <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">21. Справедливы ли для Вашей семьи указанные подходы к
        организации питания дома?</h5>
    <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
        <?= $form->field($model, 'field21_1', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field21_2', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field21_3', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field21_4', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <?= $form->field($model, 'field21_5', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(),
            ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
    </div>

    <?= $form->field($model, 'field22', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(Yii::$app->myComponent->healthyEating(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

    <?= $form->field($model, 'field22_1', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(Yii::$app->myComponent->healthyEating(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

    <?= $form->field($model, 'field23', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(Yii::$app->myComponent->takes_food(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

    <?= $form->field($model, 'field24', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(Yii::$app->myComponent->takes_food(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

    <?= $form->field($model, 'field25', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropdownList(Yii::$app->myComponent->always(),
        ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

</div>
