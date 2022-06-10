<div><b>26. Формы организации дополнительного питания:</div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Формы организации дополнительного питания</th>
        <th>Выберите нужное</th>
    </tr>
    <tr>
        <td align="center">26.1</td>
        <td>Буфет – розничная торговля блюдами и продуктами</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field26_1) ?></td>
    </tr>
    <tr>
        <td align="center">26.2</td>
        <td>Предоставление комплексных обедов (с основной линии раздачи)</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field26_2) ?></td>
    </tr>
    <tr>
        <td align="center">26.3</td>
        <td>Предоставление блюд по выбору (с основной линии раздачи)</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field26_3) ?></td>
    </tr>
    <tr>
        <td align="center">26.4</td>
        <td>Вендинговое оборудование</td>
        <td align="center"><?= Yii::$app->myComponent->statusYesNo($model->field26_4) ?></td>
    </tr>
</table>