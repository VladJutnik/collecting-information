<?php

use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\FoodOrganizer */
/* @var $org_items \common\models\Organization */

$this->title = 'Выбор организации организатором питания';
?>

<div class="create container">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php
    $form = ActiveForm::begin(['id' => 'create']); ?>
    <?php
    //if ($model)
    ?>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
        <?=
        $form->field($model, 'organization_id')->widget(Select2::classname(),
            [
                'data' => $org_items,
                'options' => [
                    'placeholder' => 'Выберите оргназацию',
                    'options' => [
                        //3 => ['disabled' => true],
                    ],
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]
        )->label(false);
        ?>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
        <?= $this->render('_form',
            [
                'form' => $form,
                'model' => $model
            ]) ?>
    </div>
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
