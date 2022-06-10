<?php

use kartik\select2\Select2;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use common\models\FederalDistrict;
use common\models\Region;

$this->title = 'Регистрация';
?>
    <style>
        .site-signup {
            /*border: 1px solid black;*/
            /*max-width: 750px;*/
            padding: 8px;
            border-radius: 15px;
            margin: 0 auto;
            box-shadow: 0px 0px 15px 3px #cdc6c6;
        }

        .signup-font {
            font-family: serif !important;
        }

        .signup-name {
            font-size: 1.1rem !important;
        }

        'style'
        =
        >

        'font-size: 1.1rem !important; font-family: serif !important;'
    </style>
    <div class="site-signup container signup-font">

    <h1 class="text-center mb-2 font-weight-bold "><?= Html::encode($this->title) ?></h1>
    <div class="m-3">

        <?php
        $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-2 font-weight-bold signup-name">Федеральный округ <span
                        style="color: red; ">*</span></div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-2">
                <?=
                $form->field($model, 'federal_district_id')
                    ->widget(
                        Select2::classname(),
                        [
                            'data' => $district_items,
                            'options' => [
                                //'required' => true,
                                'placeholder' => 'Выберите федеральный округ',
                                'options' => [
                                    //3 => ['disabled' => true],
                                ],
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]
                    )->label(false);

                ?></div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-2 font-weight-bold signup-name">Субъект федерации <span
                        style="color: red; ">*</span></div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-2"><?=
                $form->field($model, 'region_id')
                    ->widget(
                        Select2::classname(),
                        [
                            'data' => $region_items,
                            'options' => [
                                'placeholder' => 'Выберите регион',
                            ],
                        ]
                    )->label(false);
                ?></div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-2 font-weight-bold signup-name">Муниципальное
                образование <span
                        style="color: red; ">*</span></div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-2"><?=
                $form->field($model, 'municipality_id')
                    ->widget(
                        Select2::classname(),
                        [
                            'data' => $municipality_items,
                            'options' => [
                                //'required' => true,
                                'placeholder' => 'Выберите муниципальное образование',
                            ],
                        ]
                    )->label(false);
                ?></div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-2 font-weight-bold signup-name">Название
                организации<span style="color: red; ">*</span></div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-2"><?= $form->field($model,
                    'name_organization')->textInput([
                    'class' => 'form-control',
                    'placeholder' => 'Название организации'
                ])->label(false) ?></div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-2 font-weight-bold signup-name">Ваш e-mail, он
                необходим для входа
                в ПС <span style="color: red; ">*</span></div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-2"><?= $form->field($model, 'email')->textInput(
                    ['class' => 'form-control', 'placeholder' => 'Ваш e-mail']
                )->label(false) ?></div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-2 font-weight-bold signup-name">Пароль <span
                        style="color: red; ">*</span></div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-2"><?= $form->field($model, 'password')->textInput(
                    ['class' => 'form-control', 'placeholder' => 'Придумайте пароль от 6-ти символов']
                )->label(false) ?></div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-2 font-weight-bold signup-name">ФИО (ответственный)
                <span
                        style="color: red; ">*</span></div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-2"><?= $form->field($model, 'name')->textInput(
                    ['class' => 'form-control', 'placeholder' => 'ФИО ответственного']
                )->label(false) ?></div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-2 font-weight-bold signup-name">Должность
                ответственного
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-2"><?= $form->field($model, 'work_position')->dropDownList(
                    $post_items, ['class' => 'form-control', 'placeholder' => 'Должность ответственного']
                )->label(false) ?></div>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2 btn-block"><?= $form->field(
                    $model,
                    'check2'
                )->checkbox(
                    ['checked' => false]
                )->label(
                    'Данные (название организации, тип пользователя) введены корректно. Изменение этих данных невозможно <span style="color: red; ">*</span>'
                ) ?></div>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 btn-block"><?= $form->field(
                    $model,
                    'check'
                )->checkbox(
                    ['checked' => false]
                )->label(
                    HTML::a('Согласие ', '@web/approval.pdf', ['target' => '_blank']
                    ) . 'на обработку персональных данных <span style="color: red; ">*</span>'
                ) ?></div>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2 btn-block"><span style="color: red; ">*</span> -
                поля с данной пометкой (<span style="color: red; ">*</span>), являются обязательными для регистрации
            </div>

            <?= Html::submitButton(
                'Зарегистрироваться',
                ['class' => 'btn main-button-3 col-12 mt-1 btn-block']
            ) ?>
        </div>
        <?php
        ActiveForm::end(); ?>
    </div>
<?php
$js = <<< JS
$('#signupform-federal_district_id').change(function() {
    $.ajax({
    url: "../site/subjectslist",
        type: "GET",      // тип запроса
        data: { // действия
            'id': $('#signupform-federal_district_id').val()
        },
        // Данные пришли
        success: function( data ) {
          $("#signupform-region_id").html(data)
        },
        error: function(err) {
           console.log(err);
        }
    })
    $.ajax({
    url: "../site/municipalitylist",
         type: "GET",      // тип запроса
         data: { // действия
             'id': 0
         },
         // Данные пришли
         success: function( data ) {
           $("#signupform-municipality_id").html(data)
         },
         error: function(err) {
            console.log(err);
         }
    })
});
	
$('#signupform-region_id').change(function() {
    $.ajax({
         url: "../site/municipalitylist",
              type: "GET",      // тип запроса
              data: { // действия
                  'id': $('#signupform-region_id').val()
              },
              // Данные пришли
              success: function( data ) {
                $("#signupform-municipality_id").html(data)
              },
              error: function(err) {
                 console.log(err);
              }
    })
});	
    
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
