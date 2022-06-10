<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_17".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field17_1 ОВЗ 1-4 кл.
 * @property int $field17_2 ОВЗ 5-9 кл.
 * @property int $field17_3 ОВЗ 10-11 кл.
 * @property int $field17_4 Итого
 * @property int $field17_5 Из них, находится на домашнем обучении 1-4 кл.
 * @property int $field17_6 Из них, находится на домашнем обучении 5-9 кл.
 * @property int $field17_7 Из них, находится на домашнем обучении 10-11 кл.
 * @property int $field17_8 Итого
 * @property int $field17_9 Обучается очно 1-4 кл.
 * @property int $field17_10 Обучается очно 5-9 кл.
 * @property int $field17_11 Обучается очно 10-11 кл.
 * @property int $field17_12 Итого
 * @property int $field17_13 Питается в школе организованно 1-4 кл.
 * @property int $field17_14 Питается в школе организованно 5-9 кл.
 * @property int $field17_15 Питается в школе организованно 10-11 кл.
 * @property int $field17_16 Итого
 * @property int $field17_17 Питается в школе принесённой из дома едой 1-4 кл.
 * @property int $field17_18 Питается в школе принесённой из дома едой 5-9 кл.
 * @property int $field17_19 Питается в школе принесённой из дома едой 10-11 кл.
 * @property int $field17_20 Итого
 * @property int $field17_21 Не питается в школе 1-4 кл.
 * @property int $field17_22 Не питается в школе 5-9 кл.
 * @property int $field17_23 Не питается в школе 10-11 кл.
 * @property int $field17_24 Итого
 * @property string $create_at
 */
class DirectorTable17 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_17';
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
                    'field17_1',
                    'field17_2',
                    'field17_3',
                    'field17_4',
                    'field17_5',
                    'field17_6',
                    'field17_7',
                    'field17_8',
                    'field17_9',
                    'field17_10',
                    'field17_11',
                    'field17_12',
                    'field17_13',
                    'field17_14',
                    'field17_15',
                    'field17_16',
                    'field17_17',
                    'field17_18',
                    'field17_19',
                    'field17_20',
                    'field17_21',
                    'field17_22',
                    'field17_23',
                    'field17_24',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field17_1',
                    'field17_2',
                    'field17_3',
                    'field17_4',
                    'field17_5',
                    'field17_6',
                    'field17_7',
                    'field17_8',
                    'field17_9',
                    'field17_10',
                    'field17_11',
                    'field17_12',
                    'field17_13',
                    'field17_14',
                    'field17_15',
                    'field17_16',
                    'field17_17',
                    'field17_18',
                    'field17_19',
                    'field17_20',
                    'field17_21',
                    'field17_22',
                    'field17_23',
                    'field17_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field17_9',
                    'field17_10',
                    'field17_11',

                    'field17_1',
                    'field17_2',
                    'field17_3',
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
            'field17_1' => '',
            'field17_2' => '',
            'field17_3' => '',
            'field17_4' => '',
            'field17_5' => '',
            'field17_6' => '',
            'field17_7' => '',
            'field17_8' => '',
            'field17_9' => '',
            'field17_10' => '',
            'field17_11' => '',
            'field17_12' => '',
            'field17_13' => '',
            'field17_14' => '',
            'field17_15' => '',
            'field17_16' => '',
            'field17_17' => '',
            'field17_18' => '',
            'field17_19' => '',
            'field17_20' => '',
            'field17_21' => '',
            'field17_22' => '',
            'field17_23' => '',
            'field17_24' => '',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field17_9' => ['==', 'field17_13', 'field17_17', 'field17_21'],
            'field17_10' => ['==', 'field17_14', 'field17_18', 'field17_22'],
            'field17_11' => ['==', 'field17_15', 'field17_19', 'field17_23'],
            'field17_1' => ['==', 'field17_5', 'field17_9'],
            'field17_2' => ['==', 'field17_6', 'field17_10'],
            'field17_3' => ['==', 'field17_7', 'field17_11'],

            /*'field5' => ['<=', 'field4'],
            'field5' => ['<=', 'field4'],*/
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
