<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_13".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field13_1 ПИЩЕВОЙ АЛЛЕРГИЕЙ 1-4 кл.
 * @property int $field13_2 ПИЩЕВОЙ АЛЛЕРГИЕЙ 5-9 кл.
 * @property int $field13_3 ПИЩЕВОЙ АЛЛЕРГИЕЙ 10-11 кл.
 * @property int $field13_4 Итого
 * @property int $field13_5 Из них, находится на домашнем обучении 1-4 кл.
 * @property int $field13_6 Из них, находится на домашнем обучении 5-9 кл.
 * @property int $field13_7 Из них, находится на домашнем обучении 10-11 кл.
 * @property int $field13_8 Итого
 * @property int $field13_9 Обучается очно 1-4 кл.
 * @property int $field13_10 Обучается очно 5-9 кл.
 * @property int $field13_11 Обучается очно 10-11 кл.
 * @property int $field13_12 Итого
 * @property int $field13_13 Питается в школе организованно 1-4 кл.
 * @property int $field13_14 Питается в школе организованно 5-9 кл.
 * @property int $field13_15 Питается в школе организованно 10-11 кл.
 * @property int $field13_16 Итого
 * @property int $field13_17 Питается в школе принесённой из дома едой 1-4 кл.
 * @property int $field13_18 Питается в школе принесённой из дома едой 5-9 кл.
 * @property int $field13_19 Питается в школе принесённой из дома едой 10-11 кл.
 * @property int $field13_20 Итого
 * @property int $field13_21 Не питается в школе 1-4 кл.
 * @property int $field13_22 Не питается в школе 5-9 кл.
 * @property int $field13_23 Не питается в школе 10-11 кл.
 * @property int $field13_24 Итого
 * @property string $create_at
 */
class DirectorTable13 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_13';
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
                    'field13_1',
                    'field13_2',
                    'field13_3',
                    'field13_4',
                    'field13_5',
                    'field13_6',
                    'field13_7',
                    'field13_8',
                    'field13_9',
                    'field13_10',
                    'field13_11',
                    'field13_12',
                    'field13_13',
                    'field13_14',
                    'field13_15',
                    'field13_16',
                    'field13_17',
                    'field13_18',
                    'field13_19',
                    'field13_20',
                    'field13_21',
                    'field13_22',
                    'field13_23',
                    'field13_24',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field13_1',
                    'field13_2',
                    'field13_3',
                    'field13_4',
                    'field13_5',
                    'field13_6',
                    'field13_7',
                    'field13_8',
                    'field13_9',
                    'field13_10',
                    'field13_11',
                    'field13_12',
                    'field13_13',
                    'field13_14',
                    'field13_15',
                    'field13_16',
                    'field13_17',
                    'field13_18',
                    'field13_19',
                    'field13_20',
                    'field13_21',
                    'field13_22',
                    'field13_23',
                    'field13_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field13_9',
                    'field13_10',
                    'field13_11',

                    'field13_1',
                    'field13_2',
                    'field13_3',
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
            'field13_1' => '',
            'field13_2' => '',
            'field13_3' => '',
            'field13_4' => '',
            'field13_5' => '',
            'field13_6' => '',
            'field13_7' => '',
            'field13_8' => '',
            'field13_9' => '',
            'field13_10' => '',
            'field13_11' => '',
            'field13_12' => '',
            'field13_13' => '',
            'field13_14' => '',
            'field13_15' => '',
            'field13_16' => '',
            'field13_17' => '',
            'field13_18' => '',
            'field13_19' => '',
            'field13_20' => '',
            'field13_21' => '',
            'field13_22' => '',
            'field13_23' => '',
            'field13_24' => '',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field13_9' => ['==', 'field13_13', 'field13_17', 'field13_21'],
            'field13_10' => ['==', 'field13_14', 'field13_18', 'field13_22'],
            'field13_11' => ['==', 'field13_15', 'field13_19', 'field13_23'],
            'field13_1' => ['==', 'field13_5', 'field13_9'],
            'field13_2' => ['==', 'field13_6', 'field13_10'],
            'field13_3' => ['==', 'field13_7', 'field13_11'],

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
