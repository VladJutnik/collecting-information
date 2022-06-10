<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable30 */

?>
<div class="director-table30-create table-responsive">

    <h6>30. Стоимость школьного питания по основному меню (руб/чел/день):</h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Приемы пищи</th>
            <th>1-4 кл.</th>
            <th>5-9 кл.</th>
            <th>10-11 кл.</th>
        </tr>
        <tr>
            <td align="center">30.1</td>
            <td>Завтрак</td>
            <td><?= $form->field($model, 'field30_1')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field30_2')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field30_3')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">30.1.1</td>
            <td>Обед</td>
            <td><?= $form->field($model, 'field30_5')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field30_6')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field30_7')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">30.1.2</td>
            <td>Полдник </td>
            <td><?= $form->field($model, 'field30_9')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field30_10')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field30_11')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
