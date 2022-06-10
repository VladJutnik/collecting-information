<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property string $title
 * @property int $federal_district_id
 * @property int $region_id
 * @property int $municipality_id
 * @property int $organization_type_id
 * @property string $created_at
 *
 * @property FederalDistrict $federalDistrict
 * @property FoodOrganizer $foodOrganizer
 * @property Municipality $municipality
 * @property OrganizationType $organizationType
 * @property Region $region
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['title', 'federal_district_id', 'region_id', 'municipality_id', 'organization_type_id'], 'required'],
            [['federal_district_id', 'region_id', 'municipality_id', 'organization_type_id'], 'integer'],
            [['created_at'], 'safe'],
            [['title', 'number'], 'string', 'max' => 255],
            [['federal_district_id'], 'exist', 'skipOnError' => true, 'targetClass' => FederalDistrict::className(), 'targetAttribute' => ['federal_district_id' => 'id']],
            [['municipality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municipality::className(), 'targetAttribute' => ['municipality_id' => 'id']],
            [['organization_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationType::className(), 'targetAttribute' => ['organization_type_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование организации',
            'federal_district_id' => 'Федеральный округ',
            'region_id' => 'Субъект федерации',
            'municipality_id' => 'Муниципальное образование',
            'type' => 'Тип организации',
        ];
    }

    /**
     * Gets query for [[FederalDistrict]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFederalDistrict()
    {
        return $this->hasOne(FederalDistrict::className(), ['id' => 'federal_district_id']);
    }

    /**
     * Gets query for [[FoodOrganizer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFoodOrganizer()
    {
        return $this->hasOne(FoodOrganizer::className(), ['organization_id' => 'id']);
    }

    /**
     * Gets query for [[Municipality]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipality()
    {
        return $this->hasOne(Municipality::className(), ['id' => 'municipality_id']);
    }

    /**
     * Gets query for [[OrganizationType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationType()
    {
        return $this->hasOne(OrganizationType::className(), ['id' => 'organization_type_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
}
