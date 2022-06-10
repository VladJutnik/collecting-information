<?php

use yii\bootstrap4\Html;

?>
<div class="food-table11-create">

    <h6>11. Среднедневное количество за цикл отгружаемой в один день продукции для питания школьников в обслуживаемые школы
        (из числа участвующих в анкетировании) в кг: </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Группа продуктов</th>
            <th>Продукция РФ</th>
            <th>в т.ч. местного производства</th>
            <th>Импортная продукция</th>
        </tr>
        <tr>
            <td align="center">11.1.</td>
            <td>Молоко</td>
            <td><?= $form->field($model, 'field11_1')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_2')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_3')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">11.2.</td>
            <td>Кисломолочная продукция</td>
            <td><?= $form->field($model, 'field11_4')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_5')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_6')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">11.3.</td>
            <td>Творог</td>
            <td><?= $form->field($model, 'field11_7')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_8')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_9')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">11.4.</td>
            <td>Мясо</td>
            <td><?= $form->field($model, 'field11_10')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_11')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_12')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">11.5.</td>
            <td>Рыба</td>
            <td><?= $form->field($model, 'field11_13')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_14')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_15')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">11.6.</td>
            <td>Крупы и бобовые</td>
            <td><?= $form->field($model, 'field11_16')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_17')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_18')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">11.7.</td>
            <td>Овощи</td>
            <td><?= $form->field($model, 'field11_19')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_20')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_21')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">11.8.</td>
            <td>Картофель</td>
            <td><?= $form->field($model, 'field11_22')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_23')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_24')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">11.9.</td>
            <td>Фрукты</td>
            <td><?= $form->field($model, 'field11_25')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_26')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_27')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">11.10.</td>
            <td>Яйца</td>
            <td><?= $form->field($model, 'field11_28')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_29')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field11_30')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
