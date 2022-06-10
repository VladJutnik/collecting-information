
<div><b>20. Информирование родителей о школьном питании:</div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Форма организации питания</th>
        <th>Выберите нужное</th>
    </tr>
    <tr>
        <td align="center">20.1</td>
        <td align="center" colspan="2">Информация приведена на официальном сайте</td>
    </tr>
    <tr>
        <td align="center">20.1.1</td>
        <td>По основному (организованному) меню </td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_1)?></td>
    </tr>
    <tr>
        <td align="center">20.1.2</td>
        <td>По ежедневному меню</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_2)?></td>
    </tr>
    <tr>
        <td align="center">20.1.3</td>
        <td>По технологическим картам</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_3)?></td>
    </tr>
    <tr>
        <td align="center">20.1.4</td>
        <td>По принципам здорового питания</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_4)?></td>
    </tr>
    <tr>
        <td align="center">20.2</td>
        <td  align="center" colspan="2">Информация размещена на стенде в общеобразовательной организации:</td>
    </tr>
    <tr>
        <td>20.2.1</td>
        <td align="center">По основному (организованному) меню </td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_5)?></td>
    </tr>
    <tr>
        <td align="center">20.2.2</td>
        <td>По ежедневному меню</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_6)?></td>
    </tr>
    <tr>
        <td align="center">20.2.3</td>
        <td>По технологическим картам</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_7)?></td>
    </tr>
    <tr>
        <td align="center">20.2.4</td>
        <td>По принципам здорового питания</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_8)?></td>
    </tr>
    <tr>
        <td align="center">20.3</td>
        <td colspan="2" align="center">Информация НЕ РАЗМЕЩЕНА ни на стенде в общеобразовательной организации ни на сайте:</td>
    </tr>
    <tr>
        <td align="center">20.3.1</td>
        <td>По основному (организованному) меню </td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_9)?></td>
    </tr>
    <tr>
        <td align="center">20.3.2</td>
        <td>По ежедневному меню</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_10)?></td>
    </tr>
    <tr>
        <td align="center">20.3.3</td>
        <td>По технологическим картам</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_11)?></td>
    </tr>
    <tr>
        <td align="center">20.3.4</td>
        <td>По принципам здорового питания</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field20_12)?></td>
    </tr>
</table>
