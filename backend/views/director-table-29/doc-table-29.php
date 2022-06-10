
<div><b>29.	В реализации каких образовательных программах по здоровому питанию принимает участие общеобразовательная организация:</div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th rowspan="2">№</th>
        <th rowspan="2">Образовательные программы по здоровому питанию</th>
        <th colspan="3">Вовлекаемые в программу контингенты</th>
        <? if (Yii::$app->user->can('admin')) { ?>
        <th rowspan="2">ИТОГО</th>
        <? } ?>
    </tr>
    <tr align="center">
        <th>1-4 кл.</th>
        <th>5-9 кл.</th>
        <th>10-11 кл.</th>
    </tr>
    <tr>
        <td align="center">29.1</td>
        <td>«Основы здорового питания» для детей школьного возраста (Роспотребнадзор)</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_1)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_2)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_3)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field29_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">29.1.1</td>
        <td>«Школьное молоко»</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_5)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_6)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_7)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field29_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">29.1.2</td>
        <td>«Разговор о правильном питании»</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_9)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_10)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_11)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field29_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">29.1.3</td>
        <td>Образовательные программы по здоровому питанию не реализуются</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_13)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_14)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field29_15)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field29_16?></td>
        <? } ?>
    </tr>
</table>
