<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_27".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field27_1 Овощные салаты, овощи, готовые к употреблению 1/0
 * @property int $field27_2 Первые блюда 1/0
 * @property int $field27_3 Гарниры 1/0
 * @property int $field27_4 Основные (мясные и рыбные) блюда 1/0
 * @property int $field27_5 Каши 1/0
 * @property int $field27_6 Молочные продукты, в т.ч. напитки 1/0
 * @property int $field27_7 Соки фруктовые и фруктово-овощные 1/0
 * @property int $field27_8 Сокосодержащие напитки с добавлением сахара 1/0
 * @property int $field27_9 Выпечные изделия собственного приготовления 1/0
 * @property int $field27_10 Бутерброды 1/0
 * @property int $field27_11 Кондитерские изделия (за исключением печенья, злаковых и фруктово-злаковых батончиков) 1/0
 * @property int $field27_12 Печенье 1/0
 * @property int $field27_13 Злаковые и фруктово-злаковые батончики 1/0
 * @property int $field27_14 Фрукты 1/0
 * @property int $field27_15 Сладкие газированные напитки 1/0
 * @property string $create_at
 */
class DirectorTable27 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_27';
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
                    'field27_1',
                    'field27_2',
                    'field27_3',
                    'field27_4',
                    'field27_5',
                    'field27_6',
                    'field27_7',
                    'field27_8',
                    'field27_9',
                    'field27_10',
                    'field27_11',
                    'field27_12',
                    'field27_13',
                    'field27_14',
                    'field27_15'
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field27_1',
                    'field27_2',
                    'field27_3',
                    'field27_4',
                    'field27_5',
                    'field27_6',
                    'field27_7',
                    'field27_8',
                    'field27_9',
                    'field27_10',
                    'field27_11',
                    'field27_12',
                    'field27_13',
                    'field27_14',
                    'field27_15'
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
            'field27_1' => 'Field27 1',
            'field27_2' => 'Field27 2',
            'field27_3' => 'Field27 3',
            'field27_4' => 'Field27 4',
            'field27_5' => 'Field27 5',
            'field27_6' => 'Field27 6',
            'field27_7' => 'Field27 7',
            'field27_8' => 'Field27 8',
            'field27_9' => 'Field27 9',
            'field27_10' => 'Field27 10',
            'field27_11' => 'Field27 11',
            'field27_12' => 'Field27 12',
            'field27_13' => 'Field27 13',
            'field27_14' => 'Field27 14',
            'field27_15' => 'Field27 15',
            'create_at' => 'Create At',
        ];
    }
}
