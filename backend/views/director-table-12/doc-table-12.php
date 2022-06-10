
<div><b>12.	Количество детей, с САХАНЫМ ДАБЕТОМ, требующими индивидуального подхода в организации питания:</div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Показатели</th>
        <th>1-4 кл.</th>
        <th>5-9 кл.</th>
        <th>10-11 кл.</th>
        <? if (Yii::$app->user->can('admin')) { ?>
        <th>ИТОГО</th>
        <? } ?>
    </tr>
    <tr>
        <td align="center">12.1.</td>
        <td>САХАРНЫМ ДИАБЕТОМ  </td>
        <td align="center"><?= $model->field12_1?></td>
        <td align="center"><?= $model->field12_2?></td>
        <td align="center"><?= $model->field12_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field12_4?></td>
        <? } ?>

    </tr>
    <tr>
        <td align="center">12.1.1.</td>
        <td>Из них, находится на домашнем обучении </td>
        <td align="center"><?= $model->field12_5?></td>
        <td align="center"><?= $model->field12_6?></td>
        <td align="center"><?= $model->field12_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field12_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">12.1.2.</td>
        <td>Обучается очно  </td>
        <td align="center"><?= $model->field12_9?></td>
        <td align="center"><?= $model->field12_10?></td>
        <td align="center"><?= $model->field12_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field12_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">12.1.2.1</td>
        <td>Питается в школе организованно </td>
        <td align="center"><?= $model->field12_13?></td>
        <td align="center"><?= $model->field12_14?></td>
        <td align="center"><?= $model->field12_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field12_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">12.1.2.2.</td>
        <td>Питается в школе принесённой из дома едой </td>
        <td align="center"><?= $model->field12_17?></td>
        <td align="center"><?= $model->field12_18?></td>
        <td align="center"><?= $model->field12_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field12_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">12.1.2.3.</td>
        <td>Не питается в школе</td>
        <td align="center"><?= $model->field12_21?></td>
        <td align="center"><?= $model->field12_22?></td>
        <td align="center"><?= $model->field12_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field12_24?></td>
        <? } ?>
    </tr>
</table>