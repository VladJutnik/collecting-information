
<div><b>9.	Количество детей, охваченных организованным питанием, из числа обучающихся в третью смену:</div></b>
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
        <td align="center">9.1.</td>
        <td>Охвачены одноразовым горячим организованным питанием  </td>
        <td align="center"><?= $model->field9_1?></td>
        <td align="center"><?= $model->field9_2?></td>
        <td align="center"><?= $model->field9_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field9_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">9.1.1.</td>
        <td>В т.ч. - горячие завтраки </td>
        <td align="center"><?= $model->field9_5?></td>
        <td align="center"><?= $model->field9_6?></td>
        <td align="center"><?= $model->field9_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field9_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">9.1.2.</td>
        <td>Обеды </td>
        <td align="center"><?= $model->field9_9?></td>
        <td align="center"><?= $model->field9_10?></td>
        <td align="center"><?= $model->field9_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field9_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td>9.2.</td>
        <td>Охвачены двухразовым питанием (завтраки+обеды)</td>
        <td align="center"><?= $model->field9_13?></td>
        <td align="center"><?= $model->field9_14?></td>
        <td align="center"><?= $model->field9_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field9_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td>9.3.</td>
        <td>Охвачены трехразовым питанием (завтраки+обеды+полдники)</td>
        <td align="center"><?= $model->field9_17?></td>
        <td align="center"><?= $model->field9_18?></td>
        <td align="center"><?= $model->field9_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field9_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td>9.4.</td>
        <td>Охвачено организованным питанием всего  </td>
        <td align="center"><?= $model->field9_21?></td>
        <td align="center"><?= $model->field9_22?></td>
        <td align="center"><?= $model->field9_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field9_24?></td>
        <? } ?>
    </tr>
</table>
