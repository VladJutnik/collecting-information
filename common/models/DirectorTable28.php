<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_28".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field28_1 Питьевые фонтанчики 1/0
 * @property int $field28_2 Кулеры 1/0
 * @property int $field28_3 Бутилированная вода 1/0
 * @property int $field28_4 Кипяченая вода 1/0
 * @property int $field28_5 Питьевой режим не организован 1/0
 * @property string $create_at
 */
class DirectorTable28 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_28';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'field28_1', 'field28_2', 'field28_3', 'field28_4', 'field28_5'], 'required','message'=>'Данное поле является обязательным при внесении'],
            [['user_id', 'field28_1', 'field28_2', 'field28_3', 'field28_4', 'field28_5'], 'integer','message'=>'Вносимое значение должно быть числовым'],
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
            'field28_1' => 'Field28 1',
            'field28_2' => 'Field28 2',
            'field28_3' => 'Field28 3',
            'field28_4' => 'Field28 4',
            'field28_5' => 'Field28 5',
            'create_at' => 'Create At',
        ];
    }
}
