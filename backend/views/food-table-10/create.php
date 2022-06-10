<?php

use yii\bootstrap4\Html;

?>
<div class="food-table10-create">

    <h6>10. Укажите количество школ (из числа участвующих в анкетировании), в которые поставляется пищевая продукция: </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Группа продуктов</th>
            <th>Пищевое сырье</th>
            <th>Полуфабрикаты</th>
            <th>Готовая продукция</th>
        </tr>
        <tr>
            <td align="center">10.1.</td>
            <td>Мясо</td>
            <td><?= $form->field($model, 'field10_1')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field10_2')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field10_3')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">10.2.</td>
            <td>Птица</td>
            <td><?= $form->field($model, 'field10_4')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field10_5')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field10_6')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">10.3.</td>
            <td>Рыба</td>
            <td><?= $form->field($model, 'field10_7')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field10_8')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field10_9')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">10.4.</td>
            <td>Овощи</td>
            <td><?= $form->field($model, 'field10_10')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field10_11')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field10_12')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">10.5.</td>
            <td>Картофель</td>
            <td><?= $form->field($model, 'field10_13')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field10_14')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field10_15')->textInput(['type' => 'number', 'min' => '0'])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
