
<div><b>17. Количество детей, с ОГРАНИЧЕННЫМИ ВОЗМОЖНОСТЯМИ ЗДОРОВЬЯ, требующими индивидуального подхода в организации
    питания:</div></b>
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
        <td align="center">17.1</td>
        <td>ОВЗ</td>
        <td align="center"><?= $model->field17_1?></td>
        <td align="center"><?= $model->field17_2?></td>
        <td align="center"><?= $model->field17_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field17_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">17.1.1</td>
        <td>Из них, находится на домашнем обучении</td>
        <td align="center"><?= $model->field17_5?></td>
        <td align="center"><?= $model->field17_6?></td>
        <td align="center"><?= $model->field17_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field17_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">17.1.2</td>
        <td>Обучается очно</td>
        <td align="center"><?= $model->field17_9?></td>
        <td align="center"><?= $model->field17_10?></td>
        <td align="center"><?= $model->field17_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field17_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">17.1.2.1</td>
        <td>Питается в школе организованно</td>
        <td align="center"><?= $model->field17_13?></td>
        <td align="center"><?= $model->field17_14?></td>
        <td align="center"><?= $model->field17_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field17_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">17.1.2.2</td>
        <td>Питается в школе принесённой из дома едой</td>
        <td align="center"><?= $model->field17_17?></td>
        <td align="center"><?= $model->field17_18?></td>
        <td align="center"><?= $model->field17_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field17_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">17.1.2.3</td>
        <td>Не питается в школе</td>
        <td align="center"><?= $model->field17_21?></td>
        <td align="center"><?= $model->field17_22?></td>
        <td align="center"><?= $model->field17_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field17_24?></td>
        <? } ?>
    </tr>
</table>