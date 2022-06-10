<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable4 */

?>
<div class="director-table4-create ">
    <?= $form->field($model, 'field3', [
        'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1'],
    ])->textInput(['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6']) ?>

    <h6>4. Количество детей обучающихся в школе: </h6>
    <div class=" table-responsive">
        <table class="table table-bordered table-sm">
            <tr align="center">
                <th>№</th>
                <th>Показатели</th>
                <th>1-4 кл.</th>
                <th>5-9 кл.</th>
                <th>10-11 кл.</th>
            </tr>
            <tr>
                <td align="center">4.1.</td>
                <td>Обучается очно (всего)</td>
                <td><?= $form->field($model, 'field4_1')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_2')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_3')->textInput(['type' => 'number'])->label(false) ?></td>
            </tr>
            <tr>
                <td align="center">4.1.1.</td>
                <td>В т.ч. в первую смену</td>
                <td><?= $form->field($model, 'field4_5')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_6')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_7')->textInput(['type' => 'number'])->label(false) ?></td>
            </tr>
            <tr>
                <td align="center">4.1.2.</td>
                <td>Во вторую смену</td>
                <td><?= $form->field($model, 'field4_9')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_10')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_11')->textInput(['type' => 'number'])->label(false) ?></td>
            </tr>
            <tr>
                <td align="center">4.1.3.</td>
                <td>В третью смену</td>
                <td><?= $form->field($model, 'field4_13')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_14')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_15')->textInput(['type' => 'number'])->label(false) ?></td>
            </tr>
            <tr>
                <td align="center">4.2.</td>
                <td>Обучается на дому (всего)</td>
                <td><?= $form->field($model, 'field4_17')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_18')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_19')->textInput(['type' => 'number'])->label(false) ?></td>
            </tr>
            <tr>
                <td align="center">4.3.</td>
                <td>Всего обучающихся</td>
                <td><?= $form->field($model, 'field4_21')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_22')->textInput(['type' => 'number'])->label(false) ?></td>
                <td><?= $form->field($model, 'field4_23')->textInput(['type' => 'number'])->label(false) ?></td>
            </tr>
        </table>
    </div>
</div>
