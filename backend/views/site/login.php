<?php

/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .site-login {
        /*border: 1px solid black;*/
        max-width: 450px;
        padding: 8px;
        border-radius: 15px;
        margin: 0 auto;
        box-shadow: 0px 0px 15px 3px #cdc6c6;
    }
    .mt-15 {
        margin-top: -15px;
    }
</style>
<h1 class="text-center">Автоматизированная форма <br>сбора и анализа результатов интервьюирования </h1>
<div class="site-login">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-12">
            <?php
            $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'login')->textInput(['autofocus' => true])->label('Логин (Ваш e-mail указанный при регистрации)') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

            <?= Html::submitButton(
                'Войти в программу',
                ['class' => 'btn main-button-3-hover-orange btn-block', 'name' => 'login-button']
            ) ?>
            <br>
            <div class="row mt-15">
            <!--<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <?/*= Html::a(
                    'Зарегистрироваться',
                    ['site/signup'],
                    [
                        'title' => Yii::t('yii', 'Редактировать информацию о сотруднике'),
                        'data-toggle' => 'tooltip',
                        'class' => 'btn btn-primary btn-block mb-2 main-button-3',
                    ]
                ); */?>
            </div>-->
         <!--   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <a href="#" class="btn btn-secondary btn-block mb-2 main-button-2-hover-orange" data-target="#changePassword" data-toggle="modal">Восстановить
                    пароль</a>
            </div>-->
            </div>
            <?php
            ActiveForm::end(); ?>
        </div>
    </div>
</div>


<div id="changePassword" class="modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Восстановление доступа</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            if (!Yii::$app->session->hasFlash('changePassword')) { ?>
                <?php
                $change_form = ActiveForm::begin([
                    'id' => 'change-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"\">{input}{error}</div>",
                        'labelOptions' => ['class' => 'control-label'],
                    ],
                ]); ?>
                <div class="modal-body">
                    <div class="ml-4">
                        <?= $change_form->field($change, 'email')->textInput(['class' => 'ml-3 form-control col-11']) ?>
                    </div>

                </div>
                <div class="form-group">
                    <div class="text-center">
                        <?= Html::submitButton('Выслать пароль на почту', ['class' => 'btn btn-outline-warning']) ?>
                    </div>
                </div>
                <?php
                ActiveForm::end(); ?>
                <?php
            } else { ?>
                <div class="modal-body">
                    <div class="alert alert-success" role="alert">
                        <h4>Сообщение с паролем отправлено на Ваш Email</h4>
                        <p>Зайдите на почту и скопируйте Ваш новый пароль</p>

                    </div>
                </div>
                <?php
            } ?>

            <?php
            if (Yii::$app->session->hasFlash('changeErrorPassword')) { ?>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h4>Пользователь с указанным Email не зарегистрирован</h4>
                        <p>Перейдите в раздел регистрациии</p>
                        <?= Html::a(
                            'Зарегистрироваться',
                            ['site/signup'],
                            [
                                'title' => Yii::t('yii', 'Редактировать информацию о сотруднике'),
                                'data-toggle' => 'tooltip',
                                'class' => 'btn btn-primary btn-block mb-2',
                            ]
                        ); ?>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>
</div>

<?php
if (Yii::$app->session->hasFlash('changePassword')) { ?>
    <?
    $script = <<< JS
    $('#changePassword').modal('show');
JS;
    $this->registerJs($script, yii\web\View::POS_READY);
}
?>


<?php
if (Yii::$app->session->hasFlash('changeErrorPassword')) { ?>
    <?
    $script = <<< JS
    $('#changePassword').modal('show');
JS;
    $this->registerJs($script, yii\web\View::POS_READY);
}
?>
