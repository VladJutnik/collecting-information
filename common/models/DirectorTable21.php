<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_21".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field21_1 Наличие в меню обогащенной продукции, за исключением соли поваренной йодированной (в любой) Витаминами
 * @property int $field21_2 Наличие в меню обогащенной продукции, за исключением соли поваренной йодированной (в любой) Микроэлементами
 * @property int $field21_3 в том числе, хлеб и хлебобулочные изделия Витаминами
 * @property int $field21_4 в том числе, хлеб и хлебобулочные изделия Микроэлементами
 * @property int $field21_5 молоко и молочная продукция Витаминами
 * @property int $field21_6 молоко и молочная продукция Микроэлементами
 * @property int $field21_7 кисели Витаминами
 * @property int $field21_8 кисели Микроэлементами
 * @property int $field21_9 напитки Витаминами
 * @property int $field21_10 напитки Микроэлементами
 * @property int $field21_11 иная продукция Витаминами
 * @property int $field21_12 иная продукция Микроэлементами
 * @property string $create_at
 */
class DirectorTable21 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_21';
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
                    'field21_1',
                    'field21_2',
                    'field21_3',
                    'field21_4',
                    'field21_5',
                    'field21_6',
                    'field21_7',
                    'field21_8',
                    'field21_9',
                    'field21_10',
                    'field21_11',
                    'field21_12',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field21_1',
                    'field21_2',
                    'field21_3',
                    'field21_4',
                    'field21_5',
                    'field21_6',
                    'field21_7',
                    'field21_8',
                    'field21_9',
                    'field21_10',
                    'field21_11',
                    'field21_12',
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
            'field21_1' => '',
            'field21_2' => '',
            'field21_3' => '',
            'field21_4' => '',
            'field21_5' => '',
            'field21_6' => '',
            'field21_7' => '',
            'field21_8' => '',
            'field21_9' => '',
            'field21_10' => '',
            'field21_11' => '',
            'field21_12' => '',
            'create_at' => 'Create At',
        ];
    }
}
