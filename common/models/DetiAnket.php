<?php

namespace common\models;

use Yii;

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
class DetiAnket extends \yii\db\ActiveRecord
{

    public $federal_district_idReport;
    public $region_idReport;
    public $municipality_idReport;
    public $city_villageReport;
    public $type_schoolReport;
    public $organization_idReport;
    private $name;

    public static function tableName()
    {
        return 'deti_anket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'federal_district_id',
                    'region_id',
                    'municipality_id',
                    'organization_id',
                    'field1_1',
                    'field1_2',
                    'field1_3',
                    'field1_4',
                    'field1_5',
                    'field1_6',
                    'field1_7',
                    'field1_8',
                    'field1_9',
                    'field1_10',
                    'field1_11',
                    'field1_12',
                    'field1_13',
                    'field1_14',
                    'field1_15',
                    'field1_16',
                    'field1_17',
                    /* 'field1_18',
                     'field1_19',
                     'field1_20',
                     'field1_21',*/
                    'table_18_27',
                    'table_28_34',
                    'table_35_44',
                    'table_45_48',
                ],
                'required',
            ],
            [
                [
                    'federal_district_id',
                    'region_id',
                    'municipality_id',
                    'organization_id',
                    'field1_1',
                    'field1_5',
                    'field1_6',
                    'field1_7',
                    'field1_8',
                    'field1_9',
                    'field1_10',
                    'field1_11',
                    'field1_12',
                    'field1_13',
                    'field1_14',
                    'field1_15',
                    'field1_16',
                    'field1_17',
                    'field1_18',
                    'field1_19',
                    'field1_20',
                    'field1_21',
                ],
                'integer',
            ],
            [['field1_16'], 'integer', 'min' => 0, 'max' => 220],//'field1_16' => '15.1. вес ребенка (в кг):'
            [['field1_17'], 'integer', 'min' => 0, 'max' => 220],//'field1_17' => '15.2. рост ребенка (в см):'
            [['field1_18'], 'integer', 'min' => 0, 'max' => 250],//'field1_18' => '16.1. вес матери (в кг):',
            [['field1_19'], 'integer', 'min' => 0, 'max' => 250],//'field1_19' => '16.2. рост матери (в см):',
            [['field1_20'], 'integer', 'min' => 0, 'max' => 250],//'field1_20' => '17.1. вес отца (в кг):',
            [['field1_21'], 'integer', 'min' => 0, 'max' => 250],//'field1_21' => '17.2. рост отца (в см):',
            [
                [
                    'field1_18',
                    'field1_19',
                    'field1_20',
                    'field1_21',
                    'create_at',
                    'user_id',
                ],
                'safe',
            ],
            [['number_anket', 'interviewer_fio'], 'string', 'max' => 250],
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
            'federal_district_id' => 'Федеральный округ:',
            'region_id' => 'Cубъект федерации:',
            'municipality_id' => 'Муниципальное образование:',
            'city_village' => 'Тип муниципального образования:',
            'type_school' => 'Вид общеобразовательной организации:',
            'number_anket' => '1. № анкеты:',
            'organization_id' => '2. Школа:',
            'field1_1' => '3. Класс:',
            'field1_2' => '4. Дата заполнения анкеты:',//date
            'field1_3' => '5. Дата рождения ребенка:',//date
            'field1_4' => '6. Возраст ребенка: ',
            'field1_5' => '7. Пол ребенка:',//varchar
            'field1_6' => '8. Состав семьи:',//varchar
            'field1_7' => '9. Образование мамы: ',//varchar
            'field1_8' => '10. Образование папы: ',//varchar
            'field1_9' => '11.	Оцените уровень доходов Вашей семьи: ',//varchar
            'field1_10' => '12.	В какую смену учится Ваш ребенок:',//varchar
            'field1_11' => '13.	Сколько времени ребенок в среднем находится в школе в часах:',
            'field1_12' => '13.1. Посещает ли ребенок группу продленного дня?',
            'field1_13' => '13.2. Посещает ли ребенок в школе дополнительные занятия, кружки, студии, спортивные секции?',
            'field1_14' => '13.3. Уходит домой сразу после уроков?',
            'field1_15' => '14.	Укажите сколько месяцев назад проводили измерение веса и роста у ребенка:',
            'field1_16' => '15.1. вес ребенка (в кг):',
            'field1_17' => '15.2. рост ребенка (в см):',
            'field1_18' => '16.1. вес матери (в кг):',
            'field1_19' => '16.2. рост матери (в см):',
            'field1_20' => '17.1. вес отца (в кг):',
            'field1_21' => '17.2. рост отца (в см):',
            'table_18_27' => 'Table 20',
            'table_28_34' => 'Table 24',
            'table_35_44' => 'Table 25',
            'table_45_48' => 'Table 26',
            'interviewer_fio' => 'ФИО интервьюера:',
            'create_at' => 'Дата заполнения анкеты',
        ];
    }

    public function get_imt2($heightVal, $massVal, $typeKidsVal, $sexVal, $birthVal, $status)
    {
        if ($heightVal == 0) return '';

        $imt_arrayVal = [
            'дефицит массы',
            'гармоничное',
            'избыток массы',
            'ожирение'
        ];
        $imt_boys_preschoolers = [
            1 => [14.5, 18.1, 18.5],
            2 => [14.5, 18.1, 18.5],
            3 => [14, 17.5, 17.8],
            4 => [13.9, 17, 17.3],
            5 => [13.8, 16.9, 17.2],
            6 => [13.5, 17, 17.5],
            7 => [13.6, 17.5, 18]
        ];
        $imt_boys_school = [
            6 => [13.5, 17, 17.5],
            7 => [13.6, 17.5, 18],
            8 => [13.8, 18, 18.5],
            9 => [13.9, 18.5, 19.5],
            10 => [14, 19.2, 20.4],
            11 => [14.3, 20, 21.3],
            12 => [14.7, 21, 22.1],
            13 => [15.1, 21.8, 23],
            14 => [15.6, 22.5, 23.9],
            15 => [16.3, 23.5, 24.7],
            16 => [16.9, 24, 25.4],
            17 => [17.3, 25, 26.1],
            18 => [17.9, 25.6, 26.9]
        ];
        $imt_boys_student = [
            17 => [17.3, 25, 26.1],
            18 => [17.9, 25.6, 26.9],
            19 => [18.2, 26.2, 27.8],
            20 => [18.6, 27, 28.4],
            21 => [18.6, 27, 28.4],
            22 => [18.6, 27, 28.4],
            23 => [18.6, 27, 28.4],
            24 => [18.6, 27, 28.4],
            25 => [18.6, 27, 28.4],
            26 => [18.6, 27, 28.4]
        ];

        $imt_boys_else = [
            1 => [14.5, 18.1, 18.5],
            2 => [14.5, 18.1, 18.5],
            3 => [14, 17.5, 17.8],
            4 => [13.9, 17, 17.3],
            5 => [13.8, 16.9, 17.2],
            6 => [13.5, 17, 17.5],
            7 => [13.6, 17.5, 18],
            8 => [13.8, 18, 18.5],
            9 => [13.9, 18.5, 19.5],
            10 => [14, 19.2, 20.4],
            11 => [14.3, 20, 21.3],
            12 => [14.7, 21, 22.1],
            13 => [15.1, 21.8, 23],
            14 => [15.6, 22.5, 23.9],
            15 => [16.3, 23.5, 24.7],
            16 => [16.9, 24, 25.4],
            17 => [17.3, 25, 26.1],
            18 => [17.9, 25.6, 26.9],
            19 => [18.2, 26.2, 27.8],
            20 => [18.6, 27, 28.4],
            21 => [18.6, 27, 28.4],
            22 => [18.6, 27, 28.4],
            23 => [18.6, 27, 28.4],
            24 => [18.6, 27, 28.4],
            25 => [18.6, 27, 28.4],
            26 => [18.6, 27, 28.4]
        ];

        $imt_girls_preschoolers = [
            1 => [14, 18, 18.2],
            2 => [14, 18, 18.2],
            3 => [13.8, 17.2, 17.4],
            4 => [13.5, 16.8, 17.1],
            5 => [13.3, 16.9, 17.2],
            6 => [13.2, 17, 17.3],
            7 => [13.2, 17.9, 18.4]
        ];
        $imt_girls_school = [
            6 => [13.2, 17, 17.3],
            7 => [13.2, 17.9, 18.4],
            8 => [13.2, 18.5, 18.7],
            9 => [13.5, 19, 19.6],
            10 => [13.9, 20, 21],
            11 => [14, 21, 22],
            12 => [14.5, 21.6, 23],
            13 => [15, 22.5, 24],
            14 => [15.5, 23.5, 24.8],
            15 => [16, 24, 25.5],
            16 => [16.5, 24.8, 26],
            17 => [16.9, 25.1, 26.8],
            18 => [17, 25.8, 27.3]
        ];
        $imt_girls_student = [
            17 => [16.9, 25.1, 26.8],
            18 => [17, 25.8, 27.3],
            19 => [17.2, 25.8, 27.8],
            20 => [17.5, 25.5, 28.2],
            21 => [17.5, 25.5, 28.2],
            22 => [17.5, 25.5, 28.2],
            23 => [17.5, 25.5, 28.2],
            24 => [17.5, 25.5, 28.2],
            25 => [17.5, 25.5, 28.2],
            26 => [17.5, 25.5, 28.2]
        ];

        $imt_girls_else = [
            1 => [14, 18, 18.2],
            2 => [14, 18, 18.2],
            3 => [13.8, 17.2, 17.4],
            4 => [13.5, 16.8, 17.1],
            5 => [13.3, 16.9, 17.2],
            6 => [13.2, 17, 17.3],
            7 => [13.2, 17.9, 18.4],
            8 => [13.2, 18.5, 18.7],
            9 => [13.5, 19, 19.6],
            10 => [13.9, 20, 21],
            11 => [14, 21, 22],
            12 => [14.5, 21.6, 23],
            13 => [15, 22.5, 24],
            14 => [15.5, 23.5, 24.8],
            15 => [16, 24, 25.5],
            16 => [16.5, 24.8, 26],
            17 => [16.9, 25.1, 26.8],
            18 => [17, 25.8, 27.3],
            19 => [17.2, 25.8, 27.8],
            20 => [17.5, 25.5, 28.2],
            21 => [17.5, 25.5, 28.2],
            22 => [17.5, 25.5, 28.2],
            23 => [17.5, 25.5, 28.2],
            24 => [17.5, 25.5, 28.2],
            25 => [17.5, 25.5, 28.2],
            26 => [17.5, 25.5, 28.2]
        ];

        $queteletIndexVal = $massVal / (pow($heightVal / 100, 2));


        if ($typeKidsVal == 1)
        {
            if ($sexVal == 0)
            {
                $arrayChild_temp = $imt_boys_preschoolers;
            }
            else $arrayChild_temp = $imt_girls_preschoolers;
        }
        if ($typeKidsVal == 2)
        {
            if ($sexVal == 0)
            {
                $arrayChild_temp = $imt_boys_school;
            }
            else $arrayChild_temp = $imt_girls_school;
        }
        if ($typeKidsVal == 3)
        {
            if ($sexVal == 0)
            {
                $arrayChild_temp = $imt_boys_student;
            }
            else $arrayChild_temp = $imt_girls_student;
        }
        if ($typeKidsVal == 4)
        {
            if ($sexVal == 0)
            {
                $arrayChild_temp = $imt_boys_else;
            }
            else $arrayChild_temp = $imt_girls_else;
        }

        /*$imt_arrayVal = [
            'дефицит массы',
            'гармоничное',
            'избыток массы',
            'ожирение'
        ];*/
        if ($queteletIndexVal<$arrayChild_temp[$birthVal][0]) $arrayChildNum = 0;
        else if ($queteletIndexVal>=$arrayChild_temp[$birthVal][0]&& $queteletIndexVal <= $arrayChild_temp[$birthVal][1]) $arrayChildNum = 1;
        else if ($queteletIndexVal>$arrayChild_temp[$birthVal][1]&& $queteletIndexVal <= $arrayChild_temp[$birthVal][2]) $arrayChildNum = 2;
        else if ($queteletIndexVal>$arrayChild_temp[$birthVal][2]) $arrayChildNum = 3;

        if ($status == 1)
        {
            return $imt_arrayVal[$arrayChildNum];
        }
        if ($status == 2)
        {
            $minRecBodyMass = $arrayChild_temp[$birthVal][0] * (pow($heightVal / 100, 2));
            return round($minRecBodyMass,1);
        }
        if ($status == 3)
        {
            $maxRecBodyMass = $arrayChild_temp[$birthVal][1] * (pow($heightVal / 100, 2));
            return round($maxRecBodyMass,1);
        }
    }

    public function getImtNew($imt, $sexVal, $birthVal)
    {
        //$imt ЭТО ИМТ число посчитаное
        //$sexVal ЭТО пол если мужской то 0
        //$birthVal Это число возраст от 7-ми лет до 21
        if ($imt == 0) return '';
        $imt_arrayVal = [
             0 => 'Дефицит массы тела (выраженный дефицит)',
             1 => 'Недостаточная масса тела (дефицит легкой степени)',
             2 => 'Нормальная масса тела',
             3 => 'Избыточная масса тела',
             4 => 'Ожирение 1 ст',
             5 => 'Ожирение 2 ст',
             6 => 'Ожирение 3 ст',
        ];
        $imt_boys_school = [
            7 =>   [13.1, 14.2, 17.1, 19,   20.6, 21.6],
            8 =>   [13.3, 14.4, 17.5, 19.7, 21.1, 22.8],
            9 =>   [13.5, 14.6, 18,   20.5, 22.6, 24.3],
            10 =>  [13.7, 14.9, 18.6, 21.4, 23.6, 26.1],
            11 =>  [14.1, 15.3, 19.3, 22.5, 25.1, 28.0],
            12 =>  [14.5, 15.8, 20,   23.6, 26.6, 30.0],
            13 =>  [14.9, 16.4, 20.9, 24.8, 28.1, 31.7],
            14 =>  [15.5, 17,   21.9, 25.9, 29.6, 33.1],
            15 =>  [16.0, 17.6, 22.8, 27,   30.6, 34.1],
            16 =>  [16.5, 18.2, 23.6, 27.9, 31.1, 34.8],
            17 =>  [16.9, 18.8, 24.4, 28.6, 32.1, 35.2],
            18 =>  [16.9, 18.8, 24.4, 28.6, 32.1, 35.2],
            19 =>  [16.9, 18.8, 24.4, 28.6, 32.1, 35.2],
            20 =>  [16.9, 18.8, 24.4, 28.6, 32.1, 35.2],
            21 =>  [16.9, 18.8, 24.4, 28.6, 32.1, 35.2],
        ];
        $imt_girls_school = [
            7 =>   [12.7, 13.9, 17.4, 19.8, 21.6, 23.3],
            8 =>   [12.9, 14.1, 17.8, 20.6, 22.6, 24.8],
            9 =>   [13.1, 14.4, 18.4, 21.5, 24.1, 26.5],
            10 =>  [13.5, 14.8, 19.1, 22.6, 25.6, 28.4],
            11 =>  [13.9, 15.3, 20, 23.7, 27.6, 30.2],
            12 =>  [14.4, 16, 20.9, 25, 28.6, 31.9],
            13 =>  [14.9, 16.6, 21.9, 26.2, 29.6, 33.4],
            14 =>  [15.4, 17.2, 22.8, 27.3, 31.1, 34.7],
            15 =>  [15.9, 17.8, 23.6, 28.2, 32.1, 35.5],
            16 =>  [16.2, 18.2, 24.2, 28.9, 32.6, 36.1],
            17 =>  [16.4, 18.4, 24.6, 29.3, 33.1, 36.3],
            18 =>  [16.4, 18.4, 24.6, 29.3, 33.1, 36.3],
            19 =>  [16.4, 18.4, 24.6, 29.3, 33.1, 36.3],
            20 =>  [16.4, 18.4, 24.6, 29.3, 33.1, 36.3],
            21 =>  [16.4, 18.4, 24.6, 29.3, 33.1, 36.3],
        ];
        $arrayChild_temp = ($sexVal == 0) ? $imt_boys_school : $imt_girls_school;
        $birthVal = (int)$birthVal;
        if ($imt < $arrayChild_temp[$birthVal][0]) $arrayChildNum = 0;
        elseif ($imt >= $arrayChild_temp[$birthVal][0] && $imt < $arrayChild_temp[$birthVal][1]) $arrayChildNum = 1;
        elseif ($imt >= $arrayChild_temp[$birthVal][1] && $imt < $arrayChild_temp[$birthVal][2]) $arrayChildNum = 2;
        elseif ($imt >= $arrayChild_temp[$birthVal][2] && $imt < $arrayChild_temp[$birthVal][3]) $arrayChildNum = 3;
        elseif ($imt >= $arrayChild_temp[$birthVal][3] && $imt < $arrayChild_temp[$birthVal][4]) $arrayChildNum = 4;
        elseif ($imt >= $arrayChild_temp[$birthVal][4] && $imt < $arrayChild_temp[$birthVal][5]) $arrayChildNum = 5;
        else $arrayChildNum = 6;
        return $imt_arrayVal[$arrayChildNum];
    }

    public function get_imt($weight, $growth)
    {
        return round(($weight / (($growth / 100) * ($growth / 100))), 2);

    }

    public function get_parent($imt)
    {
        if(is_numeric($imt)){
            if($imt < 18.5){
                return 'дефицит';
            } elseif($imt >= 18.5 && $imt <= 24.9){
                return 'норма';
            } elseif($imt >= 25 && $imt <= 29.9){
                return 'избыток';
            } elseif($imt >= 30 && $imt <= 34.9){
                return '1 степень';
            } elseif($imt >= 35 && $imt <= 39.9){
                return '2 степень';
            } else {
                return '3 степень';
            }



        } else {
            return 0;
        }
    }

    public function getResultAnket($data){
        $result = [
            1 =>'',
            2 =>'',
        ];
        //field1_5 1 мальчик 2 девочка
        if($data['field1_5'] == 1){
            $result += [
                3 => 1,
                4 => 1,
                5 => 0,
            ];
        } else {
            $result += [
                3 => 1,
                4 => 0,
                5 => 1,
            ];
        }
        $result += [
            6 => ''
        ];
        //field1_6 1 полная (два родителя) 2 неполная (один родитель или воспитывает опекун)
        if($data['field1_6'] == 1){
            $result += [
                7 => 1,
                8 => 0,
                9 => 0,
            ];
        } elseif($data['field1_6'] == 2){
            $result += [
                7 => 0,
                8 => 1,
                9 => 0,
            ];
        } else {
            $result += [
                7 => 0,
                8 => 0,
                9 => 1,
            ];
        }
        $result += [
            10 => ''
        ];
        //field1_7 1 Образование матери
        if($data['field1_7'] == 1){
            $result += [
                11 => 1,
                12 => 0,
                13 => 0,
                14 => 0,
                15 => 0,
            ];
        } elseif($data['field1_7'] == 2){
            $result += [
                11 => 0,
                12 => 1,
                13 => 0,
                14 => 0,
                15 => 0,
            ];
        } elseif($data['field1_7'] == 3){
            $result += [
                11 => 0,
                12 => 0,
                13 => 1,
                14 => 0,
                15 => 0,
            ];
        } elseif($data['field1_7'] == 4){
            $result += [
                11 => 0,
                12 => 0,
                13 => 0,
                14 => 1,
                15 => 0,
            ];
        } else {
            $result += [
                11 => 0,
                12 => 0,
                13 => 0,
                14 => 0,
                15 => 1,
            ];
        }
        $result += [
            16 => ''
        ];
        //field1_8 1 Образование папы:
        if($data['field1_8'] == 1){
            $result += [
                17 => 1,
                18 => 0,
                19 => 0,
                20 => 0,
                21 => 0,
            ];
        } elseif($data['field1_8'] == 2){
            $result += [
                17 => 0,
                18 => 1,
                19 => 0,
                20 => 0,
                21 => 0,
            ];
        } elseif($data['field1_8'] == 3){
            $result += [
                17 => 0,
                18 => 0,
                19 => 1,
                20 => 0,
                21 => 0,
            ];
        } elseif($data['field1_8'] == 4){
            $result += [
                17 => 0,
                18 => 0,
                19 => 0,
                20 => 1,
                21 => 0,
            ];
        } else {
            $result += [
                17 => 0,
                18 => 0,
                19 => 0,
                20 => 0,
                21 => 1,
            ];
        }
        $result += [
            22 => ''
        ];
        //field1_9 1 Образование папы:
        if($data['field1_9'] == 1){
            $result += [
                23 => 1,
                24 => 0,
                25 => 0,
                26 => 0,
                27 => 0,
                28 => 0,
            ];
        } elseif($data['field1_9'] == 2){
            $result += [
                23 => 0,
                24 => 1,
                25 => 0,
                26 => 0,
                27 => 0,
                28 => 0,
            ];
        } elseif($data['field1_9'] == 3){
            $result += [
                23 => 0,
                24 => 0,
                25 => 1,
                26 => 0,
                27 => 0,
                28 => 0,
            ];
        } elseif($data['field1_9'] == 4){
            $result += [
                23 => 0,
                24 => 0,
                25 => 0,
                26 => 1,
                27 => 0,
                28 => 0,
            ];
        } elseif($data['field1_9'] == 5){
            $result += [
                23 => 0,
                24 => 0,
                25 => 0,
                26 => 0,
                27 => 1,
                28 => 0,
            ];
        } else {
            $result += [
                23 => 0,
                24 => 0,
                25 => 0,
                26 => 0,
                27 => 0,
                28 => 1,
            ];
        }
        $result += [
            29 => ''
        ];
        //field1_10 Смена обучения
        if($data['field1_10'] == 1){
            $result += [
                30 => 1,
                31 => 0,
                32 => 0,
            ];
        } elseif($data['field1_10'] == 2){
            $result += [
                30 => 0,
                31 => 1,
                32 => 0,
            ];
        } else {
            $result += [
                30 => 0,
                31 => 0,
                32 => 1,
            ];
        }
        //field1_11 13.	Сколько времени ребенок в среднем находится в школе в часах:
        if($data['field1_11'] > 5 && $data['field1_11'] < 11){
            $result += [
                33 => 1,
            ];
        } else {
            $result += [
                33 => 0,
            ];
        }
        //field1_12 Количество школьников, посещающих группу продленного дня
        if($data['field1_12'] == 1){
            $result += [
                34 => 1,
                35 => 0,
            ];
        } else {
            $result += [
                34 => 0,
                35 => 1,
            ];
        }
        //field1_13 Количество школьников, охваченных дополнительным образованием (кружки, студии, спортивные секции)
        if($data['field1_13'] == 1){
            $result += [
                36 => 1,
                37 => 0,
            ];
        } else {
            $result += [
                36 => 0,
                37 => 1,
            ];
        }
        //field1_14 Количество школьников, задерживающихся в школе после уроков
        if($data['field1_14'] == 2){
            $result += [
                38 => 1,
                39 => 0,
            ];
        } else {
            $result += [
                38 => 0,
                39 => 1,
            ];
        }
        $result += [
            40 => '' //ХАРАКТЕРИСТИКА индекса массы тела матерей
        ];
        if (
            $data['field1_18'] == 0 ||
            $data['field1_18'] == 1 ||
            $data['field1_18'] == '' ||
            $data['field1_19'] == 0 ||
            $data['field1_19'] == 1 ||
            $data['field1_19'] == ''
        ) {
            $result += [
                41 => 0,
                42 => 0,
                43 => 0,
                44 => 0,
                45 => 0,
                46 => 0,
                47 => 0,
                48 => 1,
            ];
        } else {
            $imt = $this->get_imt($data['field1_18'], $data['field1_19']);
            $imtStr2 = $this->get_parent($imt);
            if ($imtStr2 === 'дефицит') {
                $result += [
                    41 => 1,
                    42 => 0,
                    43 => 0,
                    44 => 0,
                    45 => 0,
                    46 => 0,
                    47 => 0,
                    48 => 0,
                ];
            } elseif ($imtStr2 === 'норма') {
                $result += [
                    41 => 0,
                    42 => 1,
                    43 => 0,
                    44 => 0,
                    45 => 0,
                    46 => 0,
                    47 => 0,
                    48 => 0,
                ];
            } elseif ($imtStr2 === 'избыток') {
                $result += [
                    41 => 0,
                    42 => 0,
                    43 => 1,
                    44 => 0,
                    45 => 0,
                    46 => 0,
                    47 => 0,
                    48 => 0,
                ];
            }  elseif ($imtStr2 === '1 степень') {
                $result += [
                    41 => 0,
                    42 => 0,
                    43 => 0,
                    44 => 1,
                    45 => 1,
                    46 => 0,
                    47 => 0,
                    48 => 0,
                ];
            }  elseif ($imtStr2 === '2 степень') {
                $result += [
                    41 => 0,
                    42 => 0,
                    43 => 0,
                    44 => 1,
                    45 => 0,
                    46 => 1,
                    47 => 0,
                    48 => 0,
                ];
            } else {
                $result += [
                    41 => 0,
                    42 => 0,
                    43 => 0,
                    44 => 1,
                    45 => 0,
                    46 => 0,
                    47 => 1,
                    48 => 0,
                ];
            }
        }
        $result += [
            49 => '' //ХАРАКТЕРИСТИКА индекса массы тела матерей
        ];
        if (
            $data['field1_20'] == 0 ||
            $data['field1_20'] == 1 ||
            $data['field1_20'] == '' ||
            $data['field1_21'] == 0 ||
            $data['field1_21'] == 1 ||
            $data['field1_21'] == ''
        ) {
            $result += [
                50 => 0,
                51 => 0,
                52 => 0,
                53 => 0,
                54 => 0,
                55 => 0,
                56 => 0,
                57 => 1,
            ];
        } else {
            $imt = $this->get_imt($data['field1_20'], $data['field1_21']);
            $imtStr2 = $this->get_parent($imt);
            if ($imtStr2 === 'дефицит') {
                $result += [
                    50 => 1,
                    51 => 0,
                    52 => 0,
                    53 => 0,
                    54 => 0,
                    55 => 0,
                    56 => 0,
                    57 => 0,
                ];
            } elseif ($imtStr2 === 'норма') {
                $result += [
                    50 => 0,
                    51 => 1,
                    52 => 0,
                    53 => 0,
                    54 => 0,
                    55 => 0,
                    56 => 0,
                    57 => 0,
                ];
            } elseif ($imtStr2 === 'избыток') {
                $result += [
                    50 => 0,
                    51 => 0,
                    52 => 1,
                    53 => 0,
                    54 => 0,
                    55 => 0,
                    56 => 0,
                    57 => 0,
                ];
            }  elseif ($imtStr2 === '1 степень') {
                $result += [
                    50 => 0,
                    51 => 0,
                    52 => 0,
                    53 => 1,
                    54 => 1,
                    55 => 0,
                    56 => 0,
                    57 => 0,
                ];
            }  elseif ($imtStr2 === '2 степень') {
                $result += [
                    50 => 0,
                    51 => 0,
                    52 => 0,
                    53 => 1,
                    54 => 0,
                    55 => 1,
                    56 => 0,
                    57 => 0,
                ];
            } else {
                $result += [
                    50 => 0,
                    51 => 0,
                    52 => 0,
                    53 => 1,
                    54 => 0,
                    55 => 0,
                    56 => 1,
                    57 => 0,
                ];
            }
        }
        $result += [
            58 => ''
        ];
        if($data['field18_1'] == 1){
            $result += [
                59 => 1,
            ];
        } else {
            $result += [
                59 => 0,
            ];
        }
        if($data['field18_2'] == 1){
            $result += [
                60 => 1,
            ];
        } else {
            $result += [
                60 => 0,
            ];
        }
        if($data['field18_3'] == 1){
            $result += [
                61 => 1,
            ];
        } else {
            $result += [
                61 => 0,
            ];
        }
        if($data['field18_4'] == 1){
            $result += [
                62 => 1,
            ];
        } else {
            $result += [
                62 => 0,
            ];
        }
        if($data['field18_5'] == 1){
            $result += [
                63 => 1,
            ];
        } else {
            $result += [
                63 => 0,
            ];
        }
        if($data['field18_6'] == 1){
            $result += [
                64 => 1,
            ];
        } else {
            $result += [
                64 => 0,
            ];
        }
        if($data['field18_7'] == 1){
            $result += [
                65 => 1,
            ];
        } else {
            $result += [
                65 => 0,
            ];
        }
        if($data['field18_11'] == 1){
            $result += [
                66 => 1,
            ];
        } else {
            $result += [
                66 => 0,
            ];
        }
        if($data['field18_12'] == 1){
            $result += [
                67 => 1,
            ];
        } else {
            $result += [
                67 => 0,
            ];
        }
        if($data['field18_13'] == 1){
            $result += [
                68 => 1,
            ];
        } else {
            $result += [
                68 => 0,
            ];
        }
        if($data['field18_14'] == 1){
            $result += [
                69 => 1,
            ];
        } else {
            $result += [
                69 => 0,
            ];
        }
        if($data['field18_15'] == 1){
            $result += [
                70 => 1,
            ];
        } else {
            $result += [
                70 => 0,
            ];
        }
        if($data['field18_16'] == 1){
            $result += [
                71 => 1,
            ];
        } else {
            $result += [
                71 => 0,
            ];
        }
        if($data['field18_17'] == 1){
            $result += [
                72 => 1,
            ];
        } else {
            $result += [
                72 => 0,
            ];
        }
        if($data['field18_1'] == 1 || $data['field18_1'] == 2){
            $result += [
                73 => 0,
            ];
        } else {
            $result += [
                73 => 1,
            ];
        }
        if ($data['field18_18'] == '' || $data['field18_18'] == 'нет' || $data['field18_18'] == ' нет' || $data['field18_18'] == 'нет ' || $data['field18_18'] == 'Нет ' || $data['field18_18'] == 'Нет' || $data['field18_18'] == 'затрудняюсь ответить' || $data['field18_18'] == ' затрудняюсь ответить' || $data['field18_18'] == 'затрудняюсь ответить ' || $data['field18_18'] == 'Затрудняюсь ответить ' || $data['field18_18'] == 'Затрудняюсь ответить' || $data['field18_18'] == '-') {
            $result += [
                74 => 0,
                75 => 1,
            ];
        } else {
            $result += [
                74 => 1,
                75 => 0,
            ];
        }
        $result += [
            76 => ''
        ];
        if($data['field20'] == 1){
            $result += [
                77 => 1,
                78 => 0,
                79 => 0,
            ];
        } elseif($data['field20'] == 2){
            $result += [
                77 => 0,
                78 => 1,
                79 => 0,
            ];
        } else {
            $result += [
                77 => 0,
                78 => 0,
                79 => 1,
            ];
        }
        if($data['field20_1'] == 1){
            $result += [
                80 => 1,
                81 => 0,
                82 => 0,
            ];
        } elseif($data['field20_1'] == 2){
            $result += [
                80 => 0,
                81 => 1,
                82 => 0,
            ];
        } else {
            $result += [
                80 => 0,
                81 => 0,
                82 => 1,
            ];
        }
        $result += [
            83 => ''
        ];
        if($data['field21_1'] == 1){
            $result += [
                84 => 1,
                85 => 0,
                86 => 0,
            ];
        } elseif($data['field21_1'] == 2){
            $result += [
                84 => 0,
                85 => 1,
                86 => 0,
            ];
        } else {
            $result += [
                84 => 0,
                85 => 0,
                86 => 1,
            ];
        }
        if($data['field21_2'] == 1){
            $result += [
                87 => 1,
                88 => 0,
                89 => 0,
            ];
        } elseif($data['field21_2'] == 2){
            $result += [
                87 => 0,
                88 => 1,
                89 => 0,
            ];
        } else {
            $result += [
                87 => 0,
                88 => 0,
                89 => 1,
            ];
        }
        if($data['field21_3'] == 1){
            $result += [
                90 => 1,
                91 => 0,
                92 => 0,
            ];
        } elseif($data['field21_3'] == 2){
            $result += [
                90 => 0,
                91 => 1,
                92 => 0,
            ];
        } else {
            $result += [
                90 => 0,
                91 => 0,
                92 => 1,
            ];
        }
        if($data['field21_4'] == 1){
            $result += [
                93 => 1,
                94 => 0,
                95 => 0,
            ];
        } elseif($data['field21_4'] == 2){
            $result += [
                93 => 0,
                94 => 1,
                95 => 0,
            ];
        } else {
            $result += [
                93 => 0,
                94 => 0,
                95 => 1,
            ];
        }
        if($data['field21_5'] == 1){
            $result += [
                96 => 1,
                97 => 0,
                98 => 0,
            ];
        } elseif($data['field21_5'] == 2){
            $result += [
                96 => 0,
                97 => 1,
                98 => 0,
            ];
        } else {
            $result += [
                96 => 0,
                97 => 0,
                98 => 1,
            ];
        }
        $result += [
            99 => ''
        ];
        if($data['field22'] == 1){
            $result += [
                100 => 1,
                101 => 0,
                102 => 0,
                103 => 0,
                104 => 0,
                105 => 0,
                106 => 0,
            ];
        } elseif($data['field22'] == 2){
            $result += [
                100 => 0,
                101 => 1,
                102 => 0,
                103 => 0,
                104 => 0,
                105 => 0,
                106 => 0,
            ];
        } elseif($data['field22'] == 3){
            $result += [
                100 => 0,
                101 => 0,
                102 => 1,
                103 => 0,
                104 => 0,
                105 => 0,
                106 => 0,
            ];
        } elseif($data['field22'] == 4){
            $result += [
                100 => 0,
                101 => 0,
                102 => 0,
                103 => 1,
                104 => 0,
                105 => 0,
                106 => 0,
            ];
        } elseif($data['field22'] == 5){
            $result += [
                100 => 0,
                101 => 0,
                102 => 0,
                103 => 0,
                104 => 1,
                105 => 0,
                106 => 0,
            ];
        } elseif($data['field22'] == 6){
            $result += [
                100 => 0,
                101 => 0,
                102 => 0,
                103 => 0,
                104 => 0,
                105 => 1,
                106 => 0,
            ];
        } else {
            $result += [
                100 => 1,
                101 => 0,
                102 => 0,
                103 => 0,
                104 => 0,
                105 => 0,
                106 => 1,
            ];
        }
        $result += [
            107 => ''
        ];
        if($data['field23'] == 1 || $data['field23'] == 2){
            $result += [
                108 => 1,
                109 => 0,
                110 => 0,
                111 => 0,
                112 => 0,
            ];
        } elseif($data['field23'] == 3){
            $result += [
                108 => 0,
                109 => 1,
                110 => 0,
                111 => 0,
                112 => 0,
            ];
        } elseif($data['field23'] == 4){
            $result += [
                108 => 0,
                109 => 0,
                110 => 1,
                111 => 0,
                112 => 0,
            ];
        } elseif($data['field23'] == 5|| $data['field23'] == 6|| $data['field23'] == 7){
            $result += [
                108 => 0,
                109 => 0,
                110 => 0,
                111 => 1,
                112 => 0,
            ];
        } else {
            $result += [
                108 => 0,
                109 => 0,
                110 => 0,
                111 => 0,
                112 => 1,
            ];
        }
        $result += [
            113 => ''
        ];
        if($data['field24'] == 1 || $data['field24'] == 2){
            $result += [
                114 => 1,
                115 => 0,
                116 => 0,
                117 => 0,
                118 => 0,
            ];
        } elseif($data['field24'] == 3){
            $result += [
                114 => 0,
                115 => 1,
                116 => 0,
                117 => 0,
                118 => 0,
            ];
        } elseif($data['field24'] == 4){
            $result += [
                114 => 0,
                115 => 0,
                116 => 1,
                117 => 0,
                118 => 0,
            ];
        } elseif($data['field24'] == 5|| $data['field24'] == 6|| $data['field24'] == 7){
            $result += [
                114 => 0,
                115 => 0,
                116 => 0,
                117 => 1,
                118 => 0,
            ];
        } else {
            $result += [
                114 => 0,
                115 => 0,
                116 => 0,
                117 => 0,
                118 => 1,
            ];
        }
        if($data['field25'] == 1){
            $result += [
                119 => 1,
                120 => 0,
                121 => 0,
                122 => 0,
            ];
        } elseif($data['field25'] == 2) {
            $result += [
                119 => 0,
                120 => 1,
                121 => 0,
                122 => 0,
            ];
        } elseif($data['field25'] == 3) {
            $result += [
                119 => 0,
                120 => 0,
                121 => 1,
                122 => 0,
            ];
        } else {
            $result += [
                119 => 0,
                120 => 0,
                121 => 0,
                122 => 1,
            ];
        }
        if($data['field26'] == 1){
            $result += [
                123 => 1,
                124 => 0,
                125 => 0,
                126 => 0,
            ];
        } elseif($data['field26'] == 2) {
            $result += [
                123 => 0,
                124 => 1,
                125 => 0,
                126 => 0,
            ];
        } elseif($data['field26'] == 3) {
            $result += [
                123 => 0,
                124 => 0,
                125 => 1,
                126 => 0,
            ];
        } else {
            $result += [
                123 => 0,
                124 => 0,
                125 => 0,
                126 => 1,
            ];
        }
        $result += [
            127 => ''
        ];
        if($data['field26'] == 1 || $data['field26'] == 2){
            if($data['field27'] == 1){
                $result += [
                    128 => 1,
                    129 => 0,
                    130 => 0,
                    131 => 0,
                    132 => 0,
                    133 => 0,
                ];
            } elseif($data['field27'] == 2){
                $result += [
                    128 => 0,
                    129 => 1,
                    130 => 0,
                    131 => 0,
                    132 => 0,
                    133 => 0,
                ];
            } elseif($data['field27'] == 3){
                $result += [
                    128 => 0,
                    129 => 0,
                    130 => 1,
                    131 => 0,
                    132 => 0,
                    133 => 0,
                ];
            } elseif($data['field27'] == 4){
                $result += [
                    128 => 0,
                    129 => 0,
                    130 => 0,
                    131 => 1,
                    132 => 0,
                    133 => 0,
                ];
            } elseif($data['field27'] == 5){
                $result += [
                    128 => 0,
                    129 => 0,
                    130 => 0,
                    131 => 0,
                    132 => 1,
                    133 => 0,
                ];
            } else {
                $result += [
                    128 => 0,
                    129 => 0,
                    130 => 0,
                    131 => 0,
                    132 => 0,
                    133 => 1,
                ];
            }
            if($data['field28_1'] == 1){
                $result += [
                    134 => 1,
                ];
            } else {
                $result += [
                    134 => 0,
                ];
            }
            if($data['field28_2'] == 1){
                $result += [
                    135 => 1,
                ];
            } else {
                $result += [
                    135 => 0,
                ];
            }
            if($data['field28_3'] == 1){
                $result += [
                    136 => 1,
                ];
            } else {
                $result += [
                    136 => 0,
                ];
            }
            if($data['field28_4'] == 1){
                $result += [
                    137 => 1,
                ];
            } else {
                $result += [
                    137 => 0,
                ];
            }
            if($data['field28_5'] == 1){
                $result += [
                    138 => 1,
                ];
            } else {
                $result += [
                    138 => 0,
                ];
            }
            if($data['field28_6'] == 1){
                $result += [
                    139 => 1,
                ];
            } else {
                $result += [
                    139 => 0,
                ];
            }
            if($data['field28_7'] == 1){
                $result += [
                    140 => 1,
                ];
            } else {
                $result += [
                    140 => 0,
                ];
            }
            if($data['field28_8'] == 1){
                $result += [
                    141 => 1,
                ];
            } else {
                $result += [
                    141 => 0,
                ];
            }
            if($data['field28_1'] == 1 || $data['field28_1'] == 2){
                $result += [
                    142 => 0,
                ];
            } else {
                $result += [
                    142 => 1,
                ];
            }
            if($data['field29_1'] == 1){
                $result += [
                    143 => 1,
                ];
            } else {
                $result += [
                    143 => 0,
                ];
            }
            if($data['field29_2'] == 1){
                $result += [
                    144 => 1,
                ];
            } else {
                $result += [
                    144 => 0,
                ];
            }
            if($data['field29_3'] == 1){
                $result += [
                    145 => 1,
                ];
            } else {
                $result += [
                    145 => 0,
                ];
            }
            if($data['field29_4'] == 1){
                $result += [
                    146 => 1,
                ];
            } else {
                $result += [
                    146 => 0,
                ];
            }
            if($data['field29_5'] == 1){
                $result += [
                    147 => 1,
                ];
            } else {
                $result += [
                    147 => 0,
                ];
            }
            if($data['field29_6'] == 1){
                $result += [
                    148 => 1,
                ];
            } else {
                $result += [
                    148 => 0,
                ];
            }
            if($data['field29_6'] == 1 || $data['field29_6'] == 2){
                $result += [
                    149 => 0,
                ];
            } else {
                $result += [
                    149 => 1,
                ];
            }
            $result += [
                150 => ''
            ];
            if($data['field29_1'] == 1){
                if($data['field30'] == 1){
                    $result += [
                        151 => 1,
                        152 => 0,
                        153 => 0,
                        154 => 0,
                        155 => 0,
                        156 => 0,
                        157 => 0,
                        158 => 0,
                        159 => 0,
                        160 => 0,
                        161 => 0,
                    ];
                } elseif($data['field30'] == 2) {
                    $result += [
                        151 => 0,
                        152 => 1,
                        153 => 0,
                        154 => 0,
                        155 => 0,
                        156 => 0,
                        157 => 0,
                        158 => 0,
                        159 => 0,
                        160 => 0,
                        161 => 0,
                    ];
                } elseif($data['field30'] == 3) {
                    $result += [
                        151 => 0,
                        152 => 0,
                        153 => 1,
                        154 => 0,
                        155 => 0,
                        156 => 0,
                        157 => 0,
                        158 => 0,
                        159 => 0,
                        160 => 0,
                        161 => 0,
                    ];
                } elseif($data['field30'] == 4) {
                    $result += [
                        151 => 0,
                        152 => 0,
                        153 => 0,
                        154 => 1,
                        155 => 0,
                        156 => 0,
                        157 => 0,
                        158 => 0,
                        159 => 0,
                        160 => 0,
                        161 => 0,
                    ];
                } elseif($data['field30'] == 5) {
                    $result += [
                        151 => 0,
                        152 => 0,
                        153 => 0,
                        154 => 0,
                        155 => 1,
                        156 => 0,
                        157 => 0,
                        158 => 0,
                        159 => 0,
                        160 => 0,
                        161 => 0,
                    ];
                } elseif($data['field30'] == 6) {
                    $result += [
                        151 => 0,
                        152 => 0,
                        153 => 0,
                        154 => 0,
                        155 => 0,
                        156 => 1,
                        157 => 0,
                        158 => 0,
                        159 => 0,
                        160 => 0,
                        161 => 0,
                    ];
                } elseif($data['field30'] == 7) {
                    $result += [
                        151 => 0,
                        152 => 0,
                        153 => 0,
                        154 => 0,
                        155 => 0,
                        156 => 0,
                        157 => 1,
                        158 => 0,
                        159 => 0,
                        160 => 0,
                        161 => 0,
                    ];
                } elseif($data['field30'] == 8) {
                    $result += [
                        151 => 0,
                        152 => 0,
                        153 => 0,
                        154 => 0,
                        155 => 0,
                        156 => 0,
                        157 => 0,
                        158 => 1,
                        159 => 0,
                        160 => 0,
                        161 => 0,
                    ];
                } elseif($data['field30'] == 9) {
                    $result += [
                        151 => 0,
                        152 => 0,
                        153 => 0,
                        154 => 0,
                        155 => 0,
                        156 => 0,
                        157 => 0,
                        158 => 0,
                        159 => 1,
                        160 => 0,
                        161 => 0,
                    ];
                } elseif($data['field30'] == 10) {
                    $result += [
                        151 => 0,
                        152 => 0,
                        153 => 0,
                        154 => 0,
                        155 => 0,
                        156 => 0,
                        157 => 0,
                        158 => 0,
                        159 => 0,
                        160 => 1,
                        161 => 0,
                    ];
                } else {
                    $result += [
                        151 => 0,
                        152 => 0,
                        153 => 0,
                        154 => 0,
                        155 => 0,
                        156 => 0,
                        157 => 0,
                        158 => 0,
                        159 => 0,
                        160 => 0,
                        161 => 1,
                    ];
                }
            } else {
                $result += [
                    151 => 0,
                    152 => 0,
                    153 => 0,
                    154 => 0,
                    155 => 0,
                    156 => 0,
                    157 => 0,
                    158 => 0,
                    159 => 0,
                    160 => 0,
                    161 => 0,
                ];
            }
            if($data['field31_1'] == 1){
                $result += [
                    162 => 1,
                    163 => 0,
                    164 => 0,
                    165 => 0,
                    166 => 0,
                ];
            } elseif($data['field31_1'] == 2) {
                $result += [
                    162 => 0,
                    163 => 1,
                    164 => 0,
                    165 => 0,
                    166 => 0,
                ];
            } elseif($data['field31_1'] == 3) {
                $result += [
                    162 => 0,
                    163 => 0,
                    164 => 1,
                    165 => 0,
                    166 => 0,
                ];
            } elseif($data['field31_1'] == 4) {
                $result += [
                    162 => 0,
                    163 => 0,
                    164 => 0,
                    165 => 1,
                    166 => 0,
                ];
            } else {
                $result += [
                    162 => 0,
                    163 => 0,
                    164 => 0,
                    165 => 0,
                    166 => 1,
                ];
            }
            if($data['field31_2'] == 1){
                $result += [
                    167 => 1,
                    168 => 0,
                    169 => 0,
                    170 => 0,
                    171 => 0,
                ];
            } elseif($data['field31_2'] == 2) {
                $result += [
                    167 => 0,
                    168 => 1,
                    169 => 0,
                    170 => 0,
                    171 => 0,
                ];
            } elseif($data['field31_2'] == 3) {
                $result += [
                    167 => 0,
                    168 => 0,
                    169 => 1,
                    170 => 0,
                    171 => 0,
                ];
            } elseif($data['field31_2'] == 4) {
                $result += [
                    167 => 0,
                    168 => 0,
                    169 => 0,
                    170 => 1,
                    171 => 0,
                ];
            } else {
                $result += [
                    167 => 0,
                    168 => 0,
                    169 => 0,
                    170 => 0,
                    171 => 1,
                ];
            }
            if($data['field31_3'] == 1){
                $result += [
                    172 => 1,
                    173 => 0,
                    174 => 0,
                    175 => 0,
                    176 => 0,
                ];
            } elseif($data['field31_3'] == 2) {
                $result += [
                    172 => 0,
                    173 => 1,
                    174 => 0,
                    175 => 0,
                    176 => 0,
                ];
            } elseif($data['field31_3'] == 3) {
                $result += [
                    172 => 0,
                    173 => 0,
                    174 => 1,
                    175 => 0,
                    176 => 0,
                ];
            } elseif($data['field31_3'] == 4) {
                $result += [
                    172 => 0,
                    173 => 0,
                    174 => 0,
                    175 => 1,
                    176 => 0,
                ];
            } else {
                $result += [
                    172 => 0,
                    173 => 0,
                    174 => 0,
                    175 => 0,
                    176 => 1,
                ];
            }
            if($data['field32'] == 1){
                $result += [
                    177 => 1,
                    178 => 0,
                    179 => 0,
                    180 => 0,
                ];
            } elseif($data['field32'] == 2) {
                $result += [
                    177 => 0,
                    178 => 1,
                    179 => 0,
                    180 => 0,
                ];
            } elseif($data['field32'] == 3) {
                $result += [
                    177 => 0,
                    178 => 0,
                    179 => 1,
                    180 => 0,
                ];
            } else {
                $result += [
                    177 => 0,
                    178 => 0,
                    179 => 0,
                    180 => 1,
                ];
            }
            if($data['field33'] == 1){
                $result += [
                    181 => 1,
                    182 => 0,
                    183 => 0,
                ];
            } elseif($data['field33'] == 2) {
                $result += [
                    181 => 0,
                    182 => 1,
                    183 => 0,
                ];
            } else {
                $result += [
                    181 => 0,
                    182 => 0,
                    183 => 1,
                ];
            }
            if($data['field34'] == 1){
                $result += [
                    184 => 1,
                    185 => 0,
                    186 => 0,
                ];
            } elseif($data['field34'] == 2) {
                $result += [
                    184 => 0,
                    185 => 1,
                    186 => 0,
                ];
            } else {
                $result += [
                    184 => 0,
                    185 => 0,
                    186 => 1,
                ];
            }
            $result += [
                187 => ''
            ];
            if($data['field34_1'] == 1){
                $result += [
                    188 => 1,
                ];
            } else {
                $result += [
                    188 => 0,
                ];
            }
            if($data['field34_2'] == 1){
                $result += [
                    189 => 1,
                ];
            } else {
                $result += [
                    189 => 0,
                ];
            }
            if($data['field34_3'] == 1){
                $result += [
                    190 => 1,
                ];
            } else {
                $result += [
                    190 => 0,
                ];
            }
            if($data['field34_4'] == 1){
                $result += [
                    191 => 1,
                ];
            } else {
                $result += [
                    191 => 0,
                ];
            }
            if($data['field34_5'] == 1){
                $result += [
                    192 => 1,
                ];
            } else {
                $result += [
                    192 => 0,
                ];
            }
            if($data['field34_6'] == 1){
                $result += [
                    193 => 1,
                ];
            } else {
                $result += [
                    193 => 0,
                ];
            }
            if($data['field34_7'] == 1){
                $result += [
                    194 => 1,
                ];
            } else {
                $result += [
                    194 => 0,
                ];
            }
            if($data['field34_8'] == 1){
                $result += [
                    195 => 1,
                ];
            } else {
                $result += [
                    195 => 0,
                ];
            }
            if($data['field34_9'] == 1){
                $result += [
                    196 => 1,
                ];
            } else {
                $result += [
                    196 => 0,
                ];
            }
            if($data['field34_9'] == 1 || $data['field34_9'] == 2){
                $result += [
                    197 => 0,
                ];
            } else {
                $result += [
                    197 => 1,
                ];
            }
            //30 dопрос скрытый Набор блюд получающих (приобретаемых) на обед ребенком в школе
            //Причины, почему ребенок не питается в школьной столовой
            //потому что для этих вопросов они скрыты
            $result += [
                198 => '',
            ];
            $result += [
                199 => 0,
                200 => 0,
                201 => 0,
                202 => 0,
                203 => 0,
                204 => 0,
                205 => 0,
            ];
        } else {
            $result += [
                198 => '',
            ];
            if($data['field35_1'] == 1){
                $result += [
                    199 => 1,
                ];
            } else {
                $result += [
                    199 => 0,
                ];
            }
            if($data['field35_2'] == 1){
                $result += [
                    200 => 1,
                ];
            } else {
                $result += [
                    200 => 0,
                ];
            }
            if($data['field35_3'] == 1){
                $result += [
                    201 => 1,
                ];
            } else {
                $result += [
                    201 => 0,
                ];
            }
            if($data['field35_4'] == 1){
                $result += [
                    202 => 1,
                ];
            } else {
                $result += [
                    202 => 0,
                ];
            }
            if($data['field35_5'] == 1){
                $result += [
                    203 => 1,
                ];
            } else {
                $result += [
                    203 => 0,
                ];
            }
            if($data['field35_6'] == 1){
                $result += [
                    204 => 1,
                ];
            } else {
                $result += [
                    204 => 0,
                ];
            }
            if($data['field35_1'] == 1 || $data['field35_1'] == 2){
                $result += [
                    205 => 0,
                ];
            } else {
                $result += [
                    205 => 1,
                ];
            }
            //эти вопросы скрыты они по нулям в любом тут  случаии
            $result += [
                128 => 0,
                129 => 0,
                130 => 0,
                131 => 0,
                132 => 0,
                133 => 0,
                134 => 0,
                135 => 0,
                136 => 0,
                137 => 0,
                138 => 0,
                139 => 0,
                140 => 0,
                141 => 0,
                142 => 0,
                143 => 0,
                144 => 0,
                145 => 0,
                146 => 0,
                147 => 0,
                148 => 0,
                149 => 0,
                150 => '',
                151 => 0,
                152 => 0,
                153 => 0,
                154 => 0,
                155 => 0,
                156 => 0,
                157 => 0,
                158 => 0,
                159 => 0,
                160 => 0,
                161 => 0,
                162 => 0,
                163 => 0,
                164 => 0,
                165 => 0,
                166 => 0,
                167 => 0,
                168 => 0,
                169 => 0,
                170 => 0,
                171 => 0,
                172 => 0,
                173 => 0,
                174 => 0,
                175 => 0,
                176 => 0,
                177 => 0,
                178 => 0,
                179 => 0,
                180 => 0,
                181 => 0,
                182 => 0,
                183 => 0,
                184 => 0,
                185 => 0,
                186 => 0,
                187 => '',
                188 => 0,
                189 => 0,
                190 => 0,
                191 => 0,
                192 => 0,
                193 => 0,
                194 => 0,
                195 => 0,
                196 => 0,
                197 => 0,
            ];
        }
        $result += [
            206 => ''
        ];
        if($data['field36_1'] == 1){
            $result += [
                207 => 1,
            ];
        } else {
            $result += [
                207 => 0,
            ];
        }
        if($data['field36_2'] == 1){
            $result += [
                208 => 1,
            ];
        } else {
            $result += [
                208 => 0,
            ];
        }
        if($data['field36_3'] == 1){
            $result += [
                209 => 1,
            ];
        } else {
            $result += [
                209 => 0,
            ];
        }
        if($data['field36_1'] == 1 || $data['field36_1'] == 2){
            $result += [
                210 => 0,
            ];
        } else {
            $result += [
                210 => 1,
            ];
        }
        $result += [
            211 => ''
        ];
        if($data['field37'] == 1){
            $result += [
                212 => 1,
                213 => 0,
                214 => 0,
                215 => 0,
                216 => 0,
            ];
        } elseif($data['field37'] == 2) {
            $result += [
                212 => 0,
                213 => 1,
                214 => 0,
                215 => 0,
                216 => 0,
            ];
        } elseif($data['field37'] == 3) {
            $result += [
                212 => 0,
                213 => 0,
                214 => 1,
                215 => 0,
                216 => 0,
            ];
        } elseif($data['field37'] == 4) {
            $result += [
                212 => 0,
                213 => 0,
                214 => 0,
                215 => 1,
                216 => 0,
            ];
        } elseif($data['field37'] == 5) {
            $result += [
                212 => 0,
                213 => 0,
                214 => 0,
                215 => 1,
                216 => 0,
            ];
        } elseif($data['field37'] == 6) {
            $result += [
                212 => 0,
                213 => 0,
                214 => 0,
                215 => 1,
                216 => 0,
            ];
        } else {
            $result += [
                212 => 0,
                213 => 0,
                214 => 0,
                215 => 0,
                216 => 1,
            ];
        }
        $result += [
            217 => ''
        ];
        if($data['field37'] == 1 || $data['field37'] == 2){
            if($data['field38_1'] == 1){
                $result += [
                    218 => 1,
                ];
            } else {
                $result += [
                    218 => 0,
                ];
            }
            if($data['field38_2'] == 1){
                $result += [
                    219 => 1,
                ];
            } else {
                $result += [
                    219 => 0,
                ];
            }
            if($data['field38_3'] == 1){
                $result += [
                    220 => 1,
                ];
            } else {
                $result += [
                    220 => 0,
                ];
            }
            if($data['field38_4'] == 1){
                $result += [
                    221 => 1,
                ];
            } else {
                $result += [
                    221 => 0,
                ];
            }
            if($data['field38_5'] == 1){
                $result += [
                    222 => 1,
                ];
            } else {
                $result += [
                    222 => 0,
                ];
            }
            if($data['field38_6'] == 1){
                $result += [
                    223 => 1,
                ];
            } else {
                $result += [
                    223 => 0,
                ];
            }
            if($data['field38_7'] == 1){
                $result += [
                    224 => 1,
                ];
            } else {
                $result += [
                    224 => 0,
                ];
            }
            if($data['field38_8'] == 1){
                $result += [
                    225 => 1,
                ];
            } else {
                $result += [
                    225 => 0,
                ];
            }
            if($data['field38_9'] == 1){
                $result += [
                    226 => 1,
                ];
            } else {
                $result += [
                    226 => 0,
                ];
            }
            if($data['field38_10'] == 1){
                $result += [
                    227 => 1,
                ];
            } else {
                $result += [
                    227 => 0,
                ];
            }
            if($data['field38_11'] == 1){
                $result += [
                    228 => 1,
                ];
            } else {
                $result += [
                    228 => 0,
                ];
            }
            if($data['field38_12'] == 1){
                $result += [
                    229 => 1,
                ];
            } else {
                $result += [
                    229 => 0,
                ];
            }
            if($data['field38_14'] == 1){
                $result += [
                    230 => 1,
                ];
            } else {
                $result += [
                    230 => 0,
                ];
            }
            if($data['field38_16'] == 1){
                $result += [
                    231 => 1,
                ];
            } else {
                $result += [
                    231 => 0,
                ];
            }
            if($data['field38_17'] == 1){
                $result += [
                    232 => 1,
                ];
            } else {
                $result += [
                    232 => 0,
                ];
            }
            if($data['field38_18'] == 1){
                $result += [
                    233 => 1,
                ];
            } else {
                $result += [
                    233 => 0,
                ];
            }
            if($data['field38_18'] == 1 || $data['field38_18'] == 2){
                $result += [
                    234 => 0,
                ];
            } else {
                $result += [
                    234 => 1,
                ];
            }
            $result += [
                235 => ''
            ];
            if($data['field39_1'] == 1){
                $result += [
                    236 => 1,
                ];
            } else {
                $result += [
                    236 => 0,
                ];
            }
            if($data['field39_2'] == 1){
                $result += [
                    237 => 1,
                ];
            } else {
                $result += [
                    237 => 0,
                ];
            }
            if($data['field39_3'] == 1){
                $result += [
                    238 => 1,
                ];
            } else {
                $result += [
                    238 => 0,
                ];
            }
            if($data['field39_4'] == 1){
                $result += [
                    239 => 1,
                ];
            } else {
                $result += [
                    239 => 0,
                ];
            }
            if($data['field39_5'] == 1){
                $result += [
                    240 => 1,
                ];
            } else {
                $result += [
                    240 => 0,
                ];
            }
            if($data['field39_6'] == 1){
                $result += [
                    241 => 1,
                ];
            } else {
                $result += [
                    241 => 0,
                ];
            }
            if($data['field39_6'] == 1 || $data['field39_6'] == 2){
                $result += [
                    242 => 0,
                ];
            } else {
                $result += [
                    242 => 1,
                ];
            }
            if($data['field40'] == 1){
                $result += [
                    243 => 1,
                    244 => 0,
                    245 => 0,
                ];
            } elseif($data['field40'] == 2) {
                $result += [
                    243 => 0,
                    244 => 1,
                    245 => 0,
                ];
            } else {
                $result += [
                    243 => 0,
                    244 => 0,
                    245 => 1,
                ];
            }
            if($data['field40_1'] == 1){
                $result += [
                    246 => 1,
                    247 => 0,
                    248 => 0,
                ];
            } elseif($data['field40_1'] == 2) {
                $result += [
                    246 => 0,
                    247 => 1,
                    248 => 0,
                ];
            } else {
                $result += [
                    246 => 0,
                    247 => 0,
                    248 => 1,
                ];
            }
        } else {
            $result += [
                218 => 0,
                219 => 0,
                220 => 0,
                221 => 0,
                222 => 0,
                223 => 0,
                224 => 0,
                225 => 0,
                226 => 0,
                227 => 0,
                228 => 0,
                229 => 0,
                230 => 0,
                231 => 0,
                232 => 0,
                233 => 0,
                234 => 0,
                235 => '',
                236 => 0,
                237 => 0,
                238 => 0,
                239 => 0,
                240 => 0,
                241 => 0,
                242 => 0,
                243 => 0,
                244 => 0,
                245 => 0,
                246 => 0,
                247 => 0,
                248 => 0,
            ];
        }
        if($data['field42'] == 1){
            $result += [
                249 => 1,
                250 => 0,
                251 => 0,
            ];
        } elseif($data['field42'] == 2) {
            $result += [
                249 => 0,
                250 => 1,
                251 => 0,
            ];
        } else {
            $result += [
                249 => 0,
                250 => 0,
                251 => 1,
            ];
        }
        $result += [
            252 => ''
        ];
        if($data['field42'] == 1){
            if($data['field43'] == 1){
                $result += [
                    253 => 1,
                    254 => 0,
                    255 => 0,
                    256 => 0,
                    257 => 0,
                ];
            } elseif($data['field43'] == 2) {
                $result += [
                    253 => 0,
                    254 => 1,
                    255 => 0,
                    256 => 0,
                    257 => 0,
                ];
            } elseif($data['field43'] == 3) {
                $result += [
                    253 => 0,
                    254 => 0,
                    255 => 1,
                    256 => 0,
                    257 => 0,
                ];
            } elseif($data['field43'] == 4) {
                $result += [
                    253 => 0,
                    254 => 0,
                    255 => 0,
                    256 => 1,
                    257 => 0,
                ];
            } else {
                $result += [
                    253 => 0,
                    254 => 0,
                    255 => 0,
                    256 => 0,
                    257 => 1,
                ];
            }
        } else {
            $result += [
                253 => 0,
                254 => 0,
                255 => 0,
                256 => 0,
                257 => 0,
            ];
        }
        $result += [
            258 => ''
        ];
        if($data['field44'] == 1){
            $result += [
                259 => 1,
                260 => 0,
                261 => 0,
                262 => 0,
                263 => 0,
                264 => 0,
            ];
        } elseif($data['field44'] == 2) {
            $result += [
                259 => 0,
                260 => 1,
                261 => 0,
                262 => 0,
                263 => 0,
                264 => 0,
            ];
        } elseif($data['field44'] == 3) {
            $result += [
                259 => 0,
                260 => 0,
                261 => 1,
                262 => 0,
                263 => 0,
                264 => 0,
            ];
        } elseif($data['field44'] == 4) {
            $result += [
                259 => 0,
                260 => 0,
                261 => 0,
                262 => 1,
                263 => 0,
                264 => 0,
            ];
        } elseif($data['field44'] == 5) {
            $result += [
                259 => 0,
                260 => 0,
                261 => 0,
                262 => 1,
                263 => 0,
                264 => 0,
            ];
        } elseif($data['field44'] == 6) {
            $result += [
                259 => 0,
                260 => 0,
                261 => 0,
                262 => 0,
                263 => 1,
                264 => 0,
            ];
        } else {
            $result += [
                259 => 0,
                260 => 0,
                261 => 0,
                262 => 0,
                263 => 0,
                264 => 1,
            ];
        }
        $result += [
            265 => ''
        ];
        if($data['field45_12'] == 1){
            $result += [
                266 => 1,
            ];
        } else {
            $result += [
                266 => 0,
            ];
        }
        if($data['field45_14'] == 1){
            $result += [
                267 => 1,
            ];
        } elseif($data['field45_14'] == 2) {
            $result += [
                267 => 1,
            ];
        }  elseif($data['field45_14'] == 3) {
            $result += [
                267 => 1,
            ];
        } else {
            $result += [
                267 => 0,
            ];
        }
        if($data['field45_15'] == 1){
            $result += [
                268 => 1,
            ];
        } elseif($data['field45_15'] == 2) {
            $result += [
                268 => 1,
            ];
        } elseif($data['field45_15'] == 3) {
            $result += [
                268 => 1,
            ];
        } else {
            $result += [
                268 => 0,
            ];
        }
        if($data['field45_16'] == 1){
            $result += [
                269 => 1,
            ];
        } elseif($data['field45_16'] == 2) {
            $result += [
                269 => 1,
            ];
        } else {
            $result += [
                269 => 0,
            ];
        }
        if($data['field45_17'] == 1){
            $result += [
                270 => 1,
            ];
        } elseif($data['field45_17'] == 2) {
            $result += [
                270 => 1,
            ];
        } else {
            $result += [
                270 => 0,
            ];
        }
        if($data['field45_18'] == 1){
            $result += [
                271 => 1,
            ];
        } elseif($data['field45_18'] == 2) {
            $result += [
                271 => 1,
            ];
        } else {
            $result += [
                271 => 0,
            ];
        }
        if($data['field45_19'] == 1){
            $result += [
                272 => 1,
            ];
        } elseif($data['field45_19'] == 2) {
            $result += [
                272 => 1,
            ];
        } elseif($data['field45_19'] == 3) {
            $result += [
                272 => 1,
            ];
        } else {
            $result += [
                272 => 0,
            ];
        }
        if($data['field45_20'] == 1){
            $result += [
                273 => 1,
            ];
        } elseif($data['field45_20'] == 2) {
            $result += [
                273 => 1,
            ];
        } else {
            $result += [
                273 => 0,
            ];
        }
        if($data['field45_21'] == 1){
            $result += [
                274 => 1,
            ];
        } elseif($data['field45_21'] == 2) {
            $result += [
                274 => 1,
            ];
        } else {
            $result += [
                274 => 0,
            ];
        }
        if($data['field45_22'] == 1){
            $result += [
                275 => 1,
            ];
        } elseif($data['field45_22'] == 2) {
            $result += [
                275 => 1,
            ];
        } else {
            $result += [
                275 => 0,
            ];
        }
        if($data['field45_22'] == 97 || $data['field45_22'] == 98) {
            $result += [
                276 => 1,
            ];
        } else {
            $result += [
                276 => 0,
            ];
        }
        if(
            $data['field45_26'] == 3 ||
            $data['field45_26'] == 4 ||
            $data['field45_26'] == 5 ||
            $data['field45_26'] == 6 ||
            $data['field45_26'] == 7 ||
            $data['field45_26'] == 8 ||
            $data['field45_26'] == 9 ||
            $data['field45_26'] == 10
        ){
            $result += [
                277 => 1,
                278 => 0,
            ];
        } elseif($data['field45_26'] == 97 || $data['field45_26'] == 98) {
            $result += [
                277 => 0,
                278 => 1,
            ];
        } else {
            $result += [
                277 => 0,
                278 => 0,
            ];
        }
        if($data['field45_27'] == 1){
            $result += [
                279 => 1,
                280 => 0,
            ];
        } elseif($data['field45_27'] == 2) {
            $result += [
                279 => 0,
                280 => 0,
            ];
        } else {
            $result += [
                279 => 0,
                280 => 1,
            ];
        }
        $result += [
            281 => ''
        ];
        if($data['field46_1'] == 1){
            $result += [
                282 => 1,
            ];
        } else {
            $result += [
                282 => 0,
            ];
        }
        if($data['field46_2'] == 1){
            $result += [
                283 => 1,
            ];
        } else {
            $result += [
                283 => 0,
            ];
        }
        if($data['field46_3'] == 1){
            $result += [
                284 => 1,
            ];
        } else {
            $result += [
                284 => 0,
            ];
        }
        if($data['field46_4'] == 1){
            $result += [
                285 => 1,
            ];
        } else {
            $result += [
                285 => 0,
            ];
        }
        if($data['field46_5'] == 1){
            $result += [
                286 => 1,
            ];
        } else {
            $result += [
                286 => 0,
            ];
        }
        if($data['field46_6'] == 1){
            $result += [
                287 => 1,
            ];
        } else {
            $result += [
                287 => 0,
            ];
        }
        if($data['field46_8'] == 1){
            $result += [
                288 => 1,
            ];
        } else {
            $result += [
                288 => 0,
            ];
        }
        if($data['field46_9'] == 1){
            $result += [
                289 => 1,
            ];
        } else {
            $result += [
                289 => 0,
            ];
        }
        if($data['field46_10'] == 1){
            $result += [
                290 => 1,
            ];
        } else {
            $result += [
                290 => 0,
            ];
        }
        if($data['field46_11'] == 1){
            $result += [
                291 => 1,
            ];
        } else {
            $result += [
                291 => 0,
            ];
        }
        if($data['field46_12'] == 97 || $data['field46_12'] == 98) {
            $result += [
                292 => 1,
            ];
        } else {
            $result += [
                292 => 1,
            ];
        }
        $result += [
            293 => ''
        ];
        if($data['field47'] == 1){
            $result += [
                294 => 1,
                295 => 0,
                296 => 0,
                297 => 0,
            ];
        } elseif($data['field47'] == 2) {
            $result += [
                294 => 0,
                295 => 1,
                296 => 0,
                297 => 0,
            ];
        } elseif($data['field47'] == 3) {
            $result += [
                294 => 0,
                295 => 0,
                296 => 1,
                297 => 0,
            ];
        } else {
            $result += [
                294 => 0,
                295 => 0,
                296 => 0,
                297 => 1,
            ];
        }
        if($data['field48'] == 'есть'){
            $result += [
                298 => 1,
            ];
        } else {
            $result += [
                298 => 0,
            ];
        }
        return $result;
    }
}
