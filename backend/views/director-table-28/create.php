<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable28 */

?>
<div class="director-table28-create table-responsive">

    <h6>28. Форма организации питьевого режима:</h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Форма организации питьевого режима</th>
            <th>Выберите нужное</th>
        </tr>
        <tr>
            <td align="center">28.1</td>
            <td>Питьевые фонтанчики</td>
            <td><?= $form->field($model, 'field28_1')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">28.2</td>
            <td>Кулеры</td>
            <td><?= $form->field($model, 'field28_2')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">28.3</td>
            <td>Бутилированная вода</td>
            <td><?= $form->field($model, 'field28_3')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">28.4</td>
            <td>Кипяченая вода</td>
            <td><?= $form->field($model, 'field28_4')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">28.5</td>
            <td>Питьевой режим не организован</td>
            <td><?= $form->field($model, 'field28_5')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
