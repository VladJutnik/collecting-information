<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "food_organizer".
 *
 * @property int $id
 * @property int $user_id
 * @property int $organization_id
 * @property int $field5_1
 * @property int $field5_2
 * @property int $field5_3
 * @property int $field5_4
 * @property int $field5_5
 * @property int $field5_6
 * @property int $field5_7
 * @property int $field5_8
 * @property int $field5_9
 * @property int $field5_10
 * @property int $field5_11
 * @property int $field5_12
 * @property int $field5_13
 * @property int $field5_14
 * @property int $field5_15
 * @property int $field5_16
 * @property int $field5_17
 * @property int $field5_18
 * @property int $field5_19
 * @property int $field5_20
 * @property int $field5_21
 * @property int $field5_22
 * @property int $field5_23
 * @property int $field5_24
 * @property int $field5_25
 * @property int $field5_26
 * @property int $field5_27
 * @property int $field5_28
 * @property string $created_at
 *
 * @property Organization $organization
 * @property User $user
 */
class FoodOrganizer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_organizer';
    }

    public function rules()
    {
        return [
            [
                [
                    'field5_1',
                    'field5_2',
                    'field5_3',
                    'field5_5',
                    'field5_6',
                    'field5_7',
                    'field5_9',
                    'field5_10',
                    'field5_11',
                    'field5_13',
                    'field5_14',
                    'field5_15',
                    'field5_17',
                    'field5_18',
                    'field5_19',
                    'field5_21',
                    'field5_22',
                    'field5_23',
                    'field5_25',
                    'field5_26',
                    'field5_27',
                ],
                'required',
                'message' => 'Обязательное поле',
            ],
            [
                [
                    'user_id',
                    'organization_id',
                    'field5_4',
                    'field5_8',
                    'field5_12',
                    'field5_16',
                    'field5_20',
                    'field5_24',
                    'field5_28',
                ],
                'integer',
            ],
            [
                [
                    'field5_1',
                    'field5_2',
                    'field5_3',
                    'field5_5',
                    'field5_6',
                    'field5_7',
                    'field5_9',
                    'field5_10',
                    'field5_11',
                    'field5_13',
                    'field5_14',
                    'field5_15',
                    'field5_17',
                    'field5_18',
                    'field5_19',
                    'field5_21',
                    'field5_22',
                    'field5_23',
                    'field5_25',
                    'field5_26',
                    'field5_27',
                ],
                'integer',
                'max' => 9999,
                'message' => 'Не целое число',
            ],
            [
                [
                    'user_id',
                    'organization_id',
                    'field5_4',
                    'field5_8',
                    'field5_12',
                    'field5_16',
                    'field5_20',
                    'field5_24',
                    'field5_28',
                    'created_at',
                ],
                'safe',
            ],
            [
                ['organization_id'],
                'unique',
                'message' => 'Данная организация уже была выбрана вами или другим организатором питания',
            ],
            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => ['user_id' => 'id'],
            ],
            [
                ['organization_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Organization::className(),
                'targetAttribute' => ['organization_id' => 'id'],
            ],
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
            'field5_1' => 'Field5 1',
            'field5_2' => 'Field5 2',
            'field5_3' => 'Field5 3',
            'field5_4' => 'Field5 4',
            'field5_5' => 'Field5 5',
            'field5_6' => 'Field5 6',
            'field5_7' => 'Field5 7',
            'field5_8' => 'Field5 8',
            'field5_9' => 'Field5 9',
            'field5_10' => 'Field5 10',
            'field5_11' => 'Field5 11',
            'field5_12' => 'Field5 12',
            'field5_13' => 'Field5 13',
            'field5_14' => 'Field5 14',
            'field5_15' => 'Field5 15',
            'field5_16' => 'Field5 16',
            'field5_17' => 'Field5 17',
            'field5_18' => 'Field5 18',
            'field5_19' => 'Field5 19',
            'field5_20' => 'Field5 20',
            'field5_21' => 'Field5 21',
            'field5_22' => 'Field5 22',
            'field5_23' => 'Field5 23',
            'field5_24' => 'Field5 24',
            'field5_25' => 'Field5 25',
            'field5_26' => 'Field5 26',
            'field5_27' => 'Field5 27',
            'field5_28' => 'Field5 28',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
