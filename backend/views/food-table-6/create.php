<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable4 */

?>
<div class="food-table6-create">

    <h6>6. Количество школ, в которых обучаются дети с заболеваниями, требующими индивидуальный подход в организации питания
        (заполняется по всем обсуживаемым школам, участвующим в анкетировании): </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Показатели</th>
            <th>Количество школ</th>
            <th>Из них, имеют утвержденное меню</th>
        </tr>
        <tr>
            <td align="center">6.1.</td>
            <td>Сахарный диабет</td>
            <td><?= $form->field($model, 'field6_1')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_2')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.2.</td>
            <td>Пищевая аллергия</td>
            <td><?= $form->field($model, 'field6_3')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_4')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.3.</td>
            <td>Целиакия</td>
            <td><?= $form->field($model, 'field6_5')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_6')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.4.</td>
            <td>Фенилкетонурия</td>
            <td><?= $form->field($model, 'field6_7')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_8')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">6.5.</td>
            <td>Муковисцидоз</td>
            <td><?= $form->field($model, 'field6_9')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field6_10')->textInput(['type' => 'number', 'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
