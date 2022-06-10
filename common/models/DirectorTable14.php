<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_14".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field14_1 ЦЕЛИАКИЕЙ 1-4 кл.
 * @property int $field14_2 ЦЕЛИАКИЕЙ 5-9 кл.
 * @property int $field14_3 ЦЕЛИАКИЕЙ 10-11 кл.
 * @property int $field14_4 Итого
 * @property int $field14_5 Из них, находится на домашнем обучении 1-4 кл.
 * @property int $field14_6 Из них, находится на домашнем обучении 5-9 кл.
 * @property int $field14_7 Из них, находится на домашнем обучении 10-11 кл.
 * @property int $field14_8 Итого
 * @property int $field14_9 Обучается очно 1-4 кл.
 * @property int $field14_10 Обучается очно 5-9 кл.
 * @property int $field14_11 Обучается очно 10-11 кл.
 * @property int $field14_12 Итого
 * @property int $field14_13 Питается в школе организованно 1-4 кл.
 * @property int $field14_14 Питается в школе организованно 5-9 кл.
 * @property int $field14_15 Питается в школе организованно 10-11 кл.
 * @property int $field14_16 Итого
 * @property int $field14_17 Питается в школе принесённой из дома едой 1-4 кл.
 * @property int $field14_18 Питается в школе принесённой из дома едой 5-9 кл.
 * @property int $field14_19 Питается в школе принесённой из дома едой 10-11 кл.
 * @property int $field14_20 Итого
 * @property int $field14_21 Не питается в школе 1-4 кл.
 * @property int $field14_22 Не питается в школе 5-9 кл.
 * @property int $field14_23 Не питается в школе 10-11 кл.
 * @property int $field14_24 Итого
 * @property string $create_at
 */
class DirectorTable14 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_14';
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
                    'field14_1',
                    'field14_2',
                    'field14_3',
                    'field14_4',
                    'field14_5',
                    'field14_6',
                    'field14_7',
                    'field14_8',
                    'field14_9',
                    'field14_10',
                    'field14_11',
                    'field14_12',
                    'field14_13',
                    'field14_14',
                    'field14_15',
                    'field14_16',
                    'field14_17',
                    'field14_18',
                    'field14_19',
                    'field14_20',
                    'field14_21',
                    'field14_22',
                    'field14_23',
                    'field14_24',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field14_1',
                    'field14_2',
                    'field14_3',
                    'field14_4',
                    'field14_5',
                    'field14_6',
                    'field14_7',
                    'field14_8',
                    'field14_9',
                    'field14_10',
                    'field14_11',
                    'field14_12',
                    'field14_13',
                    'field14_14',
                    'field14_15',
                    'field14_16',
                    'field14_17',
                    'field14_18',
                    'field14_19',
                    'field14_20',
                    'field14_21',
                    'field14_22',
                    'field14_23',
                    'field14_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field14_9',
                    'field14_10',
                    'field14_11',

                    'field14_1',
                    'field14_2',
                    'field14_3',
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
            'field14_1' => '',
            'field14_2' => '',
            'field14_3' => '',
            'field14_4' => '',
            'field14_5' => '',
            'field14_6' => '',
            'field14_7' => '',
            'field14_8' => '',
            'field14_9' => '',
            'field14_10' => '',
            'field14_11' => '',
            'field14_12' => '',
            'field14_13' => '',
            'field14_14' => '',
            'field14_15' => '',
            'field14_16' => '',
            'field14_17' => '',
            'field14_18' => '',
            'field14_19' => '',
            'field14_20' => '',
            'field14_21' => '',
            'field14_22' => '',
            'field14_23' => '',
            'field14_24' => '',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field14_9' => ['==', 'field14_13', 'field14_17', 'field14_21'],
            'field14_10' => ['==', 'field14_14', 'field14_18', 'field14_22'],
            'field14_11' => ['==', 'field14_15', 'field14_19', 'field14_23'],
            'field14_1' => ['==', 'field14_5', 'field14_9'],
            'field14_2' => ['==', 'field14_6', 'field14_10'],
            'field14_3' => ['==', 'field14_7', 'field14_11'],

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
