<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_11".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field11_1 САХАРНЫЙ ДИАБЕТ ВСЕГО
 * @property int $field11_2 ПИЩЕВАЯ АЛЛЕРГИЯ ВСЕГО
 * @property int $field11_3 ЦЕЛИАКИЯ ВСЕГО
 * @property int $field11_4 ФЕНИЛКЕТОНУРИЯ ВСЕГО
 * @property int $field11_5 МУКОВИСЦИДОЗ ВСЕГО
 * @property int $field11_6 ОВЗ (ограниченные возможности детей) ВСЕГО
 * @property string $create_at
 */
class DirectorTable11 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_11';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'field11_1', 'field11_2', 'field11_3', 'field11_4', 'field11_5', 'field11_6'], 'required','message'=>'Данное поле является обязательным при внесении'],
            [['user_id', 'field11_1', 'field11_2', 'field11_3', 'field11_4', 'field11_5', 'field11_6'], 'integer','message'=>'Вносимое значение должно быть числовым'],
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
            'field11_1' => '',
            'field11_2' => '',
            'field11_3' => '',
            'field11_4' => '',
            'field11_5' => '',
            'field11_6' => '',
            'create_at' => '',
        ];
    }
}
