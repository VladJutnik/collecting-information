<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable32 */

?>
<div class="director-table32-create table-responsive">

    <h6>32.	Частота включения в цикличное (2-х недельное меню) меню ОБЕДОВ отдельных блюд- заполните таблицу по всем графам: </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Приемы пищи</th>
            <th>Количество раз за две недели</th>
        </tr>
        <tr>
            <td align="center">32.1</td>
            <td>Первые блюда из круп и макарон</td>
            <td><?= $form->field($model, 'field32_1')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.2</td>
            <td>Первые блюда овощные</td>
            <td><?= $form->field($model, 'field32_2')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.3</td>
            <td>салаты из свежих овощей (овощи в нарезке)</td>
            <td><?= $form->field($model, 'field32_3')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.4</td>
            <td>салаты из вареных овощей</td>
            <td><?= $form->field($model, 'field32_4')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.5</td>
            <td>гарниры из круп или макарон</td>
            <td><?= $form->field($model, 'field32_5')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.6</td>
            <td>овощные гарниры (не включая блюда из картофеля)</td>
            <td><?= $form->field($model, 'field32_6')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.7</td>
            <td>гарниры из картофеля</td>
            <td><?= $form->field($model, 'field32_7')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.8</td>
            <td>гарниры из бобовых</td>
            <td><?= $form->field($model, 'field32_8')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.9</td>
            <td>основное мясное блюдо (без мяса птицы)</td>
            <td><?= $form->field($model, 'field32_9')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.10</td>
            <td>основное блюдо из мяса птицы</td>
            <td><?= $form->field($model, 'field32_10')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.11</td>
            <td>основное рыбное блюдо</td>
            <td><?= $form->field($model, 'field32_11')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.12</td>
            <td>колбасные изделия (сосиски, сардельки)</td>
            <td><?= $form->field($model, 'field32_12')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.13</td>
            <td>творожные блюда</td>
            <td><?= $form->field($model, 'field32_13')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.14</td>
            <td>яичные блюда</td>
            <td><?= $form->field($model, 'field32_14')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.15</td>
            <td>фрукты</td>
            <td><?= $form->field($model, 'field32_15')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.16</td>
            <td>консервированные продукты (горох, фасоль, кукуруза, кабачковая икра)</td>
            <td><?= $form->field($model, 'field32_16')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.17</td>
            <td>кондитерские изделия промышленного изготовления</td>
            <td><?= $form->field($model, 'field32_17')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.18</td>
            <td>выпечные изделия</td>
            <td><?= $form->field($model, 'field32_18')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.19</td>
            <td>компоты</td>
            <td><?= $form->field($model, 'field32_19')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.20</td>
            <td>кисели</td>
            <td><?= $form->field($model, 'field32_20')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">32.21</td>
            <td>соки</td>
            <td><?= $form->field($model, 'field32_21')->textInput(['type' => 'number', 'min' => '0', 'max' => '10'])->label(
                    false
                ) ?></td>
        </tr>
    </table>

</div>
