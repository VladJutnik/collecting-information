<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_8".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field8_1 Охвачены одноразовым горячим организованным питанием 1-4 кл.
 * @property int $field8_2 Охвачены одноразовым горячим организованным питанием 5-9 кл.
 * @property int $field8_3 Охвачены одноразовым горячим организованным питанием 10-11 кл.
 * @property int $field8_4 Итого
 * @property int $field8_5 В т.ч. - горячие завтраки 1-4 кл.
 * @property int $field8_6 В т.ч. - горячие завтраки 5-9 кл.
 * @property int $field8_7 В т.ч. - горячие завтраки 10-11 кл.
 * @property int $field8_8 Итого
 * @property int $field8_9 Обеды 1-4 кл.
 * @property int $field8_10 Обеды 5-9 кл.
 * @property int $field8_11 Обеды 10-11 кл.
 * @property int $field8_12 Итого
 * @property int $field8_13 Охвачены двухразовым питанием (завтраки+обеды) 1-4 кл.
 * @property int $field8_14 Охвачены двухразовым питанием (завтраки+обеды) 5-9 кл.
 * @property int $field8_15 Охвачены двухразовым питанием (завтраки+обеды) 10-11 кл.
 * @property int $field8_16 Итого
 * @property int $field8_17 Охвачены трехразовым питанием (завтраки+обеды+полдники) 1-4 кл.
 * @property int $field8_18 Охвачены трехразовым питанием (завтраки+обеды+полдники) 5-9 кл.
 * @property int $field8_19 Охвачены трехразовым питанием (завтраки+обеды+полдники) 10-11 кл.
 * @property int $field8_20 Итого
 * @property int $field8_21 Охвачено организованным питанием всего 1-4 кл.
 * @property int $field8_22 Охвачено организованным питанием всего 5-9 кл.
 * @property int $field8_23 Охвачено организованным питанием всего 10-11 кл.
 * @property int $field8_24 Итого
 * @property string $create_at
 */
class DirectorTable8 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_8';
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
                    'field8_1',
                    'field8_2',
                    'field8_3',
                    'field8_4',
                    'field8_5',
                    'field8_6',
                    'field8_7',
                    'field8_8',
                    'field8_9',
                    'field8_10',
                    'field8_11',
                    'field8_12',
                    'field8_13',
                    'field8_14',
                    'field8_15',
                    'field8_16',
                    'field8_17',
                    'field8_18',
                    'field8_19',
                    'field8_20',
                    'field8_21',
                    'field8_22',
                    'field8_23',
                    'field8_24',
                ],
                'required',
                'message'=>'Если у Вас нет данных для заполнения, поставтье 0'
            ],
            [
                [
                    'user_id',
                    'field8_1',
                    'field8_2',
                    'field8_3',
                    'field8_4',
                    'field8_5',
                    'field8_6',
                    'field8_7',
                    'field8_8',
                    'field8_9',
                    'field8_10',
                    'field8_11',
                    'field8_12',
                    'field8_13',
                    'field8_14',
                    'field8_15',
                    'field8_16',
                    'field8_17',
                    'field8_18',
                    'field8_19',
                    'field8_20',
                    'field8_21',
                    'field8_22',
                    'field8_23',
                    'field8_24',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field8_1',
                    'field8_2',
                    'field8_3',

                    'field8_21',
                    'field8_22',
                    'field8_23',
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
            'field8_1' => '',
            'field8_2' => '',
            'field8_3' => '',
            'field8_4' => '',
            'field8_5' => '',
            'field8_6' => '',
            'field8_7' => '',
            'field8_8' => '',
            'field8_9' => '',
            'field8_10' => '',
            'field8_11' => '',
            'field8_12' => '',
            'field8_13' => '',
            'field8_14' => '',
            'field8_15' => '',
            'field8_16' => '',
            'field8_17' => '',
            'field8_18' => '',
            'field8_19' => '',
            'field8_20' => '',
            'field8_21' => '',
            'field8_22' => '',
            'field8_23' => '',
            'field8_24' => '',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field8_1' => ['==', 'field8_5', 'field8_9'],
            'field8_2' => ['==', 'field8_6', 'field8_10'],
            'field8_3' => ['==', 'field8_7', 'field8_11'],
            'field8_21' => ['==', 'field8_1', 'field8_13', 'field8_17'],
            'field8_22' => ['==', 'field8_2', 'field8_14', 'field8_18'],
            'field8_23' => ['==', 'field8_3', 'field8_15', 'field8_19'],
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
