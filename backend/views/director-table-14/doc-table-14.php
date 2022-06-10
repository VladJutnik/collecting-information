

<div><b>14.	Количество детей, с ЦЕЛИАКИЕЙ, требующими индивидуального подхода в организации питания:</div></b>
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
        <td align="center">14.1.</td>
        <td>ЦЕЛИАКИЕЙ </td>
        <td align="center"><?= $model->field14_1?></td>
        <td align="center"><?= $model->field14_2?></td>
        <td align="center"><?= $model->field14_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field14_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">14.1.1</td>
        <td>Из них, находится на домашнем обучении </td>
        <td align="center"><?= $model->field14_5?></td>
        <td align="center"><?= $model->field14_6?></td>
        <td align="center"><?= $model->field14_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field14_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">14.1.2</td>
        <td>Обучается очно </td>
        <td align="center"><?= $model->field14_9?></td>
        <td align="center"><?= $model->field14_10?></td>
        <td align="center"><?= $model->field14_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field14_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">14.1.2.1</td>
        <td>Питается в школе организованно</td>
        <td align="center"><?= $model->field14_13?></td>
        <td align="center"><?= $model->field14_14?></td>
        <td align="center"><?= $model->field14_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field14_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">14.1.2.2</td>
        <td>Питается в школе принесённой из дома едой</td>
        <td align="center"><?= $model->field14_17?></td>
        <td align="center"><?= $model->field14_18?></td>
        <td align="center"><?= $model->field14_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field14_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">14.1.2.3</td>
        <td>Не питается в школе</td>
        <td align="center"><?= $model->field14_21?></td>
        <td align="center"><?= $model->field14_22?></td>
        <td align="center"><?= $model->field14_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field14_24?></td>
        <? } ?>
    </tr>
</table>
