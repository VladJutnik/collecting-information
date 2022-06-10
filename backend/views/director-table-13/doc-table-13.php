
<div><b>13.	Количество детей, с ПИЩЕВОЙ АЛЛЕРГИЕЙ, требующими индивидуального подхода в организации питания: </div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Количество детей с</th>
        <th>1-4 кл.</th>
        <th>5-9 кл.</th>
        <th>10-11 кл.</th>
        <? if (Yii::$app->user->can('admin')) { ?>
        <th>ИТОГО</th>
        <? } ?>
    </tr>
    <tr>
        <td align="center">13.1.</td>
        <td>ПИШЕВОЙ АЛЛЕРГИЕЙ</td>
        <td align="center"><?= $model->field13_1?></td>
        <td align="center"><?= $model->field13_2?></td>
        <td align="center"><?= $model->field13_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field13_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">13.1.1</td>
        <td>Из них, находится на домашнем обучении</td>
        <td align="center"><?= $model->field13_5?></td>
        <td align="center"><?= $model->field13_6?></td>
        <td align="center"><?= $model->field13_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field13_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">13.1.2</td>
        <td>Обучается очно</td>
        <td align="center"><?= $model->field13_9?></td>
        <td align="center"><?= $model->field13_10?></td>
        <td align="center"><?= $model->field13_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field13_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">13.1.2.1</td>
        <td>Питается в школе организованно</td>
        <td align="center"><?= $model->field13_13?></td>
        <td align="center"><?= $model->field13_14?></td>
        <td align="center"><?= $model->field13_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field13_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">13.1.2.2</td>
        <td>Питается в школе принесённой из дома едой</td>
        <td align="center"><?= $model->field13_17?></td>
        <td align="center"><?= $model->field13_18?></td>
        <td align="center"><?= $model->field13_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field13_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">13.1.2.3</td>
        <td>Не питается в школе</td>
        <td align="center"><?= $model->field13_21?></td>
        <td align="center"><?= $model->field13_22?></td>
        <td align="center"><?= $model->field13_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field13_24?></td>
        <? } ?>
    </tr>
</table>