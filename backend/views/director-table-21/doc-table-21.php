
<div><b>21. Использование в меню для детей обогащенной витаминами и микроэлементами пищевой продукции:</div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Показатели</th>
        <th>Витаминами</th>
        <th>Микроэлементами</th>
    </tr>
    <tr>
        <td align="center">21.1</td>
        <td>Наличие в меню обогащенной продукции, за исключением соли поваренной йодированной (в любой)</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_1)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_2)?></td>
    </tr>
    <tr>
        <td align="center">21.1.1</td>
        <td>в том числе, хлеб и хлебобулочные изделия</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_3)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_4)?></td>
    </tr>
    <tr>
        <td align="center">21.1.2</td>
        <td>молоко и молочная продукция</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_5)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_6)?></td>
    </tr>
    <tr>
        <td align="center">21.1.3</td>
        <td>кисели</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_7)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_8)?></td>
    </tr>
    <tr>
        <td align="center">21.1.4</td>
        <td>напитки</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_9)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_10)?></td>
    </tr>
    <tr>
        <td align="center">21.1.5</td>
        <td>иная продукция</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_11)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field21_12)?></td>
    </tr>
</table>

