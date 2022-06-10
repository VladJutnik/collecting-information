<?php

use yii\helpers\Html;

?>
<div class="director-table10-create table-responsive">

    <h6>10.	Количество детей, охваченных организованным питанием (логика – количество питающихся не может быть больше количества учеников –п. 10.4 ≤ п. 4.3. – по возрастным группам и в целом):</h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Показатели</th>
            <th>1-4 кл.</th>
            <th>5-9 кл.</th>
            <th>10-11 кл.</th>
        </tr>
        <tr>
            <td align="center">10.1</td>
            <td>Охвачены одноразовым горячим организованным питанием</td>
            <td><?= $form->field($model, 'field10_1')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_2')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_3')->textInput(['type' => 'number'])->label(false) ?></td>
        </tr>
        <tr>
            <td align="center">10.1.1.</td>
            <td>В т.ч. - горячие завтраки</td>
            <td><?= $form->field($model, 'field10_5')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_6')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_7')->textInput(['type' => 'number'])->label(false) ?></td>
        </tr>
        <tr>
            <td align="center">10.1.2.</td>
            <td>Обеды</td>
            <td><?= $form->field($model, 'field10_9')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_10')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_11')->textInput(['type' => 'number'])->label(false) ?></td>
        </tr>
        <tr>
            <td align="center">10.2.</td>
            <td>Охвачены двухразовым питанием</td>
            <td><?= $form->field($model, 'field10_13')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_14')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_15')->textInput(['type' => 'number'])->label(false) ?></td>
        </tr>
        <tr>
            <td align="center">10.3.</td>
            <td>Охвачены трехразовым питанием</td>
            <td><?= $form->field($model, 'field10_17')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_18')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_19')->textInput(['type' => 'number'])->label(false) ?></td>
        </tr>
        <tr>
            <td align="center">10.4.</td>
            <td>Охвачено организованным питанием всего</td>
            <td><?= $form->field($model, 'field10_21')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_22')->textInput(['type' => 'number'])->label(false) ?></td>
            <td><?= $form->field($model, 'field10_23')->textInput(['type' => 'number'])->label(false) ?></td>
        </tr>
    </table>

</div>
