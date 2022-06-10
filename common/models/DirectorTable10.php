<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_10".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field10_1 Охвачены одноразовым горячим организованным питанием 1-4 кл.
 * @property int $field10_2 Охвачены одноразовым горячим организованным питанием 5-9 кл.
 * @property int $field10_3 Охвачены одноразовым горячим организованным питанием 10-11 кл.
 * @property int $field10_4 Итого
 * @property int $field10_5 В т.ч. - горячие завтраки 1-4 кл.
 * @property int $field10_6 В т.ч. - горячие завтраки 5-9 кл.
 * @property int $field10_7 В т.ч. - горячие завтраки 10-11 кл.
 * @property int $field10_8 Итого
 * @property int $field10_9 Обеды 1-4 кл.
 * @property int $field10_10 Обеды 5-9 кл.
 * @property int $field10_11 Обеды 10-11 кл.
 * @property int $field10_12 Итого
 * @property int $field10_13 Охвачены двухразовым питанием (завтраки+обеды) 1-4 кл.
 * @property int $field10_14 Охвачены двухразовым питанием (завтраки+обеды) 5-9 кл.
 * @property int $field10_15 Охвачены двухразовым питанием (завтраки+обеды) 10-11 кл.
 * @property int $field10_16 Итого
 * @property int $field10_17 Охвачены трехразовым питанием (завтраки+обеды+полдники) 1-4 кл.
 * @property int $field10_18 Охвачены трехразовым питанием (завтраки+обеды+полдники) 5-9 кл.
 * @property int $field10_19 Охвачены трехразовым питанием (завтраки+обеды+полдники) 10-11 кл.
 * @property int $field10_20 Итого
 * @property int $field10_21 Охвачено организованным питанием всего 1-4 кл.
 * @property int $field10_22 Охвачено организованным питанием всего 5-9 кл.
 * @property int $field10_23 Охвачено организованным питанием всего 10-11 кл.
 * @property int $field10_24 Итого
 * @property string $create_at
 */
class DirectorTable10 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_10';
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
                    'field10_1',
                    'field10_2',
                    'field10_3',
                    'field10_4',
                    'field10_5',
                    'field10_6',
                    'field10_7',
                    'field10_8',
                    'field10_9',
                    'field10_10',
                    'field10_11',
                    'field10_12',
                    'field10_13',
                    'field10_14',
                    'field10_15',
                    'field10_16',
                    'field10_17',
                    'field10_18',
                    'field10_19',
                    'field10_20',
                    'field10_21',
                    'field10_22',
                    'field10_23',
                    'field10_24',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field10_1',
                    'field10_2',
                    'field10_3',
                    'field10_4',
                    'field10_5',
                    'field10_6',
                    'field10_7',
                    'field10_8',
                    'field10_9',
                    'field10_10',
                    'field10_11',
                    'field10_12',
                    'field10_13',
                    'field10_14',
                    'field10_15',
                    'field10_16',
                    'field10_17',
                    'field10_18',
                    'field10_19',
                    'field10_20',
                    'field10_21',
                    'field10_22',
                    'field10_23',
                    'field10_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field10_1',
                    'field10_2',
                    'field10_3',

                    'field10_21',
                    'field10_22',
                    'field10_23',
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
            'field10_1' => '',
            'field10_2' => '',
            'field10_3' => '',
            'field10_4' => '',
            'field10_5' => '',
            'field10_6' => '',
            'field10_7' => '',
            'field10_8' => '',
            'field10_9' => '',
            'field10_10' => '',
            'field10_11' => '',
            'field10_12' => '',
            'field10_13' => '',
            'field10_14' => '',
            'field10_15' => '',
            'field10_16' => '',
            'field10_17' => '',
            'field10_18' => '',
            'field10_19' => '',
            'field10_20' => '',
            'field10_21' => '',
            'field10_22' => '',
            'field10_23' => '',
            'field10_24' => '',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field10_1' => ['==', 'field10_5', 'field10_9'],
            'field10_2' => ['==', 'field10_6', 'field10_10'],
            'field10_3' => ['==', 'field10_7', 'field10_11'],
            'field10_21' => ['==', 'field10_1', 'field10_13', 'field10_17'],
            'field10_22' => ['==', 'field10_2', 'field10_14', 'field10_18'],
            'field10_23' => ['==', 'field10_3', 'field10_15', 'field10_19'],
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
