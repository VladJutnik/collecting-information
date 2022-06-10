<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_6".
 *
 * @property int $id
 * @property int $field6_1 Основное меню 1-4 кл.
 * @property int $field6_2 Основное меню 5-9 кл.
 * @property int $field6_3 Основное меню 10-11 кл.
 * @property int $field6_4 Итого
 * @property int $field6_5 Дополнительное меню (ассортимент буфетной продукции) 1-4 кл.
 * @property int $field6_6 Дополнительное меню (ассортимент буфетной продукции) 5-9 кл.
 * @property int $field6_7 Дополнительное меню (ассортимент буфетной продукции) 10-11 кл.
 * @property int $field6_8 Итого
 * @property int $field6_9 Меню для детей с САХАРНЫМ ДИАБЕТОМ 1-4 кл.
 * @property int $field6_10 Меню для детей с САХАРНЫМ ДИАБЕТОМ 5-9 кл.
 * @property int $field6_11 Меню для детей с САХАРНЫМ ДИАБЕТОМ 10-11 кл.
 * @property int $field6_12 Итого
 * @property int $field6_13 Меню для детей с ПИЩЕВОЙ АЛЛЕРГИЕЙ 1-4 кл.
 * @property int $field6_14 Меню для детей с ПИЩЕВОЙ АЛЛЕРГИЕЙ 5-9 кл.
 * @property int $field6_15 Меню для детей с ПИЩЕВОЙ АЛЛЕРГИЕЙ 10-11 кл.
 * @property int $field6_16 Итого
 * @property int $field6_17 Меню для детей с ЦЕЛИАКИЕЙ 1-4 кл.
 * @property int $field6_18 Меню для детей с ЦЕЛИАКИЕЙ 5-9 кл.
 * @property int $field6_19 Меню для детей с ЦЕЛИАКИЕЙ 10-11 кл.
 * @property int $field6_20 Итого
 * @property int $field6_21 Меню для детей с ФЕНИЛКЕТОНУРИЕЙ 1-4 кл.
 * @property int $field6_22 Меню для детей с ФЕНИЛКЕТОНУРИЕЙ 5-9 кл.
 * @property int $field6_23 Меню для детей с ФЕНИЛКЕТОНУРИЕЙ 10-11 кл.
 * @property int $field6_24 Итого
 * @property int $field6_25 Меню для детей с МУКОВИСЦИДОЗОМ 1-4 кл.
 * @property int $field6_26 Меню для детей с МУКОВИСЦИДОЗОМ 5-9 кл.
 * @property int $field6_27 Меню для детей с МУКОВИСЦИДОЗОМ 10-11 кл.
 * @property int $field6_28 Итого
 * @property int $field6_29 Меню для детей с ОВЗ 1-4 кл.
 * @property int $field6_30 Меню для детей с ОВЗ 5-9 кл.
 * @property int $field6_31 Меню для детей с ОВЗ 10-11 кл.
 * @property int $field6_32 Итого
 * @property string $create_at
 */
class DirectorTable6 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_6';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'user_id',
                    'field6_1',
                    'field6_2',
                    'field6_3',
                    'field6_4',
                    'field6_5',
                    'field6_6',
                    'field6_7',
                    'field6_8',
                    'field6_9',
                    'field6_10',
                    'field6_11',
                    'field6_12',
                    'field6_13',
                    'field6_14',
                    'field6_15',
                    'field6_16',
                    'field6_17',
                    'field6_18',
                    'field6_19',
                    'field6_20',
                    'field6_21',
                    'field6_22',
                    'field6_23',
                    'field6_24',
                    'field6_25',
                    'field6_26',
                    'field6_27',
                    'field6_28',
                    'field6_29',
                    'field6_30',
                    'field6_31',
                    'field6_32',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'field6_1',
                    'field6_2',
                    'field6_3',
                    'field6_4',
                    'field6_5',
                    'field6_6',
                    'field6_7',
                    'field6_8',
                    'field6_9',
                    'field6_10',
                    'field6_11',
                    'field6_12',
                    'field6_13',
                    'field6_14',
                    'field6_15',
                    'field6_16',
                    'field6_17',
                    'field6_18',
                    'field6_19',
                    'field6_20',
                    'field6_21',
                    'field6_22',
                    'field6_23',
                    'field6_24',
                    'field6_25',
                    'field6_26',
                    'field6_27',
                    'field6_28',
                    'field6_29',
                    'field6_30',
                    'field6_31',
                    'field6_32',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field6_1',
                    'field6_2',
                    'field6_3',

                    'field6_5',
                    'field6_6',
                    'field6_7',

                    'field6_9',
                    'field6_10',
                    'field6_11',

                    'field6_13',
                    'field6_14',
                    'field6_15',

                    'field6_17',
                    'field6_18',
                    'field6_19',

                    'field6_21',
                    'field6_22',
                    'field6_23',

                    'field6_25',
                    'field6_26',
                    'field6_27',

                    'field6_29',
                    'field6_30',
                    'field6_31',

                ],
                'integer',
                'min' => 0,
                'max' => 1,'message'=>'Вносимое значение должно быть числовым'
            ],
            [['create_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field6_1' => '',
            'field6_2' => '',
            'field6_3' => '',
            'field6_4' => '',
            'field6_5' => '',
            'field6_6' => '',
            'field6_7' => '',
            'field6_8' => '',
            'field6_9' => '',
            'field6_10' => '',
            'field6_11' => '',
            'field6_12' => '',
            'field6_13' => '',
            'field6_14' => '',
            'field6_15' => '',
            'field6_16' => '',
            'field6_17' => '',
            'field6_18' => '',
            'field6_19' => '',
            'field6_20' => '',
            'field6_21' => '',
            'field6_22' => '',
            'field6_23' => '',
            'field6_24' => '',
            'field6_25' => '',
            'field6_26' => '',
            'field6_27' => '',
            'field6_28' => '',
            'field6_29' => '',
            'field6_30' => '',
            'field6_31' => '',
            'field6_32' => '',
            'create_at' => '',
        ];
    }
}
