<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_9".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field9_1 Охвачены одноразовым горячим организованным питанием 1-4 кл.
 * @property int $field9_2 Охвачены одноразовым горячим организованным питанием 5-9 кл.
 * @property int $field9_3 Охвачены одноразовым горячим организованным питанием 10-11 кл.
 * @property int $field9_4 Итого
 * @property int $field9_5 В т.ч. - горячие завтраки 1-4 кл.
 * @property int $field9_6 В т.ч. - горячие завтраки 5-9 кл.
 * @property int $field9_7 В т.ч. - горячие завтраки 10-11 кл.
 * @property int $field9_8 Итого
 * @property int $field9_9 Обеды 1-4 кл.
 * @property int $field9_10 Обеды 5-9 кл.
 * @property int $field9_11 Обеды 10-11 кл.
 * @property int $field9_12 Итого
 * @property int $field9_13 Охвачены двухразовым питанием (завтраки+обеды) 1-4 кл.
 * @property int $field9_14 Охвачены двухразовым питанием (завтраки+обеды) 5-9 кл.
 * @property int $field9_15 Охвачены двухразовым питанием (завтраки+обеды) 10-11 кл.
 * @property int $field9_16 Итого
 * @property int $field9_17 Охвачены трехразовым питанием (завтраки+обеды+полдники) 1-4 кл.
 * @property int $field9_18 Охвачены трехразовым питанием (завтраки+обеды+полдники) 5-9 кл.
 * @property int $field9_19 Охвачены трехразовым питанием (завтраки+обеды+полдники) 10-11 кл.
 * @property int $field9_20 Итого
 * @property int $field9_21 Охвачено организованным питанием всего 1-4 кл.
 * @property int $field9_22 Охвачено организованным питанием всего 5-9 кл.
 * @property int $field9_23 Охвачено организованным питанием всего 10-11 кл.
 * @property int $field9_24 Итого
 * @property string $create_at
 */
class DirectorTable9 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_9';
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
                    'field9_1',
                    'field9_2',
                    'field9_3',
                    'field9_4',
                    'field9_5',
                    'field9_6',
                    'field9_7',
                    'field9_8',
                    'field9_9',
                    'field9_10',
                    'field9_11',
                    'field9_12',
                    'field9_13',
                    'field9_14',
                    'field9_15',
                    'field9_16',
                    'field9_17',
                    'field9_18',
                    'field9_19',
                    'field9_20',
                    'field9_21',
                    'field9_22',
                    'field9_23',
                    'field9_24',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field9_1',
                    'field9_2',
                    'field9_3',
                    'field9_4',
                    'field9_5',
                    'field9_6',
                    'field9_7',
                    'field9_8',
                    'field9_9',
                    'field9_10',
                    'field9_11',
                    'field9_12',
                    'field9_13',
                    'field9_14',
                    'field9_15',
                    'field9_16',
                    'field9_17',
                    'field9_18',
                    'field9_19',
                    'field9_20',
                    'field9_21',
                    'field9_22',
                    'field9_23',
                    'field9_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field9_1',
                    'field9_2',
                    'field9_3',

                    'field9_21',
                    'field9_22',
                    'field9_23',
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
            'field9_1' => '',
            'field9_2' => '',
            'field9_3' => '',
            'field9_4' => '',
            'field9_5' => '',
            'field9_6' => '',
            'field9_7' => '',
            'field9_8' => '',
            'field9_9' => '',
            'field9_10' => '',
            'field9_11' => '',
            'field9_12' => '',
            'field9_13' => '',
            'field9_14' => '',
            'field9_15' => '',
            'field9_16' => '',
            'field9_17' => '',
            'field9_18' => '',
            'field9_19' => '',
            'field9_20' => '',
            'field9_21' => '',
            'field9_22' => '',
            'field9_23' => '',
            'field9_24' => '',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field9_1' => ['==', 'field9_5', 'field9_9'],
            'field9_2' => ['==', 'field9_6', 'field9_10'],
            'field9_3' => ['==', 'field9_7', 'field9_11'],
            'field9_21' => ['==', 'field9_1', 'field9_13', 'field9_17'],
            'field9_22' => ['==', 'field9_2', 'field9_14', 'field9_18'],
            'field9_23' => ['==', 'field9_3', 'field9_15', 'field9_19'],
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
