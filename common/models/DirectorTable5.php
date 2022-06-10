<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_5".
 *
 * @property int $id
 * @property int $field5_1 Количество детей, посещающих группу продленного дня 1-4 кл.
 * @property int $field5_2 Количество детей, посещающих группу продленного дня 5-9 кл.
 * @property int $field5_3 Количество детей, посещающих группу продленного дня 10-11 кл.
 * @property int $field5_4 Итого
 * @property int $field5_5 Количество детей, обучающихся на подвозе дня 1-4 кл.
 * @property int $field5_6 Количество детей, обучающихся на подвозе 5-9 кл.
 * @property int $field5_7 Количество детей, обучающихся на подвозе 10-11 кл.
 * @property int $field5_8 Итого
 * @property string $create_at
 */
class DirectorTable5 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_5';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['field5_4', 'field5_8'],
                'required', 'message'=>'Ошибка'
            ],
            [
                ['user_id', 'field5_1', 'field5_2', 'field5_3', 'field5_5', 'field5_6', 'field5_7'],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                ['field5_1', 'field5_2', 'field5_3', 'field5_4', 'field5_5', 'field5_6', 'field5_7', 'field5_8'],
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
            'field5_1' => '',
            'field5_2' => '',
            'field5_3' => '',
            'field5_4' => '',
            'field5_5' => '',
            'field5_6' => '',
            'field5_7' => '',
            'field5_8' => '',
            'create_at' => '',
        ];
    }
}
