<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_18".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field18_1 Работает на продовольственном сырье Количество столовых
 * @property int $field18_2 Работает на продовольственном сырье и полуфабрикатах Количество столовых
 * @property int $field18_3 Работает на полуфабрикатах Количество столовых
 * @property int $field18_4 Работает в режиме буфета-раздаточной Количество столовых
 * @property int $field18_5 Комната для приема пищи Количество столовых
 * @property string $create_at
 */
class DirectorTable18 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_18';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'field18_1', 'field18_2', 'field18_3', 'field18_4', 'field18_5'], 'required','message'=>'Данное поле является обязательным при внесении'],
            [['user_id', 'field18_1', 'field18_2', 'field18_3', 'field18_4', 'field18_5'], 'integer','message'=>'Вносимое значение должно быть числовым'],
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
            'field18_1' => '',
            'field18_2' => '',
            'field18_3' => '',
            'field18_4' => '',
            'field18_5' => '',
            'create_at' => '',
        ];
    }
}
