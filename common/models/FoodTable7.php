<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "food_table_7".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field7_1 Сахарный диабет всего
 * @property int $field7_2 Сахарный диабет 1-4 кл.
 * @property int $field7_3 Сахарный диабет 5-9 кл.
 * @property int $field7_4 Сахарный диабет 10-11 кл.
 * @property int $field7_5 Пищевая аллергия всего
 * @property int $field7_6 Пищевая аллергия 1-4 кл.
 * @property int $field7_7 Пищевая аллергия 5-9 кл.
 * @property int $field7_8 Пищевая аллергия 10-11 кл.
 * @property int $field7_9 Целиакия всего
 * @property int $field7_10 Целиакия 1-4 кл.
 * @property int $field7_11 Целиакия 5-9 кл.
 * @property int $field7_12 Целиакия 10-11 кл.
 * @property int $field7_13 Фенилкетонурия всего
 * @property int $field7_14 Фенилкетонурия 1-4 кл.
 * @property int $field7_15 Фенилкетонурия 5-9 кл.
 * @property int $field7_16 Фенилкетонурия 10-11 кл.
 * @property int $field7_17 Муковисцидоз всего
 * @property int $field7_18 Муковисцидоз 1-4 кл.
 * @property int $field7_19 Муковисцидоз 5-9 кл.
 * @property int $field7_20 Муковисцидоз 10-11 кл.
 * @property string $create_at
 */
class FoodTable7 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_table_7';
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
                    'field7_1',
                    'field7_2',
                    'field7_3',
                    'field7_4',
                    'field7_5',
                    'field7_6',
                    'field7_7',
                    'field7_8',
                    'field7_9',
                    'field7_10',
                    'field7_11',
                    'field7_12',
                    'field7_13',
                    'field7_14',
                    'field7_15',
                    'field7_16',
                    'field7_17',
                    'field7_18',
                    'field7_19',
                    'field7_20',
                ],
                'required', 'message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'field7_1',
                    'field7_2',
                    'field7_3',
                    'field7_4',
                    'field7_5',
                    'field7_6',
                    'field7_7',
                    'field7_8',
                    'field7_9',
                    'field7_10',
                    'field7_11',
                    'field7_12',
                    'field7_13',
                    'field7_14',
                    'field7_15',
                    'field7_16',
                    'field7_17',
                    'field7_18',
                    'field7_19',
                    'field7_20',
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
            'field7_1' => 'в данном поле',
            'field7_2' => 'в данном поле',
            'field7_3' => 'в данном поле',
            'field7_4' => 'в данном поле',
            'field7_5' => 'в данном поле',
            'field7_6' => 'в данном поле',
            'field7_7' => 'в данном поле',
            'field7_8' => 'в данном поле',
            'field7_9' => 'в данном поле',
            'field7_10' => 'в данном поле',
            'field7_11' => 'в данном поле',
            'field7_12' => 'в данном поле',
            'field7_13' => 'в данном поле',
            'field7_14' => 'в данном поле',
            'field7_15' => 'в данном поле',
            'field7_16' => 'в данном поле',
            'field7_17' => 'в данном поле',
            'field7_18' => 'в данном поле',
            'field7_19' => 'в данном поле',
            'field7_20' => 'в данном поле',
            'create_at' => 'Create At',
        ];
    }
}
