
<div><b>18. Типы пищеблоков в общеобразовательной организации:</div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Типы столовых в общеобразовательной организации</th>
        <th>Количество столовых</th>
    </tr>
    <tr>
        <td align="center">18.1</td>
        <td>Работает на продовольственном сырье</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field18_1)?></td>
    </tr>
    <tr>
        <td align="center">18.2</td>
        <td>Работает на продовольственном сырье и полуфабрикатах</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field18_2)?></td>
    </tr>
    <tr>
        <td align="center">18.3</td>
        <td>Работает на полуфабрикатах</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field18_3)?></td>
    </tr>
    <tr>
        <td align="center">18.4</td>
        <td>Работает в режиме буфета-раздаточной</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field18_4)?></td>
    </tr>
    <tr>
        <td align="center">18.5</td>
        <td>Комната для приема пищи</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field18_5)?></td>
    </tr>
</table>
