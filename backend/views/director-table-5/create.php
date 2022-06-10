<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable5 */

?>
<div class="director-table5-create table-responsive">

    <h6>5. Количество детей, посещающих группу продленного дня, обучающихся на подвозе: </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Показатели</th>
            <th>1-4 кл.</th>
            <th>5-9 кл.</th>
            <th>10-11 кл.</th>
        </tr>
        <tr>
            <td align="center">5.1.</td>
            <td>Количество детей, посещающих группу продленного дня</td>
            <td><?= $form->field($model, 'field5_1')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field5_2')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field5_3')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
        <tr>
            <td align="center">5.2.</td>
            <td>Количество детей, обучающихся на подвозе</td>
            <td><?= $form->field($model, 'field5_5')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field5_6')->textInput(['type' => 'number'])->label(false)?></td>
            <td><?= $form->field($model, 'field5_7')->textInput(['type' => 'number'])->label(false)?></td>
        </tr>
    </table>

</div>
