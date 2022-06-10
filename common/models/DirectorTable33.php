<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_33".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field33_1 Отлично Завтраки (0/1)
 * @property int $field33_2 Отлично обеды
 * @property int $field33_3 Отлично дополнительное питание
 * @property int $field33_4 Отлично Питание детей с заболеваниями, требующими индивидуального подхода
 * @property int $field33_5 хорошо Завтраки (0/1)
 * @property int $field33_6 хорошо обеды
 * @property int $field33_7 хорошо дополнительное питание
 * @property int $field33_8 хорошо Питание детей с заболеваниями, требующими индивидуального подхода
 * @property int $field33_9 удовлетворительно Завтраки (0/1)
 * @property int $field33_10 удовлетворительно обеды
 * @property int $field33_11 удовлетворительно дополнительное питание
 * @property int $field33_12 удовлетворительно Питание детей с заболеваниями, требующими индивидуального подхода
 * @property int $field33_13 не удовлетворительно Завтраки (0/1)
 * @property int $field33_14 не удовлетворительно обеды
 * @property int $field33_15 не удовлетворительно дополнительное питание
 * @property int $field33_16 не удовлетворительно Питание детей с заболеваниями, требующими индивидуального подхода
 * @property string $create_at
 */
class DirectorTable33 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_33';
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
                    'field33_1',
                    'field33_2',
                    'field33_3',
                    'field33_4',
                    'field33_5',
                    'field33_6',
                    'field33_7',
                    'field33_8',
                    'field33_9',
                    'field33_10',
                    'field33_11',
                    'field33_12',
                    'field33_13',
                    'field33_14',
                    'field33_15',
                    'field33_16'
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field33_1',
                    'field33_2',
                    'field33_3',
                    'field33_4',
                    'field33_5',
                    'field33_6',
                    'field33_7',
                    'field33_8',
                    'field33_9',
                    'field33_10',
                    'field33_11',
                    'field33_12',
                    'field33_13',
                    'field33_14',
                    'field33_15',
                    'field33_16'
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
            'field33_1' => 'Field33 1',
            'field33_2' => 'Field33 2',
            'field33_3' => 'Field33 3',
            'field33_4' => 'Field33 4',
            'field33_5' => 'Field33 5',
            'field33_6' => 'Field33 6',
            'field33_7' => 'Field33 7',
            'field33_8' => 'Field33 8',
            'field33_9' => 'Field33 9',
            'field33_10' => 'Field33 10',
            'field33_11' => 'Field33 11',
            'field33_12' => 'Field33 12',
            'field33_13' => 'Field33 13',
            'field33_14' => 'Field33 14',
            'field33_15' => 'Field33 15',
            'field33_16' => 'Field33 16',
            'create_at' => 'Create At',
        ];
    }
}
