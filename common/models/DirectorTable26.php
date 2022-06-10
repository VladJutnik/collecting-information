<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_26".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field26_1 Буфет – розничная торговля блюдами и продуктами 1/0
 * @property int $field26_2 Предоставление комплексных обедов (с основной линии раздачи) 1/0
 * @property int $field26_3 Предоставление блюд по выбору (с основной линии раздачи) 1/0
 * @property int $field26_4 Вендинговое оборудование 1/0
 * @property string $create_at
 */
class DirectorTable26 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_26';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'field26_1', 'field26_2', 'field26_3', 'field26_4'], 'required','message'=>'Данное поле является обязательным при внесении'],
            [['user_id', 'field26_1', 'field26_2', 'field26_3', 'field26_4'], 'integer','message'=>'Вносимое значение должно быть числовым'],
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
            'field26_1' => 'Field26 1',
            'field26_2' => 'Field26 2',
            'field26_3' => 'Field26 3',
            'field26_4' => 'Field26 4',
            'create_at' => 'Create At',
        ];
    }
}
