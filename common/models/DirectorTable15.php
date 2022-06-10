<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_15".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field15_1 ФЕНИЛКЕТОНУРИЕЙ 1-4 кл.
 * @property int $field15_2 ФЕНИЛКЕТОНУРИЕЙ 5-9 кл.
 * @property int $field15_3 ФЕНИЛКЕТОНУРИЕЙ 10-11 кл.
 * @property int $field15_4 Итого
 * @property int $field15_5 Из них, находится на домашнем обучении 1-4 кл.
 * @property int $field15_6 Из них, находится на домашнем обучении 5-9 кл.
 * @property int $field15_7 Из них, находится на домашнем обучении 10-11 кл.
 * @property int $field15_8 Итого
 * @property int $field15_9 Обучается очно 1-4 кл.
 * @property int $field15_10 Обучается очно 5-9 кл.
 * @property int $field15_11 Обучается очно 10-11 кл.
 * @property int $field15_12 Итого
 * @property int $field15_13 Питается в школе организованно 1-4 кл.
 * @property int $field15_14 Питается в школе организованно 5-9 кл.
 * @property int $field15_15 Питается в школе организованно 10-11 кл.
 * @property int $field15_16 Итого
 * @property int $field15_17 Питается в школе принесённой из дома едой 1-4 кл.
 * @property int $field15_18 Питается в школе принесённой из дома едой 5-9 кл.
 * @property int $field15_19 Питается в школе принесённой из дома едой 10-11 кл.
 * @property int $field15_20 Итого
 * @property int $field15_21 Не питается в школе 1-4 кл.
 * @property int $field15_22 Не питается в школе 5-9 кл.
 * @property int $field15_23 Не питается в школе 10-11 кл.
 * @property int $field15_24 Итого
 * @property string $create_at
 */
class DirectorTable15 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_15';
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
                    'field15_1',
                    'field15_2',
                    'field15_3',
                    'field15_4',
                    'field15_5',
                    'field15_6',
                    'field15_7',
                    'field15_8',
                    'field15_9',
                    'field15_10',
                    'field15_11',
                    'field15_12',
                    'field15_13',
                    'field15_14',
                    'field15_15',
                    'field15_16',
                    'field15_17',
                    'field15_18',
                    'field15_19',
                    'field15_20',
                    'field15_21',
                    'field15_22',
                    'field15_23',
                    'field15_24',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field15_1',
                    'field15_2',
                    'field15_3',
                    'field15_4',
                    'field15_5',
                    'field15_6',
                    'field15_7',
                    'field15_8',
                    'field15_9',
                    'field15_10',
                    'field15_11',
                    'field15_12',
                    'field15_13',
                    'field15_14',
                    'field15_15',
                    'field15_16',
                    'field15_17',
                    'field15_18',
                    'field15_19',
                    'field15_20',
                    'field15_21',
                    'field15_22',
                    'field15_23',
                    'field15_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field15_9',
                    'field15_10',
                    'field15_11',

                    'field15_1',
                    'field15_2',
                    'field15_3',
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
            'field15_1' => '',
            'field15_2' => '',
            'field15_3' => '',
            'field15_4' => '',
            'field15_5' => '',
            'field15_6' => '',
            'field15_7' => '',
            'field15_8' => '',
            'field15_9' => '',
            'field15_10' => '',
            'field15_11' => '',
            'field15_12' => '',
            'field15_13' => '',
            'field15_14' => '',
            'field15_15' => '',
            'field15_16' => '',
            'field15_17' => '',
            'field15_18' => '',
            'field15_19' => '',
            'field15_20' => '',
            'field15_21' => '',
            'field15_22' => '',
            'field15_23' => '',
            'field15_24' => '',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field15_9' => ['==', 'field15_13', 'field15_17', 'field15_21'],
            'field15_10' => ['==', 'field15_14', 'field15_18', 'field15_22'],
            'field15_11' => ['==', 'field15_15', 'field15_19', 'field15_23'],
            'field15_1' => ['==', 'field15_5', 'field15_9'],
            'field15_2' => ['==', 'field15_6', 'field15_10'],
            'field15_3' => ['==', 'field15_7', 'field15_11'],

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
