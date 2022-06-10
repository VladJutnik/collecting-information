<?php

use common\models\FederalDistrict;
use common\models\Organization;
use common\models\Region;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Director */

$this->title = 'АНКЕТА ДЛЯ ОЦЕНКИ ОРГАНИЗАЦИИ ПИТАНИЯ ОБУЧАЮЩИХСЯ В ОБЩЕОБРАЗОВАТЕЛЬНЫХ ОРГАНИЗАЦИЯХ';
$this->params['breadcrumbs'][] = ['label' => 'Анкета', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
    <div class="director-create container">

        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
        <h5 class="text-center text-danger"><i>(опрос детей и родителей обучающихся в общеобразовательных организациях
                проводится с целью улучшения организации питания; вся полученная информация будет использоваться для
                анализа
                и оценки исключительно в обобщенном виде)</i></h5>

        <?php
        $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'federal_district_id', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropDownList($district_items, [
            //'prompt' => 'Выберите федеральный округ ...',
            //'options' => [5 => ['Selected' => true]],
            'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
            //'options' => [$post['federal_district_id'] => ['Selected' => true]],
            'onchange' => '
            $.get("../deti-anket/region-list?id="+$(this).val(), function(data){
                $("select#detianket-region_id").html(data);
            });
            $.get("../deti-anket/municipality-list?id=0", function(data){
                $("select#detianket-municipality_id").html(data);
            });
             $("select#detianket-organization_id").html([]);
        ',
        ]); ?>
        <?= $form->field($model, 'region_id', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropDownList($region_items, [
            //'prompt' => 'Выберите регион ...',
            //'options' => [48 => ['Selected' => true]],
            'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
            'onchange' => '
            $.get("../deti-anket/municipality-list?id="+$(this).val(), function(data){
                $("select#detianket-municipality_id").html(data);
                $("select#detianket-organization_id").html([]);
            });
        ',
        ]); ?>

        <?= $form->field($model, 'municipality_id', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropDownList($municipality_items, [
            //'prompt' => 'Выберите муниципальное образование...',
            //'options' => [253 => ['Selected' => true]],
            'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
            'onchange' => '
            $.get("../deti-anket/organization-list?id="+$(this).val(), function(data){
                $("select#detianket-organization_id").html(data);
            });'
        ]); ?>

        <?= $form->field($model, 'number_anket', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->textInput(['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'organization_id', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropDownList($org_items, [
            'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
        ]) ?>

        <?= $form->field($model, 'field1_1', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusClass(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_2', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->textInput(['type' => 'date', 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_3', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->textInput(['type' => 'date', 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_4', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusAge(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_5', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusSex(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_6', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusFamily(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_7', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusEducation(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_8', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusEducation(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_9', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statuSincome(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_10', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusChange(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_11', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->timeSchool(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_12', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_13', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_14', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusYesNoZ2(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <?= $form->field($model, 'field1_15', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statusInHoursSchool(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">15. Укажите какой был при последнем измерении вес и рост ребенка: (0 - затрудняюсь ответить, 1 - отказ от ответа) </h5>
        <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
            <?= $form->field($model, 'field1_16', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->textInput(['type' => 'number', 'min' => 0, 'max' => 220, 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

            <?= $form->field($model, 'field1_17', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->textInput(['type' => 'number', 'min' => 0, 'max' => 220, 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        </div>
        <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">16. Укажите на момент исследования данные матери: (0 - затрудняюсь ответить, 1 - отказ от ответа)</h5>
        <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
            <?= $form->field($model, 'field1_18', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->textInput(['type' => 'number', 'min' => 0, 'max' => 250, 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

            <?= $form->field($model, 'field1_19', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->textInput(['type' => 'number', 'min' => 0, 'max' => 250, 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        </div>
        <h5 class="mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0 mt-xxl-0">17. Укажите на момент исследования данные отца: (0 - затрудняюсь ответить, 1 - отказ от ответа)</h5>
        <div class="ml-sm-0 ml-md-0 ml-lg-3 ml-xl-3 ml-xxl-3">
            <?= $form->field($model, 'field1_20', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->textInput(['type' => 'number', 'min' => 0, 'max' => 250, 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

            <?= $form->field($model, 'field1_21', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1'],
            ])->textInput(['type' => 'number', 'min' => 0, 'max' => 250, 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>
        </div>
        <!-- <? /*= $form->field($model, 'field1_2', [
             'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
             'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
         ])->textInput(['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6'])*/ ?>

         <? /*= $form->field($model, 'field1_3', [
             'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
             'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
         ])->dropdownList(Yii::$app->myComponent->statusAgeGroup(),['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6'])*/ ?>


         <? /*
         $items = [
             'низкий'=>'низкий',
             'средний'=>'средний',
             'высокий'=>'высокий',
         ]
         */ ?>
         --><? /*= $form->field($model, 'field1_12', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->dropdownList(Yii::$app->myComponent->statuSincome(), ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6'])*/ ?>

        <?=
        $this->render(
            '/deti-anket-table-18-27/create',
            [
                'model' => $DetiAnketTable1827,
                'form' => $form,
            ]
        ); ?>
        <?=
        $this->render(
            '/deti-anket-table-28-34/create',
            [
                'model' => $DetiAnketTable2834,
                'form' => $form,
            ]
        ); ?>
        <?=
        $this->render(
            '/deti-anket-table-35-44/create',
            [
                'model' => $DetiAnketTable3544,
                'form' => $form,
            ]
        ); ?>
        <?=
        $this->render(
            '/deti-anket-table-45-48/create',
            [
                'model' => $DetiAnketTable4548,
                'form' => $form,
            ]
        ); ?>

        <?= $form->field($model, 'interviewer_fio', [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
        ])->textInput(['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

        <div class="form-group">
          <!--  --><?/*= Html::submitButton(
                'Сохранить',
                ['class' => 'btn btn-outline-primary mt-3 px-5 radius-30 btn-block']
            ) */?>
        </div>
        <?php
        ActiveForm::end(); ?>
    </div>

<?php
$js = <<< JS

     /*var field18_18 = $('#detiankettable1827-field18_18');
     field18_18.on('change', function () {
        if (field18_18.val() !== "1" ) {
            $('.field-detiankettable1827-field18_19').hide();
        }
        else{
            $('.field-detiankettable1827-field18_19').show();
        }
     });
     field18_18.trigger('change');*/

     var field37 = $('#detiankettable3544-field37');
     field37.on('change', function () {
        if (field37.val() === "1" || field37.val() === "2" ) {
            $('.field37-custom').show();
        }
        else{
            $('.field37-custom').hide();
        }
     });
     field37.trigger('change');
     
     var field29_1 = $('#detiankettable2834-field29_1');
     field29_1.on('change', function () {
        if (field29_1.val() === "1") {
            $('.field-detiankettable2834-field30').show();
        }
        else{
            $('.field-detiankettable2834-field30').hide();
        }
     });
     field29_1.trigger('change');
     

     var field35_6 = $('#detiankettable2834-field35_6');
     field35_6.on('change', function () {
        if (field35_6.val() !== "1" ) {
            $('.field-detiankettable2834-field35_7').hide();
        }
        else{
            $('.field-detiankettable2834-field35_7').show();
        }
     });
     field35_6.trigger('change');
     
     var field26 = $('#detiankettable2834-field26');
     field26.on('change', function () {
        if (field26.val() === '1' || field26.val() === '2') {
            $('#field35-show').show();
            $('#field35-hide').hide();
        }
        else{
            $('#field35-show').hide();
            $('#field35-hide').show();
        }
     });
     field26.trigger('change');

     var field39_6 = $('#detiankettable3544-field39_6');
     field39_6.on('change', function () {
        if (field39_6.val() !== "1" ) {
            $('.field-detiankettable3544-field39_7').hide();
        }
        else{
            $('.field-detiankettable3544-field39_7').show();
        }
     });
     field39_6.trigger('change');

     var field42 = $('#detiankettable3544-field42');
     field42.on('change', function () {
        if (field42.val() !== "1" ) {
            $('.field-detiankettable3544-field43').hide();
        }
        else{
            $('.field-detiankettable3544-field43').show();
        }
     });
     field42.trigger('change');

     var field46_12 = $('#detiankettable4548-field46_12');
     field46_12.on('change', function () {
        if (field46_12.val() !== "1" ) {
            $('.field-detiankettable4548-field46_13').hide();
        }
        else{
            $('.field-detiankettable4548-field46_13').show();
        }
     });
     field46_12.trigger('change');

     var field48 = $('#detiankettable4548-field48');
     field48.on('change', function () {
        if (field48.val() === "нет" ) {
            $('.field-detiankettable4548-field48_1').hide();
        }
        else{
            $('.field-detiankettable4548-field48_1').show();
        }
     });
     field48.trigger('change');



JS;
$this->registerJs($js, \yii\web\View::POS_READY);