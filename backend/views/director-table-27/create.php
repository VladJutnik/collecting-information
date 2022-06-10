<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable27 */

?>
<div class="director-table27-create table-responsive">

    <h6> 27. Ассортимент продукции, реализуемой в буфете: </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Ассортимент продукции, реализуемой в буфете</th>
            <th>Выберите нужное</th>
        </tr>
        <tr>
            <td align="center">27.1</td>
            <td>Овощные салаты, овощи, готовые к употреблению</td>
            <td><?= $form->field($model, 'field27_1')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.2</td>
            <td>Первые блюда</td>
            <td><?= $form->field($model, 'field27_2')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.3</td>
            <td>Гарниры</td>
            <td><?= $form->field($model, 'field27_3')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.4</td>
            <td>Основные (мясные и рыбные) блюда</td>
            <td><?= $form->field($model, 'field27_4')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.5</td>
            <td>Каши</td>
            <td><?= $form->field($model, 'field27_5')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.6</td>
            <td>Молочные продукты, в т.ч. напитки</td>
            <td><?= $form->field($model, 'field27_6')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.7</td>
            <td>Соки фруктовые и фруктово-овощные</td>
            <td><?= $form->field($model, 'field27_7')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.8</td>
            <td>Сокосодержащие напитки с добавлением сахара</td>
            <td><?= $form->field($model, 'field27_8')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.9</td>
            <td>Выпечные изделия собственного приготовления</td>
            <td><?= $form->field($model, 'field27_9')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.10</td>
            <td>Бутерброды</td>
            <td><?= $form->field($model, 'field27_10')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.11</td>
            <td>Кондитерские изделия (за исключением печенья, злаковых и фруктово-злаковых батончиков)</td>
            <td><?= $form->field($model, 'field27_11')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.12</td>
            <td>Печенье</td>
            <td><?= $form->field($model, 'field27_12')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>

        <tr>
            <td align="center">27.13</td>
            <td>Злаковые и фруктово-злаковые батончики</td>
            <td><?= $form->field($model, 'field27_13')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.14</td>
            <td>Фрукты</td>
            <td><?= $form->field($model, 'field27_14')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">27.15</td>
            <td>Сладкие газированные напитки</td>
            <td><?= $form->field($model, 'field27_15')->dropdownList(Yii::$app->myComponent->statusYesNo())->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
