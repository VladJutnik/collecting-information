<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable4 */

?>
<div class="director-table12-create table-responsive">

    <h6>12.	Количество детей, с САХАНЫМ ДАБЕТОМ, требующими индивидуального подхода в организации питания </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Показатели</th>
            <th>1-4 кл.</th>
            <th>5-9 кл.</th>
            <th>10-11 кл.</th>
        </tr>
        <tr>
            <td align="center">12.1.</td>
            <td>САХАРНЫМ ДИАБЕТОМ  </td>
            <td><?= $form->field($model, 'field12_1')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_2')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_3')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">12.1.1.</td>
            <td>Из них, находится на домашнем обучении </td>
            <td><?= $form->field($model, 'field12_5')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_6')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_7')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">12.1.2.</td>
            <td>Обучается очно  </td>
            <td><?= $form->field($model, 'field12_9')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_10')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_11')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">12.1.2.1</td>
            <td>Питается в школе организованно </td>
            <td><?= $form->field($model, 'field12_13')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_14')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_15')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">12.1.2.2.</td>
            <td>Питается в школе принесённой из дома едой </td>
            <td><?= $form->field($model, 'field12_17')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_18')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_19')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">12.1.2.3.</td>
            <td>Не питается в школе</td>
            <td><?= $form->field($model, 'field12_21')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_22')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field12_23')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
    </table>

</div>
