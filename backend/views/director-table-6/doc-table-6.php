
<div><b>6. Наличие в школе утвержденного меню</div></b>
<table border="1" class="table table-bordered table-sm table-anket-views">
    <tr align="center">
        <th>№</th>
        <th>Показатели</th>
        <th>1-4 кл.</th>
        <th>5-9 кл.</th>
        <th>10-11 кл.</th>
        <? if (Yii::$app->user->can('admin')) { ?>
        <th>ИТОГО</th>
        <? } ?>
    </tr>
    <tr>
        <td align="center">6.1.</td>
        <td>Основное меню</td>
        <td  align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_1)?></td>
        <td  align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_2)?></td>
        <td  align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_3)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td  align="center"><?= $model->field6_4?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">6.2.</td>
        <td>Дополнительное меню (ассортимент буфетной продукции)</td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_5)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_6)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_7)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field6_8?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">6.3.</td>
        <td>Меню для детей с САХАРНЫМ ДИАБЕТОМ</td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_9)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_10)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_11)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field6_12?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">6.4.</td>
        <td>Меню для детей с ПИЩЕВОЙ АЛЛЕРГИЕЙ</td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_13)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_14)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_15)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field6_16?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">6.5.</td>
        <td>Меню для детей с ЦЕЛИАКИЕЙ</td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_17)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_18)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_19)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field6_20?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">6.6.</td>
        <td>Меню для детей с ФЕНИЛКЕТОНУРИЕЙ</td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_21)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_22)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_23)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field6_24?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">6.7.</td>
        <td>Меню для детей с МУКОВИСЦИДОЗОМ</td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_25)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_26)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_27)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field6_28?></td>
        <? } ?>
    </tr>
    <tr>
        <td align="center">6.8.</td>
        <td>Меню для детей в ОВЗ</td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_29)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_30)?></td>
        <td align="center"><?= Yii::$app->myComponent->statusHaveNo($model->field6_31)?></td>
        <? if (Yii::$app->user->can('admin')) { ?>
        <td align="center"><?= $model->field6_32?></td>
        <? } ?>
    </tr>
</table>
