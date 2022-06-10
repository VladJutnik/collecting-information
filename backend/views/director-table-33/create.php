<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable33 */

?>
<div class="director-table33-create table-responsive">

    <h6>33.	Оценка организации питания в общеобразовательной организации – ответьте в формате ДА, выбрав нужное:</h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Группа блюд или группа продуктов</th>
            <th>Завтраки</th>
            <th>обеды</th>
            <th>дополнительное питание</th>
            <th>Питание детей с заболеваниями, требующими индивидуального подхода</th>
        </tr>
        <tr>
            <td align="center">33.1</td>
            <td>отлично</td>
            <td><?= $form->field($model, 'field33_1')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_2')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_3')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_4')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">33.2</td>
            <td>хорошо</td>
            <td><?= $form->field($model, 'field33_5')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_6')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_7')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_8')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">33.3</td>
            <td>удовлетворительно</td>
            <td><?= $form->field($model, 'field33_9')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_10')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_11')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_12')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">33.4</td>
            <td>не удовлетворительно</td>
            <td><?= $form->field($model, 'field33_13')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_14')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_15')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field33_16')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
