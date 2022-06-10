<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_autorization_statistic".
 *
 * @property int $id
 * @property int $user_id
 * @property string $created_at
 */
class UserAutorizationStatistic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_autorization_statistic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'time_auth'], 'required'],
            [['user_id', 'time_auth'], 'integer'],
            [['created_at'], 'safe'],
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
            'created_at' => 'Created At',
        ];
    }
}
