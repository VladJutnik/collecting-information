<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "deti_anket".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $federal_district_id
 * @property int $region_id
 * @property int $municipality_id
 * @property int $city_village
 * @property int $type_school
 * @property string|null $number_anket
 * @property int $organization_id
 * @property int $field1_1
 * @property int $field1_2
 * @property int $field1_3
 * @property int $field1_4
 * @property int $field1_5
 * @property int $field1_6
 * @property int $field1_7
 * @property int $field1_8
 * @property int $field1_9
 * @property int $field1_10
 * @property int $field1_11
 * @property int $field1_12
 * @property int $field1_13
 * @property int $field1_14
 * @property int $field1_15
 * @property int $field1_16
 * @property int $field1_17
 * @property int $field1_18
 * @property int $field1_19
 * @property int $field1_20
 * @property int $field1_21
 * @property int $table_18_27
 * @property int $table_28_34
 * @property int $table_35_44
 * @property int $table_45_48
 * @property string|null $interviewer_fio
 * @property string $create_at
 */
class Report extends Model
{

    public $federal_district_idReport;
    public $region_idReport;
    public $municipality_idReport;
    public $city_villageReport;
    public $type_schoolReport;
    public $organization_idReport;
    public $yearReport;
    public $showReport;
    public $terrain; //местность
    public $typeSchool; //тип школы
    public $sex; //м ж
    public $class; //класс

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'federal_district_idReport',
                    'region_idReport',
                    'municipality_idReport',
                    'city_villageReport',
                    'type_schoolReport',
                    'organization_idReport',
                    'yearReport',
                    'showReport',
                    'terrain',
                    'typeSchool',
                    'sex',
                    'class',
                ],
                'safe',
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'federal_district_idReport' => 'Федеральный округ:',
            'region_idReport' => 'Cубъект федерации:',
            'municipality_idReport' => 'Муниципальное образование:',
            'city_villageReport' => 'Тип муниципального образования:',
            'type_schoolReport' => 'Вид общеобразовательной организации:',
            'yearReport' => 'Год:',
            'organization_idReport' => 'Школа:',
            'showReport' => 'Скрыть/Показать:',
            'terrain' => 'Местность',
            'typeSchool' => 'Тип школы:',
            'sex' => 'Пол:',
            'class' => 'Класс:',
        ];
    }

    public function getClass($params)
    {
        $arr = [
            1 => [1,2,3,4],
            2 => [5,6,7,8,9],
            3 => [10,11],
        ];
        return (is_numeric($params)) ? $arr[$params] : [];
    }

    public function getTrain($params)
    {
        $arr = [
            1 => 1,//'1' => 'городская',
            2 => 0,//'0' => 'сельская',
        ];

        return (is_numeric($params)) ? $arr[$params] : [];
    }

    public function getTypeSchool($params)
    {
        $arr = [
            1 => 0,//'0' => 'обычная',
            2 => 1,//'1' => 'малокомплектная',
        ];
        return (is_numeric($params)) ? $arr[$params] : [];
    }
}
