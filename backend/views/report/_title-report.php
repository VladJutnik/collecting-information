<?php

use yii\bootstrap4\Html;

?>

<?
if ($hasAccessFederalDistrict == true) {
    echo $form->field($modelReport, 'federal_district_idReport', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropDownList($district_items, [
        'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
        'onchange' => '
        $.get("/deti-anket/region-list-report?id="+$(this).val(), function(data){
            $("select#report-region_idreport").html(data);
        });
        $.get("/deti-anket/municipality-list-report?id=0", function(data){
            $("select#report-municipality_idreport").html(data);
        });
        $.get("/deti-anket/organization-list-report?id="+$(this).val(), function(data){
            $("select#report-organization_idreport").html(data);
        });
    ',
    ])->label('Федеральный округ:');
}
?>
<?
if ($hasAccessRegion == true) {
    echo $form->field($modelReport, 'region_idReport', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropDownList($region_items, [
        'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
        'onchange' => '
        $.get("/deti-anket/municipality-list-report?id="+$(this).val(), function(data){
            $("select#report-municipality_idreport").html(data);
        });
         $.get("/deti-anket/organization-list-report?id="+$(this).val(), function(data){
            $("select#report-organization_idreport").html(data);
        });
    ',
    ])->label('Cубъект федерации:');
}
?>

<?
if ($hasAccessMunicipality == true) {
    echo $form->field($modelReport, 'municipality_idReport', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropDownList($municipality_items, [
        'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
        'onchange' => '
        $.get("/deti-anket/organization-list-report?id="+$(this).val(), function(data){
            $("select#report-organization_idreport").html(data);
        });',
    ])->label('Муниципальное образование:');
}
?>
<?
if ($hasAccessOrg == true) {
    echo $form->field($modelReport, 'organization_idReport', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropDownList($org_items, [
        'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
    ])->label('Школа:');
} ?>
<div class="row">
    <?
    if ($hasAccessTerrain == true) { ?>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <?
            $items = [
                'v' => 'все',
                '1' => 'городская',
                '2' => 'сельская',
            ];
            echo $form->field($modelReport, 'terrain', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
            ])->dropDownList($items, [
                'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
            ]); ?>
        </div>
        <?
    } ?>
    <?
    if ($hasAccessTypeSchool == true) { ?>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <?
            $items = [
                'v' => 'все',
                '1' => 'обычная',
                '2' => 'малокомплектная',
            ];
            echo $form->field($modelReport, 'typeSchool', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
            ])->dropDownList($items, [
                'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
            ]); ?>
        </div>
        <?
    } ?>
    <?
    if ($hasAccessSex == true) { ?>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <?
            $items = [
                'v' => 'все',
                '1' => 'мальчик',
                '2' => 'девочка',
            ];
            echo $form->field($modelReport, 'sex', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
            ])->dropDownList($items, [
                'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
            ]); ?>
        </div>
        <?
    } ?>
    <?
    if ($hasAccessClass == true) { ?>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <?
            $items = [
                'v' => 'все',
                '1' => '1-4 кл',
                '2' => '5-9 кл',
                '3' => '10-11 кл',
            ];
            echo $form->field($modelReport, 'class', [
                'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
                'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
            ])->dropDownList($items, [
                'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
            ]); ?>
        </div>
        <?
    } ?>

</div>
<?
if ($hasAccessShow == true) { ?>
    <?
    $items = [
        '1' => 'показать',
        '2' => 'скрыть',
    ];
    echo $form->field($modelReport, 'showReport', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->dropDownList($items, [
        'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6',
    ]); ?>
    <?
} ?>

