<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "food_table_11".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field11_1 Молоко Продукция РФ
 * @property int $field11_2 Молоко в т.ч. местного производства
 * @property int $field11_3 Молоко Импортная продукция
 * @property int $field11_4 Кисломолочная продукция Продукция РФ
 * @property int $field11_5 Кисломолочная продукция в т.ч. местного производства
 * @property int $field11_6 Кисломолочная продукция Импортная продукция
 * @property int $field11_7 Творог Продукция РФ
 * @property int $field11_8 Творог в т.ч. местного производства
 * @property int $field11_9 Творог Импортная продукция
 * @property int $field11_10 Мясо Продукция РФ
 * @property int $field11_11 Мясо в т.ч. местного производства
 * @property int $field11_12 Мясо Импортная продукция
 * @property int $field11_13 Рыба Продукция РФ
 * @property int $field11_14 Рыба в т.ч. местного производства
 * @property int $field11_15 Рыба Импортная продукция
 * @property int $field11_16 Крупы и бобовые Продукция РФ
 * @property int $field11_17 Крупы и бобовые в т.ч. местного производства
 * @property int $field11_18 Крупы и бобовые Импортная продукция
 * @property int $field11_19 Овощи Продукция РФ
 * @property int $field11_20 Овощи в т.ч. местного производства
 * @property int $field11_21 Овощи Импортная продукция
 * @property int $field11_22 Картофель Продукция РФ
 * @property int $field11_23 Картофель в т.ч. местного производства
 * @property int $field11_24 Картофель Импортная продукция
 * @property int $field11_25 Фрукты Продукция РФ
 * @property int $field11_26 Фрукты в т.ч. местного производства
 * @property int $field11_27 Фрукты Импортная продукция
 * @property int $field11_28 яйца Продукция РФ
 * @property int $field11_29 яйца в т.ч. местного производства
 * @property int $field11_30 яйца Импортная продукция
 * @property string $create_at
 */
class FoodTable11 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_table_11';
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
                    'field11_1',
                    'field11_2',
                    'field11_3',
                    'field11_4',
                    'field11_5',
                    'field11_6',
                    'field11_7',
                    'field11_8',
                    'field11_9',
                    'field11_10',
                    'field11_11',
                    'field11_12',
                    'field11_13',
                    'field11_14',
                    'field11_15',
                    'field11_16',
                    'field11_17',
                    'field11_18',
                    'field11_19',
                    'field11_20',
                    'field11_21',
                    'field11_22',
                    'field11_23',
                    'field11_24',
                    'field11_25',
                    'field11_26',
                    'field11_27',
                    'field11_28',
                    'field11_29',
                    'field11_30',
                ],
                'required', 'message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'field11_1',
                    'field11_2',
                    'field11_3',
                    'field11_4',
                    'field11_5',
                    'field11_6',
                    'field11_7',
                    'field11_8',
                    'field11_9',
                    'field11_10',
                    'field11_11',
                    'field11_12',
                    'field11_13',
                    'field11_14',
                    'field11_15',
                    'field11_16',
                    'field11_17',
                    'field11_18',
                    'field11_19',
                    'field11_20',
                    'field11_21',
                    'field11_22',
                    'field11_23',
                    'field11_24',
                    'field11_25',
                    'field11_26',
                    'field11_27',
                    'field11_28',
                    'field11_29',
                    'field11_30',
                ],
                'integer',  'min'=>0,  'max'=>10000, 'message'=>'Вносимое значение должно быть числовым'
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
            'user_id' => 'User ID',
            'field11_1' => 'в данном поле',
            'field11_2' => 'в данном поле',
            'field11_3' => 'в данном поле',
            'field11_4' => 'в данном поле',
            'field11_5' => 'в данном поле',
            'field11_6' => 'в данном поле',
            'field11_7' => 'в данном поле',
            'field11_8' => 'в данном поле',
            'field11_9' => 'в данном поле',
            'field11_10' => 'в данном поле',
            'field11_11' => 'в данном поле',
            'field11_12' => 'в данном поле',
            'field11_13' => 'в данном поле',
            'field11_14' => 'в данном поле',
            'field11_15' => 'в данном поле',
            'field11_16' => 'в данном поле',
            'field11_17' => 'в данном поле',
            'field11_18' => 'в данном поле',
            'field11_19' => 'в данном поле',
            'field11_20' => 'в данном поле',
            'field11_21' => 'в данном поле',
            'field11_22' => 'в данном поле',
            'field11_23' => 'в данном поле',
            'field11_24' => 'в данном поле',
            'field11_25' => 'в данном поле',
            'field11_26' => 'в данном поле',
            'field11_27' => 'в данном поле',
            'field11_28' => 'в данном поле',
            'field11_29' => 'в данном поле',
            'field11_30' => 'в данном поле',
            'create_at' => 'Create At',
        ];
    }
}
