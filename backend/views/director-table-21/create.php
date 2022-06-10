<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable21 */

?>
<div class="director-table21-create table-responsive">

    <h6>21. Использование в меню для детей обогащенной витаминами и микроэлементами пищевой продукции:</h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Показатели</th>
            <th>Витаминами</th>
            <th>Микроэлементами</th>
        </tr>
        <tr>
            <td align="center">21.1</td>
            <td>Наличие в меню обогащенной продукции, за исключением соли поваренной йодированной (в любой) – если да, то необходимо указать за счет чего, где допускается множественный выбор (21.1.1-21.1.4)</td>
            <td><?= $form->field($model, 'field21_1')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field21_2')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">21.1.1</td>
            <td>в том числе, хлеб и хлебобулочные изделия</td>
            <td><?= $form->field($model, 'field21_3')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field21_4')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">21.1.2</td>
            <td>молоко и молочная продукция</td>
            <td><?= $form->field($model, 'field21_5')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field21_6')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">21.1.3</td>
            <td>кисели</td>
            <td><?= $form->field($model, 'field21_7')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field21_8')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">21.1.4</td>
            <td>напитки</td>
            <td><?= $form->field($model, 'field21_9')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field21_10')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">21.1.5</td>
            <td>иная продукция</td>
            <td><?= $form->field($model, 'field21_11')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field21_12')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
