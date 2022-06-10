<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable20 */

?>
<div class="director-table20-create table-responsive">


    <h6>20. Информирование родителей о школьном питании:</h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Форма организации питания</th>
            <th>Выберите нужное</th>
        </tr>
        <tr>
            <td align="center">20.1</td>
            <td colspan="2">Информация приведена на официальном сайте</td>
        </tr>
        <tr>
            <td align="center">20.1.1</td>
            <td>По основному (организованному) меню </td>
            <td><?= $form->field($model, 'field20_1')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.1.2</td>
            <td>По ежедневному меню</td>
            <td><?= $form->field($model, 'field20_2')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.1.3</td>
            <td>По технологическим картам</td>
            <td><?= $form->field($model, 'field20_3')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.1.4</td>
            <td>По принципам здорового питания</td>
            <td><?= $form->field($model, 'field20_4')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.2</td>
            <td colspan="2">Информация размещена на стенде в общеобразовательной организации:</td>
        </tr>
        <tr>
            <td align="center">20.2.1</td>
            <td>По основному (организованному) меню </td>
            <td><?= $form->field($model, 'field20_5')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.2.2</td>
            <td>По ежедневному меню</td>
            <td><?= $form->field($model, 'field20_6')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.2.3</td>
            <td>По технологическим картам</td>
            <td><?= $form->field($model, 'field20_7')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.2.4</td>
            <td>По принципам здорового питания</td>
            <td><?= $form->field($model, 'field20_8')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.3</td>
            <td colspan="2">Информация НЕ РАЗМЕЩЕНА ни на стенде в общеобразовательной организации ни на сайте:</td>
        </tr>
        <tr>
            <td align="center">20.3.1</td>
            <td>По основному (организованному) меню </td>
            <td><?= $form->field($model, 'field20_9')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.3.2</td>
            <td>По ежедневному меню</td>
            <td><?= $form->field($model, 'field20_10')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.3.3</td>
            <td>По технологическим картам</td>
            <td><?= $form->field($model, 'field20_11')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">20.3.4</td>
            <td>По принципам здорового питания</td>
            <td><?= $form->field($model, 'field20_12')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
