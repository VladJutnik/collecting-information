<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "organization_type".
 *
 * @property int $id
 * @property string $name
 * @property string $decryption
 * @property string $created_at
 *
 * @property Organization[] $organizations
 */
class OrganizationType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'decryption'], 'required'],
            [['created_at'], 'safe'],
            [['name', 'decryption'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'decryption' => 'Decryption',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Organizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['organization_type_id' => 'id']);
    }
}
