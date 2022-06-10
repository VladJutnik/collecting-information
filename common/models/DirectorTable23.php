<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_23".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field22 Количество посадочных мест в столовой
 * @property int $field23_1 В I смену 1-4 кл.
 * @property int $field23_2 В I смену 5-9 кл.
 * @property int $field23_3 В I смену 10-11 кл.
 * @property int $field23_4 Итого
 * @property int $field23_5 в т.ч. перед первым уроком 1-4 кл.
 * @property int $field23_6 в т.ч. перед первым уроком 5-9 кл.
 * @property int $field23_7 в т.ч. перед первым уроком 10-11 кл.
 * @property int $field23_8 Итого
 * @property int $field23_9 после первого урока 1-4 кл.
 * @property int $field23_10 после первого урока 5-9 кл.
 * @property int $field23_11 после первого урока 10-11 кл.
 * @property int $field23_12 Итого
 * @property int $field23_13 после второго урока 1-4 кл.
 * @property int $field23_14 после второго урока 5-9 кл.
 * @property int $field23_15 после второго урока 10-11 кл.
 * @property int $field23_16 Итого
 * @property int $field23_17 после третьего урока 1-4 кл.
 * @property int $field23_18 после третьего урока 5-9 кл.
 * @property int $field23_19 после третьего урока 10-11 кл.
 * @property int $field23_20 Итого
 * @property int $field23_21 после четвертого урока 1-4 кл.
 * @property int $field23_22 после четвертого урока 5-9 кл.
 * @property int $field23_23 после четвертого урока 10-11 кл.
 * @property int $field23_24 Итого
 * @property int $field23_25 после пятого урока 1-4 кл.
 * @property int $field23_26 после пятого урока 5-9 кл.
 * @property int $field23_27 после пятого урока 10-11 кл.
 * @property int $field23_28 Итого
 * @property int $field23_29 после шестого урока 1-4 кл.
 * @property int $field23_30 после шестого урока 5-9 кл.
 * @property int $field23_31 после шестого урока 10-11 кл.
 * @property int $field23_32 Итого
 * @property int $field23_33 после седьмого урока 1-4 кл.
 * @property int $field23_34 после седьмого урока 5-9 кл.
 * @property int $field23_35 после седьмого урока 10-11 кл.
 * @property int $field23_36 Итого
 * @property int $field23_37 Во II смену 1-4 кл.
 * @property int $field23_38 Во II смену 5-9 кл.
 * @property int $field23_39 Во II смену 10-11 кл.
 * @property int $field23_40 Итого
 * @property int $field23_41 в т.ч. перед первым уроком 1-4 кл.
 * @property int $field23_42 в т.ч. перед первым уроком 5-9 кл.
 * @property int $field23_43 в т.ч. перед первым уроком 10-11 кл.
 * @property int $field23_44 Итого
 * @property int $field23_45 после первого урока 1-4 кл.
 * @property int $field23_46 после первого урока 5-9 кл.
 * @property int $field23_47 после первого урока 10-11 кл.
 * @property int $field23_48 Итого
 * @property int $field23_49 после второго урока 1-4 кл.
 * @property int $field23_50 после второго урока 5-9 кл.
 * @property int $field23_51 после второго урока 10-11 кл.
 * @property int $field23_52 Итого
 * @property int $field23_53 после третьего урока 1-4 кл.
 * @property int $field23_54 после третьего урока 5-9 кл.
 * @property int $field23_55 после третьего урока 10-11 кл.
 * @property int $field23_56 Итого
 * @property int $field23_57 после четвертого урока 1-4 кл.
 * @property int $field23_58 после четвертого урока 5-9 кл.
 * @property int $field23_59 после четвертого урока 10-11 кл.
 * @property int $field23_60 Итого
 * @property int $field23_61 после пятого урока 1-4 кл.
 * @property int $field23_62 после пятого урока 5-9 кл.
 * @property int $field23_63 после пятого урока 10-11 кл.
 * @property int $field23_64 Итого
 * @property int $field23_65 В III смену 1-4 кл.
 * @property int $field23_66 В III смену 5-9 кл.
 * @property int $field23_67 В III смену 10-11 кл.
 * @property int $field23_68 Итого
 * @property int $field23_69 в т.ч. перед первым уроком 1-4 кл.
 * @property int $field23_70 в т.ч. перед первым уроком 5-9 кл.
 * @property int $field23_71 в т.ч. перед первым уроком 10-11 кл.
 * @property int $field23_72 Итого
 * @property int $field23_73 после первого урока 1-4 кл.
 * @property int $field23_74 после первого урока 5-9 кл.
 * @property int $field23_75 после первого урока 10-11 кл.
 * @property int $field23_76 Итого
 * @property int $field23_77 после второго урока 1-4 кл.
 * @property int $field23_78 после второго урока 5-9 кл.
 * @property int $field23_79 после второго урока 10-11 кл.
 * @property int $field23_80 Итого
 * @property int $field23_81 после третьего урока 1-4 кл.
 * @property int $field23_82 после третьего урока 5-9 кл.
 * @property int $field23_83 после третьего урока 10-11 кл.
 * @property int $field23_84 Итого
 * @property int $field23_85 после четвертого урока 1-4 кл.
 * @property int $field23_86 после четвертого урока 5-9 кл.
 * @property int $field23_87 после четвертого урока 10-11 кл.
 * @property int $field23_88 Итого
 * @property int $field23_89 ИТОГО 1-4 кл.
 * @property int $field23_90 ИТОГО 5-9 кл.
 * @property int $field23_91 ИТОГО 10-11 кл.
 * @property int $field23_92 ИТОГО Итого
 * @property string $create_at
 */
class DirectorTable23 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_23';
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
                    'field22',
                    'field23_1',
                    'field23_2',
                    'field23_3',
                    'field23_4',
                    'field23_5',
                    'field23_6',
                    'field23_7',
                    'field23_8',
                    'field23_9',
                    'field23_10',
                    'field23_11',
                    'field23_12',
                    'field23_13',
                    'field23_14',
                    'field23_15',
                    'field23_16',
                    'field23_17',
                    'field23_18',
                    'field23_19',
                    'field23_20',
                    'field23_21',
                    'field23_22',
                    'field23_23',
                    'field23_24',
                    'field23_25',
                    'field23_26',
                    'field23_27',
                    'field23_28',
                    'field23_29',
                    'field23_30',
                    'field23_31',
                    'field23_32',
                    'field23_33',
                    'field23_34',
                    'field23_35',
                    'field23_36',
                    'field23_37',
                    'field23_38',
                    'field23_39',
                    'field23_40',
                    'field23_41',
                    'field23_42',
                    'field23_43',
                    'field23_44',
                    'field23_45',
                    'field23_46',
                    'field23_47',
                    'field23_48',
                    'field23_49',
                    'field23_50',
                    'field23_51',
                    'field23_52',
                    'field23_53',
                    'field23_54',
                    'field23_55',
                    'field23_56',
                    'field23_57',
                    'field23_58',
                    'field23_59',
                    'field23_60',
                    'field23_61',
                    'field23_62',
                    'field23_63',
                    'field23_64',
                    'field23_65',
                    'field23_66',
                    'field23_67',
                    'field23_68',
                    'field23_69',
                    'field23_70',
                    'field23_71',
                    'field23_72',
                    'field23_73',
                    'field23_74',
                    'field23_75',
                    'field23_76',
                    'field23_77',
                    'field23_78',
                    'field23_79',
                    'field23_80',
                    'field23_81',
                    'field23_82',
                    'field23_83',
                    'field23_84',
                    'field23_85',
                    'field23_86',
                    'field23_87',
                    'field23_88',
                    'field23_89',
                    'field23_90',
                    'field23_91',
                    'field23_92'
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field22',
                    'field23_1',
                    'field23_2',
                    'field23_3',
                    'field23_4',
                    'field23_5',
                    'field23_6',
                    'field23_7',
                    'field23_8',
                    'field23_9',
                    'field23_10',
                    'field23_11',
                    'field23_12',
                    'field23_13',
                    'field23_14',
                    'field23_15',
                    'field23_16',
                    'field23_17',
                    'field23_18',
                    'field23_19',
                    'field23_20',
                    'field23_21',
                    'field23_22',
                    'field23_23',
                    'field23_24',
                    'field23_25',
                    'field23_26',
                    'field23_27',
                    'field23_28',
                    'field23_29',
                    'field23_30',
                    'field23_31',
                    'field23_32',
                    'field23_33',
                    'field23_34',
                    'field23_35',
                    'field23_36',
                    'field23_37',
                    'field23_38',
                    'field23_39',
                    'field23_40',
                    'field23_41',
                    'field23_42',
                    'field23_43',
                    'field23_44',
                    'field23_45',
                    'field23_46',
                    'field23_47',
                    'field23_48',
                    'field23_49',
                    'field23_50',
                    'field23_51',
                    'field23_52',
                    'field23_53',
                    'field23_54',
                    'field23_55',
                    'field23_56',
                    'field23_57',
                    'field23_58',
                    'field23_59',
                    'field23_60',
                    'field23_61',
                    'field23_62',
                    'field23_63',
                    'field23_64',
                    'field23_65',
                    'field23_66',
                    'field23_67',
                    'field23_68',
                    'field23_69',
                    'field23_70',
                    'field23_71',
                    'field23_72',
                    'field23_73',
                    'field23_74',
                    'field23_75',
                    'field23_76',
                    'field23_77',
                    'field23_78',
                    'field23_79',
                    'field23_80',
                    'field23_81',
                    'field23_82',
                    'field23_83',
                    'field23_84',
                    'field23_85',
                    'field23_86',
                    'field23_87',
                    'field23_88',
                    'field23_89',
                    'field23_90',
                    'field23_91',
                    'field23_92'
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],

            [
                [
                    'field23_4',
                    'field23_8',
                    'field23_12',
                    'field23_16',
                    'field23_20',
                    'field23_24',
                    'field23_28',
                    'field23_32',
                    'field23_36',
                    'field23_40',
                    'field23_44',
                    'field23_48',
                    'field23_52',
                    'field23_56',
                    'field23_60',
                    'field23_64',
                    'field23_68',
                    'field23_72',
                    'field23_76',
                    'field23_80',
                    'field23_84',
                    'field23_88',
                    'field23_92',
                ],
                'validateSum','message'=>'Проверьте правильность суммы'
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
            'field22' => '22. Количество посадочных мест в столовой: ',
            'field23_1' => 'Field23 1',
            'field23_2' => 'Field23 2',
            'field23_3' => 'Field23 3',
            'field23_4' => 'Field23 4',
            'field23_5' => 'Field23 5',
            'field23_6' => 'Field23 6',
            'field23_7' => 'Field23 7',
            'field23_8' => 'Field23 8',
            'field23_9' => 'Field23 9',
            'field23_10' => 'Field23 10',
            'field23_11' => 'Field23 11',
            'field23_12' => 'Field23 12',
            'field23_13' => 'Field23 13',
            'field23_14' => 'Field23 14',
            'field23_15' => 'Field23 15',
            'field23_16' => 'Field23 16',
            'field23_17' => 'Field23 17',
            'field23_18' => 'Field23 18',
            'field23_19' => 'Field23 19',
            'field23_20' => 'Field23 20',
            'field23_21' => 'Field23 21',
            'field23_22' => 'Field23 22',
            'field23_23' => 'Field23 23',
            'field23_24' => 'Field23 24',
            'field23_25' => 'Field23 25',
            'field23_26' => 'Field23 26',
            'field23_27' => 'Field23 27',
            'field23_28' => 'Field23 28',
            'field23_29' => 'Field23 29',
            'field23_30' => 'Field23 30',
            'field23_31' => 'Field23 31',
            'field23_32' => 'Field23 32',
            'field23_33' => 'Field23 33',
            'field23_34' => 'Field23 34',
            'field23_35' => 'Field23 35',
            'field23_36' => 'Field23 36',
            'field23_37' => 'Field23 37',
            'field23_38' => 'Field23 38',
            'field23_39' => 'Field23 39',
            'field23_40' => 'Field23 40',
            'field23_41' => 'Field23 41',
            'field23_42' => 'Field23 42',
            'field23_43' => 'Field23 43',
            'field23_44' => 'Field23 44',
            'field23_45' => 'Field23 45',
            'field23_46' => 'Field23 46',
            'field23_47' => 'Field23 47',
            'field23_48' => 'Field23 48',
            'field23_49' => 'Field23 49',
            'field23_50' => 'Field23 50',
            'field23_51' => 'Field23 51',
            'field23_52' => 'Field23 52',
            'field23_53' => 'Field23 53',
            'field23_54' => 'Field23 54',
            'field23_55' => 'Field23 55',
            'field23_56' => 'Field23 56',
            'field23_57' => 'Field23 57',
            'field23_58' => 'Field23 58',
            'field23_59' => 'Field23 59',
            'field23_60' => 'Field23 60',
            'field23_61' => 'Field23 61',
            'field23_62' => 'Field23 62',
            'field23_63' => 'Field23 63',
            'field23_64' => 'Field23 64',
            'field23_65' => 'Field23 65',
            'field23_66' => 'Field23 66',
            'field23_67' => 'Field23 67',
            'field23_68' => 'Field23 68',
            'field23_69' => 'Field23 69',
            'field23_70' => 'Field23 70',
            'field23_71' => 'Field23 71',
            'field23_72' => 'Field23 72',
            'field23_73' => 'Field23 73',
            'field23_74' => 'Field23 74',
            'field23_75' => 'Field23 75',
            'field23_76' => 'Field23 76',
            'field23_77' => 'Field23 77',
            'field23_78' => 'Field23 78',
            'field23_79' => 'Field23 79',
            'field23_80' => 'Field23 80',
            'field23_81' => 'Field23 81',
            'field23_82' => 'Field23 82',
            'field23_83' => 'Field23 83',
            'field23_84' => 'Field23 84',
            'field23_85' => 'Field23 85',
            'field23_86' => 'Field23 86',
            'field23_87' => 'Field23 87',
            'field23_88' => 'Field23 88',
            'field23_89' => 'Field23 89',
            'field23_90' => 'Field23 90',
            'field23_91' => 'Field23 91',
            'field23_92' => 'Field23 92',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field23_4' => ['==', 'field23_1', 'field23_2', 'field23_3'],
            'field23_8' => ['==', 'field23_5', 'field23_6', 'field23_7'],
            'field23_12' => ['==', 'field23_9', 'field23_10', 'field23_11'],
            'field23_16' => ['==', 'field23_13', 'field23_14', 'field23_15'],
            'field23_20' => ['==', 'field23_23', 'field23_18', 'field23_19'],
            'field23_24' => ['==', 'field23_21', 'field23_22', 'field23_23'],
            'field23_28' => ['==', 'field23_25', 'field23_26', 'field23_27'],
            'field23_32' => ['==', 'field23_29', 'field23_30', 'field23_31'],
            'field23_36' => ['==', 'field23_33', 'field23_34', 'field23_35'],
            'field23_40' => ['==', 'field23_37', 'field23_38', 'field23_39'],
            'field23_44' => ['==', 'field23_41', 'field23_42', 'field23_43'],
            'field23_48' => ['==', 'field23_45', 'field23_46', 'field23_47'],
            'field23_52' => ['==', 'field23_49', 'field23_50', 'field23_51'],
            'field23_56' => ['==', 'field23_53', 'field23_54', 'field23_55'],
            'field23_60' => ['==', 'field23_57', 'field23_58', 'field23_59'],
            'field23_64' => ['==', 'field23_61', 'field23_62', 'field23_63'],
            'field23_68' => ['==', 'field23_65', 'field23_66', 'field23_67'],
            'field23_72' => ['==', 'field23_69', 'field23_70', 'field23_71'],
            'field23_76' => ['==', 'field23_73', 'field23_74', 'field23_75'],
            'field23_80' => ['==', 'field23_77', 'field23_78', 'field23_79'],
            'field23_84' => ['==', 'field23_81', 'field23_82', 'field23_83'],
            'field23_88' => ['==', 'field23_85', 'field23_86', 'field23_87'],
            'field23_92' => ['==', 'field23_89', 'field23_90', 'field23_91'],
        ];
        //print_r(count($rules_array_sum[$attribute])); exit();
        $sum = 0;
        for ($i = 0, $count_info = count($rules_array_sum[$attribute]) - 1; $count_info > 0; $count_info--, $i++) {
            $sum = $sum + $this[$rules_array_sum[$attribute][$i + 1]];
        }
        switch ($rules_array_sum[$attribute][0]) {
            case '==':
                if ((int)$this->$attribute !== (int)$sum) {
                    $this->addError(
                        $attribute,
                        'У Вас ошибка по '.$rules_array_sum[$attribute][0].' выделенных строк;'
                    );
                    for (
                        $j = 0, $count_info = count(
                            $rules_array_sum[$attribute]
                        ) - 1; $count_info > 0; $count_info--, $j++
                    ) {
                        $this->addError(
                            $rules_array_sum[$attribute][$j + 1],
                            'Ошибка, проверьте правильность внесения: '.$this->getAttributeLabel(
                                $rules_array_sum[$attribute][$j + 1]
                            ).';'
                        );
                    }
                }
                break;
            case '<=':
                if ((int)$this->$attribute > (int)$sum) {
                    $this->addError(
                        $attribute,
                        'У Вас ошибка по '.$rules_array_sum[$attribute][0].' выделенных строк;'
                    );
                    for (
                        $j = 0, $count_info = count(
                            $rules_array_sum[$attribute]
                        ) - 1; $count_info > 0; $count_info--, $j++
                    ) {
                        $this->addError(
                            $rules_array_sum[$attribute][$j + 1],
                            'Ошибка, проверьте правильность внесения: '.$this->getAttributeLabel(
                                $rules_array_sum[$attribute][$j + 1]
                            ).';'
                        );
                    }
                }
                break;
            case '<':
                if ((int)$this->$attribute >= (int)$sum) {
                    $this->addError(
                        $attribute,
                        'У Вас ошибка по '.$rules_array_sum[$attribute][0].' выделенных строк;'
                    );
                    for (
                        $j = 0, $count_info = count(
                            $rules_array_sum[$attribute]
                        ) - 1; $count_info > 0; $count_info--, $j++
                    ) {
                        $this->addError(
                            $rules_array_sum[$attribute][$j + 1],
                            'Ошибка, проверьте правильность внесения: '.$this->getAttributeLabel(
                                $rules_array_sum[$attribute][$j + 1]
                            ).';'
                        );
                    }
                }
                break;
            case '>':
                if ((int)$this->$attribute <= (int)$sum) {
                    $this->addError(
                        $attribute,
                        'У Вас ошибка по '.$rules_array_sum[$attribute][0].' выделенных строк;'
                    );
                    for (
                        $j = 0, $count_info = count(
                            $rules_array_sum[$attribute]
                        ) - 1; $count_info > 0; $count_info--, $j++
                    ) {
                        $this->addError(
                            $rules_array_sum[$attribute][$j + 1],
                            'Ошибка, проверьте правильность внесения: '.$this->getAttributeLabel(
                                $rules_array_sum[$attribute][$j + 1]
                            ).';'
                        );
                    }
                }
                break;
            case '>=':
                if ((int)$this->$attribute < (int)$sum) {
                    $this->addError(
                        $attribute,
                        'У Вас ошибка по '.$rules_array_sum[$attribute][0].' выделенных строк;'
                    );
                    for (
                        $j = 0, $count_info = count(
                            $rules_array_sum[$attribute]
                        ) - 1; $count_info > 0; $count_info--, $j++
                    ) {
                        $this->addError(
                            $rules_array_sum[$attribute][$j + 1],
                            'Ошибка, проверьте правильность внесения: '.$this->getAttributeLabel(
                                $rules_array_sum[$attribute][$j + 1]
                            ).';'
                        );
                    }
                }
                break;
        }
    }
}
