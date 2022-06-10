<?php

use yii\bootstrap4\Html;

?>
<div class="food-table13-create">

    <h6>13. Оценка организации питания в общеобразовательной организации: </h6>
    <table class="table table-bordered table-sm">
        <tr>
            <td>№</td>
            <td>Группа блюд или группа продуктов</td>
            <td>Завтраки</td>
            <td>обеды</td>
            <td>дополнительное питание</td>
            <td>Питание детей с заболеваниями, требующими индивидуального подхода</td>
        </tr>
        <tr>
            <td>13.1.</td>
            <td>отлично</td>
            <td><?= $form->field($model, 'field13_1')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_2')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_3')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_4')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td>13.2.</td>
            <td>хорошо</td>
            <td><?= $form->field($model, 'field13_5')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_6')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_7')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_8')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td>13.3.</td>
            <td>удовлетворительно</td>
            <td><?= $form->field($model, 'field13_9')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_10')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_11')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_12')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td>13.4.</td>
            <td>не удовлетворительно</td>
            <td><?= $form->field($model, 'field13_13')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_14')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_15')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field13_16')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
