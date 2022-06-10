
<div><b>10.Количество детей, охваченных организованным питанием: </div></b>
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
        <td align="center">10.1</td>
        <td>Охвачены одноразовым горячим организованным питанием  </td>
        <td align="center"><?= $model->field10_1?></td>
        <td align="center"><?= $model->field10_2?></td>
        <td align="center"><?= $model->field10_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field10_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">10.1.1.</td>
        <td>В т.ч. - горячие завтраки </td>
        <td align="center"><?= $model->field10_5?></td>
        <td align="center"><?= $model->field10_6?></td>
        <td align="center"><?= $model->field10_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field10_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">10.1.2.</td>
        <td>Обеды </td>
        <td align="center"><?= $model->field10_9?></td>
        <td align="center"><?= $model->field10_10?></td>
        <td align="center"><?= $model->field10_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field10_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">10.2.</td>
        <td>Охвачены двухразовым питанием  </td>
        <td align="center"><?= $model->field10_13?></td>
        <td align="center"><?= $model->field10_14?></td>
        <td align="center"><?= $model->field10_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field10_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">10.3.</td>
        <td>Охвачены трехразовым питанием </td>
        <td align="center"><?= $model->field10_17?></td>
        <td align="center"><?= $model->field10_18?></td>
        <td align="center"><?= $model->field10_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field10_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">10.4.</td>
        <td>Охвачено организованным питанием всего  </td>
        <td align="center"><?= $model->field10_21?></td>
        <td align="center"><?= $model->field10_22?></td>
        <td align="center"><?= $model->field10_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field10_24?></td>
        <? } ?>
    </tr>
</table>

