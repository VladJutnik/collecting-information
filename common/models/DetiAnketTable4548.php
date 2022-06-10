<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deti_anket_table_45_48".
 *
 * @property int $id
 * @property int $field45_1
 * @property int $field45_2
 * @property int $field45_3
 * @property int $field45_4
 * @property int $field45_5
 * @property int $field45_6
 * @property int $field45_7
 * @property int $field45_8
 * @property int $field45_9
 * @property int $field45_10
 * @property int $field45_11
 * @property int $field45_12
 * @property int $field45_13
 * @property int $field45_14
 * @property int $field45_15
 * @property int $field45_16
 * @property int $field45_17
 * @property int $field45_18
 * @property int $field45_19
 * @property int $field45_20
 * @property int $field45_21
 * @property int $field45_22
 * @property int $field45_23
 * @property int $field45_24
 * @property int $field45_25
 * @property int $field45_26
 * @property int $field45_27
 * @property int $field46_1
 * @property int $field46_2
 * @property int $field46_3
 * @property int $field46_4
 * @property int $field46_5
 * @property int $field46_6
 * @property int $field46_7
 * @property int $field46_8
 * @property int $field46_9
 * @property int $field46_10
 * @property int $field46_11
 * @property int $field46_12
 * @property int $field46_13
 * @property int $field47
 * @property int $field48
 * @property int $field48_1
 * @property string $create_at
 */
class DetiAnketTable4548 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deti_anket_table_45_48';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        //
        return [
            [
                [
                    'field45_1',
                    'field45_2',
                    'field45_3',
                    'field45_4',
                    'field45_5',
                    'field45_6',
                    'field45_7',
                    'field45_8',
                    'field45_9',
                    'field45_10',
                    'field45_11',
                    'field45_12',
                    'field45_13',
                    'field45_14',
                    'field45_15',
                    'field45_16',
                    'field45_17',
                    'field45_18',
                    'field45_19',
                    'field45_20',
                    'field45_21',
                    'field45_22',
                    'field45_23',
                    'field45_24',
                    'field45_25',
                    'field45_26',
                    'field45_27',
                    'field46_1',
                    'field46_2',
                    'field46_3',
                    'field46_4',
                    'field46_5',
                    'field46_6',
                    'field46_7',
                    'field46_8',
                    'field46_9',
                    'field46_10',
                    'field46_11',
                    'field46_12',
                    'field47',
                    'field47_1',
                    'field48',
                ],
                'required',
            ],

            [[
                'field48_1',
            ],'required', 'when' => function($model) {
                return $model->field48 == 'есть';
            }, 'whenClient' => "function (attribute, value) {
                return $('#detiankettable4548-field48').val() == 'есть';
            }"],
            [
                [
                    'field46_13',
                    'create_at',
                ],
                'safe',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field45_1' => '45 a. Каши и блюда из зерновых',
            'field45_2' => '45 b. Макароны',
            'field45_3' => '45 c. Мясо говядины, свинины и др.',
            'field45_4' => '45 d. Мясо птицы: курица, индейка и др.',
            'field45_5' => '45 e. Молоко, кефир, ряженка и др. жидкие молочные продукты ',
            'field45_6' => '45 f. Творог и блюда из него – запеканки, суфле, сырники и др. ',
            'field45_7' => '45 g. Сырки, сладкие творожные десерты',
            'field45_8' => '45 h. Рыба и блюда из рыбы',
            'field45_9' => '45 i. Овощи (кроме картофеля)',
            'field45_10' => '45 j. Картофель',
            'field45_11' => '45 k. Фрукты',
            'field45_12' => '45 l. Колбаса, сосиски, сардельки',
            'field45_13' => '45 m. Яйца и блюда из яиц',
            'field45_14' => '45 n. Продукты фаст-фуда (гамбургеры, пицца, шаверма и др)',
            'field45_15' => '45 o. Чипсы, сухарики',
            'field45_16' => '45 р. Кетчуп',
            'field45_17' => '45 q. Майонез',
            'field45_18' => '45 r. Сдобная выпечка, пироги',
            'field45_19' => '45 s. Торты, пирожные',
            'field45_20' => '45 t. Шоколад, шоколадные конфеты, батончики (Марс, Твикс и др.)',
            'field45_21' => '45 u. Карамель, зефир, пастила и др.',
            'field45_22' => '45 v. Сладкие газированные напитки',
            'field45_23' => '45 w. Соки фруктовые',
            'field45_24' => '45 x. Напитки с добавлением сахара (компот, кисель, морс и др.)',
            'field45_25' => '45 y. Питьевая вода ',
            'field45_26' => '45 z. Сколько чайных ложек или кусков сахара обычно ребенок добавляет на чашку (стакан) чая или другого горячего напитка ',
            'field45_27' => '45 aa. Досаливает ли ребенок пищу когда ест? ',
            'field46_1' => '46.1. фаст-фуд ',
            'field46_2' => '46.2. чипсы ',
            'field46_3' => '46.3. шоколад, конфеты ',
            'field46_4' => '46.4. пирожные',
            'field46_5' => '46.5. булочки, пироги ',
            'field46_6' => '46.6. пряники, печенье ',
            'field46_7' => '46.7. зефир, мармелад ',
            'field46_8' => '46.8. мороженое',
            'field46_9' => '46.9. соки, нектары ',
            'field46_10' => '46.10.	вода питьевая бутилированная ',
            'field46_11' => '46.11.	сладкие газированные напитки ',
            'field46_12' => '46.12.	Иное ',
            'field46_13' => 'Иное ',
            'field47' => '47.1. Ваша оценка питания в школе? ',
            'field47_1' => '47.2. Ваша оценка питания дома? ',
            'field48' => '48. Ваши предложения по улучшению питания детей в школе ',
            'field48_1' => 'Ваши предложения',
            'create_at' => 'Create At',
        ];
    }
}
