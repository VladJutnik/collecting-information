<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_29".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field29_1 «Основы здорового питания» для детей школьного возраста (Роспотребнадзор) 1-4 кл.
 * @property int $field29_2 «Основы здорового питания» для детей школьного возраста (Роспотребнадзор) 5-9 кл.
 * @property int $field29_3 «Основы здорового питания» для детей школьного возраста (Роспотребнадзор) 10-11 кл.
 * @property int $field29_4 «Основы здорового питания» для детей школьного возраста (Роспотребнадзор) Итого
 * @property int $field29_5 «Школьное молоко» 1-4 кл.
 * @property int $field29_6 «Школьное молоко» 5-9 кл.
 * @property int $field29_7 «Школьное молоко» 10-11 кл.
 * @property int $field29_8 «Школьное молоко» Итого
 * @property int $field29_9 «Разговор о правильном питании» 1-4 кл.
 * @property int $field29_10 «Разговор о правильном питании» 5-9 кл.
 * @property int $field29_11 «Разговор о правильном питании» 10-11 кл.
 * @property int $field29_12 «Разговор о правильном питании» Итого
 * @property int $field29_13 Образовательные программы по здоровому питанию не реализуются 1-4 кл.
 * @property int $field29_14 Образовательные программы по здоровому питанию не реализуются 5-9 кл.
 * @property int $field29_15 Образовательные программы по здоровому питанию не реализуются 10-11 кл.
 * @property int $field29_16 Образовательные программы по здоровому питанию не реализуются Итого
 * @property string $create_at
 */
class DirectorTable29 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_29';
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
                    'field29_1',
                    'field29_2',
                    'field29_3',
                    'field29_4',
                    'field29_5',
                    'field29_6',
                    'field29_7',
                    'field29_8',
                    'field29_9',
                    'field29_10',
                    'field29_11',
                    'field29_12',
                    'field29_13',
                    'field29_14',
                    'field29_15',
                    'field29_16'
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field29_1',
                    'field29_2',
                    'field29_3',
                    'field29_4',
                    'field29_5',
                    'field29_6',
                    'field29_7',
                    'field29_8',
                    'field29_9',
                    'field29_10',
                    'field29_11',
                    'field29_12',
                    'field29_13',
                    'field29_14',
                    'field29_15',
                    'field29_16'
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field29_4',
                    'field29_8',
                    'field29_12',
                    'field29_16',
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
            'field29_1' => 'Field29 1',
            'field29_2' => 'Field29 2',
            'field29_3' => 'Field29 3',
            'field29_4' => 'Field29 4',
            'field29_5' => 'Field29 5',
            'field29_6' => 'Field29 6',
            'field29_7' => 'Field29 7',
            'field29_8' => 'Field29 8',
            'field29_9' => 'Field29 9',
            'field29_10' => 'Field29 10',
            'field29_11' => 'Field29 11',
            'field29_12' => 'Field29 12',
            'field29_13' => 'Field29 13',
            'field29_14' => 'Field29 14',
            'field29_15' => 'Field29 15',
            'field29_16' => 'Field29 16',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field29_4' => ['==', 'field29_1', 'field29_2', 'field29_3'],
            'field29_8' => ['==', 'field29_5', 'field29_6', 'field29_7'],
            'field29_12' => ['==', 'field29_9', 'field29_10', 'field29_11'],
            'field29_16' => ['==', 'field29_13', 'field29_14', 'field29_15'],
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
