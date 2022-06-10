<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_30".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field30_1 Завтрак 1-4 кл.
 * @property int $field30_2 Завтрак 5-9 кл.
 * @property int $field30_3 Завтрак 10-11 кл.
 * @property int $field30_4 Завтрак Итого
 * @property int $field30_5 Обед 1-4 кл.
 * @property int $field30_6 Обед 5-9 кл.
 * @property int $field30_7 Обед 10-11 кл.
 * @property int $field30_8 Обед Итого
 * @property int $field30_9 Полдник 1-4 кл.
 * @property int $field30_10 Полдник 5-9 кл.
 * @property int $field30_11 Полдник 10-11 кл.
 * @property int $field30_12 Полдник Итого
 * @property string $create_at
 */
class DirectorTable30 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_30';
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
                    'field30_1',
                    'field30_2',
                    'field30_3',
                    'field30_4',
                    'field30_5',
                    'field30_6',
                    'field30_7',
                    'field30_8',
                    'field30_9',
                    'field30_10',
                    'field30_11',
                    'field30_12',
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field30_1',
                    'field30_2',
                    'field30_3',
                    'field30_4',
                    'field30_5',
                    'field30_6',
                    'field30_7',
                    'field30_8',
                    'field30_9',
                    'field30_10',
                    'field30_11',
                    'field30_12',
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
            ],
            [
                [
                    'field30_4',
                    'field30_8',
                    'field30_12',
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
            'field30_1' => 'Field30 1',
            'field30_2' => 'Field30 2',
            'field30_3' => 'Field30 3',
            'field30_4' => 'Field30 4',
            'field30_5' => 'Field30 5',
            'field30_6' => 'Field30 6',
            'field30_7' => 'Field30 7',
            'field30_8' => 'Field30 8',
            'field30_9' => 'Field30 9',
            'field30_10' => 'Field30 10',
            'field30_11' => 'Field30 11',
            'field30_12' => 'Field30 12',
            'create_at' => 'Create At',
        ];
    }

    //ДЛЯ поля: Всего общеобразовательных организаций (СУБЪЕКТЫ)
    public function validateSum($attribute)
    {
        $rules_array_sum = [
            'field30_4' => ['==', 'field30_1', 'field30_2', 'field30_3'],
            'field30_8' => ['==', 'field30_5', 'field30_6', 'field30_7'],
            'field30_12' => ['==', 'field30_9', 'field30_10', 'field30_11'],

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
