<div><b>5. Количество детей, посещающих группу продленного дня, обучающихся на подвозе:</b></div>
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
        <td align="center">5.1.</td>
        <td>Количество детей, посещающих группу продленного дня</td>
        <td align="center"><?= $model->field5_1 ?></td>
        <td align="center"><?= $model->field5_2 ?></td>
        <td align="center"><?= $model->field5_3 ?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field5_4 ?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">5.2.</td>
        <td>Количество детей, обучающихся на подвозе</td>
        <td align="center"><?= $model->field5_5 ?></td>
        <td align="center"><?= $model->field5_6 ?></td>
        <td align="center"><?= $model->field5_7 ?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field5_8 ?></td>
        <? } ?>
    </tr>
</table>