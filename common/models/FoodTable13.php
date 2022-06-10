<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "food_table_13".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field13_1 отлично Завтраки
 * @property int $field13_2 отлично обеды
 * @property int $field13_3 отлично дополнительное питание
 * @property int $field13_4 отлично Питание детей с заболеваниями, требующими индивидуального подхода
 * @property int $field13_5 хорошо Завтраки
 * @property int $field13_6 хорошо обеды
 * @property int $field13_7 хорошо дополнительное питание
 * @property int $field13_8 хорошо Питание детей с заболеваниями, требующими индивидуального подхода
 * @property int $field13_9 удовлетворительно Завтраки
 * @property int $field13_10 удовлетворительно обеды
 * @property int $field13_11 удовлетворительно дополнительное питание
 * @property int $field13_12 удовлетворительно Питание детей с заболеваниями, требующими индивидуального подхода
 * @property int $field13_13 не удовлетворительно Завтраки
 * @property int $field13_14 не удовлетворительно обеды
 * @property int $field13_15 не удовлетворительно дополнительное питание
 * @property int $field13_16 не удовлетворительно Питание детей с заболеваниями, требующими индивидуального подхода
 * @property string $create_at
 */
class FoodTable13 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_table_13';
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
                    'field13_1',
                    'field13_2',
                    'field13_3',
                    'field13_4',
                    'field13_5',
                    'field13_6',
                    'field13_7',
                    'field13_8',
                    'field13_9',
                    'field13_10',
                    'field13_11',
                    'field13_12',
                    'field13_13',
                    'field13_14',
                    'field13_15',
                    'field13_16',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            /*[
                [
                    'user_id',
                    'field13_1',
                    'field13_2',
                    'field13_3',
                    'field13_4',
                    'field13_5',
                    'field13_6',
                    'field13_7',
                    'field13_8',
                    'field13_9',
                    'field13_10',
                    'field13_11',
                    'field13_12',
                    'field13_13',
                    'field13_14',
                    'field13_15',
                    'field13_16',
                ],
                'integer', 'min'=>0,  'max'=>1, 'message'=>'Вносимое значение должно быть числовым'
            ],*/
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
            'field13_1' => 'в данном поле',
            'field13_2' => 'в данном поле',
            'field13_3' => 'в данном поле',
            'field13_4' => 'в данном поле',
            'field13_5' => 'в данном поле',
            'field13_6' => 'в данном поле',
            'field13_7' => 'в данном поле',
            'field13_8' => 'в данном поле',
            'field13_9' => 'в данном поле',
            'field13_10' => 'в данном поле',
            'field13_11' => 'в данном поле',
            'field13_12' => 'в данном поле',
            'field13_13' => 'в данном поле',
            'field13_14' => 'в данном поле',
            'field13_15' => 'в данном поле',
            'field13_16' => 'в данном поле',
            'create_at' => 'Create At',
        ];
    }
}
