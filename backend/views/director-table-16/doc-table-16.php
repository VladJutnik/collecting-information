

<div><b>16. Количество детей, с МУКОВИСЦИДОЗОМ, требующими индивидуального подхода в организации питания:</div></b>
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
        <td align="center">16.1</td>
        <td>МУКОВИСЦИДОЗОМ</td>
        <td align="center"><?= $model->field16_1?></td>
        <td align="center"><?= $model->field16_2?></td>
        <td align="center"><?= $model->field16_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field16_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">16.1.1</td>
        <td>Из них, находится на домашнем обучении</td>
        <td align="center"><?= $model->field16_5?></td>
        <td align="center"><?= $model->field16_6?></td>
        <td align="center"><?= $model->field16_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field16_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">16.1.2</td>
        <td>Обучается очно</td>
        <td align="center"><?= $model->field16_9?></td>
        <td align="center"><?= $model->field16_10?></td>
        <td align="center"><?= $model->field16_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field16_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">16.1.2.1</td>
        <td>Питается в школе организованно</td>
        <td align="center"><?= $model->field16_13?></td>
        <td align="center"><?= $model->field16_14?></td>
        <td align="center"><?= $model->field16_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field16_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">16.1.2.2</td>
        <td>Питается в школе принесённой из дома едой</td>
        <td align="center"><?= $model->field16_17?></td>
        <td align="center"><?= $model->field16_18?></td>
        <td align="center"><?= $model->field16_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field16_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">16.1.2.3</td>
        <td>Не питается в школе</td>
        <td align="center"><?= $model->field16_21?></td>
        <td align="center"><?= $model->field16_22?></td>
        <td align="center"><?= $model->field16_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field16_24?></td>
        <? } ?>
    </tr>
</table>
