<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "food_table_6".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field6_1 Сахарный диабет Количество школ
 * @property int $field6_2 Сахарный диабет Из них, имеют утвержденное меню
 * @property int $field6_3 Пищевая аллергия Количество школ
 * @property int $field6_4 Пищевая аллергия Из них, имеют утвержденное меню
 * @property int $field6_5 Целиакия Количество школ
 * @property int $field6_6 Целиакия Из них, имеют утвержденное меню
 * @property int $field6_7 Фенилкетонурия Количество школ
 * @property int $field6_8 Фенилкетонурия Из них, имеют утвержденное меню
 * @property int $field6_9 Муковисцидоз Количество школ
 * @property int $field6_10 Муковисцидоз Из них, имеют утвержденное меню
 * @property string $create_at
 */
class FoodTable6 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_table_6';
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
                ],
                'required', 'message'=>'Данное поле является обязательным при внесении'
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
                ],
                'integer', 'min'=>0,  'max'=>10000, 'message'=>'Вносимое значение должно быть числовым'
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
            'field6_1' => 'в данном поле',
            'field6_2' => 'в данном поле',
            'field6_3' => 'в данном поле',
            'field6_4' => 'в данном поле',
            'field6_5' => 'в данном поле',
            'field6_6' => 'в данном поле',
            'field6_7' => 'в данном поле',
            'field6_8' => 'в данном поле',
            'field6_9' => 'в данном поле',
            'field6_10' => 'в данном поле',
            'create_at' => 'Create At',
        ];
    }
}
