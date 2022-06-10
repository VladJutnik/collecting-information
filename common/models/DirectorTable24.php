<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "director_table_24".
 *
 * @property int $id
 * @property int $user_id
 * @property int $field23_1_1 Максимальное количество питающихся во время перемены
 * @property int $field23_2_1 Количество перемен, в которые столовая работает в переуплотненном режиме (при условии, если количество организованно питающихся> п.22)
 * @property int $field24_1 В I смену Продолжительность перемены (в минутах)
 * @property int $field24_2 в т.ч. перед первым уроком Продолжительность перемены (в минутах)
 * @property int $field24_3 после первого урока Продолжительность перемены (в минутах)
 * @property int $field24_4 после второго урока Продолжительность перемены (в минутах)
 * @property int $field24_5 после третьего урока Продолжительность перемены (в минутах)
 * @property int $field24_6 после четвертого урока Продолжительность перемены (в минутах)
 * @property int $field24_7 после пятого урока Продолжительность перемены (в минутах)
 * @property int $field24_8 после шестого урока Продолжительность перемены (в минутах)
 * @property int $field24_9 после седьмого урока Продолжительность перемены (в минутах)
 * @property int $field24_10 Во II смену Продолжительность перемены (в минутах)
 * @property int $field24_11 в т.ч. перед первым уроком Продолжительность перемены (в минутах)
 * @property int $field24_12 после первого урока Продолжительность перемены (в минутах)
 * @property int $field24_13 после второго урока Продолжительность перемены (в минутах)
 * @property int $field24_14 после третьего урока Продолжительность перемены (в минутах)
 * @property int $field24_15 после четвертого урока Продолжительность перемены (в минутах)
 * @property int $field24_16 после пятого урока Продолжительность перемены (в минутах)
 * @property int $field24_17 В III смену 1-4 кл.
 * @property int $field24_18 в т.ч. перед первым уроком Продолжительность перемены (в минутах)
 * @property int $field24_19 после первого урока Продолжительность перемены (в минутах)
 * @property int $field24_20 после второго урока Продолжительность перемены (в минутах)
 * @property int $field24_21 после третьего урока Продолжительность перемены (в минутах)
 * @property int $field24_22 после четвертого урока Продолжительность перемены (в минутах)
 * @property string $create_at
 */
class DirectorTable24 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director_table_24';
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
                    'field23_1_1',
                    'field23_2_1',
                    'field23_3_1',
                    'field23_4_1',
                    'field23_5_1',
                    'field24_2',
                    'field24_3',
                    'field24_4',
                    'field24_5',
                    'field24_6',
                    'field24_7',
                    'field24_8',
                    'field24_9',
                    'field24_11',
                    'field24_12',
                    'field24_13',
                    'field24_14',
                    'field24_15',
                    'field24_16',
                    'field24_18',
                    'field24_19',
                    'field24_20',
                    'field24_21',
                    'field24_22'
                ],
                'required','message'=>'Данное поле является обязательным при внесении'
            ],
            [
                [
                    'user_id',
                    'field23_1_1',
                    'field23_2_1',
                    'field23_3_1',
                    'field23_4_1',
                    'field23_5_1',
                    'field24_1',
                    'field24_2',
                    'field24_3',
                    'field24_4',
                    'field24_5',
                    'field24_6',
                    'field24_7',
                    'field24_8',
                    'field24_9',
                    'field24_10',
                    'field24_11',
                    'field24_12',
                    'field24_13',
                    'field24_14',
                    'field24_15',
                    'field24_16',
                    'field24_17',
                    'field24_18',
                    'field24_19',
                    'field24_20',
                    'field24_21',
                    'field24_22'
                ],
                'integer','message'=>'Вносимое значение должно быть числовым'
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

            'field23_1_1' => '23.5. Максимальное количество питающихся во время перемены (указывается максимум вовремя одной перемены):',
            'field23_2_1' => '23.6. Количество перемен, в которые столовая работает в переуплотненном режиме: ',
            'field23_3_1' => '23.7. Количество детей, посещающих группы продленного дня: ',
            'field23_4_1' => '23.8. Количество детей, посещающих группу продленного дня, получающих 2-х разовое горячее питание: ',
            'field23_5_1' => '23.9. Количество детей, посещающих группу продленного дня, получающих 3-х разовое питание: ',

            'field24_1' => 'Field24 1',
            'field24_2' => 'Field24 2',
            'field24_3' => 'Field24 3',
            'field24_4' => 'Field24 4',
            'field24_5' => 'Field24 5',
            'field24_6' => 'Field24 6',
            'field24_7' => 'Field24 7',
            'field24_8' => 'Field24 8',
            'field24_9' => 'Field24 9',
            'field24_10' => 'Field24 10',
            'field24_11' => 'Field24 11',
            'field24_12' => 'Field24 12',
            'field24_13' => 'Field24 13',
            'field24_14' => 'Field24 14',
            'field24_15' => 'Field24 15',
            'field24_16' => 'Field24 16',
            'field24_17' => 'Field24 17',
            'field24_18' => 'Field24 18',
            'field24_19' => 'Field24 19',
            'field24_20' => 'Field24 20',
            'field24_21' => 'Field24 21',
            'field24_22' => 'Field24 22',
            'create_at' => 'Create At',
        ];
    }
}
