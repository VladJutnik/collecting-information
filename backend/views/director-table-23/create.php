<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorTable23 */

?>
<div class="director-table23-create table-responsive">
    <?= $form->field($model, 'field22', ['options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
        'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 font-weight-bold mt-1']
    ])->textInput(['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6'])?>
    
    <h6>23. Количество детей, организованно питающихся по переменам: </h6>
    <table class="table table-bordered table-sm">
        <tr align="center">
            <th>№</th>
            <th>Количество детей организованно питающихся</th>
            <th>1-4 кл.</th>
            <th>5-9 кл.</th>
            <th>10-11 кл.</th>
        </tr>
        <tr>
            <td align="center">23.1</td>
            <td>В I смену</td>
            <td><?= $form->field($model, 'field23_1')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_2')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_3')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.1.1</td>
            <td>в т.ч. перед первым уроком</td>
            <td><?= $form->field($model, 'field23_5')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_6')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_7')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.1.2</td>
            <td>после первого урока</td>
            <td><?= $form->field($model, 'field23_9')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_10')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_11')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.1.3</td>
            <td>после второго урока</td>
            <td><?= $form->field($model, 'field23_13')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_14')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_15')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.1.4</td>
            <td>после третьего урока</td>
            <td><?= $form->field($model, 'field23_17')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_18')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_19')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.1.5</td>
            <td>после четвертого урока</td>
            <td><?= $form->field($model, 'field23_21')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_22')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_23')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.1.6</td>
            <td>после пятого урока</td>
            <td><?= $form->field($model, 'field23_25')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_26')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_27')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.1.7</td>
            <td>после шестого урока</td>
            <td><?= $form->field($model, 'field23_29')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_30')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_31')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.1.8</td>
            <td>после седьмого урока</td>
            <td><?= $form->field($model, 'field23_33')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_34')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_35')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.2</td>
            <td>Во II смену</td>
            <td><?= $form->field($model, 'field23_37')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_38')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_39')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.2.1</td>
            <td>в т.ч. перед первым уроком</td>
            <td><?= $form->field($model, 'field23_41')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_42')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_43')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.2.2</td>
            <td>после первого урока</td>
            <td><?= $form->field($model, 'field23_45')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_46')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_47')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.2.3</td>
            <td>после второго урока</td>
            <td><?= $form->field($model, 'field23_49')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_50')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_51')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.2.4</td>
            <td>после третьего урока</td>
            <td><?= $form->field($model, 'field23_53')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_54')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_55')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.2.5</td>
            <td>после четвертого урока</td>
            <td><?= $form->field($model, 'field23_57')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_58')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_59')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.2.6</td>
            <td>после пятого урока</td>
            <td><?= $form->field($model, 'field23_61')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_62')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_63')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.3</td>
            <td>Во III смену</td>
            <td><?= $form->field($model, 'field23_65')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_66')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_67')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.3.1</td>
            <td>в т.ч. перед первым уроком</td>
            <td><?= $form->field($model, 'field23_69')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_70')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_71')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.3.2</td>
            <td>после первого урока</td>
            <td><?= $form->field($model, 'field23_73')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_74')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_75')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.3.3</td>
            <td>после второго урока</td>
            <td><?= $form->field($model, 'field23_77')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_78')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_79')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.3.4</td>
            <td>после третьего урока</td>
            <td><?= $form->field($model, 'field23_81')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_82')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_83')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.3.5</td>
            <td>после четвертого урока</td>
            <td><?= $form->field($model, 'field23_85')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_86')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_87')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>
        <tr>
            <td align="center">23.4</td>
            <td>ИТОГО</td>
            <td><?= $form->field($model, 'field23_89')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_90')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
            <td><?= $form->field($model, 'field23_91')->textInput(['type' => 'number',  'min'=>0])->label(
                    false
                ) ?></td>
        </tr>

    </table>

</div>
