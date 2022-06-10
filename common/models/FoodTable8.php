<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "food_table_8".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field8_1 Наличие в меню обогащенной продукции, за исключением соли поваренной йодированной  Витаминами
 * @property int $field8_2 Наличие в меню обогащенной продукции, за исключением соли поваренной йодированной Микроэле-ментами
 * @property int $field8_3 в том числе, хлеб и хлебобулочные изделия Витаминами
 * @property int $field8_4 в том числе, хлеб и хлебобулочные изделия Микроэле-ментами
 * @property int $field8_5 молоко и молочная продукция Витаминами
 * @property int $field8_6 молоко и молочная продукция Микроэле-ментами
 * @property int $field8_7 кисели Витаминами
 * @property int $field8_8 кисели Микроэле-ментами
 * @property int $field8_9 напитки Витаминами
 * @property int $field8_10 напитки Микроэле-ментами
 * @property int $field8_11 напитки Витаминами
 * @property int $field8_12 напитки Микроэле-ментами
 * @property string $create_at
 */
class FoodTable8 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_table_8';
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
                    'field8_1',
                    'field8_2',
                    'field8_3',
                    'field8_4',
                    'field8_5',
                    'field8_6',
                    'field8_7',
                    'field8_8',
                    'field8_9',
                    'field8_10',
                    'field8_11',
                    'field8_12',
                    'field8_13',
                    'field8_14',
                ],
                'required', 'message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'field8_1',
                    'field8_2',
                    'field8_3',
                    'field8_4',
                    'field8_5',
                    'field8_6',
                    'field8_7',
                    'field8_8',
                    'field8_9',
                    'field8_10',
                    'field8_11',
                    'field8_12',
                    'field8_13',
                    'field8_14',
                ],
                'integer', 'min'=>0,  'max'=>10000, 'message'=>'Вносимое значение должно быть числовым'
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
            'field8_1' => 'в данном поле',
            'field8_2' => 'в данном поле',
            'field8_3' => 'в данном поле',
            'field8_4' => 'в данном поле',
            'field8_5' => 'в данном поле',
            'field8_6' => 'в данном поле',
            'field8_7' => 'в данном поле',
            'field8_8' => 'в данном поле',
            'field8_9' => 'в данном поле',
            'field8_10' => 'в данном поле',
            'field8_11' => 'в данном поле',
            'field8_12' => 'в данном поле',
            'field8_13' => 'в данном поле',
            'field8_14' => 'в данном поле',
            'create_at' => 'Create At',
        ];
    }
}
