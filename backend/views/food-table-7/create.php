<?php

use yii\bootstrap4\Html;

?>
<div class="food-table7-create">

    <h6>7. Количество школьников, получающих организованное питание, требующих индивидуальный подход в организации питания
        (заполняется по всем обсуживаемым школам, участвующим в анкетировании): </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th rowspan="3">№</th>
            <th rowspan="3">Показатели</th>
            <th colspan="4">Количество школьников, получающих организованное питание</th>
        </tr>
        <tr align="center">
            <th rowspan="2">всего</th>
            <th colspan="3">в т.ч.</th>
        </tr>
        <tr align="center">
            <th>1-4 кл.</th>
            <th>5-9 кл.</th>
            <th>10-11 кл.</th>
        </tr>
        <tr>
            <td align="center">7.1.</td>
            <td>Сахарный диабет</td>
            <td><?= $form->field($model, 'field7_1')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_2')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_3')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_4')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">7.2.</td>
            <td>Пищевая аллергия</td>
            <td><?= $form->field($model, 'field7_5')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_6')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_7')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_8')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">7.3.</td>
            <td>Целиакия</td>
            <td><?= $form->field($model, 'field7_9')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_10')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_11')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_12')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">7.4.</td>
            <td>Фенилкетонурия</td>
            <td><?= $form->field($model, 'field7_13')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_14')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_15')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_16')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">7.5.</td>
            <td>Муковисцидоз</td>
            <td><?= $form->field($model, 'field7_17')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_18')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_19')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field7_20')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
