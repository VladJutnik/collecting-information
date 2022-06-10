
<div><b>15.	Количество детей, с ФЕНИЛКЕТОНУРИЕЙ, требующими индивидуального подхода в организации питания:</div></b>
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
        <td align="center">15.1</td>
        <td>ФЕНИЛКЕТОНУРИЕЙ  </td>
        <td align="center"><?= $model->field15_1?></td>
        <td align="center"><?= $model->field15_2?></td>
        <td align="center"><?= $model->field15_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field15_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">15.1.1</td>
        <td>Из них, находится на домашнем обучении </td>
        <td align="center"><?= $model->field15_5?></td>
        <td align="center"><?= $model->field15_6?></td>
        <td align="center"><?= $model->field15_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field15_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">15.1.2</td>
        <td>Обучается очно </td>
        <td align="center"><?= $model->field15_9?></td>
        <td align="center"><?= $model->field15_10?></td>
        <td align="center"><?= $model->field15_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field15_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">15.1.2.1</td>
        <td>Питается в школе организованно</td>
        <td align="center"><?= $model->field15_13?></td>
        <td align="center"><?= $model->field15_14?></td>
        <td align="center"><?= $model->field15_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field15_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">15.1.2.2</td>
        <td>Питается в школе принесённой из дома едой</td>
        <td align="center"><?= $model->field15_17?></td>
        <td align="center"><?= $model->field15_18?></td>
        <td align="center"><?= $model->field15_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field15_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">15.1.2.3</td>
        <td>Не питается в школе</td>
        <td align="center"><?= $model->field15_21?></td>
        <td align="center"><?= $model->field15_22?></td>
        <td align="center"><?= $model->field15_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field15_24?></td>
        <? } ?>
    </tr>
</table>
