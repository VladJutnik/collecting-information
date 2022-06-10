
<div><b>7. Количество детей, охваченных организованным питанием, из числа обучающихся в первую смену:</div></b>
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
        <td align="center">7.1.</td>
        <td>Охвачены одноразовым горячим организованным питанием </td>
        <td  align="center"><?= $model->field7_1?></td>
        <td  align="center"><?= $model->field7_2?></td>
        <td  align="center"><?= $model->field7_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td  align="center"><?= $model->field7_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">7.1.1.</td>
        <td>В т.ч. - горячие завтраки </td>
        <td  align="center"><?= $model->field7_5?></td>
        <td  align="center"><?= $model->field7_6?></td>
        <td  align="center"><?= $model->field7_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td  align="center"><?= $model->field7_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">7.1.2.</td>
        <td>Обеды </td>
        <td  align="center"><?= $model->field7_9?></td>
        <td  align="center"><?= $model->field7_10?></td>
        <td  align="center"><?= $model->field7_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td  align="center"><?= $model->field7_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">7.2.</td>
        <td>Охвачены двухразовым питанием (завтраки+обеды) </td>
        <td  align="center"><?= $model->field7_13?></td>
        <td  align="center"><?= $model->field7_14?></td>
        <td  align="center"><?= $model->field7_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td  align="center"><?= $model->field7_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">7.3.</td>
        <td>Охвачены трехразовым питанием (завтраки+обеды+полдники) </td>
        <td  align="center"><?= $model->field7_17?></td>
        <td  align="center"><?= $model->field7_18?></td>
        <td  align="center"><?= $model->field7_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td  align="center"><?= $model->field7_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">7.4.</td>
        <td>Охвачено организованным питанием всего  </td>
        <td  align="center"><?= $model->field7_21?></td>
        <td  align="center"><?= $model->field7_22?></td>
        <td  align="center"><?= $model->field7_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td  align="center"><?= $model->field7_24?></td>
        <? } ?>
    </tr>
</table>
