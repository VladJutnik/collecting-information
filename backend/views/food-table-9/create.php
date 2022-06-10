<?php

use yii\bootstrap4\Html;

?>
<div class="food-table9-create">

    <h6>9. Укажите количество школ (из числа участвующих в анкетировании), в которые поставляется пищевая продукция, после
        проведения дополнительных исследований по показателям качества: </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th colspan="2">Количество школ (из числа участвующих в анкетировании), в которые поставляется пищевая
                продукция, после проведения дополнительных исследований
            </th>
        </tr>
        <tr>
            <td align="center">9.1.</td>
            <td>по показателям фальсификации</td>
            <td><?= $form->field($model, 'field9_1')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">9.2.</td>
            <td>на антибиотики</td>
            <td><?= $form->field($model, 'field9_2')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">9.3.</td>
            <td>на пестициды</td>
            <td><?= $form->field($model, 'field9_3')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">9.4.</td>
            <td>на содержание витаминов и микроэлементов</td>
            <td><?= $form->field($model, 'field9_4')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">9.5.</td>
            <td>на микробиологические показатели</td>
            <td><?= $form->field($model, 'field9_5')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
