<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_19".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field19_1 Аутсорсинг (поставка пищевых продуктов + приготовление блюд) 1/0
 * @property int $field19_2 Аутсорсинг (поставка пищевых продуктов) 1/0
 * @property int $field19_3 Приобретение продуктов и приготовление блюд без привлечения сторонних организаций 1/0
 * @property string $create_at
 */
class DirectorTable19 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_19';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'field19_1', 'field19_2', 'field19_3'], 'required','message'=>'Данное поле является обязательным при внесении'],
            [['user_id', 'field19_1', 'field19_2', 'field19_3'], 'integer','message'=>'Вносимое значение должно быть числовым'],
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
            'field19_1' => '',
            'field19_2' => '',
            'field19_3' => '',
            'create_at' => '',
        ];
    }
}
