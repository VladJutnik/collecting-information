<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable31 */

?>
<div class="director-table31-create table-responsive">

    <h6>31. Частота включения в цикличное (2-х недельное меню) меню ЗАВТРАКОВ отдельных блюд:</h6>
    <table class="table table-bordered table-sm">
        <tr  align="center">
            <th>№</th>
            <th>Приемы пищи</th>
            <th>Количество раз за две недели</th>
        </tr>
        <tr>
            <td align="center">31.1</td>
            <td>салаты из свежих овощей (овощи в нарезке)</td>
            <td><?= $form->field($model, 'field31_1')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.2</td>
            <td>салаты из вареных овощей</td>
            <td><?= $form->field($model, 'field31_2')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.3</td>
            <td>консервированные продукты (горох, фасоль, кукуруза, кабачковая икра)</td>
            <td><?= $form->field($model, 'field31_3')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.4</td>
            <td>каши</td>
            <td><?= $form->field($model, 'field31_4')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.5</td>
            <td>молочный суп</td>
            <td><?= $form->field($model, 'field31_5')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.6</td>
            <td>творожные блюда</td>
            <td><?= $form->field($model, 'field31_6')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.7</td>
            <td>яичные блюда</td>
            <td><?= $form->field($model, 'field31_7')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.8</td>
            <td>бутерброды</td>
            <td><?= $form->field($model, 'field31_8')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.9</td>
            <td>гарниры из круп или макарон</td>
            <td><?= $form->field($model, 'field31_9')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.10</td>
            <td>овощные гарниры (не включая блюда из картофеля)</td>
            <td><?= $form->field($model, 'field31_10')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.11</td>
            <td>гарниры из картофеля</td>
            <td><?= $form->field($model, 'field31_11')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.12</td>
            <td>гарниры из бобовых</td>
            <td><?= $form->field($model, 'field31_12')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.13</td>
            <td>основное мясное блюдо (без мяса птицы)</td>
            <td><?= $form->field($model, 'field31_13')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.14</td>
            <td>основное блюдо из мяса птицы</td>
            <td><?= $form->field($model, 'field31_14')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.15</td>
            <td>основное рыбное блюдо</td>
            <td><?= $form->field($model, 'field31_15')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.16</td>
            <td>колбасные изделия (сосиски, сардельки)</td>
            <td><?= $form->field($model, 'field31_16')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.17</td>
            <td>фрукты</td>
            <td><?= $form->field($model, 'field31_17')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.18</td>
            <td>кондитерские изделия промышленного изготовления</td>
            <td><?= $form->field($model, 'field31_18')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">31.19</td>
            <td>выпечные изделия</td>
            <td><?= $form->field($model, 'field31_19')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
