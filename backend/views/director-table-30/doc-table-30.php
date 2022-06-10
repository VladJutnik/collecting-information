
<div><b>30. Стоимость школьного питания по основному меню (руб/чел/день):</div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Приемы пищи</th>
        <th>1-4 кл.</th>
        <th>5-9 кл.</th>
        <th>10-11 кл.</th>
        <? if (Yii::$app->user->can('admin')) { ?>
        <th>ИТОГО</th>
        <? } ?>
    </tr>
    <tr>
        <td align="center">30.1</td>
        <td>Завтрак</td>
        <td align="center"><?= $model->field30_1?></td>
        <td align="center"><?= $model->field30_2?></td>
        <td align="center"><?= $model->field30_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field30_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">30.1.1</td>
        <td>Обед</td>
        <td align="center"><?= $model->field30_5?></td>
        <td align="center"><?= $model->field30_6?></td>
        <td align="center"><?= $model->field30_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field30_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">30.1.2</td>
        <td>Полдник </td>
        <td align="center"><?= $model->field30_9?></td>
        <td align="center"><?= $model->field30_10?></td>
        <td align="center"><?= $model->field30_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field30_12?></td>
        <? } ?>
    </tr>
</table>
