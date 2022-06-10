<div><b>3.	Проектная вместимость общеобразовательной организации: </b> <?=$model->field3?></div>
<div><b>4. Количество детей обучающихся в школе:</b></div>
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
        <td align="center">4.1.</td>
        <td>Обучается очно (всего)</td>
        <td align="center"><?= $model->field4_1?></td>
        <td align="center"><?= $model->field4_2?></td>
        <td align="center"><?= $model->field4_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field4_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">4.1.1.</td>
        <td>В т.ч. в первую смену</td>
        <td align="center"><?= $model->field4_5?></td>
        <td align="center"><?= $model->field4_6?></td>
        <td align="center"><?= $model->field4_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field4_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">4.1.2.</td>
        <td>Во вторую смену</td>
        <td align="center"><?= $model->field4_9?></td>
        <td align="center"><?= $model->field4_10?></td>
        <td align="center"><?= $model->field4_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field4_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">4.1.3.</td>
        <td>В третью смену</td>
        <td align="center"><?= $model->field4_13?></td>
        <td align="center"><?= $model->field4_14?></td>
        <td align="center"><?= $model->field4_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field4_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">4.2.</td>
        <td>Обучается на дому (всего) </td>
        <td align="center"><?= $model->field4_17?></td>
        <td align="center"><?= $model->field4_18?></td>
        <td align="center"><?= $model->field4_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field4_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">4.3.</td>
        <td>Всего обучающихся </td>
        <td align="center"><?= $model->field4_21?></td>
        <td align="center"><?= $model->field4_22?></td>
        <td align="center"><?= $model->field4_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field4_24?></td>
        <? } ?>
    </tr>
</table>