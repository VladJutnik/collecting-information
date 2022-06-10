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
$this->title = 'Анкета детей и родителей обучающихся';
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
if ($result) { ?>
    <input type="button" class="btn btn-warning btn-block table2excel mb-3 mt-3"
           title="Вы можете скачать в формате Excel" value="Скачать в Excel" id="pechat222">
    <div class="table-responsive">
        <table id="tableId2" class="table table-bordered table-sm table2excel_with_colors">
            <thead>
            <tr>
                <th class="text-center" colspan="19" class="th">Анкета детей и родителей обучающихся</th>
            </tr>
            <tr>
                <th class="text-center" rowspan="2" class="th">№</th>
                <th class="text-center" rowspan="2" class="th">Федеральный округ</th>
                <th class="text-center" rowspan="2" class="th">Субъект Федерации</th>
                <th class="text-center" rowspan="2" class="th">Муниципальное образование</th>
                <th class="text-center" rowspan="2" class="th">Наименование организации/Количество регистраций</th>
                <th class="text-center" rowspan="1" colspan="4" class="th">Планируемая информация</th>
                <th class="text-center" rowspan="1" colspan="5" class="th">Фактическая информация</th>
                <th class="text-center" rowspan="1" colspan="5" class="th">% завершивших от плана</th>
            </tr>
            <tr>
                <th class="th">7-8 лет</th>
                <th class="th">10-11 лет</th>
                <th class="th">15-16 лет</th>
                <th class="th">Итого</th>
                <th class="th">7-8 лет</th>
                <th class="th">10-11 лет</th>
                <th class="th">15-16 лет</th>
                <th class="th">Остальные</th>
                <th class="th">Итого</th>
                <th class="th">7-8 лет</th>
                <th class="th">10-11 лет</th>
                <th class="th">15-16 лет</th>
                <th class="th">Остальные</th>
                <th class="th">Итого</th>
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

                            <td><?= $row['sch2'] ?></td>
                            <td><?= $row['sch5'] ?></td>
                            <td><?= $row['sch10'] ?></td>
                            <?
                            $itogPlan = array_sum([$row['sch2'], $row['sch5'], $row['sch10']]) ?>
                            <td><?= $itogPlan ?></td>

                            <?
                            if ($row['countsch2'] == 0) { ?>
                                <td class="main-color-6 text-center"><?= $row['countsch2'] ?></td>
                                <?
                            } else {
                                if ($row['countsch2'] < $row['sch2']) { ?>
                                    <td class="main-color-3 text-center"><?= $row['countsch2'] ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $row['countsch2'] ?></td>
                                    <?
                                }
                            } ?>
                            <?
                            if ($row['countsch5'] == 0) { ?>
                                <td class="main-color-6 text-center"><?= $row['countsch5'] ?></td>
                                <?
                            } else {
                                if ($row['countsch5'] < $row['sch5']) { ?>
                                    <td class="main-color-3 text-center"><?= $row['countsch5'] ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $row['countsch5'] ?></td>
                                    <?
                                }
                            } ?>
                            <?
                            if ($row['countsch10'] == 0) { ?>
                                <td class="main-color-6 text-center"><?= $row['countsch10'] ?></td>
                                <?
                            } else {
                                if ($row['countsch10'] < $row['sch10']) { ?>
                                    <td class="main-color-3 text-center"><?= $row['countsch10'] ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $row['countsch10'] ?></td>
                                    <?
                                }
                            } ?>
                            <!--остальные-->
                            <td class="main-color text-center"><?= ($row['countResult']-$row['countsch2']-$row['countsch5']-$row['countsch10']) ?></td>
                            <?
                            //$itogFact = array_sum([$row['countsch2'], $row['countsch5'], $row['countsch10']]);
                            $itogFact = array_sum([$row['countResult']]);
                            if ($itogFact == 0) { ?>
                                <td class="main-color-6 text-center"><?= $itogFact ?></td>
                                <?
                            } else {
                                if ($itogFact < $itogPlan) { ?>
                                    <td class="main-color-3 text-center"><?= $itogFact ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $itogFact ?></td>
                                    <?
                                }
                            } ?>
                            <?

                            $procent_sch2 = ($row['sch2'] != 0) ? number_format(
                                ($row['countsch2'] / $row['sch2'] * 100),
                                2,
                                '.',
                                ''
                            ) : 0;
                            $procent_sch5 = ($row['sch5'] != 0) ? number_format(
                                ($row['countsch5'] / $row['sch5'] * 100),
                                2,
                                '.',
                                ''
                            ) : 0;
                            $procent_sch10 = ($row['sch10'] != 0) ? number_format(
                                ($row['countsch10'] / $row['sch10'] * 100),
                                2,
                                '.',
                                ''
                            ) : 0;
                            $procent_itog = ($itogPlan != 0) ? number_format(
                                (($itogFact / $itogPlan) * 100),
                                2,
                                '.',
                                ''
                            ) : 0;

                            if ($procent_sch2 == 0) { ?>
                                <td class="main-color-6 text-center"><?= $procent_sch2 ?></td>
                                <?
                            } else {
                                if ($procent_sch2 < 100) { ?>
                                    <td class="main-color-3 text-center"><?= $procent_sch2 ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $procent_sch2 ?></td>
                                    <?
                                }
                            }

                            if ($procent_sch5 == 0) { ?>
                                <td class="main-color-6 text-center"><?= $procent_sch5 ?></td>
                                <?
                            } else {
                                if ($procent_sch5 < 100) { ?>
                                    <td class="main-color-3 text-center"><?= $procent_sch5 ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $procent_sch5 ?></td>
                                    <?
                                }
                            }

                            if ($procent_sch10 == 0) { ?>
                                <td class="main-color-6 text-center"><?= $procent_sch10 ?></td>
                                <?
                            } else {
                                if ($procent_sch10 < 100) { ?>
                                    <td class="main-color-3 text-center"><?= $procent_sch10 ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $procent_sch10 ?></td>
                                    <?
                                }
                            }
                            /*остальное*/
                            ?><td class="main-color text-center">--</td><?
                            if ($procent_itog == 0) { ?>
                                <td class="main-color-6 text-center"><?= $procent_itog ?></td>
                                <?
                            } else {
                                if ($procent_itog < 100) { ?>
                                    <td class="main-color-3 text-center"><?= $procent_itog ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $procent_itog ?></td>
                                    <?
                                }
                            }
                            ?>
                        </tr>
                        <?
                    }
                    $num++;
                } else {
                    if ($row['typeRow'] === 'itogReg') {
                        $num--;
                        $numItog += $num;
                        ?>
                        <tr>
                            <td class="main-color-6 text-center" colspan="1">Итого</td>
                            <td class="main-color-6" colspan="3"><?= Yii::$app->myComponent->get_region_name(
                                    $row['regin']
                                ) ?></td>
                            <td class="main-color-6 text-center"><?= $num ?></td>
                            <td class="main-color-6 text-center"><?= $row['planSch2'] ?></td>
                            <td class="main-color-6 text-center"><?= $row['planSch5'] ?></td>
                            <td class="main-color-6 text-center"><?= $row['planSch10'] ?></td>
                            <?
                            $itogPlan = array_sum([$row['planSch2'], $row['planSch5'], $row['planSch10']]) ?>
                            <td class="main-color-6 text-center"><?= $itogPlan ?></td>

                            <?
                            if ($row['factSch2'] == 0) { ?>
                                <td class="main-color-6 text-center"><?= $row['factSch2'] ?></td>
                                <?
                            } else {
                                if ($row['factSch2'] < $row['planSch2']) { ?>
                                    <td class="main-color-3 text-center"><?= $row['factSch2'] ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $row['factSch2'] ?></td>
                                    <?
                                }
                            } ?>
                            <?
                            if ($row['factSch5'] == 0) { ?>
                                <td class="main-color-6 text-center"><?= $row['factSch5'] ?></td>
                                <?
                            } else {
                                if ($row['factSch5'] < $row['planSch5']) { ?>
                                    <td class="main-color-3 text-center"><?= $row['factSch5'] ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $row['factSch5'] ?></td>
                                    <?
                                }
                            } ?>
                            <?
                            if ($row['factSch10'] == 0) { ?>
                                <td class="main-color-6 text-center"><?= $row['factSch10'] ?></td>
                                <?
                            } else {
                                if ($row['factSch10'] < $row['planSch10']) { ?>
                                    <td class="main-color-3 text-center"><?= $row['factSch10'] ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $row['factSch10'] ?></td>
                                    <?
                                }
                            } ?>
                            <!-- остальное -->
                            <td class="main-color text-center"><?= ($row['countResult']-$row['factSch2']-$row['factSch5']-$row['factSch10']) ?></td>
                            <?
                            $itogFact = array_sum([$row['factSch2'], $row['factSch5'], $row['factSch10'], ($row['countResult']-$row['factSch2']-$row['factSch5']-$row['factSch10'])]);
                            if ($itogFact == 0) { ?>
                                <td class="main-color-6 text-center"><?= $itogFact ?></td>
                                <?
                            } else {
                                if ($itogFact < $itogPlan) { ?>
                                    <td class="main-color-3 text-center"><?= $itogFact ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $itogFact ?></td>
                                    <?
                                }
                            } ?>
                            <?
                            $procent_sch2 = ($row['planSch2'] != 0) ? number_format(
                                ($row['factSch2'] / $row['planSch2'] * 100),
                                2,
                                '.',
                                ''
                            ) : 0;
                            $procent_sch5 = ($row['planSch5'] != 0) ? number_format(
                                ($row['factSch5'] / $row['planSch5'] * 100),
                                2,
                                '.',
                                ''
                            ) : 0;
                            $procent_sch10 = ($row['planSch10'] != 0) ? number_format(
                                ($row['factSch10'] / $row['planSch10'] * 100),
                                2,
                                '.',
                                ''
                            ) : 0;
                            $procent_itog = ($itogPlan != 0) ? number_format(
                                (($itogFact / $itogPlan) * 100),
                                2,
                                '.',
                                ''
                            ) : 0;

                            if ($procent_sch2 == 0) { ?>
                                <td class="main-color-6 text-center"><?= $procent_sch2 ?></td>
                                <?
                            } else {
                                if ($procent_sch2 < 100) { ?>
                                    <td class="main-color-3 text-center"><?= $procent_sch2 ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $procent_sch2 ?></td>
                                    <?
                                }
                            }

                            if ($procent_sch5 == 0) { ?>
                                <td class="main-color-6 text-center"><?= $procent_sch5 ?></td>
                                <?
                            } else {
                                if ($procent_sch5 < 100) { ?>
                                    <td class="main-color-3 text-center"><?= $procent_sch5 ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $procent_sch5 ?></td>
                                    <?
                                }
                            }
                            if ($procent_sch10 == 0) { ?>
                                <td class="main-color-6 text-center"><?= $procent_sch10 ?></td>
                                <?
                            } else {
                                if ($procent_sch10 < 100) { ?>
                                    <td class="main-color-3 text-center"><?= $procent_sch10 ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $procent_sch10 ?></td>
                                    <?
                                }
                            }
                            /*остальное*/
                            ?><td class="main-color text-center">--</td><?
                            if ($procent_itog == 0) { ?>
                                <td class="main-color-6 text-center"><?= $procent_itog ?></td>
                                <?
                            } else {
                                if ($procent_itog < 100) { ?>
                                    <td class="main-color-3 text-center"><?= $procent_itog ?></td>
                                    <?
                                } else { ?>
                                    <td class="text-center"><?= $procent_itog ?></td>
                                    <?
                                }
                            }
                            ?>
                        </tr>
                        <?
                        $num = 1;
                    } else {
                        if ($row['typeRow'] === 'itoFed') {?>
                            <tr>
                                <td class="main-color-7 text-center" colspan="1">Итого</td>
                                <td class="main-color-7 text-center" colspan="3"><?= Yii::$app->myComponent->get_federal_name(
                                        $row['fed']
                                    ) ?></td>
                                <td class="main-color-7 text-center"><?= $numItog ?></td>
                                <td class="main-color-7 text-center"><?= $row['planSch2'] ?></td>
                                <td class="main-color-7 text-center"><?= $row['planSch5'] ?></td>
                                <td class="main-color-7 text-center"><?= $row['planSch10'] ?></td>
                                <?
                                $itogPlan = array_sum([$row['planSch2'], $row['planSch5'], $row['planSch10']]) ?>
                                <td class="main-color-7 text-center"><?= $itogPlan ?></td>

                                <?
                                if ($row['factSch2'] == 0) { ?>
                                    <td class="main-color-6 text-center"><?= $row['factSch2'] ?></td>
                                    <?
                                } else {
                                    if ($row['factSch2'] < $row['planSch2']) { ?>
                                        <td class="main-color-3 text-center"><?= $row['factSch2'] ?></td>
                                        <?
                                    } else { ?>
                                        <td class="text-center"><?= $row['factSch2'] ?></td>
                                        <?
                                    }
                                } ?>
                                <?
                                if ($row['factSch5'] == 0) { ?>
                                    <td class="main-color-6 text-center"><?= $row['factSch5'] ?></td>
                                    <?
                                } else {
                                    if ($row['factSch5'] < $row['planSch5']) { ?>
                                        <td class="main-color-3 text-center"><?= $row['factSch5'] ?></td>
                                        <?
                                    } else { ?>
                                        <td class="text-center"><?= $row['factSch5'] ?></td>
                                        <?
                                    }
                                } ?>
                                <?
                                if ($row['factSch10'] == 0) { ?>
                                    <td class="main-color-6 text-center"><?= $row['factSch10'] ?></td>
                                    <?
                                } else {
                                    if ($row['factSch10'] < $row['planSch10']) { ?>
                                        <td class="main-color-3 text-center"><?= $row['factSch10'] ?></td>
                                        <?
                                    } else { ?>
                                        <td class="text-center"><?= $row['factSch10'] ?></td>
                                        <?
                                    }
                                } ?>
                                <!-- остальное -->
                                <td class="main-color text-center"><?= ($row['countResult']-$row['factSch2']-$row['factSch5']-$row['factSch10']) ?></td>
                                <?
                                $itogFact = array_sum([$row['factSch2'], $row['factSch5'], $row['factSch10'], ($row['countResult']-$row['factSch2']-$row['factSch5']-$row['factSch10'])]);
                                if ($itogFact == 0) { ?>
                                    <td class="main-color-6 text-center"><?= $itogFact ?></td>
                                    <?
                                } else {
                                    if ($itogFact < $itogPlan) { ?>
                                        <td class="main-color-3 text-center"><?= $itogFact ?></td>
                                        <?
                                    } else { ?>
                                        <td class="text-center"><?= $itogFact ?></td>
                                        <?
                                    }
                                } ?>
                                <?
                                $procent_sch2 = ($row['planSch2'] != 0) ? number_format(
                                    ($row['factSch2'] / $row['planSch2'] * 100),
                                    2,
                                    '.',
                                    ''
                                ) : 0;
                                $procent_sch5 = ($row['planSch5'] != 0) ? number_format(
                                    ($row['factSch5'] / $row['planSch5'] * 100),
                                    2,
                                    '.',
                                    ''
                                ) : 0;
                                $procent_sch10 = ($row['planSch10'] != 0) ? number_format(
                                    ($row['factSch10'] / $row['planSch10'] * 100),
                                    2,
                                    '.',
                                    ''
                                ) : 0;
                                $procent_itog = ($itogPlan != 0) ? number_format(
                                    (($itogFact / $itogPlan) * 100),
                                    2,
                                    '.',
                                    ''
                                ) : 0;

                                if ($procent_sch2 == 0) { ?>
                                    <td class="main-color-6 text-center"><?= $procent_sch2 ?></td>
                                    <?
                                } else {
                                    if ($procent_sch2 < 100) { ?>
                                        <td class="main-color-3 text-center"><?= $procent_sch2 ?></td>
                                        <?
                                    } else { ?>
                                        <td class="text-center"><?= $procent_sch2 ?></td>
                                        <?
                                    }
                                }

                                if ($procent_sch5 == 0) { ?>
                                    <td class="main-color-6 text-center"><?= $procent_sch5 ?></td>
                                    <?
                                } else {
                                    if ($procent_sch5 < 100) { ?>
                                        <td class="main-color-3 text-center"><?= $procent_sch5 ?></td>
                                        <?
                                    } else { ?>
                                        <td class="text-center"><?= $procent_sch5 ?></td>
                                        <?
                                    }
                                }

                                if ($procent_sch10 == 0) { ?>
                                    <td class="main-color-6 text-center"><?= $procent_sch10 ?></td>
                                    <?
                                } else {
                                    if ($procent_sch10 < 100) { ?>
                                        <td class="main-color-3 text-center"><?= $procent_sch10 ?></td>
                                        <?
                                    } else { ?>
                                        <td class="text-center"><?= $procent_sch10 ?></td>
                                        <?
                                    }
                                }
                                /*остальное*/
                                ?><td class="main-color text-center">--</td><?
                                if ($procent_itog == 0) { ?>
                                    <td class="main-color-6 text-center"><?= $procent_itog ?></td>
                                    <?
                                } else {
                                    if ($procent_itog < 100) { ?>
                                        <td class="main-color-3 text-center"><?= $procent_itog ?></td>
                                        <?
                                    } else { ?>
                                        <td class="text-center"><?= $procent_itog ?></td>
                                        <?
                                    }
                                }

                                ?>
                            </tr>
                            <?
                            if (Yii::$app->user->can('admin')) {
                                $finishRow['planSch2'] += $row['planSch2'];
                                $finishRow['planSch5'] += $row['planSch5'];
                                $finishRow['planSch10'] += $row['planSch10'];
                                $finishRow['itogPlan'] += $itogPlan;
                                $finishRow['factSch2'] += $row['factSch2'];
                                $finishRow['factSch5'] += $row['factSch5'];
                                $finishRow['factSch10'] += $row['factSch10'];
                                $finishRow['countResult'] += $row['countResult'];
                                $finishRow['itogFact'] += $itogFact;
                                $finishRow['numItog'] += $numItog;
                            }
                            $numItog = 0;
                        }
                    }
                } ?>
                <?
            } ?>
            <? if (Yii::$app->user->can('admin')) { ?>
                <!--$finishRow['planSch2'] += $row['planSch2'];
                $finishRow['planSch5'] += $row['planSch5'];
                $finishRow['planSch10'] += $row['planSch10'];
                $finishRow['itogPlan'] += $itogPlan;
                $finishRow['factSch2'] += $row['factSch2'];
                $finishRow['factSch5'] += $row['factSch5'];
                $finishRow['factSch10'] += $row['factSch10'];
                $finishRow['itogFact'] += $itogFact;-->
                <tr>
                    <td class="main-color-8 font-weight-bold text-center" colspan="4">Итого</td>
                    <td class="main-color-8 font-weight-bold text-center"><?=  $finishRow['numItog'] ?></td>
                    <td class="main-color-8 font-weight-bold text-center"><?= $finishRow['planSch2'] ?></td>
                    <td class="main-color-8 font-weight-bold text-center"><?= $finishRow['planSch5'] ?></td>
                    <td class="main-color-8 font-weight-bold text-center"><?= $finishRow['planSch10'] ?></td>
                    <td class="main-color-8 font-weight-bold text-center"><?= $finishRow['itogPlan'] ?></td>
                    <td class="main-color-8 font-weight-bold text-center"><?= $finishRow['factSch2'] ?></td>
                    <td class="main-color-8 font-weight-bold text-center"><?= $finishRow['factSch5'] ?></td>
                    <td class="main-color-8 font-weight-bold text-center"><?= $finishRow['factSch10'] ?></td>
                    <td class="main-color-8 font-weight-bold text-center"><?= ($finishRow['countResult']-$finishRow['factSch2']-$finishRow['factSch5']-$finishRow['factSch10']) ?></td>
                    <td class="main-color-8 font-weight-bold text-center"><?= $finishRow['itogFact'] ?></td>
                    <?
                    $procent_sch2 = ($finishRow['planSch2'] != 0) ? number_format(
                        ($finishRow['factSch2'] / $finishRow['planSch2'] * 100),
                        2,
                        '.',
                        ''
                    ) : 0;
                    $procent_sch5 = ($finishRow['planSch5'] != 0) ? number_format(
                        ($finishRow['factSch5'] / $finishRow['planSch5'] * 100),
                        2,
                        '.',
                        ''
                    ) : 0;
                    $procent_sch10 = ($finishRow['planSch10'] != 0) ? number_format(
                        ($finishRow['factSch10'] / $finishRow['planSch10'] * 100),
                        2,
                        '.',
                        ''
                    ) : 0;
                    $procent_itog = ($finishRow['itogPlan'] != 0) ? number_format(
                        (($finishRow['itogFact'] / $finishRow['itogPlan']) * 100),
                        2,
                        '.',
                        ''
                    ) : 0;

                    if ($procent_sch2 == 0) { ?>
                        <td class="main-color-6 text-center"><?= $procent_sch2 ?></td>
                        <?
                    } else {
                        if ($procent_sch2 < 100) { ?>
                            <td class="main-color-3 text-center"><?= $procent_sch2 ?></td>
                            <?
                        } else { ?>
                            <td class="text-center"><?= $procent_sch2 ?></td>
                            <?
                        }
                    }

                    if ($procent_sch5 == 0) { ?>
                        <td class="main-color-6 text-center"><?= $procent_sch5 ?></td>
                        <?
                    } else {
                        if ($procent_sch5 < 100) { ?>
                            <td class="main-color-3 text-center"><?= $procent_sch5 ?></td>
                            <?
                        } else { ?>
                            <td class="text-center"><?= $procent_sch5 ?></td>
                            <?
                        }
                    }

                    if ($procent_sch10 == 0) { ?>
                        <td class="main-color-6 text-center"><?= $procent_sch10 ?></td>
                        <?
                    } else {
                        if ($procent_sch10 < 100) { ?>
                            <td class="main-color-3 text-center"><?= $procent_sch10 ?></td>
                            <?
                        } else { ?>
                            <td class="text-center"><?= $procent_sch10 ?></td>
                            <?
                        }
                    }
                    ?><td class="main-color-8 font-weight-bold text-center">--</td><?
                    if ($procent_itog == 0) { ?>
                        <td class="main-color-6 text-center"><?= $procent_itog ?></td>
                        <?
                    } else {
                        if ($procent_itog < 100) { ?>
                            <td class="main-color-3 text-center"><?= $procent_itog ?></td>
                            <?
                        } else { ?>
                            <td class="text-center"><?= $procent_itog ?></td>
                            <?
                        }
                    }

                    ?>
                </tr>
                <?
            } ?>
            </tbody>
        </table>
    </div>
    <?
} ?>

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
                filename: "Отчет по «Анкета детей и родителей обучающихся».xls",
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

