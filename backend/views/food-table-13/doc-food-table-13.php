
<div><b>13. Оценка организации питания в общеобразовательной организации: </b></div>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Группа блюд или группа продуктов</th>
        <th>Завтраки</th>
        <th>обеды</th>
        <th>дополнительное питание</th>
        <th>Питание детей с заболеваниями, требующими индивидуального подхода</th>
    </tr>
    <tr>
        <td>13.1.</td>
        <td>отлично</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_1) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_2) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_3) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_4) ?></td>
    </tr>
    <tr>
        <td>13.2.</td>
        <td>хорошо</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_5) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_6) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_7) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_8) ?></td>
    </tr>
    <tr>
        <td>13.3.</td>
        <td>удовлетворительно</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_9) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_10) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_11) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_12) ?></td>
    </tr>
    <tr>
        <td>13.4.</td>
        <td>не удовлетворительно</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_13) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_14) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_15) ?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field13_16) ?></td>
    </tr>
</table>