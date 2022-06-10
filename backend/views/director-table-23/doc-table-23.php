<div><b>22.	Количество посадочных мест в столовой :</b> <?=$model->field22?></div>
<div><b>23. Количество детей, организованно питающихся по переменам </div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Количество детей организованно питающихся</th>
        <th>1-4 кл.</th>
        <th>5-9 кл.</th>
        <th>10-11 кл.</th>
        <? if (Yii::$app->user->can('admin')) { ?>
        <th>ИТОГО</th>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.1</td>
        <td>В I смену</td>
        <td align="center"><?= $model->field23_1?></td>
        <td align="center"><?= $model->field23_2?></td>
        <td align="center"><?= $model->field23_3?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.1.1</td>
        <td>в т.ч. перед первым уроком</td>
        <td align="center"><?= $model->field23_5?></td>
        <td align="center"><?= $model->field23_6?></td>
        <td align="center"><?= $model->field23_7?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.1.2</td>
        <td>после первого урока</td>
        <td align="center"><?= $model->field23_9?></td>
        <td align="center"><?= $model->field23_10?></td>
        <td align="center"><?= $model->field23_11?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.1.3</td>
        <td>после второго урока</td>
        <td align="center"><?= $model->field23_13?></td>
        <td align="center"><?= $model->field23_14?></td>
        <td align="center"><?= $model->field23_15?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.1.4</td>
        <td>после третьего урока</td>
        <td align="center"><?= $model->field23_17?></td>
        <td align="center"><?= $model->field23_18?></td>
        <td align="center"><?= $model->field23_19?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.1.5</td>
        <td>после четвертого урока</td>
        <td align="center"><?= $model->field23_21?></td>
        <td align="center"><?= $model->field23_22?></td>
        <td align="center"><?= $model->field23_23?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_24?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.1.6</td>
        <td>после пятого урока</td>
        <td align="center"><?= $model->field23_25?></td>
        <td align="center"><?= $model->field23_26?></td>
        <td align="center"><?= $model->field23_27?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_28?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.1.7</td>
        <td>после шестого урока</td>
        <td align="center"><?= $model->field23_29?></td>
        <td align="center"><?= $model->field23_30?></td>
        <td align="center"><?= $model->field23_31?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_32?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.1.8</td>
        <td>после седьмого урока</td>
        <td align="center"><?= $model->field23_33?></td>
        <td align="center"><?= $model->field23_34?></td>
        <td align="center"><?= $model->field23_35?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_36?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.2</td>
        <td>Во II смену</td>
        <td align="center"><?= $model->field23_37?></td>
        <td align="center"><?= $model->field23_38?></td>
        <td align="center"><?= $model->field23_39?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_40?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.2.1</td>
        <td>в т.ч. перед первым уроком</td>
        <td align="center"><?= $model->field23_41?></td>
        <td align="center"><?= $model->field23_42?></td>
        <td align="center"><?= $model->field23_43?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_44?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.2.2</td>
        <td>после первого урока</td>
        <td align="center"><?= $model->field23_45?></td>
        <td align="center"><?= $model->field23_46?></td>
        <td align="center"><?= $model->field23_47?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_48?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.2.3</td>
        <td>после второго урока</td>
        <td align="center"><?= $model->field23_49?></td>
        <td align="center"><?= $model->field23_50?></td>
        <td align="center"><?= $model->field23_51?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_52?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.2.4</td>
        <td>после третьего урока</td>
        <td align="center"><?= $model->field23_53?></td>
        <td align="center"><?= $model->field23_54?></td>
        <td align="center"><?= $model->field23_55?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_56?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.2.5</td>
        <td>после четвертого урока</td>
        <td align="center"><?= $model->field23_57?></td>
        <td align="center"><?= $model->field23_58?></td>
        <td align="center"><?= $model->field23_59?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_60?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.2.6</td>
        <td>после пятого урока</td>
        <td align="center"><?= $model->field23_61?></td>
        <td align="center"><?= $model->field23_62?></td>
        <td align="center"><?= $model->field23_63?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_64?></td>
        <? } ?>
    </tr>

     <tr>
        <td align="center">23.3</td>
        <td>Во III смену</td>
        <td align="center"><?= $model->field23_65?></td>
        <td align="center"><?= $model->field23_66?></td>
        <td align="center"><?= $model->field23_67?></td>
         <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_68?></td>
         <? } ?>
    </tr>
    <tr>
        <td align="center">23.3.1</td>
        <td>в т.ч. перед первым уроком</td>
        <td align="center"><?= $model->field23_69?></td>
        <td align="center"><?= $model->field23_70?></td>
        <td align="center"><?= $model->field23_71?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_72?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.3.2</td>
        <td>после первого урока</td>
        <td align="center"><?= $model->field23_73?></td>
        <td align="center"><?= $model->field23_74?></td>
        <td align="center"><?= $model->field23_75?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_76?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.3.3</td>
        <td>после второго урока</td>
        <td align="center"><?= $model->field23_77?></td>
        <td align="center"><?= $model->field23_78?></td>
        <td align="center"><?= $model->field23_79?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_80?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.3.4</td>
        <td>после третьего урока</td>
        <td align="center"><?= $model->field23_81?></td>
        <td align="center"><?= $model->field23_82?></td>
        <td align="center"><?= $model->field23_83?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_84?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.3.5</td>
        <td>после четвертого урока</td>
        <td align="center"><?= $model->field23_85?></td>
        <td align="center"><?= $model->field23_86?></td>
        <td align="center"><?= $model->field23_87?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_88?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">23.4</td>
        <td>ИТОГО</td>
        <td align="center"><?= $model->field23_89?></td>
        <td align="center"><?= $model->field23_90?></td>
        <td align="center"><?= $model->field23_91?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field23_92?></td>
        <? } ?>
    </tr>

</table>
