<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_7".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field7_1 Охвачены одноразовым горячим организованным питанием 1-4 кл.
 * @property int $field7_2 Охвачены одноразовым горячим организованным питанием 5-9 кл.
 * @property int $field7_3 Охвачены одноразовым горячим организованным питанием 10-11 кл.
 * @property int $field7_4 Итого
 * @property int $field7_5 В т.ч. - горячие завтраки 1-4 кл.
 * @property int $field7_6 В т.ч. - горячие завтраки 5-9 кл.
 * @property int $field7_7 В т.ч. - горячие завтраки 10-11 кл.
 * @property int $field7_8 Итого
 * @property int $field7_9 Обеды 1-4 кл.
 * @property int $field7_10 Обеды 5-9 кл.
 * @property int $field7_11 Обеды 10-11 кл.
 * @property int $field7_12 Итого
 * @property int $field7_13 Охвачены двухразовым питанием (завтраки+обеды) 1-4 кл.
 * @property int $field7_14 Охвачены двухразовым питанием (завтраки+обеды) 5-9 кл.
 * @property int $field7_15 Охвачены двухразовым питанием (завтраки+обеды) 10-11 кл.
 * @property int $field7_16 Итого
 * @property int $field7_17 Охвачены трехразовым питанием (завтраки+обеды+полдники) 1-4 кл.
 * @property int $field7_18 Охвачены трехразовым питанием (завтраки+обеды+полдники) 5-9 кл.
 * @property int $field7_19 Охвачены трехразовым питанием (завтраки+обеды+полдники) 10-11 кл.
 * @property int $field7_20 Итого
 * @property int $field7_21 Охвачено организованным питанием всего 1-4 кл.
 * @property int $field7_22 Охвачено организованным питанием всего 5-9 кл.
 * @property int $field7_23 Охвачено организованным питанием всего 10-11 кл.
 * @property int $field7_24 Итого
 * @property string $create_at
 */
class DirectorTable7 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_7';
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
                    'field7_1',
                    'field7_2',
                    'field7_3',
                    'field7_4',
                    'field7_5',
                    'field7_6',
                    'field7_7',
                    'field7_8',
                    'field7_9',
                    'field7_10',
                    'field7_11',
                    'field7_12',
                    'field7_13',
                    'field7_14',
                    'field7_15',
                    'field7_16',
                    'field7_17',
                    'field7_18',
                    'field7_19',
                    'field7_20',
                    'field7_21',
                    'field7_22',
                    'field7_23',
                    'field7_24',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field7_1',
                    'field7_2',
                    'field7_3',
                    'field7_4',
                    'field7_5',
                    'field7_6',
                    'field7_7',
                    'field7_8',
                    'field7_9',
                    'field7_10',
                    'field7_11',
                    'field7_12',
                    'field7_13',
                    'field7_14',
                    'field7_15',
                    'field7_16',
                    'field7_17',
                    'field7_18',
                    'field7_19',
                    'field7_20',
                    'field7_21',
                    'field7_22',
                    'field7_23',
                    'field7_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field7_1',
                    'field7_2',
                    'field7_3',

                    'field7_21',
                    'field7_22',
                    'field7_23',
                ],
                'validateSum', 'message'=>'Проверьте правильность суммы'
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
            'field7_1' => '',
            'field7_2' => '',
            'field7_3' => '',
            'field7_4' => '',
            'field7_5' => '',
            'field7_6' => '',
            'field7_7' => '',
            'field7_8' => '',
            'field7_9' => '',
            'field7_10' => '',
            'field7_11' => '',
            'field7_12' => '',
            'field7_13' => '',
            'field7_14' => '',
            'field7_15' => '',
            'field7_16' => '',
            'field7_17' => '',
            'field7_18' => '',
            'field7_19' => '',
            'field7_20' => '',
            'field7_21' => '',
            'field7_22' => '',
            'field7_23' => '',
            'field7_24' => '',
            'create_at' => '',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field7_1' => ['==', 'field7_5', 'field7_9'],
            'field7_2' => ['==', 'field7_6', 'field7_10'],
            'field7_3' => ['==', 'field7_7', 'field7_11'],
            'field7_21' => ['==', 'field7_1', 'field7_13', 'field7_17'],
            'field7_22' => ['==', 'field7_2', 'field7_14', 'field7_18'],
            'field7_23' => ['==', 'field7_3', 'field7_15', 'field7_19'],
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
