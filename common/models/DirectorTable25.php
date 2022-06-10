<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_25".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field25_1 Классический завтрак и обед (1 ассортимент блюд) 1/0
 * @property int $field25_2 Завтрак и обед с блюдами по выбору (несколько вариантов ассортимента блюд) 1/0
 * @property int $field25_3 Шведский стол 1/0
 * @property string $create_at
 */
class DirectorTable25 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_25';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'field25_1', 'field25_2', 'field25_3'], 'required','message'=>'Данное поле является обязательным при внесении'],
            [['user_id', 'field25_1', 'field25_2', 'field25_3'], 'integer','message'=>'Вносимое значение должно быть числовым'],
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
            'field25_1' => 'Field25 1',
            'field25_2' => 'Field25 2',
            'field25_3' => 'Field25 3',
            'create_at' => 'Create At',
        ];
    }
}
