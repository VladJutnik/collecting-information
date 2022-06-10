<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_16".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field16_1 МУКОВИСЦИДОЗОМ 1-4 кл.
 * @property int $field16_2 МУКОВИСЦИДОЗОМ 5-9 кл.
 * @property int $field16_3 МУКОВИСЦИДОЗОМ 10-11 кл.
 * @property int $field16_4 Итого
 * @property int $field16_5 Из них, находится на домашнем обучении 1-4 кл.
 * @property int $field16_6 Из них, находится на домашнем обучении 5-9 кл.
 * @property int $field16_7 Из них, находится на домашнем обучении 10-11 кл.
 * @property int $field16_8 Итого
 * @property int $field16_9 Обучается очно 1-4 кл.
 * @property int $field16_10 Обучается очно 5-9 кл.
 * @property int $field16_11 Обучается очно 10-11 кл.
 * @property int $field16_12 Итого
 * @property int $field16_13 Питается в школе организованно 1-4 кл.
 * @property int $field16_14 Питается в школе организованно 5-9 кл.
 * @property int $field16_15 Питается в школе организованно 10-11 кл.
 * @property int $field16_16 Итого
 * @property int $field16_17 Питается в школе принесённой из дома едой 1-4 кл.
 * @property int $field16_18 Питается в школе принесённой из дома едой 5-9 кл.
 * @property int $field16_19 Питается в школе принесённой из дома едой 10-11 кл.
 * @property int $field16_20 Итого
 * @property int $field16_21 Не питается в школе 1-4 кл.
 * @property int $field16_22 Не питается в школе 5-9 кл.
 * @property int $field16_23 Не питается в школе 10-11 кл.
 * @property int $field16_24 Итого
 * @property string $create_at
 */
class DirectorTable16 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_16';
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
                    'field16_1',
                    'field16_2',
                    'field16_3',
                    'field16_4',
                    'field16_5',
                    'field16_6',
                    'field16_7',
                    'field16_8',
                    'field16_9',
                    'field16_10',
                    'field16_11',
                    'field16_12',
                    'field16_13',
                    'field16_14',
                    'field16_15',
                    'field16_16',
                    'field16_17',
                    'field16_18',
                    'field16_19',
                    'field16_20',
                    'field16_21',
                    'field16_22',
                    'field16_23',
                    'field16_24',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field16_1',
                    'field16_2',
                    'field16_3',
                    'field16_4',
                    'field16_5',
                    'field16_6',
                    'field16_7',
                    'field16_8',
                    'field16_9',
                    'field16_10',
                    'field16_11',
                    'field16_12',
                    'field16_13',
                    'field16_14',
                    'field16_15',
                    'field16_16',
                    'field16_17',
                    'field16_18',
                    'field16_19',
                    'field16_20',
                    'field16_21',
                    'field16_22',
                    'field16_23',
                    'field16_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field16_9',
                    'field16_10',
                    'field16_11',

                    'field16_1',
                    'field16_2',
                    'field16_3',
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
            'field16_1' => '',
            'field16_2' => '',
            'field16_3' => '',
            'field16_4' => '',
            'field16_5' => '',
            'field16_6' => '',
            'field16_7' => '',
            'field16_8' => '',
            'field16_9' => '',
            'field16_10' => '',
            'field16_11' => '',
            'field16_12' => '',
            'field16_13' => '',
            'field16_14' => '',
            'field16_15' => '',
            'field16_16' => '',
            'field16_17' => '',
            'field16_18' => '',
            'field16_19' => '',
            'field16_20' => '',
            'field16_21' => '',
            'field16_22' => '',
            'field16_23' => '',
            'field16_24' => '',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field16_9' => ['==', 'field16_13', 'field16_17', 'field16_21'],
            'field16_10' => ['==', 'field16_14', 'field16_18', 'field16_22'],
            'field16_11' => ['==', 'field16_15', 'field16_19', 'field16_23'],
            'field16_1' => ['==', 'field16_5', 'field16_9'],
            'field16_2' => ['==', 'field16_6', 'field16_10'],
            'field16_3' => ['==', 'field16_7', 'field16_11'],

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
