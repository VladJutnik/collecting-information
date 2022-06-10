<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "food_table_10".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field10_1 Мясо Пищевое сырье
 * @property int $field10_2 Мясо Полуфабрикаты
 * @property int $field10_3 Мясо Готовая продукция
 * @property int $field10_4 Птица Пищевое сырье
 * @property int $field10_5 Птица Полуфабрикаты
 * @property int $field10_6 Птица Готовая продукция
 * @property int $field10_7 Рыба Пищевое сырье
 * @property int $field10_8 Рыба Полуфабрикаты
 * @property int $field10_9 Рыба Готовая продукция
 * @property int $field10_10 Овощи Пищевое сырье
 * @property int $field10_11 Овощи Полуфабрикаты
 * @property int $field10_12 Овощи Готовая продукция
 * @property int $field10_13 Картофель Пищевое сырье
 * @property int $field10_14 Картофель Полуфабрикаты
 * @property int $field10_15 Картофель Готовая продукция
 * @property string $create_at
 */
class FoodTable10 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_table_10';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'field10_1',
                    'field10_2',
                    'field10_3',
                    'field10_4',
                    'field10_5',
                    'field10_6',
                    'field10_7',
                    'field10_8',
                    'field10_9',
                    'field10_10',
                    'field10_11',
                    'field10_12',
                    'field10_13',
                    'field10_14',
                    'field10_15',
                ],
                'required', 'message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'field10_2',
                    'field10_3',
                    'field10_4',
                    'field10_5',
                    'field10_6',
                    'field10_7',
                    'field10_8',
                    'field10_9',
                    'field10_10',
                    'field10_11',
                    'field10_12',
                    'field10_13',
                    'field10_14',
                    'field10_15',
                ],
                'integer', 'min'=>0,  'max'=>200, 'message'=>'Вносимое значение должно быть числовым'
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
            'field10_1' => 'в данном поле',
            'field10_2' => 'в данном поле',
            'field10_3' => 'в данном поле',
            'field10_4' => 'в данном поле',
            'field10_5' => 'в данном поле',
            'field10_6' => 'в данном поле',
            'field10_7' => 'в данном поле',
            'field10_8' => 'в данном поле',
            'field10_9' => 'в данном поле',
            'field10_10' => 'в данном поле',
            'field10_11' => 'в данном поле',
            'field10_12' => 'в данном поле',
            'field10_13' => 'в данном поле',
            'field10_14' => 'в данном поле',
            'field10_15' => 'в данном поле',
            'create_at' => 'Create At',
        ];
    }
}
