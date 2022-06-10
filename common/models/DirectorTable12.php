<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_12".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field12_1 САХАРНЫМ ДИАБЕТОМ 1-4 кл.
 * @property int $field12_2 САХАРНЫМ ДИАБЕТОМ 5-9 кл.
 * @property int $field12_3 САХАРНЫМ ДИАБЕТОМ 10-11 кл.
 * @property int $field12_4 Итого
 * @property int $field12_5 Из них, находится на домашнем обучении 1-4 кл.
 * @property int $field12_6 Из них, находится на домашнем обучении 5-9 кл.
 * @property int $field12_7 Из них, находится на домашнем обучении 10-11 кл.
 * @property int $field12_8 Итого
 * @property int $field12_9 Обучается очно 1-4 кл.
 * @property int $field12_10 Обучается очно 5-9 кл.
 * @property int $field12_11 Обучается очно 10-11 кл.
 * @property int $field12_12 Итого
 * @property int $field12_13 Питается в школе организованно 1-4 кл.
 * @property int $field12_14 Питается в школе организованно 5-9 кл.
 * @property int $field12_15 Питается в школе организованно 10-11 кл.
 * @property int $field12_16 Итого
 * @property int $field12_17 Питается в школе принесённой из дома едой 1-4 кл.
 * @property int $field12_18 Питается в школе принесённой из дома едой 5-9 кл.
 * @property int $field12_19 Питается в школе принесённой из дома едой 10-11 кл.
 * @property int $field12_20 Итого
 * @property int $field12_21 Не питается в школе 1-4 кл.
 * @property int $field12_22 Не питается в школе 5-9 кл.
 * @property int $field12_23 Не питается в школе 10-11 кл.
 * @property int $field12_24 Итого
 * @property string $create_at
 */
class DirectorTable12 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_12';
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
                    'field12_1',
                    'field12_2',
                    'field12_3',
                    'field12_4',
                    'field12_5',
                    'field12_6',
                    'field12_7',
                    'field12_8',
                    'field12_9',
                    'field12_10',
                    'field12_11',
                    'field12_12',
                    'field12_13',
                    'field12_14',
                    'field12_15',
                    'field12_16',
                    'field12_17',
                    'field12_18',
                    'field12_19',
                    'field12_20',
                    'field12_21',
                    'field12_22',
                    'field12_23',
                    'field12_24',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field12_1',
                    'field12_2',
                    'field12_3',
                    'field12_4',
                    'field12_5',
                    'field12_6',
                    'field12_7',
                    'field12_8',
                    'field12_9',
                    'field12_10',
                    'field12_11',
                    'field12_12',
                    'field12_13',
                    'field12_14',
                    'field12_15',
                    'field12_16',
                    'field12_17',
                    'field12_18',
                    'field12_19',
                    'field12_20',
                    'field12_21',
                    'field12_22',
                    'field12_23',
                    'field12_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field12_9',
                    'field12_10',
                    'field12_11',

                    'field12_1',
                    'field12_2',
                    'field12_3',
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
            'field12_1' => '',
            'field12_2' => '',
            'field12_3' => '',
            'field12_4' => '',
            'field12_5' => '',
            'field12_6' => '',
            'field12_7' => '',
            'field12_8' => '',
            'field12_9' => '',
            'field12_10' => '',
            'field12_11' => '',
            'field12_12' => '',
            'field12_13' => '',
            'field12_14' => '',
            'field12_15' => '',
            'field12_16' => '',
            'field12_17' => '',
            'field12_18' => '',
            'field12_19' => '',
            'field12_20' => '',
            'field12_21' => '',
            'field12_22' => '',
            'field12_23' => '',
            'field12_24' => '',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field12_9' => ['==', 'field12_13', 'field12_17', 'field12_21'],
            'field12_10' => ['==', 'field12_14', 'field12_18', 'field12_22'],
            'field12_11' => ['==', 'field12_15', 'field12_19', 'field12_23'],
            'field12_1' => ['==', 'field12_5', 'field12_9'],
            'field12_2' => ['==', 'field12_6', 'field12_10'],
            'field12_3' => ['==', 'field12_7', 'field12_11'],

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
