<?php

use common\models\Municipality;
use common\models\User;
use common\models\FederalDistrict;
use common\models\Region;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use common\models\Organization;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
$year_item['2022'] = '2022';
$this->title = 'Анкета организаторов (операторов) питания';
?>

<div class="users-report-form container"><h5 align="center"><?= Html::encode($this->title) ?></h5>
    <?php
    $form = ActiveForm::begin();
    echo $this->render(
        '/report/_title-report',
        [
            'form' => $form,
            'modelReport' => $modelReport,

            'district_items' => $district_items,
            'region_items' => $region_items,
            'municipality_items' => $municipality_items,
            'org_items' => [],

            'hasAccessFederalDistrict' => $hasAccessFederalDistrict,
            'hasAccessRegion' => $hasAccessRegion,
            'hasAccessMunicipality' => $hasAccessMunicipality,
            'hasAccessShow' => $hasAccessShow,
        ]
    );
    ?>
    <div class="form-group row">
        <?= Html::submitButton('Показать', ['class' => 'btn btn-success main-color form-control col-12 mt-3']) ?>
    </div>
    <?php
    ActiveForm::end(); ?>
</div>
<?
if ($result) {
    ?>
    <input type="button" class="btn btn-warning btn-block table2excel mb-3 mt-3"
           title="Вы можете скачать в формате Excel" value="Скачать в Excel" id="pechat222">
    <div class="table-responsive">
        <table id="tableId2" class="table table-bordered table-sm table2excel_with_colors">
            <thead>
            <tr>
                <th colspan="8" class="th text-center"><?= Html::encode($this->title) ?></th>
            </tr>
            <tr>
                <th class="th">№</th>
                <th class="th">Федеральный округ</th>
                <th class="th">Субъект Федерации</th>
                <th class="th">Муниципальное образование</th>
                <th class="th">Наименование организации/Количество регистраций</th>
                <th class="th">Количество подкрепленных школ</th>
                <th class="th">Внесена информация (вопрос №5) по школе</th>
                <th class="th">Заполнена анкета оператора питания</th>
            </tr>
            </thead>
            <tbody>

            <?
            $num = 1;
            $numItog = 0;
            $finishRow = [];
            foreach ($result['school'] as $row) {
                if ($row['typeRow'] === 'string') {
                    if ($modelReport->showReport != '2') {
                        ?>
                        <tr>
                            <td><?= $num ?></td>
                            <td><?= Yii::$app->myComponent->get_federal_name($row['federal_district_id']) ?></td>
                            <td><?= Yii::$app->myComponent->get_region_name($row['region_id']) ?></td>
                            <td><?= Yii::$app->myComponent->get_municipality_name($row['municipality_id']) ?></td>
                            <td><?= $row['title'] ?></td>
                            <td class="text-center"><?= $row['countResult'] ?></td>
                            <?= ($row['countResult'] == 0) ? '<td class="main-color-3 text-center">-</td>' : '<td class="text-center">'.$row['countResult'].'</td>' ?>
                            <?= (!$row['result']) ? '<td class="main-color-3 text-center">Нет</td>' : '<td class="text-center">Да</td>' ?>
                        </tr>
                        <?
                    }
                    ?>
                    <?
                    $num++;
                } else {
                    if ($row['typeRow'] === 'itogReg') {
                        $num--;
                        $numItog += $num;
                        ?>
                        <tr>
                            <td class="main-color-6" colspan="1">Итого</td>
                            <td class="main-color-6" colspan="3"><?= Yii::$app->myComponent->get_region_name(
                                    $row['regin']
                                ) ?></td>
                            <td class="main-color-6 text-center"><?= $num ?></td>
                            <td class="main-color-6 text-center"><?= $row['schoolCount'] ?></td>
                            <td class="main-color-6 text-center"><?= $row['schoolCount'] ?></td>
                            <td class="main-color-6 text-center"><?= $row['total'] - $row['noTotal'] ?></td>
                        </tr>
                        <?
                        $num = 1;
                    } else {
                        if ($row['typeRow'] === 'itoFed') {
                            if (Yii::$app->user->can('admin')) {
                                $finishRow['schoolCount'] += $row['schoolCount'];
                                $finishRow['total'] += $row['total'];
                                $finishRow['noTotal'] += $row['noTotal'];
                                $finishRow['numItog'] += $numItog;
                            }
                            ?>
                            <tr>
                                <td class="main-color-7" colspan="1">Итого</td>
                                <td class="main-color-7" colspan="3"><?= Yii::$app->myComponent->get_federal_name(
                                        $row['fed']
                                    ) ?></td>
                                <td class="main-color-7 text-center"><?= $numItog ?></td>
                                <td class="main-color-7 text-center"><?= $row['schoolCount'] ?></td>
                                <td class="main-color-7 text-center"><?= $row['schoolCount'] ?></td>
                                <td class="main-color-7 text-center"><?= $row['total'] - $row['noTotal'] ?></td>
                            </tr>
                            <?
                            $numItog = 0;
                        }
                    }
                } ?>
                <?
            } ?>
            <? if (Yii::$app->user->can('admin')) { ?>
                <tr>
                    <td class="main-color-8 text-center" colspan="4"><b>Итого</b></td>
                    <td class="main-color-8 text-center"><b><?= $finishRow['numItog'] ?></b></td>
                    <td class="main-color-8 text-center"><b><?= $finishRow['schoolCount'] ?></b></td>
                    <td class="main-color-8 text-center"><b><?= $finishRow['schoolCount'] ?></b></td>
                    <td class="main-color-8 text-center"><b><?= $finishRow['total'] - $finishRow['noTotal'] ?></b></td>
                </tr>
                <?
            } ?>
            </tbody>
        </table>
    </div>
    <?
}
?>


<?
$script = <<< JS
   
    /*const federalDistrict = document.getElementById('detianket-federal_district_idreport');
    const opt = document.createElement('option');
    opt.value = '0';
    opt.innerHTML = 'Все регионы';
    federalDistrict.appendChild(opt);*/
    
    $("#pechat222").click(function () {
    var table = $('#tableId2');
        if (table && table.length) {
            var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "Отчет по «Анкета организаторов (операторов) питания».xls",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: preserveColors
            });
        }
    });                       
   
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>

