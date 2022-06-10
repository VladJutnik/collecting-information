<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director".
 *
 * @property int $id
 * @property int $user_id
 * @property int $organization_id
 * @property string $table_4
 * @property string $table_5
 * @property string $create_at
 */
class Director extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director';
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
                    'table_4',
                    'table_5',
                    'table_6',
                    'table_7',
                    'table_8',
                    'table_9',
                    'table_10',
                    'table_11',
                    'table_12',
                    'table_13',
                    'table_14',
                    'table_15',
                    'table_16',
                    'table_17',
                    'table_18',
                    'table_19',
                    'table_20',
                    'table_21',
                    'table_23',
                    'table_24',
                    'table_25',
                    'table_26',
                    'table_27',
                    'table_28',
                    'table_29',
                    'table_30',
                    'table_31',
                    'table_32',
                    'table_33',
                    'school_menu',
                ], 'required'],
            [['user_id', 'organization_id'], 'integer'],
            [['interviewer_fio', 'create_at', 'update_at'], 'safe'],
            [['table_4', 'table_5'], 'string', 'max' => 50],
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
            'organization_id' => 'Organization ID',
            'table_4' => '',
            'table_5' => '',
            'table_6' => '',
            'table_7' => '',
            'table_8' => '',
            'table_9' => '',
            'table_10' => '',
            'table_11' => '',
            'table_12' => '',
            'table_13' => '',
            'table_14' => '',
            'table_15' => '',
            'table_16' => '',
            'table_17' => '',
            'table_18' => '',
            'table_19' => '',
            'table_20' => '',
            'table_21' => '',
            'table_22' => '',
            'table_23' => '',
            'table_24' => '',
            'table_25' => '',
            'table_26' => '',
            'table_27' => '',
            'table_28' => '',
            'table_29' => '',
            'table_30' => '',
            'table_31' => '',
            'table_32' => '',
            'table_33' => '',
            'interviewer_fio'=> 'ФИО, внесшего информацию в базу ',
            'school_menu' => 'По какому основному меню работает школа ',
            'create_at' => 'Дата заполнения анкеты',
            'update_at' => 'Дата hредактирования анкеты',
        ];
    }
}
