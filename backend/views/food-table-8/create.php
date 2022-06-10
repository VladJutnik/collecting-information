<?php

use yii\bootstrap4\Html;

?>
<div class="food-table8-create">

    <h6>8. Укажите количество школ (из числа участвующих в анкетировании), в которые поставляется пищевая продукция,
        обогащенная витаминами и микроэлементами: </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Показатели</th>
            <th>Витаминами</th>
            <th>Микроэле-ментами</th>
        </tr>
        <tr>
            <td align="center">8.1.</td>
            <td>Наличие в меню обогащенной продукции, за исключением соли поваренной йодированной</td>
            <td><?= $form->field($model, 'field8_1')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field8_2')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">8.1.1.</td>
            <td>в том числе, хлеб и хлебобулочные изделия</td>
            <td><?= $form->field($model, 'field8_3')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field8_4')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">8.1.2.</td>
            <td>молоко и молочная продукция</td>
            <td><?= $form->field($model, 'field8_5')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field8_6')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">8.1.3.</td>
            <td>кисели</td>
            <td><?= $form->field($model, 'field8_7')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field8_8')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">8.1.4.</td>
            <td>напитки</td>
            <td><?= $form->field($model, 'field8_9')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field8_10')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">8.1.5.</td>
            <td>соль пищевая поваренная йодированная</td>
            <td><?= $form->field($model, 'field8_13')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field8_14')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">8.1.6.</td>
            <td>иная продукция</td>
            <td><?= $form->field($model, 'field8_11')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field8_12')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
