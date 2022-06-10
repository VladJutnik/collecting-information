<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deti_anket_table_18_27".
 *
 * @property int $id
 * @property int $field18_1
 * @property int $field18_2
 * @property int $field18_3
 * @property int $field18_4
 * @property int $field18_5
 * @property int $field18_6
 * @property int $field18_7
 * @property int $field18_8
 * @property int $field18_9
 * @property int $field18_10
 * @property int $field18_11
 * @property int $field18_12
 * @property int $field18_13
 * @property int $field18_14
 * @property int $field18_15
 * @property int $field18_16
 * @property int $field18_17
 * @property int $field18_18
 * @property int $field19
 * @property int $field20
 * @property int $field21_1
 * @property int $field21_2
 * @property int $field21_3
 * @property int $field21_4
 * @property int $field21_5
 * @property int $field22
 * @property int $field23
 * @property int $field24
 * @property int $field25
 * @property int $field26
 * @property int $field27
 * @property string $create_at
 */
class DetiAnketTable1827 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deti_anket_table_18_27';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'field18_1',
                    'field18_2',
                    'field18_3',
                    'field18_4',
                    'field18_5',
                    'field18_6',
                    'field18_7',
                    'field18_8',
                    'field18_9',
                    'field18_10',
                    'field18_11',
                    'field18_12',
                    'field18_13',
                    'field18_14',
                    'field18_15',
                    'field18_16',
                    'field18_17',
                    'field19',
                    'field20',
                    'field20_1',
                    'field21_1',
                    'field21_2',
                    'field21_3',
                    'field21_4',
                    'field21_5',
                    'field22',
                    'field22_1',
                    'field23',
                    'field24',
                    'field25',
                ],
                'required',
            ],
            /*[[
                'field22_1',
            ],'required', 'when' => function($model) {
                return $model->field22 !== 97 || $model->field22 !== 98;
            }, 'whenClient' => "function (attribute, value) {
                return $('#detiankettable1827-field22').val() !== 97 || $('#detiankettable1827-field22').val() !== 98;
            }"],*/
            [['field18_18', 'create_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field18_1' => '18.1. Сердечно-сосудистой системы:',
            'field18_2' => '18.2. Органов дыхания:',
            'field18_3' => '18.3. Органов пищеварения:',
            'field18_4' => '18.4. Нервной системы:',
            'field18_5' => '18.5. Нарушения осанки:',
            'field18_6' => '18.6. Плоскостопие:',
            'field18_7' => '18.7. Нарушения остроты зрения:',
            'field18_8' => '18.8. Избыточный вес:',
            'field18_9' => '18.9. Ожирение:',
            'field18_10' => '18.10.	Дефицит массы:',
            'field18_11' => '18.11.	Анемии:',
            'field18_12' => '18.12.	Болезни щитовидной железы:',
            'field18_13' => '18.13.	Пищевая аллергия:',
            'field18_14' => '18.14.	Сахарный диабет:',
            'field18_15' => '18.15.	Муковисцидоз:',
            'field18_16' => '18.16.	Целиакия:',
            'field18_17' => '18.17.	Фенилкетонурия:',
            'field18_18' => '18. Иные (свободное поле – нужно указать какое заболевание есть у ребенка, не вошедшее в вышеперечисленные группы):',
            'field19' => '19. Как часто Ваш ребенок болел ОРЗ за последние 12 месяцев?',
            'field20' => '20. Знакомы ли Вы и Ваша семья с принципами здорового питания?',
            'field20_1' => '20.а. Придерживаетесь ли Вы и Ваша семья в домашнем питании принципов здорового питания?',
            'field21_1' => '21.1. Овощные блюда (не включая картофельные) используются в 2-х и более приемах пищи ежедневно (овощные супы, салаты, гарниры и др.):',
            'field21_2' => '21.2. Фрукты ежедневно присутствуют в рационе питания членов семьи в количестве не менее 250-300 г (средний вес яблока, груши, апельсина – 120 -130 г):',
            'field21_3' => '21.3. При выборе хлеба и хлебобулочных изделий, вы отдаете приоритет продуктам из муки второго сорта с присутствием цельных злаков, отрубей и прочего:',
            'field21_4' => '21.4. Блюда из рыбы присутствуют в рационе еженедельно:',
            'field21_5' => '21.5. Ежедневно в питании используется 2-3 молочных продукта (включая молочные блюда и напитки):',
            'field22' => '22.1. Откуда Вы получаете информацию о принципах здорового питания? (первый наиболее значимый для вас источник информации)',
            'field22_1' => '22.2. Откуда Вы получаете информацию о принципах здорового питания? (второй наиболее значимый для вас источник информации)',
            'field23' => '23. Сколько раз в день Ваш ребенок принимает пищу в учебные дни?',
            'field24' => '24. Сколько раз в день Ваш ребенок принимает пищу в выходные дни?',
            'field25' => '25. Ребенок завтракает дома перед уходом в школу?',
            'create_at' => 'Дата заполнения анкеты',
        ];
    }
}
