
<div><b>8.	Количество детей, охваченных организованным питанием, из числа обучающихся во вторую смену:</div></b>
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
        <td align="center">8.1.</td>
        <td>Охвачены одноразовым горячим организованным питанием  </td>
        <td align="center"><?= $model->field8_1?></td>
        <td align="center"><?= $model->field8_2?></td>
        <td align="center"><?= $model->field8_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field8_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">8.1.1.</td>
        <td>В т.ч. - горячие завтраки </td>
        <td align="center"><?= $model->field8_5?></td>
        <td align="center"><?= $model->field8_6?></td>
        <td align="center"><?= $model->field8_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field8_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">8.1.2.</td>
        <td>Обеды </td>
        <td align="center"><?= $model->field8_9?></td>
        <td align="center"><?= $model->field8_10?></td>
        <td align="center"><?= $model->field8_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field8_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">8.2.</td>
        <td>Охвачены двухразовым питанием (завтраки+обеды) </td>
        <td align="center"><?= $model->field8_13?></td>
        <td align="center"><?= $model->field8_14?></td>
        <td align="center"><?= $model->field8_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field8_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">8.3.</td>
        <td>Охвачены трехразовым питанием (завтраки+обеды+полдники)</td>
        <td align="center"><?= $model->field8_17?></td>
        <td align="center"><?= $model->field8_18?></td>
        <td align="center"><?= $model->field8_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field8_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">8.4.</td>
        <td>Охвачено организованным питанием всего  </td>
        <td align="center"><?= $model->field8_21?></td>
        <td align="center"><?= $model->field8_22?></td>
        <td align="center"><?= $model->field8_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field8_24?></td>
        <? } ?>
    </tr>
</table>
