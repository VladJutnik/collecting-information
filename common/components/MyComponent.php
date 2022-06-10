<?php

namespace common\components;

use common\models\FederalDistrict;
use common\models\Municipality;
use common\models\Organization;
use common\models\Region;
use common\models\User;
use yii\base\Component;
use yii\helpers\ArrayHelper;


class MyComponent extends Component
{
    public function statusView($id = false)
    {
        $item = ['показать', 'скрыть'];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusYesNo($id = false)
    {
        $item = [
            '' => '',
            0 => 'нет',
            1 => 'да',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusYesNo2($id = false)
    {
        $item = [
            '' => '',
            1 => 'да',
            2 => 'нет',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusYesNoText($id = false)
    {
        $item = [
            '' => '',
            'да' => 'да',
            'нет' => 'нет',
        ];
        if ($id != false) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function cityVillage($id = false)
    {
        $item = [
            'городское' => 'городское',
            'сельское' => 'сельское'
        ];
        if ($id != false) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function typeSchool($id = false)
    {
        $item = [
            'средняя' => 'средняя',
            'основная' => 'основная',
            'начальная' => 'начальная',
            'малокомплектная' => 'малокомплектная',
        ];
        if ($id != false) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function typeSchoolReport($id = false)
    {
        $item = [
            0 => 'обычная',
            1 => 'малокомплектная',
        ];
        return $item[$id];
    }

    public function cityVillageReport($id = false)
    {
        $item = [
            0 => 'сельская',
            1 => 'городская',
        ];
        return $item[$id];
    }

    public function statusYesNoZ($id = false)
    {
        $item = [
            '' => '',
            0 => 'нет',
            1 => 'да',
            97 => 'затрудняюсь с ответом',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusYesNoZ2($id = false)
    {
        $item = [
            '' => '',
            1 => 'да',
            2 => 'нет',
            97 => 'затрудняюсь с ответом',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusYesNoZText($id = false)
    {
        $item = [
            '' => '',
            'да' => 'да',
            'нет' => 'нет',
            '97' => 'затрудняюсь с ответом',
            '98' => 'отказ от ответа',
        ];
        if ($id != false) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusYesNoDiseases($id = false)
    {
        $item = [
            '' => '',
            'не болел' => 'не болел',
            '1-3 раза' => '1-3 раза',
            '4 раза и более' => '4 раза и более',
            '97' => 'затрудняюсь с ответом',
            '98' => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusHaveNo($id = false)
    {
        $item = ['нет', 'есть'];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusAgeGroup($id = false)
    {
        $item = [
            '9-10 лет' => '9-10 лет',
            '13-14 лет' => '13-14 лет',
            '15-17 лет' => '15-17 лет',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusInHoursSchool($id = false)
    {
        $item = [
            '' => '',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => '10',
            11 => '11',
            12 => '12',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusInHours($id = false)
    {
        $item = [
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusAge($id = false)
    {
        $item = [
            7 => '7',
            8 => '8',
            9 => '9',
            10 => '10',
            11 => '11',
            12 => '12',
            13 => '13',
            14 => '14',
            15 => '15',
            16 => '16',
            17 => '17',
            18 => '18',
            19 => '19',
            20 => '20',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function school($id = false)
    {
        $item = [
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13',
            '14' => '14',
            '15' => '15',
            '16' => '16',
            '17' => '17',
            '18' => '18',
            '19' => '19',
            '20' => '20',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function timeSchool($id = false)
    {
        $item = [
            '' => '',
            3 => '3 часа',
            4 => '4 часа',
            5 => '5 часов',
            6 => '6 часов',
            7 => '7 часов',
            8 => '8 часов',
            9 => '9 часов',
            10 => '10 часов',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusSex($id = false)
    {
        $item = [
            1 => 'мальчик',
            2 => 'девочка',
        ];

        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusFamily($id = false)
    {
        $items = [
            '' => '',
            1 => 'полная (два родителя)',
            2 => 'неполная (один родитель или воспитывает опекун)',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function completelyEatsUp($id = false)
    {
        $items = [
            '' => '',
            1 => 'да',
            2 => 'не всегда',
            3 => 'нет',
            4 => 'данный прием пищи отсутствует',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];

        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function issuedPortion($id = false)
    {
        $items = [
            '' => '',
            1 => 'да',
            2 => 'не всегда',
            3 => 'нет',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];

        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function buyingFood($id = false)
    {
        $items = [
            '' => '',
            1 => 'регулярно',
            2 => 'иногда',
            3 => 'не покупает',
            4 => 'буфета в школе нет',
            5 => 'вендингового аппарата нет',
            6 => 'буфета в школе и вендингового аппарата нет ',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];

        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function mineralComplexes($id = false)
    {
        $items = [
            '' => '',
            1 => 'постоянно',
            2 => '2-3 раза в полгода курсами',
            3 => '1-2 раза в год курсами',
            4 => 'принимает не регулярно',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function levelPhysical($id = false)
    {
        $items = [
            '' => '',
            1 => 'посещает спортивные секции с занятиями высокой интенсивности 3 и более раза в неделю',
            2 => 'посещает спортивные секции 2 раза в неделю, ежедневная физическая активность не менее 60 минут',
            3 => 'ежедневно не менее 60 минут в день (подвижные игры и др.)',
            4 => 'менее 60 минут в день ежедневно',
            5 => 'менее 60 минут 2-3 раза в неделю',
            6 => 'спортом не занимается',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];

        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function field45($id = false)
    {
        $items = [
            '' => '',
            1 => 'каждый день',
            2 => '3-4 раза в неделю',
            3 => '1 раз в неделю',
            4 => '2-3 раза в месяц',
            5 => '1 раз в месяц',
            6 => 'не употребляет',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function field41($id = false)
    {
        $items = [
            '' => '',
            1 => 'да, ежедневно',
            2 => 'редко',
            3 => 'не пьет',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function field45_2($id = false)
    {
        $items = [
            0 => '0',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => '10',
        ];

        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function nutritionAssessment($id = false)
    {
        $items = [
            '' => '',
            1 => 'хорошо',
            2 => 'удовлетворительно',
            3 => 'плохо',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];

        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function disaise($id = false)
    {
        $item = [
            '' => '',
            1 => 'не болел',
            2 => '1-3 раза',
            3 => '4 и более раз',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function healthyEating($id = false)
    {
        $items = [
            '' => '',
            1 => 'от врача или других медицинских работников',
            2 => 'телевидение',
            3 => 'интернет-сайты',
            4 => 'научные печатные издания',
            5 => 'журналы, газеты и др. печатные издания',
            6 => 'родственники, знакомые',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function takes_food($id = false)
    {
        $items = [
            '' => '',
            1 => 'один',
            2 => 'два',
            3 => 'три',
            4 => 'четыре',
            5 => 'пять',
            6 => 'шесть',
            7 => 'семь',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function always($id = false)
    {
        $items = [
            '' => '',
            1 => 'всегда',
            2 => 'не всегда',
            3 => 'не завтракает',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function always2($id = false)
    {
        $items = [
            '' => '',
            1 => 'всегда',
            2 => 'не всегда',
            3 => 'не питается',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function watch($id = false)
    {
        $items = [
            '' => '',
            1 => 'менее 2-х часов',
            2 => 'составляет 2-3 часа',
            3 => 'составляет 3-4 часа',
            4 => 'составляет 4-6 часов',
            5 => 'более 6 часов',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];


        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function dinner($id = false)
    {
        $items = [
            '' => '',
            1 => 'обед из трех блюд',
            2 => 'только первые блюда (суп)',
            3 => 'только вторые блюда',
            4 => 'только салат',
            5 => 'первое блюдо +салат',
            6 => 'первое блюдо + салат + напиток',
            7 => 'второе блюдо + салат',
            8 => 'второе блюдо + салат + напиток',
            9 => 'первое блюдо + второе блюдо',
            10 => 'другое блюдо',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];

        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function statusEducation($id = false)
    {
        $items = [
            '' => '',
            1 => 'среднее',
            2 => 'среднее профессиональное',
            3 => 'высшее',
            4 => 'имеется ученая степень',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function statuSincome($id = false)
    {
        $item = [
            '' => '',
            1 => 'низкий уровень ',
            2 => 'ниже среднего',
            3 => 'средний',
            4 => 'выше среднего',
            5 => 'высокий',
            97 => 'затрудняюсь ответить',
            98 => 'отказ от ответа',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusChange($id = false)
    {
        $item = [
            '' => '',
            1 => 'первая',
            2 => 'вторая',
            3 => 'третья',
        ];

        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function statusClass($id = false)
    {
        $items = [
            1 => '1 класс',
            2 => '2 класс',
            3 => '3 класс',
            4 => '4 класс',
            5 => '5 класс',
            6 => '6 класс',
            7 => '7 класс',
            8 => '8 класс',
            9 => '9 класс',
            10 => '10 класс',
            11 => '11 класс',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $items[$id];
        } else {
            //echo 'нет id';
            return $items;
        }
    }

    public function userName($id)
    {
        $model = User::findOne($id);
        return $model->name;
    }

    public function monthsLearning($id = false)
    {
        $item = [
            '9' => 'Сентябрь',
            '10' => 'Октябрь',
            '11' => 'Ноябрь',
            '12' => 'Декабрь',
            '1' => 'Январь',
            '2' => 'Февраль',
            '3' => 'Март',
            '4' => 'Апрель',
            '5' => 'Май',
            '6' => 'Июнь',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function monthsLearningShort($id = false)
    {
        $item = [
            '9' => 'Сентябрь',
            '1' => 'Январь',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function yearStudy($id = false)
    {
        $item = [
            '2021-2022' => '2021-2022',
        ];
        if (!is_bool($id)) {
            // echo 'есть id='. $id;
            return $item[$id];
        } else {
            //echo 'нет id';
            return $item;
        }
    }

    public function numericCustom($id)
    {
        if (is_numeric($id)) {
            return $id;
        } else {
            return 0;
        }
    }

    public function dateStr($id)
    {
        $old_date = strtotime($id);

        return date('d.m.Y', $old_date);
    }

    public function dateStrBack($id)
    {
        $old_date = strtotime($id);

        return date('Y-m-d', $old_date);
    }

    public function randomFileName($path, $extension)
    {
        do {
            $name = mt_rand(0, 22229);
            $file = $path.$name.'.'.$extension;
        } while (file_exists($file));

        return $name.'.'.$extension;
    }

    public function twoColumnNameSm($action)
    {
        switch ($action) {
            case 'first':
                return $result = [
                    'options' => ['class' => 'row mt-0 mb-0 ml-0 mr-0 input-group-sm main-color-10'],
                    'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-8 col-xl-8'],
                ];
                break;
            case 'two':
                return $result = [
                    'options' => ['class' => 'row mt-0 mb-0 ml-0 mr-0 input-group-sm main-color-11'],
                    'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-8 col-xl-8'],
                ];
                break;
            case 'three':
                return $result = [
                    'options' => ['class' => 'row mt-0 mb-0 ml-0 mr-0 input-group-sm main-color-12'],
                    'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-8 col-xl-8'],
                ];
                break;
            case 'four':
                return $result = [
                    'options' => ['class' => 'row mt-0 mb-0 ml-0 mr-0 input-group-sm main-color-14'],
                    'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-8 col-xl-8'],
                ];
                break;
            case '':
                return $result = [
                    'options' => ['class' => 'row mt-0 mb-0 ml-0 mr-0 input-group-sm '],
                    'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-8 col-xl-8'],
                ];
                break;
            default:
                return 1;
        }
    }

    public function twoColumnInputSm($params = false)
    {
        $result = ['class' => 'form-control col-sm-12 col-md-12 col-lg-4 col-xl-4'];
        if ($params != false) {
            $result += $params;
        }

        return $result;
    }

//    public function twoColumnName($params_options = false)
//    {
//        $result = [
//            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
//            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6 col-form-label']
//        ];
//        if ($params_options != false) {
//            $result['options']['class'] .= $params_options;
//        }
//        return $result;
//    }

    public function twoColumnName()
    {
        return $result = [
            'options' => ['class' => 'row mt-2 mb-0 ml-0 mr-0'],
            'labelOptions' => ['class' => 'col-sm-12 col-md-12 col-lg-6 col-xl-6'],
        ];
    }

    public function twoColumnInput($params = false)
    {
        $result = ['class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6'];
        if ($params != false) {
            $result += $params;
        }

        return $result;
    }

    public function twoColumnInputDate()
    {
        return ['type' => 'date', 'class' => 'form-control col-sm-12 col-md-12 col-lg-6 col-xl-6'];
    }

    public function get_federal_name($id)
    {
        return FederalDistrict::findOne($id)->name;
    }

    public function get_region_name($id)
    {
        return Region::findOne($id)->name;
    }

    public function get_municipality_name($id)
    {
        return Municipality::findOne($id)->name;
    }

    public function get_orgainization_name($id)
    {
        return Organization::findOne($id)->title;
    }

    public function get_orgainization($id)
    {
        /*SELECT
           user.name AS 'Имя пользователя',
           organization.`title` AS 'title'
       FROM user JOIN organization ON user.organization_id = organization.id*/
        $organization_title = User::find()->
        select([
            'organization.title as title',
        ])->
        leftJoin('organization', 'user.organization_id = organization.id')->
        where(['user.id' => $id])
            ->asArray()
            ->one();

        return $organization_title['title'];
    }

    public function FederalDistrictItems()
    {
        return ArrayHelper::map(FederalDistrict::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
    }

    public function RegionItems($federal_id = false)
    {
        if ($federal_id != false) {
            $where = ['district_id' => $federal_id];
        } else {
            $where = ['district_id' => 1];
        }

        return ArrayHelper::map(Region::find()->where($where)->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
    }

    public function MunicipalityItems($region_id = false)
    {
        if ($region_id != false) {
            $where = ['region_id' => $region_id];
        } else {
            $where = ['region_id' => 1];
        }

        return ArrayHelper::map(
            Municipality::find()->where($where)->orderBy(['name' => SORT_ASC])->all(),
            'id',
            'name'
        );
    }
}