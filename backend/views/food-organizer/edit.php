<?php

use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\FoodOrganizer */
/* @var $org_items \common\models\Organization */

$this->title = 'Редактирование данных организации: ' .Yii::$app->myComponent->get_orgainization_name($model->organization_id);
?>

<div class="create container">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php
    $form = ActiveForm::begin(['id' => 'edit']); ?>
    <?php
    //if ($model)
    ?>


    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
        <?= $this->render('_form',
            [
                'form' => $form,
                'model' => $model
            ]) ?>
    </div>

    <div class="text-center mt-1">
        <?= Html::submitButton(
            'Сохранить',
            ['class' => 'btn main-button-3 w-75']
        ) ?>
    </div>

    <?php
    ActiveForm::end(); ?>

</div>
