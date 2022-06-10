<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable25 */

?>
<div class="director-table25-create table-responsive">

    <h6>25. Формы организации основного питания</h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Формы организации основного питания</th>
            <th>Выберите нужное</th>
        </tr>
        <tr>
            <td align="center">25.1</td>
            <td>Классический завтрак и обед (1 ассортимент блюд)</td>
            <td><?= $form->field($model, 'field25_1')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">25.2</td>
            <td>Завтрак и обед с блюдами по выбору (несколько вариантов ассортимента блюд)</td>
            <td><?= $form->field($model, 'field25_2')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">25.3</td>
            <td>Шведский стол</td>
            <td><?= $form->field($model, 'field25_3')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
