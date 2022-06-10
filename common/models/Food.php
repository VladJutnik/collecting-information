<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "food".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field1
 * @property int $field2
 * @property int $field3
 * @property int $field4
 * @property int $field5
 * @property int $field6
 * @property int $field7
 * @property int $field8
 * @property int $field9
 * @property int $field10
 * @property int $field11
 * @property int $field12
 * @property int|null $field13
 * @property string $create_at
 * @property string $update_at
 */
class Food extends \yii\db\ActiveRecord
{

    public $school_menu;

    public static function tableName()
    {
        return 'food';
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
                    'organization_id',
                    'federal_district_id',
                    'region_id',
                    'municipality_id',
                    'table_6',
                    'table_7',
                    'table_8',
                    'table_9',
                    'table_10',
                    'table_11',
                    'table_12',
                    'table_13',
                    'update_at',
                ],
                'required',
            ],
            [
                [
                    'user_id',
                    'organization_id',
                    'table_6',
                    'table_7',
                    'table_8',
                    'table_9',
                    'table_10',
                    'table_11',
                    'table_12',
                    'table_13',
                ],
                'integer',
            ],
            [['interviewer_fio', 'create_at', 'update_at'], 'safe'],
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
            'table_6'=> 'Field1',
            'table_7'=> 'Field2',
            'table_8'=> 'Field3',
            'table_9'=> 'Field4',
            'table_10'=> 'Field5',
            'table_11'=> 'Field6',
            'table_12'=> 'Field7',
            'table_13'=> 'Field8',
            'interviewer_fio'=> 'ФИО, внесшего информацию в базу ',
            'create_at' => 'Дата заполнения анкеты',
            'update_at' => 'Update At',
        ];
    }
}
