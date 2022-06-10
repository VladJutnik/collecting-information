<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deti_anket_table_35_44".
 *
 * @property int $id
 * @property int $field35_1
 * @property int $field35_2
 * @property int $field35_3
 * @property int $field35_4
 * @property int $field35_5
 * @property int $field35_6
 * @property int $field36_1
 * @property int $field36_2
 * @property int $field36_3
 * @property int $field37
 * @property int $field38_1
 * @property int $field38_2
 * @property int $field38_3
 * @property int $field38_4
 * @property int $field38_5
 * @property int $field38_6
 * @property int $field38_7
 * @property int $field38_8
 * @property int $field38_9
 * @property int $field38_10
 * @property int $field38_11
 * @property int $field38_12
 * @property int $field38_13
 * @property int $field38_14
 * @property int $field38_15
 * @property int $field38_16
 * @property int $field38_17
 * @property int $field38_18
 * @property int $field39_1
 * @property int $field39_2
 * @property int $field39_3
 * @property int $field39_4
 * @property int $field39_5
 * @property int $field39_6
 * @property int $field39_7
 * @property int $field40
 * @property int $field40_1
 * @property int $field41
 * @property int $field42
 * @property int $field43
 * @property int $field44
 * @property string $create_at
 */
class DetiAnketTable3544 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deti_anket_table_35_44';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'field36_1',
                    'field36_2',
                    'field36_3',
                    'field37',
                    'field41',
                    'field42',
                    'field44',
                ],
                'required',
            ],
            [
                [
                    'field43',
                ],
                'required',
                'when' => function ($model) {
                    return $model->field42 == '1';
                },
                'whenClient' => "function (attribute, value) {
                return $('#detiankettable3544-field42').val() == '1';
            }",
            ],
            [
                [
                    'field38_1',
                    'field38_2',
                    'field38_3',
                    'field38_4',
                    'field38_5',
                    'field38_6',
                    'field38_7',
                    'field38_8',
                    'field38_9',
                    'field38_10',
                    'field38_11',
                    'field38_12',
                    'field38_13',
                    'field38_14',
                    'field38_15',
                    'field38_16',
                    'field38_17',
                    'field38_18',
                    'field39_1',
                    'field39_2',
                    'field39_3',
                    'field39_4',
                    'field39_5',
                    'field39_6',
                    'field40',
                    'field40_1',
                ],
                'required',
                'when' => function ($model) {
                    return $model->field37 == '1' || $model->field37 == '2';
                },
                'whenClient' => "function (attribute, value) {
                return $('#detiankettable3544-field37').val() == '1' || $('#detiankettable3544-field37').val() == '2';
            }",
            ],
            [['field39_7', 'create_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field36_1' => '36.1. питается бесплатно (получает льготу на питание) ',
            'field36_2' => '36.2. комбинированная оплата (льгота+доплата родителей)',
            'field36_3' => '36.3. полная оплата питания родителями',
            'field37' => '37. Покупает ли Ваш ребенок дополнительно к основному школьному питанию еду в школьной столовой/буфете или вендинговом аппарате? ',
            'field38_1' => '38.1. Овощные салаты, овощи готовые к употреблению ',
            'field38_2' => '38.2. Первые блюда ',
            'field38_3' => '38.3. Гарниры ',
            'field38_4' => '38.4. Основные (мясные и рыбные) блюда ',
            'field38_5' => '38.5. в т.ч., сосиски/сардельки ',
            'field38_6' => '38.6. Каши ',
            'field38_7' => '38.7. Молочные продукты, в том числе напитки ',
            'field38_8' => '38.8. Соки фруктовые, фруктово-овощные ',
            'field38_9' => '38.9. Сокосодержащие напитки с добавлением сахара, в том числе нектары, морсы ',
            'field38_10' => '38.10.	Выпечные изделия собственного приготовления (пироги, пицца и др.) ',
            'field38_11' => '38.11.	Бутерброды',
            'field38_12' => '38.12.	Кондитерские изделия промышленного изготовления ',
            'field38_13' => '38.13.	в т.ч., печенье галетное ',
            'field38_14' => '38.14.	батончики злаковые и фруктово-злаковые ',
            'field38_15' => '38.15.	зефир, пастила, мармелад ',
            'field38_16' => '38.16.	Фрукты ',
            'field38_17' => '38.17.	Сладкие газированные напитки ',
            'field38_18' => '38.18.	Вода питьевая бутилированная ',
            'field39_1' => '39.1. Вода питьевая бутилированная',
            'field39_2' => '39.2. Соки, нектары ',
            'field39_3' => '39.3. Молоко ',
            'field39_4' => '39.4. Кисломолочная продукция ',
            'field39_5' => '39.5. Фруктово-злаковые батончики ',
            'field39_6' => '39.6. Иное ',
            'field39_7' => 'Иное ',
            'field40' => '40. Удовлетворяет ли ребенка ассортимент буфетной продукции? ',
            'field40_1' => '40. б. Удовлетворяет ли родителей (опекуна) ассортимент буфетной продукции? ',
            'field41' => '41. Пьет ли Ваш ребенок в школе питьевую воду? ',
            'field42' => '42. Принимает ли Ваш ребенок витаминно-минеральные комплексы, БАДы к пище? ',
            'field43' => '43. Как часто Ваш ребенок принимает витаминно-минеральные комплексы? ',
            'field44' => '44. Оцените уровень физической активности Вашего ребенка (с учетом занятий физической культурой в школе, танцами, в спортивных секциях, активными играми)? ',
            'create_at' => 'Create At',
        ];
    }
}
