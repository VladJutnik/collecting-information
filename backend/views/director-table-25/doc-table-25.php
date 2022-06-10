
<div><b>25. Формы организации основного питания:</div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Формы организации основного питания</th>
        <th>Выберите нужное</th>
    </tr>
    <tr>
        <td align="center">25.1</td>
        <td>Классический завтрак и обед (1 ассортимент блюд)</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field25_1)?></td>

    </tr>
    <tr>
        <td align="center">25.2</td>
        <td>Завтрак и обед с блюдами по выбору (несколько вариантов ассортимента блюд)</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field25_2)?></td>
    </tr>
    <tr>
        <td align="center">25.3</td>
        <td>Шведский стол</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field25_3)?></td>
    </tr>
</table>
