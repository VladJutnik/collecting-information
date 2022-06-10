<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable17 */

?>
<div class="director-table17-create table-responsive">

    <h6>17. Количество детей, с ОГРАНИЧЕННЫМИ ВОЗМОЖНОСТЯМИ ЗДОРОВЬЯ, требующими индивидуального подхода в организации
        питания </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Количество детей с</th>
            <th>1-4 кл.</th>
            <th>5-9 кл.</th>
            <th>10-11 кл.</th>
        </tr>
        <tr>
            <td align="center">17.1</td>
            <td>ОВЗ</td>
            <td><?= $form->field($model, 'field17_1')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_2')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_3')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">17.1.1</td>
            <td>Из них, находится на домашнем обучении</td>
            <td><?= $form->field($model, 'field17_5')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_6')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_7')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">17.1.2</td>
            <td>Обучается очно</td>
            <td><?= $form->field($model, 'field17_9')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_10')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_11')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">17.1.2.1</td>
            <td>Питается в школе организованно</td>
            <td><?= $form->field($model, 'field17_13')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_14')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_15')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">17.1.2.2</td>
            <td>Питается в школе принесённой из дома едой</td>
            <td><?= $form->field($model, 'field17_17')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_18')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_19')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">17.1.2.3</td>
            <td>Не питается в школе</td>
            <td><?= $form->field($model, 'field17_21')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_22')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field17_23')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
