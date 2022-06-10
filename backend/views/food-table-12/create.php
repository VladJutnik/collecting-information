<?php

use yii\bootstrap4\Html;

?>
<div class="food-table12-create">

    <h6>12. Среднее количество поставщиков продуктов от производителя до школы по группам продуктов: </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th rowspan="2">№</th>
            <th rowspan="2">Группа продуктов</th>
            <th colspan="3">Среднее количество поставщиков продуктов от производителя до школы</th>
        </tr>
        <tr align="center">
            <th>Продукция РФ</th>
            <th>в т.ч. местного производства</th>
            <th>Импортная продукция</th>
        </tr>
        <tr>
            <td align="center">12.1.</td>
            <td>Молоко</td>
            <td><?= $form->field($model, 'field12_1')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_2')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_3')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">12.2.</td>
            <td>Кисломолочная продукция</td>
            <td><?= $form->field($model, 'field12_4')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_5')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_6')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">12.3.</td>
            <td>Творог</td>
            <td><?= $form->field($model, 'field12_7')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_8')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_9')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">12.4.</td>
            <td>Мясо</td>
            <td><?= $form->field($model, 'field12_10')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_11')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_12')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">12.5.</td>
            <td>Рыба</td>
            <td><?= $form->field($model, 'field12_13')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_14')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_15')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">12.6.</td>
            <td>Крупы и бобовые</td>
            <td><?= $form->field($model, 'field12_16')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_17')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_18')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">12.7.</td>
            <td>Овощи</td>
            <td><?= $form->field($model, 'field12_19')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_20')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_21')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">12.8.</td>
            <td>Картофель</td>
            <td><?= $form->field($model, 'field12_22')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_23')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_24')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">12.9.</td>
            <td>Фрукты</td>
            <td><?= $form->field($model, 'field12_25')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_26')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_27')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">12.10.</td>
            <td>Яйца</td>
            <td><?= $form->field($model, 'field12_28')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_29')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field12_30')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
