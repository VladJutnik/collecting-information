<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_20".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field20_1 Информация приведена на официальном сайте 1/0
 * @property int $field20_2 По цикличному меню 1/0
 * @property int $field20_3 По ежедневному меню 1/0
 * @property int $field20_4 По технологическим картам 1/0
 * @property int $field20_5 По принципам здорового питания 1/0
 * @property int $field20_6 Информация размещена на стенде в общеобразовательной организации 1/0
 * @property int $field20_7 По цикличному меню 1/0
 * @property int $field20_8 По ежедневному меню 1/0
 * @property int $field20_9 По технологическим картам 1/0
 * @property int $field20_10 По принципам здорового питания 1/0
 * @property int $field20_11 Информация НЕ РАЗМЕЩЕНА ни на стенде в общеобразовательной организации ни на сайте 1/0
 * @property int $field20_12 По цикличному меню 1/0
 * @property int $field20_13 По ежедневному меню 1/0
 * @property int $field20_14 По технологическим картам 1/0
 * @property int $field20_15 По принципам здорового питания 1/0
 * @property string $create_at
 */
class DirectorTable20 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_20';
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
                    'field20_1',
                    'field20_2',
                    'field20_3',
                    'field20_4',
                    'field20_5',
                    'field20_6',
                    'field20_7',
                    'field20_8',
                    'field20_9',
                    'field20_10',
                    'field20_11',
                    'field20_12',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field20_1',
                    'field20_2',
                    'field20_3',
                    'field20_4',
                    'field20_5',
                    'field20_6',
                    'field20_7',
                    'field20_8',
                    'field20_9',
                    'field20_10',
                    'field20_11',
                    'field20_12',
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
            'field20_1' => '',
            'field20_2' => '',
            'field20_3' => '',
            'field20_4' => '',
            'field20_5' => '',
            'field20_6' => '',
            'field20_7' => '',
            'field20_8' => '',
            'field20_9' => '',
            'field20_10' => '',
            'field20_11' => '',
            'field20_12' => '',
            'field20_13' => '',
            'field20_14' => '',
            'field20_15' => '',
            'create_at' => 'Create At',
        ];
    }
}
