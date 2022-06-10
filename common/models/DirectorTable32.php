<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_32".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field32_1 Первые блюда из круп и макарон Количество раз за две недели
 * @property int $field32_2 Первые блюда овощные Количество раз за две недели
 * @property int $field32_3 салаты из свежих овощей (овощи в нарезке) Количество раз за две недели
 * @property int $field32_4 салаты из вареных овощей Количество раз за две недели
 * @property int $field32_5 гарниры из круп или макарон Количество раз за две недели
 * @property int $field32_6 овощные гарниры (не включая блюда из картофеля) Количество раз за две недели
 * @property int $field32_7 гарниры из картофеля Количество раз за две недели
 * @property int $field32_8 гарниры из бобовых Количество раз за две недели
 * @property int $field32_9 основное мясное блюдо (без мяса птицы) Количество раз за две недели
 * @property int $field32_10 основное блюдо из мяса птицы Количество раз за две недели
 * @property int $field32_11 основное рыбное блюдо Количество раз за две недели
 * @property int $field32_12 колбасные изделия (сосиски, сардельки) Количество раз за две недели
 * @property int $field32_13 творожные блюда Количество раз за две недели
 * @property int $field32_14 яичные блюда Количество раз за две недели
 * @property int $field32_15 фрукты Количество раз за две недели
 * @property int $field32_16 консервированные продукты (горох, фасоль, кукуруза, кабачковая икра) Количество раз за две недели
 * @property int $field32_17 кондитерские изделия промышленного изготовления Количество раз за две недели
 * @property int $field32_18 выпечные изделия Количество раз за две недели
 * @property int $field32_19 компоты Количество раз за две недели
 * @property int $field32_20 кисели Количество раз за две недели
 * @property int $field32_21 соки Количество раз за две недели
 * @property string $create_at
 */
class DirectorTable32 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_32';
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
                    'field32_1',
                    'field32_2',
                    'field32_3',
                    'field32_4',
                    'field32_5',
                    'field32_6',
                    'field32_7',
                    'field32_8',
                    'field32_9',
                    'field32_10',
                    'field32_11',
                    'field32_12',
                    'field32_13',
                    'field32_14',
                    'field32_15',
                    'field32_16',
                    'field32_17',
                    'field32_18',
                    'field32_19',
                    'field32_20',
                    'field32_21'
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field32_1',
                    'field32_2',
                    'field32_3',
                    'field32_4',
                    'field32_5',
                    'field32_6',
                    'field32_7',
                    'field32_8',
                    'field32_9',
                    'field32_10',
                    'field32_11',
                    'field32_12',
                    'field32_13',
                    'field32_14',
                    'field32_15',
                    'field32_16',
                    'field32_17',
                    'field32_18',
                    'field32_19',
                    'field32_20',
                    'field32_21'
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
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
            'field32_1' => 'Field32 1',
            'field32_2' => 'Field32 2',
            'field32_3' => 'Field32 3',
            'field32_4' => 'Field32 4',
            'field32_5' => 'Field32 5',
            'field32_6' => 'Field32 6',
            'field32_7' => 'Field32 7',
            'field32_8' => 'Field32 8',
            'field32_9' => 'Field32 9',
            'field32_10' => 'Field32 10',
            'field32_11' => 'Field32 11',
            'field32_12' => 'Field32 12',
            'field32_13' => 'Field32 13',
            'field32_14' => 'Field32 14',
            'field32_15' => 'Field32 15',
            'field32_16' => 'Field32 16',
            'field32_17' => 'Field32 17',
            'field32_18' => 'Field32 18',
            'field32_19' => 'Field32 19',
            'field32_20' => 'Field32 20',
            'field32_21' => 'Field32 21',
            'create_at' => 'Create At',
        ];
    }
}
