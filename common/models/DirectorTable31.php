<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_31".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field31_1 салаты из свежих овощей (овощи в нарезке) Количество раз за две недели
 * @property int $field31_2 салаты из вареных овощей Количество раз за две недели
 * @property int $field31_3 консервированные продукты (горох, фасоль, кукуруза, кабачковая икра) Количество раз за две недели
 * @property int $field31_4 каши Количество раз за две недели
 * @property int $field31_5 молочный суп Количество раз за две недели
 * @property int $field31_6 творожные блюда Количество раз за две недели
 * @property int $field31_7 яичные блюда Количество раз за две недели
 * @property int $field31_8 бутерброды Количество раз за две недели
 * @property int $field31_9 гарниры из круп или макарон Количество раз за две недели
 * @property int $field31_10 овощные гарниры (не включая блюда из картофеля) Количество раз за две недели
 * @property int $field31_11 гарниры из картофеля Количество раз за две недели
 * @property int $field31_12 гарниры из бобовых Количество раз за две недели
 * @property int $field31_13 основное мясное блюдо (без мяса птицы) Количество раз за две недели
 * @property int $field31_14 основное блюдо из мяса птицы Количество раз за две недели
 * @property int $field31_15 основное рыбное блюдо Количество раз за две недели
 * @property int $field31_16 колбасные изделия (сосиски, сардельки) Количество раз за две недели
 * @property int $field31_17 фрукты Количество раз за две недели
 * @property int $field31_18 кондитерские изделия промышленного изготовления Количество раз за две недели
 * @property int $field31_19 выпечные изделия Количество раз за две недели
 * @property string $create_at
 */
class DirectorTable31 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_31';
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
                    'field31_1',
                    'field31_2',
                    'field31_3',
                    'field31_4',
                    'field31_5',
                    'field31_6',
                    'field31_7',
                    'field31_8',
                    'field31_9',
                    'field31_10',
                    'field31_11',
                    'field31_12',
                    'field31_13',
                    'field31_14',
                    'field31_15',
                    'field31_16',
                    'field31_17',
                    'field31_18',
                    'field31_19',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field31_1',
                    'field31_2',
                    'field31_3',
                    'field31_4',
                    'field31_5',
                    'field31_6',
                    'field31_7',
                    'field31_8',
                    'field31_9',
                    'field31_10',
                    'field31_11',
                    'field31_12',
                    'field31_13',
                    'field31_14',
                    'field31_15',
                    'field31_16',
                    'field31_17',
                    'field31_18',
                    'field31_19',
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
            'field31_1' => 'Field31 1',
            'field31_2' => 'Field31 2',
            'field31_3' => 'Field31 3',
            'field31_4' => 'Field31 4',
            'field31_5' => 'Field31 5',
            'field31_6' => 'Field31 6',
            'field31_7' => 'Field31 7',
            'field31_8' => 'Field31 8',
            'field31_9' => 'Field31 9',
            'field31_10' => 'Field31 10',
            'field31_11' => 'Field31 11',
            'field31_12' => 'Field31 12',
            'field31_13' => 'Field31 13',
            'field31_14' => 'Field31 14',
            'field31_15' => 'Field31 15',
            'field31_16' => 'Field31 16',
            'field31_17' => 'Field31 17',
            'field31_18' => 'Field31 18',
            'field31_19' => 'Field31 19',
            'create_at' => 'Create At',
        ];
    }
}
