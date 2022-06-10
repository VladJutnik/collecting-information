<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable4 */

?>
<div class="director-table6-create table-responsive">

    <h6>6. Наличие в школе утвержденного меню:</h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Показатели</th>
            <th>1-4 кл.</th>
            <th>5-9 кл.</th>
            <th>10-11 кл.</th>
        </tr>
        <tr>
            <td align="center">6.1.</td>
            <td>Основное меню</td>
            <td><?= $form->field($model, 'field6_1')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_2')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_3')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.2.</td>
            <td>Дополнительное меню (ассортимент буфетной продукции)</td>
            <td><?= $form->field($model, 'field6_5')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_6')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_7')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.3.</td>
            <td>Меню для детей с САХАРНЫМ ДИАБЕТОМ</td>
            <td><?= $form->field($model, 'field6_9')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_10')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_11')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.4.</td>
            <td>Меню для детей с ПИЩЕВОЙ АЛЛЕРГИЕЙ</td>
            <td><?= $form->field($model, 'field6_13')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_14')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_15')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.5.</td>
            <td>Меню для детей с ЦЕЛИАКИЕЙ</td>
            <td><?= $form->field($model, 'field6_17')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_18')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_19')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.6.</td>
            <td>Меню для детей с ФЕНИЛКЕТОНУРИЕЙ</td>
            <td><?= $form->field($model, 'field6_21')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_22')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_23')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.7.</td>
            <td>Меню для детей с МУКОВИСЦИДОЗОМ</td>
            <td><?= $form->field($model, 'field6_25')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_26')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_27')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.8.</td>
            <td>Меню для детей в ОВЗ</td>
            <td><?= $form->field($model, 'field6_29')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_30')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_31')->dropdownList(Yii::$app->myComponent->statusHaveNo())->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
