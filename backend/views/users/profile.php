<?php

use common\models\User;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Личный кабинет';

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
                        <div><b>ФИО: </b><?= $user['name'] ?></div>
                        <div><b>Логин (e-mail): </b><?= $user['login'] ?></div>
                        <?= ($u_role == 'Директор школы') ? '<div><b>Организация: </b>'. $user['title']. '</div>' : '';?>
                        <div><b>Должность: </b><?= $u_role ?></div>
                        <div><b>Федеральный округ: </b><?= $user['federal_district'] ?></div>
                        <div><b>Субъект федерации: </b><?= $user['region'] ?></div>
                        <div><b>Муниципальное образование: </b><?= $user['municipality'] ?></div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6 col-xl-6 border-left">
                        <?= $this->render('menu') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?
$script = <<< JS

JS;
$this->registerJs($script, yii\web\View::POS_READY);
