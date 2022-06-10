<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_4".
 *
 * @property int $id
 * @property int $field4_1 Обучается очно (всего) 1-4 кл.
 * @property int $field4_2 Обучается очно (всего) 5-9 кл.
 * @property int $field4_3 Обучается очно (всего) 10-11 кл.
 * @property int $field4_4 Итого
 * @property int $field4_5 В т.ч. в первую смену 1-4 кл.
 * @property int $field4_6 В т.ч. в первую смену 5-9 кл.
 * @property int $field4_7 В т.ч. в первую смену 10-11 кл.
 * @property int $field4_8 Итого
 * @property int $field4_9 Во вторую смену 1-4 кл.
 * @property int $field4_10 Во вторую смену 5-9 кл.
 * @property int $field4_11 Во вторую смену 10-11 кл.
 * @property int $field4_12 Итого
 * @property int $field4_13 В третью смену 1-4 кл.
 * @property int $field4_14 В третью смену 5-9 кл.
 * @property int $field4_15 В третью смену 10-11 кл.
 * @property int $field4_16 Итого
 * @property int $field4_17 Обучается на дому (всего) 1-4 кл.
 * @property int $field4_18 Обучается на дому (всего) 5-9 кл.
 * @property int $field4_19 Обучается на дому (всего) 10-11 кл.
 * @property int $field4_20 Итого
 * @property int $field4_21 Всего обучающихся 1-4 кл.
 * @property int $field4_22 Всего обучающихся 5-9 кл.
 * @property int $field4_23 Всего обучающихся 10-11 кл.
 * @property int $field4_24 Итого
 * @property string $create_at
 */
class DirectorTable4 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_4';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'field4_4',
                    'field4_8',
                    'field4_12',
                    'field4_16',
                    'field4_20',
                    'field4_24',
                ],
                'required', 'message'=>'Ошибка'
            ],
            [
                [
                    'user_id',
                    'field3',
                    'field4_1',
                    'field4_2',
                    'field4_3',
                    'field4_5',
                    'field4_6',
                    'field4_7',
                    'field4_9',
                    'field4_10',
                    'field4_11',
                    'field4_13',
                    'field4_14',
                    'field4_15',
                    'field4_17',
                    'field4_18',
                    'field4_19',
                    'field4_21',
                    'field4_22',
                    'field4_23',

                ],
                'required', 'message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'field4_1',
                    'field4_2',
                    'field4_3',
                    'field4_4',
                    'field4_5',
                    'field4_6',
                    'field4_7',
                    'field4_8',
                    'field4_9',
                    'field4_10',
                    'field4_11',
                    'field4_12',
                    'field4_13',
                    'field4_14',
                    'field4_15',
                    'field4_16',
                    'field4_17',
                    'field4_18',
                    'field4_19',
                    'field4_20',
                    'field4_21',
                    'field4_22',
                    'field4_23',
                    'field4_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field4_1',
                    'field4_2',
                    'field4_3',
                    'field4_21',
                    'field4_22',
                    'field4_23',
                ],
                'validateSum','message'=>'Проверьте правильность суммы'
            ],
            [['create_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '',
            'field3' => '3.	Проектная вместимость общеобразовательной организации ',
            'field4_1' => '',
            'field4_2' => '',
            'field4_3' => '',
            'field4_4' => '',
            'field4_5' => '',
            'field4_6' => '',
            'field4_7' => '',
            'field4_8' => '',
            'field4_9' => '',
            'field4_10' => '',
            'field4_11' => '',
            'field4_12' => '',
            'field4_13' => '',
            'field4_14' => '',
            'field4_15' => '',
            'field4_16' => '',
            'field4_17' => '',
            'field4_18' => '',
            'field4_19' => '',
            'field4_20' => '',
            'field4_21' => '',
            'field4_22' => '',
            'field4_23' => '',
            'field4_24' => '',
            'create_at' => '',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field4_1' => ['==', 'field4_5', 'field4_9', 'field4_13'],
            'field4_2' => ['==', 'field4_6', 'field4_10', 'field4_14'],
            'field4_3' => ['==', 'field4_7', 'field4_11', 'field4_15'],
            'field4_21' => ['==', 'field4_1', 'field4_17'],
            'field4_22' => ['==', 'field4_2', 'field4_18'],
            'field4_23' => ['==', 'field4_3', 'field4_19'],
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
