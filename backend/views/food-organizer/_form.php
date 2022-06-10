<?php

/* @var $this yii\web\View */
/* @var $model common\models\FoodOrganizer */

?>

<h6>5. Количество детей, обучающихся и питающихся в обслуживаемых школах (заполняется по каждой обслуживаемой
    школе). </h6>
<table class="table table-bordered table-sm">
    <tr>
        <td>№</td>
        <td>Показатели</td>
        <td>1-4 кл.</td>
        <td>5-10 кл.</td>
        <td>10-11 кл.</td>
    </tr>
    <tr>
        <td>5.1.</td>
        <td>Всего детей</td>
        <td><?= $form->field($model, 'field5_1')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_2')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_3')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
    </tr>
    <tr>
        <td>5.2.</td>
        <td>Из них охвачены однократным горячим организованным питанием</td>
        <td><?= $form->field($model, 'field5_5')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_6')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_7')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
    </tr>
    <tr>
        <td>5.2.1.</td>
        <td>В т.ч. - горячие завтраки</td>
        <td><?= $form->field($model, 'field5_9')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_10')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_11')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
    </tr>
    <tr>
        <td>5.2.2.</td>
        <td>Обеды</td>
        <td><?= $form->field($model, 'field5_13')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_14')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_15')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
    </tr>
    <tr>
        <td>5.3.</td>
        <td>Охвачены двухразовым питанием (завтраки+обеды)</td>
        <td><?= $form->field($model, 'field5_17')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_18')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_19')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
    </tr>
    <tr>
        <td>5.4.</td>
        <td>Охвачены трехразовым питанием (завтраки+обеды+полдники)</td>
        <td><?= $form->field($model, 'field5_21')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_22')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_23')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
    </tr>
    <tr>
        <td>5.5.</td>
        <td>Охвачено организованным питанием всего (5.2+5.3+5.4)</td>
        <td><?= $form->field($model, 'field5_25')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_26')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
        <td><?= $form->field($model, 'field5_27')->textInput([
                'type' => 'number',
                'min' => '0',
                'max' => '9999'
            ])->label(
                false
            ) ?></td>
    </tr>
</table>

