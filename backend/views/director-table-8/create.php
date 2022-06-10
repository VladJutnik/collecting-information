<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable4 */

?>
<div class="director-table8-create table-responsive">

    <h6>8.	Количество детей, охваченных организованным питанием, из числа обучающихся во вторую смену (количество питающихся не может быть больше количества учеников – п. 8.4 ≤ п. 4.1.2. – по возрастным группам и в целом). ЭТОТ ВОПРОС заполняется, если в школе есть вторая смена:</h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Показатели</th>
            <th>1-4 кл.</th>
            <th>5-9 кл.</th>
            <th>10-11 кл.</th>
        </tr>
        <tr>
            <td align="center">8.1.</td>
            <td>Охвачены одноразовым горячим организованным питанием  </td>
            <td><?= $form->field($model, 'field8_1')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_2')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_3')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">8.1.1.</td>
            <td>В т.ч. - горячие завтраки </td>
            <td><?= $form->field($model, 'field8_5')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_6')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_7')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">8.1.2.</td>
            <td>Обеды </td>
            <td><?= $form->field($model, 'field8_9')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_10')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_11')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">8.2.</td>
            <td>Охвачены двухразовым питанием (завтраки+обеды)</td>
            <td><?= $form->field($model, 'field8_13')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_14')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_15')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">8.3.</td>
            <td>Охвачены трехразовым питанием (завтраки+обеды+полдники)</td>
            <td><?= $form->field($model, 'field8_17')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_18')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_19')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">8.4.</td>
            <td>Охвачено организованным питанием всего  </td>
            <td><?= $form->field($model, 'field8_21')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_22')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field8_23')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
    </table>

</div>
