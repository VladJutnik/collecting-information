<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\ChangePassword */

$this->title = 'Изменение пароля';
?>
    <style>
        .img-blok {
            display: flex;
            justify-content: center;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #ffffff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

        .radius-15 {

            border-radius: 15px;

        }
    </style>
    <div class="user-create mt-3 container">
        <div class="card radius-15">
            <div class="card-body">
                <!--Шапка профиля-->
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-12 col-xl-12 mb-2">
                        <h1 class="text-center">ЛИЧНЫЙ КАБИНЕТ</h1>
                        <hr/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6 mb-2">
                        <?php $form = ActiveForm::begin(['id' => 'change-password']); ?>

                        <?= $form->field($model, 'password_old', Yii::$app->myComponent->twoColumnName())->passwordInput(['maxlength' => true, 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

                        <?= $form->field($model, 'password_new', Yii::$app->myComponent->twoColumnName())->passwordInput(['maxlength' => true, 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

                        <?= $form->field($model, 'password_repeat', Yii::$app->myComponent->twoColumnName())->passwordInput(['maxlength' => true, 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Сохранить', ['id' => 'clickButton', 'class' => 'btn btn-outline-primary mt-3 px-5 radius-30 btn-block', 'name' => 'change-password-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6 col-xl-6 border-left">
                        <?= $this->render('menu') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$js = <<< JS
	$('form').on('beforeSubmit', function(){
        var form = $(this);
        var submit = form.find(':submit');
        submit.html('<span class="fa fa-spin fa-spinner"></span> Пожалуйста, подождите...');
        submit.prop('disabled', true);
    });
JS;
$this->registerJs($js, View::POS_READY);