<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deti_anket_table_28_34".
 *
 * @property int $id
 * @property int $field28_1
 * @property int $field28_2
 * @property int $field28_3
 * @property int $field28_4
 * @property int $field28_5
 * @property int $field28_6
 * @property int $field28_7
 * @property int $field28_8
 * @property int $field28_9
 * @property int $field29_1
 * @property int $field29_2
 * @property int $field29_3
 * @property int $field29_4
 * @property int $field29_5
 * @property int $field29_6
 * @property int $field30
 * @property int $field31_1
 * @property int $field31_2
 * @property int $field31_3
 * @property int $field32
 * @property int $field33
 * @property int $field34
 * @property int $field34_1
 * @property int $field34_2
 * @property int $field34_3
 * @property int $field34_4
 * @property int $field34_5
 * @property int $field34_6
 * @property int $field34_7
 * @property int $field34_8
 * @property int $field34_9
 * @property string $create_at
 */
class DetiAnketTable2834 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deti_anket_table_28_34';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'field26',
                ],
                'required',
            ],
            [[
                'field27',
                'field28_1',
                'field28_2',
                'field28_3',
                'field28_4',
                'field28_5',
                'field28_6',
                'field28_7',
                'field28_8',
                'field29_1',
                'field29_2',
                'field29_3',
                'field29_4',
                'field29_5',
                'field29_6',
                'field31_1',
                'field31_2',
                'field31_3',
                'field32',
                'field33',
                'field34',
                'field34_1',
                'field34_2',
                'field34_3',
                'field34_4',
                'field34_5',
                'field34_6',
                'field34_7',
                'field34_8',
                'field34_9',
            ],'required', 'when' => function($model) {
                return $model->field26 == '1' || $model->field26 == '2';
            }, 'whenClient' => "function (attribute, value) {
                return $('#detiankettable2834-field26').val() == '1' || $('#detiankettable2834-field26').val() == '2';
            }"],
            [[
                'field30',
            ],'required', 'when' => function($model) {
                return $model->field29_1 == '1';
            }, 'whenClient' => "function (attribute, value) {
                return $('#detiankettable2834-field29_1').val() == '1';
            }"],
            [[
                'field35_1',
                'field35_2',
                'field35_3',
                'field35_4',
                'field35_5',
                'field35_6',
            ],'required', 'when' => function($model) {
                return $model->field26 == '3' || $model->field26 == '97' || $model->field26 == '98';
            }, 'whenClient' => "function (attribute, value) {
                return $('#detiankettable2834-field26').val() == '3' || $('#detiankettable2834-field26').val() == '97' || $('#detiankettable2834-field26').val() == '98';
            }"],
            [
                [
                    'field27',
                    'field28_1',
                    'field28_2',
                    'field28_3',
                    'field28_4',
                    'field28_5',
                    'field28_6',
                    'field28_7',
                    'field28_8',
                    'field28_9',
                    'field29_1',
                    'field29_2',
                    'field29_3',
                    'field29_4',
                    'field29_5',
                    'field29_6',
                    'field30',
                    'field31_1',
                    'field31_2',
                    'field31_3',
                    'field32',
                    'field33',
                    'field34',
                    'field34_1',
                    'field34_2',
                    'field34_3',
                    'field34_4',
                    'field34_5',
                    'field34_6',
                    'field34_7',
                    'field34_8',
                    'field34_9',
                    'field35_1',
                    'field35_2',
                    'field35_3',
                    'field35_4',
                    'field35_5',
                    'field35_6',
                    'field35_7',
                ],
                'safe',
            ],
            [['create_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field26' => '26. Питается ли Ваш ребенок в школьной столовой?',
            'field27' => '27. Укажите интервал между завтраком дома и первым приемом пищи в школе?',
            'field28_1' => '28.1. Бесплатный горячий завтрак',
            'field28_2' => '28.2. Платный горячий завтрак',
            'field28_3' => '28.3. Бесплатный горячий обед',
            'field28_4' => '28.4. Платный горячий обед',
            'field28_5' => '28.5. Бесплатный полдник',
            'field28_6' => '28.6. Платный полдник',
            'field28_7' => '28.7. Покупает еду в буфете (вендинговом аппарате) дополнительно к организованному питанию',
            'field28_8' => '28.8. Покупает еду в буфете (вендинговом аппарате), а вместе со всеми детьми организованно не питается',
            /*'field28_9' => '28.9. Платный полдник',*/
            'field29_1' => '29.1. В школьной столовой',
            'field29_2' => '29.2. Покупает продукцию из школьного буфета',
            'field29_3' => '29.3. Покупает продукцию в вендинговом аппарате',
            'field29_4' => '29.4. Берет еду с собой',
            'field29_5' => '29.5. Дома',
            'field29_6' => '29.6. Не обедает',
            'field30' => '30. Что чаще ест Ваш ребенок на обед  школе?',
            'field31_1' => '31.1. завтрак',
            'field31_2' => '31.2. обед',
            'field31_3' => '31.3. полдник',
            'field32' => '32. Хватает ли Вашему ребенку выданной порции в школьной столовой? ',
            'field33' => '33. Считает ли Ваш ребенок достаточной длительность перерыва между уроками для приема пищи? ',
            'field34' => '34. Нравится ли ребенку обстановка в школьной столовой? ',
            'field34_1' => '34.б.1. грязно ',
            'field34_2' => '34.б.2. много детей и мало места ',
            'field34_3' => '34.б.3. приходится долго ждать, чтобы получить еду ',
            'field34_4' => '34.б.4. еда бывает остывшей ',
            'field34_5' => '34.б.5. еда не вкусная ',
            'field34_6' => '34.б.6. не нравится сервировка столов ',
            'field34_7' => '34.б.7. в столовой часто неприятно пахнет ',
            'field34_8' => '34.б.8. не хватает времени ',
            'field34_9' => '34.б.9. не хватает посуды ',
            'field35_1' => '35.1. из-за отсутствия столовой в школе ',
            'field35_2' => '35.2. из-за плохого качества питания в столовой ',
            'field35_3' => '35.3. берет еду с собой ',
            'field35_4' => '35.4. дорого ',
            'field35_5' => '35.5. по состоянию здоровья требуется специальная диета ',
            'field35_6' => '35.6. другие причины ',
            'field35_7' => 'Другие причины:',
            'create_at' => 'Create At',
        ];
    }
}
