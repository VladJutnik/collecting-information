<?php

use common\models\DetiAnket;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Выгрузка данных в виде матрицы';

$itogArr = [];
$numStr = [
    ['', '<b>ОБЩАЯ ИНФОРМАЦИЯ</b>', 1],
    [1, '<b>Количество школ, принявших участие в анкетировании</b>', 2],
    [2, '<b>Количество обучающихся принявших участие в анкетировании</b>', 3],
    ['', 'из них, мальчиков (юношей)', 4],
    ['', 'девочек (девушек)', 5],
    [3, '<b>Полнота семей</b>', 6],
    ['', 'семья полная', 7],
    ['', 'семья не полнаая', 8],
    ['', 'Отказ от ответа по полноте семьи', 9],
    [4, '<b>Образование матери</b>', 10],
    ['', 'среднее', 11],
    ['', 'среднее профессиональное', 12],
    ['', 'высшее', 13],
    ['', 'имеется ученая степень', 14],
    ['', 'Отказ от ответа по отразованию матери', 15],
    [5, '<b>Образование отца</b>', 16],
    ['', 'среднее', 17],
    ['', 'среднее профессиональное', 18],
    ['', 'высшее', 19],
    ['', 'имеется ученая степень', 20],
    ['', 'Отказ от ответа по отразованию отца', 21],
    [6, '<b>Уровень доходов в семье</b>', 22],
    ['', 'низкий', 23],
    ['', 'ниже среднего', 24],
    ['', 'средний', 25],
    ['', 'выше среднего', 26],
    ['', 'высокий', 27],
    ['', 'Отказ от ответа о доходах семьи', 28],
    [7, '<b>Смена обучения</b>', 29],
    ['', 'первая', 30],
    ['', 'вторая', 31],
    ['', 'третья', 32],
    [8, '<b>Количество школьников, находящихся в школе 6 ч. и более</b>', 33],
    [9, '<b>Количество школьников, посещающих группу продленного дня</b>', 34],
    ['', 'Отказ от ответа', 35],
    [10, '<b>Количество школьников, охваченных дополнительным образованием (кружки, студии, спортивные секции)</b>', 36],
    ['', 'Отказ от ответа', 37],
    [11, '<b>Количество школьников, задерживающихся в школе после уроков</b>', 38],
    ['', 'Отказ от ответа', 39],
    [12, '<b>ХАРАКТЕРИСТИКА индекса массы тела матерей</b>', 40],
    ['', 'Количество матерей с дефицитом массы тела', 41],
    ['', 'Количество матерей с нормальной массой тела', 42],
    ['', 'Количество матерей с избыточной массой тела', 43],
    ['', 'Количество матерей с ожирением', 44],
    ['', 'Количество матерей с ожирением I - степени', 45],
    ['', 'Количество матерей с ожирением II - степени', 46],
    ['', 'Количество детей с ожирением III - степени', 47],
    ['', 'Отказ от ответа ', 48],
    [13, '<b>ХАРАКТЕРИСТИКА индекса массы тела отцов</b>', 49],
    ['', 'Количество отцов с дефицитом массы тела', 50],
    ['', 'Количество отцов с нормальной массой тела', 51],
    ['', 'Количество отцов с избыточной массой тела', 52],
    ['', 'Количество отцов с ожирением', 53],
    ['', 'Количество отцов с ожирением I - степени', 54],
    ['', 'Количество отцов с ожирением II - степени', 55],
    ['', 'Количество отцов с ожирением III - степени', 56],
    ['', 'Отказ от ответа ', 57],
    [14, '<b>Количество детей с нарушениями здоровья</b>', 58],
    ['', 'болезни системы кровообращения', 59],
    ['', 'болезни органов дыхания', 60],
    ['', 'болезни органов пищеварения', 61],
    ['', 'болезни нервной системы', 62],
    ['', 'нарушения осанки', 63],
    ['', 'плоскостопие', 64],
    ['', 'нарушения остроты зрения', 65],
    ['', 'анемии', 66],
    ['', 'болезни щитовидной железы', 67],
    ['', 'пищевая аллергия', 68],
    ['', 'сахарный диабет', 69],
    ['', 'муковисцидоз', 70],
    ['', 'целиакия', 71],
    ['', 'фенилкетонурия', 72],
    ['', 'Отказ от ответа по заболеваниям ', 73],
    ['', 'ЧБД', 74],
    ['', 'Отказ от ответа по ЧБД', 75],
    [15, '<b>Вопросы по здоровому образу жизни</b>', 76],
    ['', 'знают принципы здорового питания', 77],
    ['', 'НЕ знают принципов здорового питания', 78],
    ['', 'Отказ от ответа о знании принципов ЗП', 79],
    ['', 'семья придерживается принципов здорового питания', 80],
    ['', 'семья НЕ придерживается принципов здорового питания', 81],
    ['', 'Отказ от ответа о соблюдении принципов ЗП', 82],
    [16, '<b>Частота и количество потребления отдельных продуктов и блюд в семье</b>', 83],
    ['', 'Овощные блюда присутствуют ежедневно в 2-х и более приемах пищи ', 84],
    ['', 'Овощные блюда НЕ присутствуют ежедневно в 2-х и более приемах пищи ', 85],
    ['', 'Отказ от ответа', 86],
    ['', 'Фрукты потребляют ежедневно не менее 250-300 г ', 87],
    ['', 'Фрукты НЕ потребляют ежедневно не менее 250-300 г ', 88],
    ['', 'Отказ от ответа', 89],
    ['', 'При выборе хлеба в приоритете продукты из муки второго сорта с присутствием цельных злаков', 90],
    ['', 'При выборе хлеба в НЕ приоритете продукты из муки второго сорта с присутствием цельных злаков', 91],
    ['', 'Отказ от ответа', 92],
    ['', 'Блюда из рыбы присутствуют в рационе еженедельно', 93],
    ['', 'Блюда из рыбы НЕ присутствуют в рационе еженедельно', 94],
    ['', 'Отказ от ответа', 95],
    ['', 'В питании НЕ используется 2-3 молочных продукта (включая блюда) ежедневно', 96],
    ['', 'Ежедневно в питании используется 2-3 молочных продукта (включая блюда)', 97],
    ['', 'Отказ от ответа', 98],
    [17, '<b>Источники информации о принципах здорового питания (приоритетные)</b>', 99],
    ['', 'медицинские работники', 100],
    ['', 'телевидени', 101],
    ['', 'интернет', 102],
    ['', 'научные издания', 103],
    ['', 'печатные издания (газеты, журналы)', 104],
    ['', 'родственники', 105],
    ['', 'Отказ от ответа', 106],
    [18, '<b>Количество приемов пищи (в учебные дни)</b>', 107],
    ['', 'менее трех', 108],
    ['', 'три', 109],
    ['', 'четыре', 110],
    ['', 'пять и более ', 111],
    ['', 'Отказ от ответа', 112],
    [19, '<b>Количество приемов пищи (в выходные дни)</b>', 113],
    ['', 'менее трех', 114],
    ['', 'три', 115],
    ['', 'четыре', 116],
    ['', 'пять и более ', 117],
    ['', 'Отказ от ответа', 118],
    [20, 'Ребенок ВСЕГДА кушает перед уходом в школу', 119],
    ['', 'Ребенок ИНОГДА кушает перед уходом в школу', 120],
    ['', 'Ребенок НИКОГДА НЕ кушает перед уходом в школу', 121],
    ['', 'Отказ от ответа', 122],
    [21, 'Ребенок ВСЕГДА кушает в школьной столовой', 123],
    ['', 'Ребенок ИНОГДА кушает в школьной столовой', 124],
    ['', 'Ребенок НИКОГДА НЕ кушает в школьной столовой', 125],
    ['', 'Отказ от ответа', 126],
    [22, '<b>Интервал между приемом пищи дома и первым приемом пищи в школе</b>', 127],
    ['', 'менее 2-х часов', 128],
    ['', 'от двух до трех часов', 129],
    ['', 'от трех часов до четырех часов ', 130],
    ['', 'от четырех часов до шести', 131],
    ['', 'более шести часов', 132],
    ['', 'Отказ от ответа', 133],
    [23, 'количество детей, получающих в школе бесплатный горячий завтрак', 134],
    ['', 'количество детей, получающих в школе ПЛАТНЫЙ горячий завтрак', 135],
    ['', 'количество детей, получающих в школе бесплатный горячий обед', 136],
    ['', 'количество детей, получающих в школе ПЛАТНЫЙ горячий обед', 137],
    ['', 'количество детей, получающих в школе бесплатный полдник', 138],
    ['', 'количество детей, получающих в школе ПЛАТНЫЙ полдник', 139],
    ['', 'количество детей, покупающих еду в буфете (вендинговом аппарате) дополнительно к организованному к питанию', 140],
    ['', 'количество детей, покупающих еду в буфете (вендинговом аппарате), а вместе со всеми детьми организованно не питается ', 141],
    ['', 'Отказ от ответа', 142],
    [24, 'количество детей, обедающих в школьной столовой', 143],
    ['', 'количество детей, приобретающих обед в школьном буфете', 144],
    ['', 'количество детей, приобретающих обед через вендинговые аппараты', 145],
    ['', 'количество детей, кушающих на обед еду приносимую из дома', 146],
    ['', 'количество детей, обедающих дома', 147],
    ['', 'количество НЕ обедающих детей', 148],
    ['', 'Отказ от ответа', 149],
    [25, 'Набор блюд получающих (приобретаемых) на обед ребенком в школе</b>', 150],
    ['', 'обед из трех блюд', 151],
    ['', 'только первые блюда', 152],
    ['', 'только вторые блюда', 153],
    ['', 'только салат', 154],
    ['', 'первое блюдо и салат', 155],
    ['', 'первое блюдо, салат и напиток', 156],
    ['', 'второе блюдо и салат', 157],
    ['', 'второе блюдо, салат и напиток', 158],
    ['', 'первое блюдо и второе блюдо', 159],
    ['', 'другое блюдо', 160],
    ['', 'Отказ от ответа', 161],
    [26, 'количество детей ВСЕГДА полностью съедающих школьный завтрак', 162],
    ['', 'количество детей НЕ ВСЕГДА полностью съедающих школьный завтрак', 163],
    ['', 'количество детей НИКОГДА полностью НЕ съедающих школьный завтрак', 164],
    ['', 'количество детей у которых данный прием пищи отсутствует', 165],
    ['', 'Отказ от ответа', 166],
    [27, 'количество детей ВСЕГДА полностью съедающих школьный обед', 167],
    ['', 'количество детей НЕ ВСЕГДА полностью съедающих школьный обед', 168],
    ['', 'количество детей НИКОГДА полностью НЕ съедающих школьный обед', 169],
    ['', 'количество детей у которых данный прием пищи отсутствует', 170],
    ['', 'Отказ от ответа', 171],
    [28, 'количество детей ВСЕГДА полностью съедающих школьный полдник', 172],
    ['', 'количество детей НЕ ВСЕГДА полностью съедающих школьный полдник', 173],
    ['', 'количество детей НИКОГДА полностью НЕ съедающих школьный полдник', 174],
    ['', 'количество детей у которых данный прием пищи отсутствует', 175],
    ['', 'Отказ от ответа', 176],
    [29, 'количество детей, которым ВСЕГДА хватает объемов порций, выдаваемых в школе', 177],
    ['', 'количество детей, которым НЕ ВСЕГДА хватает объемов порций, выдаваемых в школе', 178],
    ['', 'количество детей, которым НИКОГДА НЕ хватает объемов порций, выдаваемых в школе', 179],
    ['', 'Отказ от ответа', 180],
    [30, 'количество детей, считающих продолжительность перемен для приема пищи достаточными ', 181],
    ['', 'количество детей, считающих продолжительность перемен для приема пищи НЕ достаточными ', 182],
    ['', 'Отказ от ответа', 183],
    [31, 'количество детей, которым нравится обстановка в школьной столовой', 184],
    ['', 'количество детей, которым НЕ нравится обстановка в школьной столовой', 185],
    ['', 'Отказ от ответа', 186],
    [32, '<b>Количество респондентов, отмечающих что в школьной столовой: </b>', 187],
    ['', 'грязно', 188],
    ['', 'мало места и много детей', 189],
    ['', 'нужно долго ждать, чтобы получить еду', 190],
    ['', 'еда часто бывает отсывшей', 191],
    ['', 'еда не вкусной', 192],
    ['', 'не нравится сервировка', 193],
    ['', 'часто плохо пахнет', 194],
    ['', 'мало времени на прием пищи', 195],
    ['', 'не хватает посуды', 196],
    ['', 'Отказ от ответа', 197],
    [33, '<b>Причины, почему ребенок не питается в школьной столовой</b>', 198],
    ['', 'в школе нет столовой', 199],
    ['', 'не устраивает качество предлагаемых блюд', 200],
    ['', 'берут еду их дома', 201],
    ['', 'дорого', 202],
    ['', 'требуется специальная диета', 203],
    ['', 'другие причины', 204],
    ['', 'Отказ от ответа', 205],
    [34, '<b>Как оплачивается питание детей в школе</b>', 206],
    ['', 'Количество детей получающих бесплатное питание', 207],
    ['', 'Количество детей получающих льготное питание (частичная оплата)', 208],
    ['', 'Количество детей получающихпитаниеза родительскую плату', 209],
    ['', 'Отказ от ответа', 210],
    [35, '<b>Дополнительное питание к основному</b>', 211],
    ['', 'Количество детей, покупающих РЕГУЛЯРНО дополнительную еду в столовой/буфете или вендинговом аппарате', 212],
    ['', 'Количество детей, ИНОГДА покупающих  дополнительную еду в столовой/буфете или вендинговом аппарате', 213],
    ['', 'Количество детей, НЕ покупающих дополнительную еду при наличии такой возможности', 214],
    ['', 'Количество детей, НЕ покупающих дополнительную еду по причине ОТСУТСТВИЯ такой возможности', 215],
    ['', 'Отказ от ответа', 216],
    [36, '<b>Какому блюду отдается предпочтение при самостоятельном приобретении его в школьной столовой</b>', 217],
    ['', 'овощные салаты, овощи готовые к утореблению', 218],
    ['', 'первые блюда', 219],
    ['', 'гарниры', 220],
    ['', 'основные мясные и рыбные блюда', 221],
    ['', 'в т.ч. сосиски или сардельки', 222],
    ['', 'каши', 223],
    ['', 'молочные продукты, в т.ч. напитки', 224],
    ['', 'соки фруктовые, фруктово-овощные', 225],
    ['', 'сокосодержащие напитки', 226],
    ['', 'выпечные изделия собственного приготовления (пироги, пицца)', 227],
    ['', 'бутерброды', 228],
    ['', 'кондитерские изделия промышленного изготовления', 229],
    ['', 'в т.ч., фруктово-злаковые батончики', 230],
    ['', 'фрукты', 231],
    ['', 'сладкие газированные напики', 232],
    ['', 'вода питьевая бутилированная', 233],
    ['', 'Отказ от ответа', 234],
    [37, '<b>Какому продукту отдается респондентом предпочтение при покупке в вендинговом аппарате в школе </b>', 235],
    ['', 'вода питьевая бутилированная', 236],
    ['', 'соки, нектары', 237],
    ['', 'молоко', 238],
    ['', 'кисломолочная продукция', 239],
    ['', 'фруктово-злаковые батончики', 240],
    ['', 'иное', 241],
    ['', 'Отказ от ответа', 242],
    [38, 'Количество детей, которых устраивает ассортимент буфетной продукции ', 243],
    ['', 'Количество детей, которых НЕ устраивает ассортимент буфетной продукции ', 244],
    ['', 'Отказ от ответа', 245],
    [39, 'Количество родителей, которых устраивает ассортимент буфетной продукции ', 246],
    ['', 'Количество родителей, которых НЕ устраивает ассортимент буфетной продукции ', 247],
    ['', 'Отказ от ответа', 248],
    [40, 'Количество детей, употребляющих ВМК и (или) БАДы', 249],
    ['', 'Количество детей, НЕ употребляющих ВМК и (или) БАДы', 250],
    ['', 'Отказ от ответа', 251],
    [41, '<b>Частота потребления ВМК и БАДов</b>', 252],
    ['', 'постоянно', 253],
    ['', '2-3 раза в год курсами', 254],
    ['', '1 раз в год курсом', 255],
    ['', 'принимает не регулярно', 256],
    ['', 'Отказ от ответа', 257],
    [42, '<b>Уровень физической активности ребенка</b>', 258],
    ['', 'посещают спортивные секции 3 и более раза в неделю', 259],
    ['', 'посещают спортивные секции менее 3 раз в неделю', 260],
    ['', 'участвуют ежедневно в подвижных играх не менее 60 минут в день', 261],
    ['', 'участвуют в подвижных играх 2-3 раза в неделю', 262],
    ['', 'спортом не занимаются', 263],
    ['', 'Отказ от ответа', 264],
    [43, '<b>Частота потребления вредных продуктов и блюд</b>', 265],
    ['', 'колбасные изделия (каждый день)', 266],
    ['', 'фаст-фуд (1 раз в неделю и чаще)', 267],
    ['', 'чипсы, сухарики (1 раз в неделю и чаще)', 268],
    ['', 'кетчуп (3 раза в неделю и чаще)', 269],
    ['', 'майонез (3 раза в неделю и чаще)', 270],
    ['', 'сдобная выпечка и пироги (3 раза в неделю и чаще)', 271],
    ['', 'торты, пирожные (1 раз в неделю и чаще)', 272],
    ['', 'шоколад 3-4 раза в неделю и чаще', 273],
    ['', 'карамель, зефир, пастила (3 раза в неделю и чаще)', 274],
    ['', 'сладкие газированные напитки (3 раза в неделю и чаще)', 275],
    ['', 'Отказ от ответа', 276],
    [44, '<b>Добавляют в чай три чайных ложки сахара и больше</b>', 277],
    ['', 'Отказ от ответа', 278],
    [45, '<b>Имеется привычка досаливать блюда</b>', 279],
    ['', 'Отказ от ответа', 280],
    [46, '<b>Чем ребенок привык перекусывать вне школы и дома</b>', 281],
    ['', 'фаст фуд', 282],
    ['', 'чипсы, сухарики (1 раз в неделю и чаще)', 283],
    ['', 'шоколад, конфеты', 284],
    ['', 'пирожные', 285],
    ['', 'булочки, пироги', 286],
    ['', 'пряники, печенье', 287],
    ['', 'мороженое', 288],
    ['', 'соки, нектары', 289],
    ['', 'вода питьевая бутилированная', 290],
    ['', 'сладкие газированные напитки', 291],
    ['', 'Отказ от ответа', 292],
    [47, '<b>Общая оценка питания в школе</b>', 293],
    ['', 'Количество респондентов, оценивших питание в школе на оценку ХОРОШО', 294],
    ['', 'Количество респондентов, оценивших питание в школе на оценку УДОВЛЕТВОРИТЕЛЬНО', 295],
    ['', 'Количество респондентов, оценивших питание в школе на оценку плохо', 296],
    ['', 'Отказ от ответа', 297],
    [48, '<b>Количество респондентов имеющих предложения по улучшению школьного питания</b>', 298],
];

?>
    <div class="list-patients-report-form container">
        <?php
        $form = ActiveForm::begin();
        ?>
        <?=
        $this->render(
            '/report/_title-report',
            [
                'form' => $form,
                'modelReport' => $modelReport,

                'district_items' => $district_items,
                'region_items' => $region_items,
                'municipality_items' => $municipality_items,
                'org_items' => $org_items,

                'hasAccessFederalDistrict' => $hasAccessFederalDistrict,
                'hasAccessRegion' => $hasAccessRegion,
                'hasAccessMunicipality' => $hasAccessMunicipality,
                'hasAccessOrg' => $hasAccessOrg,
                'hasAccessTerrain' => $hasAccessTerrain,
                'hasAccessTypeSchool' => $hasAccessTypeSchool,
                'hasAccessSex' => $hasAccessSex,
                'hasAccessClass' => $hasAccessClass,
                'hasAccessShow' => $hasAccessShow,
            ]
        ); ?>
        <div class="form-group row">
            <?= Html::submitButton('Показать', ['class' => 'btn btn-success main-color form-control col-12 mt-3']) ?>
        </div>
        <?php
        ActiveForm::end(); ?>

    </div>
<?
if ($result) { ?>
    <div class="container">
        <h5>Количество посчитанных анкет: <?=$resultAnketCount['countAnket']?></h5>
        <h5>Количество НЕ учтенных анкет: <?=$resultAnketCount['countUnaccountedFor']?></h5>
        <input type="button" class="btn btn-warning btn-block table2excel mb-3 mt-3"
               title="Вы можете скачать в формате Excel" value="Скачать в Excel" id="pechat222">
    </div>
    <h4 class="text-center">Выгрузка данных по анкетам для родителей и детей</h4>
    <div class="table-responsive">
        <table id="tableId2" class="table table-bordered table-sm table2excel_with_colors">
            <tr class="text-center">
                <th rowspan="2" colspan="2">Показатели</th>
                <th colspan="8" class="bg-info">городские (1-4 класс)</th>
                <th colspan="8" >городские (5-9 класс)</th>
                <th colspan="8" class="bg-info">городские (10-11 класс)</th>
                <th colspan="8" class="bg-secondary">городские (ВСЕ)</th>
                <th colspan="8" class="bg-info">сельские (1-4 класс)</th>
                <th colspan="8" >сельские (5-9 класс)</th>
                <th colspan="8" class="bg-info">сельские (10-11 класс)</th>
                <th colspan="8" class="bg-secondary">сельские (ВСЕ)</th>
                <th colspan="8" class="bg-info">Все (1-4 класс)</th>
                <th colspan="8" >Все (5-9 класс)</th>
                <th colspan="8" class="bg-info">Все (10-11 класс)</th>
                <th colspan="8" class="bg-primary">Все респонденты (1-11 кл)</th>
            </tr>
            <tr class="text-center">
                <!--<th colspan="8" class="bg-info">городские (1-4 класс)</th>-->
                <th class="bg-info">дефицит МТ</th>
                <th class="bg-info">недост МТ</th>
                <th class="bg-info">норм МТ</th>
                <th class="bg-info">изб МТ</th>
                <th class="bg-info">ожир 1 ст</th>
                <th class="bg-info">ожир 2 ст</th>
                <th class="bg-info">ожир 3 ст</th>
                <th class="bg-info">итого</th>
                <!--<th colspan="8" >городские (5-9 класс)</th>-->
                <th>дефицит МТ</th>
                <th>недост МТ</th>
                <th>норм МТ</th>
                <th>изб МТ</th>
                <th>ожир 1 ст</th>
                <th>ожир 2 ст</th>
                <th>ожир 3 ст</th>
                <th>итого</th>
                <!--<th colspan="8" class="bg-info">городские (10-11 класс)</th>-->
                <th class="bg-info">дефицит МТ</th>
                <th class="bg-info">недост МТ</th>
                <th class="bg-info">норм МТ</th>
                <th class="bg-info">изб МТ</th>
                <th class="bg-info">ожир 1 ст</th>
                <th class="bg-info">ожир 2 ст</th>
                <th class="bg-info">ожир 3 ст</th>
                <th class="bg-info">итого</th>
                <!--<th colspan="8" class="bg-secondary">городские (ВСЕ)</th>-->
                <th class="bg-secondary">дефицит МТ</th>
                <th class="bg-secondary">недост МТ</th>
                <th class="bg-secondary">норм МТ</th>
                <th class="bg-secondary">изб МТ</th>
                <th class="bg-secondary">ожир 1 ст</th>
                <th class="bg-secondary">ожир 2 ст</th>
                <th class="bg-secondary">ожир 3 ст</th>
                <th class="bg-secondary">итого</th>
                <!--<th colspan="8" class="bg-info">сельские (1-4 класс)</th>-->
                <th class="bg-info">дефицит МТ</th>
                <th class="bg-info">недост МТ</th>
                <th class="bg-info">норм МТ</th>
                <th class="bg-info">изб МТ</th>
                <th class="bg-info">ожир 1 ст</th>
                <th class="bg-info">ожир 2 ст</th>
                <th class="bg-info">ожир 3 ст</th>
                <th class="bg-info">итого</th>
                <!--<th colspan="8" >сельские (5-9 класс)</th>-->
                <th>дефицит МТ</th>
                <th>недост МТ</th>
                <th>норм МТ</th>
                <th>изб МТ</th>
                <th>ожир 1 ст</th>
                <th>ожир 2 ст</th>
                <th>ожир 3 ст</th>
                <th>итого</th>
                <!--<th colspan="8" class="bg-info">сельские (10-11 класс)</th>-->
                <th class="bg-info">дефицит МТ</th>
                <th class="bg-info">недост МТ</th>
                <th class="bg-info">норм МТ</th>
                <th class="bg-info">изб МТ</th>
                <th class="bg-info">ожир 1 ст</th>
                <th class="bg-info">ожир 2 ст</th>
                <th class="bg-info">ожир 3 ст</th>
                <th class="bg-info">итого</th>
                <!--<th colspan="8" class="bg-secondary">сельские (ВСЕ)</th>-->
                <th class="bg-secondary">дефицит МТ</th>
                <th class="bg-secondary">недост МТ</th>
                <th class="bg-secondary">норм МТ</th>
                <th class="bg-secondary">изб МТ</th>
                <th class="bg-secondary">ожир 1 ст</th>
                <th class="bg-secondary">ожир 2 ст</th>
                <th class="bg-secondary">ожир 3 ст</th>
                <th class="bg-secondary">итого</th>
                <!--<th colspan="8" class="bg-info">Все (1-4 класс)</th>-->
                <th class="bg-info">дефицит МТ</th>
                <th class="bg-info">недост МТ</th>
                <th class="bg-info">норм МТ</th>
                <th class="bg-info">изб МТ</th>
                <th class="bg-info">ожир 1 ст</th>
                <th class="bg-info">ожир 2 ст</th>
                <th class="bg-info">ожир 3 ст</th>
                <th class="bg-info">итого</th>
                <!--<th colspan="8" >Все (5-9 класс)</th>-->
                <th>дефицит МТ</th>
                <th>недост МТ</th>
                <th>норм МТ</th>
                <th>изб МТ</th>
                <th>ожир 1 ст</th>
                <th>ожир 2 ст</th>
                <th>ожир 3 ст</th>
                <th>итого</th>
                <!--<th colspan="8" class="bg-info">Все (10-11 класс)</th>-->
                <th class="bg-info">дефицит МТ</th>
                <th class="bg-info">недост МТ</th>
                <th class="bg-info">норм МТ</th>
                <th class="bg-info">изб МТ</th>
                <th class="bg-info">ожир 1 ст</th>
                <th class="bg-info">ожир 2 ст</th>
                <th class="bg-info">ожир 3 ст</th>
                <th class="bg-info">итого</th>
                <!--<th colspan="8" class="bg-primary">Все респонденты (1-11 кл)</th>-->
                <th class="bg-primary">дефицит МТ</th>
                <th class="bg-primary">недост МТ</th>
                <th class="bg-primary">норм МТ</th>
                <th class="bg-primary">изб МТ</th>
                <th class="bg-primary">ожир 1 ст</th>
                <th class="bg-primary">ожир 2 ст</th>
                <th class="bg-primary">ожир 3 ст</th>
                <th class="bg-primary">итого</th>
            </tr>
           <?
           for($i = 0; $i < count($numStr); $i++){?>
                <tr>
                    <td><?=$numStr[$i][0]?></td>
                    <td><?=$numStr[$i][1]?></td>
                    <!--городские (1-4 класс)-->
                    <?$summGor14 = 0;?>
                    <td class="text-center"><?if(isset($result['city']['14']['dif'][$numStr[$i][2]])){$summGor14 += (int)$result['city']['14']['dif'][$numStr[$i][2]];echo $result['city']['14']['dif'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['14']['nedost'][$numStr[$i][2]])) {$summGor14 += (int)$result['city']['14']['nedost'][$numStr[$i][2]];echo $result['city']['14']['nedost'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['14']['norm'][$numStr[$i][2]])) {$summGor14 += (int)$result['city']['14']['norm'][$numStr[$i][2]];echo $result['city']['14']['norm'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['14']['izbitok'][$numStr[$i][2]])) {$summGor14 += (int)$result['city']['14']['izbitok'][$numStr[$i][2]];echo $result['city']['14']['izbitok'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['14']['ojir1'][$numStr[$i][2]])) {$summGor14 += (int)$result['city']['14']['ojir1'][$numStr[$i][2]];echo $result['city']['14']['ojir1'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['14']['ojir2'][$numStr[$i][2]])) {$summGor14 += (int)$result['city']['14']['ojir2'][$numStr[$i][2]];echo $result['city']['14']['ojir2'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['14']['ojir3'][$numStr[$i][2]])) {$summGor14 += (int)$result['city']['14']['ojir3'][$numStr[$i][2]];echo $result['city']['14']['ojir3'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><?= $summGor14?></td>
                    <!--городские (5-9 класс)-->
                    <?$summGor59 = 0;?>
                    <td class="text-center"><?if(isset($result['city']['59']['dif'][$numStr[$i][2]])){$summGor59 += (int)$result['city']['59']['dif'][$numStr[$i][2]];echo $result['city']['59']['dif'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['59']['nedost'][$numStr[$i][2]])) {$summGor59 += (int)$result['city']['59']['nedost'][$numStr[$i][2]];echo $result['city']['59']['nedost'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['59']['norm'][$numStr[$i][2]])) {$summGor59 += (int)$result['city']['59']['norm'][$numStr[$i][2]];echo $result['city']['59']['norm'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['59']['izbitok'][$numStr[$i][2]])) {$summGor59 += (int)$result['city']['59']['izbitok'][$numStr[$i][2]];echo $result['city']['59']['izbitok'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['59']['ojir1'][$numStr[$i][2]])) {$summGor59 += (int)$result['city']['59']['ojir1'][$numStr[$i][2]];echo $result['city']['59']['ojir1'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['59']['ojir2'][$numStr[$i][2]])) {$summGor59 += (int)$result['city']['59']['ojir2'][$numStr[$i][2]];echo $result['city']['59']['ojir2'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['59']['ojir3'][$numStr[$i][2]])) {$summGor59 += (int)$result['city']['59']['ojir3'][$numStr[$i][2]];echo $result['city']['59']['ojir3'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><?= $summGor59?></td>
                    <!--городские (10-11 класс)-->
                    <?$summGor1011 = 0;?>
                    <td class="text-center"><?if(isset($result['city']['1011']['dif'][$numStr[$i][2]])){$summGor1011 += (int)$result['city']['1011']['dif'][$numStr[$i][2]];echo $result['city']['1011']['dif'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['1011']['nedost'][$numStr[$i][2]])) {$summGor1011 += (int)$result['city']['1011']['nedost'][$numStr[$i][2]];echo $result['city']['1011']['nedost'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['1011']['norm'][$numStr[$i][2]])) {$summGor1011 += (int)$result['city']['1011']['norm'][$numStr[$i][2]];echo $result['city']['1011']['norm'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['1011']['izbitok'][$numStr[$i][2]])) {$summGor1011 += (int)$result['city']['1011']['izbitok'][$numStr[$i][2]];echo $result['city']['1011']['izbitok'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['1011']['ojir1'][$numStr[$i][2]])) {$summGor1011 += (int)$result['city']['1011']['ojir1'][$numStr[$i][2]];echo $result['city']['1011']['ojir1'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['1011']['ojir2'][$numStr[$i][2]])) {$summGor1011 += (int)$result['city']['1011']['ojir2'][$numStr[$i][2]];echo $result['city']['1011']['ojir2'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['city']['1011']['ojir3'][$numStr[$i][2]])) {$summGor1011 += (int)$result['city']['1011']['ojir3'][$numStr[$i][2]];echo $result['city']['1011']['ojir3'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><?= $summGor1011?></td>
                    <!--городские (ВСЕ)-->
                    <td class="text-center">
                        <?
                        $summCityDif = (isset($result['city']['14']['dif'][$numStr[$i][2]]) ? (int)$result['city']['14']['dif'][$numStr[$i][2]] : 0);
                        $summCityDif += (isset($result['city']['59']['dif'][$numStr[$i][2]]) ? (int)$result['city']['59']['dif'][$numStr[$i][2]] : 0);
                        $summCityDif += (isset($result['city']['1011']['dif'][$numStr[$i][2]]) ? (int)$result['city']['1011']['dif'][$numStr[$i][2]] : 0);
                        echo $summCityDif;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summCitynedost = (isset($result['city']['14']['nedost'][$numStr[$i][2]]) ? (int)$result['city']['14']['nedost'][$numStr[$i][2]] : 0);
                        $summCitynedost += (isset($result['city']['59']['nedost'][$numStr[$i][2]]) ? (int)$result['city']['59']['nedost'][$numStr[$i][2]] : 0);
                        $summCitynedost += (isset($result['city']['1011']['nedost'][$numStr[$i][2]]) ? (int)$result['city']['1011']['nedost'][$numStr[$i][2]] : 0);
                        echo $summCitynedost;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summcitynorm = (isset($result['city']['14']['norm'][$numStr[$i][2]]) ? (int)$result['city']['14']['norm'][$numStr[$i][2]] : 0);
                        $summcitynorm += (isset($result['city']['59']['norm'][$numStr[$i][2]]) ? (int)$result['city']['59']['norm'][$numStr[$i][2]] : 0);
                        $summcitynorm += (isset($result['city']['1011']['norm'][$numStr[$i][2]]) ? (int)$result['city']['1011']['norm'][$numStr[$i][2]] : 0);
                        echo $summcitynorm;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summCitizbitok = (isset($result['city']['14']['izbitok'][$numStr[$i][2]]) ? (int)$result['city']['14']['izbitok'][$numStr[$i][2]] : 0);
                        $summCitizbitok += (isset($result['city']['59']['izbitok'][$numStr[$i][2]]) ? (int)$result['city']['59']['izbitok'][$numStr[$i][2]] : 0);
                        $summCitizbitok += (isset($result['city']['1011']['izbitok'][$numStr[$i][2]]) ? (int)$result['city']['1011']['izbitok'][$numStr[$i][2]] : 0);
                        echo $summCitizbitok;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summCitojir1 = (isset($result['city']['14']['ojir1'][$numStr[$i][2]]) ? (int)$result['city']['14']['ojir1'][$numStr[$i][2]] : 0);
                        $summCitojir1 += (isset($result['city']['59']['ojir1'][$numStr[$i][2]]) ? (int)$result['city']['59']['ojir1'][$numStr[$i][2]] : 0);
                        $summCitojir1 += (isset($result['city']['1011']['ojir1'][$numStr[$i][2]]) ? (int)$result['city']['1011']['ojir1'][$numStr[$i][2]] : 0);
                        echo $summCitojir1;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summCitojir2 = (isset($result['city']['14']['ojir2'][$numStr[$i][2]]) ? (int)$result['city']['14']['ojir2'][$numStr[$i][2]] : 0);
                        $summCitojir2 += (isset($result['city']['59']['ojir2'][$numStr[$i][2]]) ? (int)$result['city']['59']['ojir2'][$numStr[$i][2]] : 0);
                        $summCitojir2 += (isset($result['city']['1011']['ojir2'][$numStr[$i][2]]) ? (int)$result['city']['1011']['ojir2'][$numStr[$i][2]] : 0);
                        echo $summCitojir2;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summCitojir3 = (isset($result['city']['14']['ojir3'][$numStr[$i][2]]) ? (int)$result['city']['14']['ojir3'][$numStr[$i][2]] : 0);
                        $summCitojir3 += (isset($result['city']['59']['ojir3'][$numStr[$i][2]]) ? (int)$result['city']['59']['ojir3'][$numStr[$i][2]] : 0);
                        $summCitojir3 += (isset($result['city']['1011']['ojir3'][$numStr[$i][2]]) ? (int)$result['city']['1011']['ojir3'][$numStr[$i][2]] : 0);
                        echo $summCitojir3;
                        ?>
                    </td>
                    <td class="text-center"><?= $summGor14+$summGor59+$summGor1011?></td>
                    <!--сельские (1-4 класс)-->
                    <?$summVillag14 = 0;?>
                    <td class="text-center"><?if(isset($result['village']['14']['dif'][$numStr[$i][2]])){$summVillag14 += (int)$result['village']['14']['dif'][$numStr[$i][2]];echo $result['village']['14']['dif'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['14']['nedost'][$numStr[$i][2]])) {$summVillag14 += (int)$result['village']['14']['nedost'][$numStr[$i][2]];echo $result['village']['14']['nedost'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['14']['norm'][$numStr[$i][2]])) {$summVillag14 += (int)$result['village']['14']['norm'][$numStr[$i][2]];echo $result['village']['14']['norm'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['14']['izbitok'][$numStr[$i][2]])) {$summVillag14 += (int)$result['village']['14']['izbitok'][$numStr[$i][2]];echo $result['village']['14']['izbitok'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['14']['ojir1'][$numStr[$i][2]])) {$summVillag14 += (int)$result['village']['14']['ojir1'][$numStr[$i][2]];echo $result['village']['14']['ojir1'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['14']['ojir2'][$numStr[$i][2]])) {$summVillag14 += (int)$result['village']['14']['ojir2'][$numStr[$i][2]];echo $result['village']['14']['ojir2'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['14']['ojir3'][$numStr[$i][2]])) {$summVillag14 += (int)$result['village']['14']['ojir3'][$numStr[$i][2]];echo $result['village']['14']['ojir3'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><?= $summVillag14?></td>
                    <!--сельские (5-9 класс)-->
                    <?$summVillag59 = 0;?>
                    <td class="text-center"><?if(isset($result['village']['59']['dif'][$numStr[$i][2]])){$summVillag59 += (int)$result['village']['59']['dif'][$numStr[$i][2]];echo $result['village']['59']['dif'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['59']['nedost'][$numStr[$i][2]])) {$summVillag59 += (int)$result['village']['59']['nedost'][$numStr[$i][2]];echo $result['village']['59']['nedost'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['59']['norm'][$numStr[$i][2]])) {$summVillag59 += (int)$result['village']['59']['norm'][$numStr[$i][2]];echo $result['village']['59']['norm'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['59']['izbitok'][$numStr[$i][2]])) {$summVillag59 += (int)$result['village']['59']['izbitok'][$numStr[$i][2]];echo $result['village']['59']['izbitok'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['59']['ojir1'][$numStr[$i][2]])) {$summVillag59 += (int)$result['village']['59']['ojir1'][$numStr[$i][2]];echo $result['village']['59']['ojir1'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['59']['ojir2'][$numStr[$i][2]])) {$summVillag59 += (int)$result['village']['59']['ojir2'][$numStr[$i][2]];echo $result['village']['59']['ojir2'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['59']['ojir3'][$numStr[$i][2]])) {$summVillag59 += (int)$result['village']['59']['ojir3'][$numStr[$i][2]];echo $result['village']['59']['ojir3'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><?= $summVillag59?></td>
                    <!--сельские (10-11 класс)-->
                    <?$summVillag1011 = 0;?>
                    <td class="text-center"><?if(isset($result['village']['1011']['dif'][$numStr[$i][2]])){$summVillag1011 += (int)$result['village']['1011']['dif'][$numStr[$i][2]];echo $result['village']['1011']['dif'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['1011']['nedost'][$numStr[$i][2]])) {$summVillag1011 += (int)$result['village']['1011']['nedost'][$numStr[$i][2]];echo $result['village']['1011']['nedost'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['1011']['norm'][$numStr[$i][2]])) {$summVillag1011 += (int)$result['village']['1011']['norm'][$numStr[$i][2]];echo $result['village']['1011']['norm'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['1011']['izbitok'][$numStr[$i][2]])) {$summVillag1011 += (int)$result['village']['1011']['izbitok'][$numStr[$i][2]];echo $result['village']['1011']['izbitok'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['1011']['ojir1'][$numStr[$i][2]])) {$summVillag1011 += (int)$result['village']['1011']['ojir1'][$numStr[$i][2]];echo $result['village']['1011']['ojir1'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['1011']['ojir2'][$numStr[$i][2]])) {$summVillag1011 += (int)$result['village']['1011']['ojir2'][$numStr[$i][2]];echo $result['village']['1011']['ojir2'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><? if(isset($result['village']['1011']['ojir3'][$numStr[$i][2]])) {$summVillag1011 += (int)$result['village']['1011']['ojir3'][$numStr[$i][2]];echo $result['village']['1011']['ojir3'][$numStr[$i][2]];} else echo 0;?></td>
                    <td class="text-center"><?= $summVillag1011?></td>
                    <!--сельские (ВСЕ)-->
                    <td class="text-center">
                        <?
                        $summvillageDif = (isset($result['village']['14']['dif'][$numStr[$i][2]]) ? (int)$result['village']['14']['dif'][$numStr[$i][2]] : 0);
                        $summvillageDif += (isset($result['village']['59']['dif'][$numStr[$i][2]]) ? (int)$result['village']['59']['dif'][$numStr[$i][2]] : 0);
                        $summvillageDif += (isset($result['village']['1011']['dif'][$numStr[$i][2]]) ? (int)$result['village']['1011']['dif'][$numStr[$i][2]] : 0);
                        echo $summvillageDif;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summvillagenedost = (isset($result['village']['14']['nedost'][$numStr[$i][2]]) ? (int)$result['village']['14']['nedost'][$numStr[$i][2]] : 0);
                        $summvillagenedost += (isset($result['village']['59']['nedost'][$numStr[$i][2]]) ? (int)$result['village']['59']['nedost'][$numStr[$i][2]] : 0);
                        $summvillagenedost += (isset($result['village']['1011']['nedost'][$numStr[$i][2]]) ? (int)$result['village']['1011']['nedost'][$numStr[$i][2]] : 0);
                        echo $summvillagenedost;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summCitnorm = (isset($result['village']['14']['norm'][$numStr[$i][2]]) ? (int)$result['village']['14']['norm'][$numStr[$i][2]] : 0);
                        $summCitnorm += (isset($result['village']['59']['norm'][$numStr[$i][2]]) ? (int)$result['village']['59']['norm'][$numStr[$i][2]] : 0);
                        $summCitnorm += (isset($result['village']['1011']['norm'][$numStr[$i][2]]) ? (int)$result['village']['1011']['norm'][$numStr[$i][2]] : 0);
                        echo $summCitnorm;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summvillageizbitok = (isset($result['village']['14']['izbitok'][$numStr[$i][2]]) ? (int)$result['village']['14']['izbitok'][$numStr[$i][2]] : 0);
                        $summvillageizbitok += (isset($result['village']['59']['izbitok'][$numStr[$i][2]]) ? (int)$result['village']['59']['izbitok'][$numStr[$i][2]] : 0);
                        $summvillageizbitok += (isset($result['village']['1011']['izbitok'][$numStr[$i][2]]) ? (int)$result['village']['1011']['izbitok'][$numStr[$i][2]] : 0);
                        echo $summvillageizbitok;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summvillageojir1 = (isset($result['village']['14']['ojir1'][$numStr[$i][2]]) ? (int)$result['village']['14']['ojir1'][$numStr[$i][2]] : 0);
                        $summvillageojir1 += (isset($result['village']['59']['ojir1'][$numStr[$i][2]]) ? (int)$result['village']['59']['ojir1'][$numStr[$i][2]] : 0);
                        $summvillageojir1 += (isset($result['village']['1011']['ojir1'][$numStr[$i][2]]) ? (int)$result['village']['1011']['ojir1'][$numStr[$i][2]] : 0);
                        echo $summvillageojir1;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summvillageojir2 = (isset($result['village']['14']['ojir2'][$numStr[$i][2]]) ? (int)$result['village']['14']['ojir2'][$numStr[$i][2]] : 0);
                        $summvillageojir2 += (isset($result['village']['59']['ojir2'][$numStr[$i][2]]) ? (int)$result['village']['59']['ojir2'][$numStr[$i][2]] : 0);
                        $summvillageojir2 += (isset($result['village']['1011']['ojir2'][$numStr[$i][2]]) ? (int)$result['village']['1011']['ojir2'][$numStr[$i][2]] : 0);
                        echo $summvillageojir2;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summvillageojir3 = (isset($result['village']['14']['ojir3'][$numStr[$i][2]]) ? (int)$result['village']['14']['ojir3'][$numStr[$i][2]] : 0);
                        $summvillageojir3 += (isset($result['village']['59']['ojir3'][$numStr[$i][2]]) ? (int)$result['village']['59']['ojir3'][$numStr[$i][2]] : 0);
                        $summvillageojir3 += (isset($result['village']['1011']['ojir3'][$numStr[$i][2]]) ? (int)$result['village']['1011']['ojir3'][$numStr[$i][2]] : 0);
                        echo $summvillageojir3;
                        ?>
                    </td>
                    <td class="text-center"><?= $summVillag14+$summVillag59+$summVillag1011?></td>
                    <!--<th colspan="8" class="bg-info">Все (1-4 класс)</th>-->
                    <td class="text-center">
                        <?
                        $summVse14Dif = (isset($result['village']['14']['dif'][$numStr[$i][2]]) ? (int)$result['village']['14']['dif'][$numStr[$i][2]] : 0);
                        $summVse14Dif += (isset($result['city']['14']['dif'][$numStr[$i][2]]) ? (int)$result['city']['14']['dif'][$numStr[$i][2]] : 0);
                        echo $summVse14Dif;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse14nedost = (isset($result['village']['14']['nedost'][$numStr[$i][2]]) ? (int)$result['village']['14']['nedost'][$numStr[$i][2]] : 0);
                        $summVse14nedost += (isset($result['city']['14']['nedost'][$numStr[$i][2]]) ? (int)$result['city']['14']['nedost'][$numStr[$i][2]] : 0);
                        echo $summVse14nedost;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse14norm = (isset($result['village']['14']['norm'][$numStr[$i][2]]) ? (int)$result['village']['14']['norm'][$numStr[$i][2]] : 0);
                        $summVse14norm += (isset($result['city']['14']['norm'][$numStr[$i][2]]) ? (int)$result['city']['14']['norm'][$numStr[$i][2]] : 0);
                        echo $summVse14norm;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse14izbitok = (isset($result['village']['14']['izbitok'][$numStr[$i][2]]) ? (int)$result['village']['14']['izbitok'][$numStr[$i][2]] : 0);
                        $summVse14izbitok += (isset($result['city']['14']['izbitok'][$numStr[$i][2]]) ? (int)$result['city']['14']['izbitok'][$numStr[$i][2]] : 0);
                        echo $summVse14izbitok;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse14ojir1 = (isset($result['village']['14']['ojir1'][$numStr[$i][2]]) ? (int)$result['village']['14']['ojir1'][$numStr[$i][2]] : 0);
                        $summVse14ojir1 += (isset($result['city']['14']['ojir1'][$numStr[$i][2]]) ? (int)$result['city']['14']['ojir1'][$numStr[$i][2]] : 0);
                        echo $summVse14ojir1;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse14ojir2 = (isset($result['village']['14']['ojir2'][$numStr[$i][2]]) ? (int)$result['village']['14']['ojir2'][$numStr[$i][2]] : 0);
                        $summVse14ojir2 += (isset($result['city']['14']['ojir2'][$numStr[$i][2]]) ? (int)$result['city']['14']['ojir2'][$numStr[$i][2]] : 0);
                        echo $summVse14ojir2;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse14ojir3 = (isset($result['village']['14']['ojir3'][$numStr[$i][2]]) ? (int)$result['village']['14']['ojir3'][$numStr[$i][2]] : 0);
                        $summVse14ojir3 += (isset($result['city']['14']['ojir3'][$numStr[$i][2]]) ? (int)$result['city']['14']['ojir3'][$numStr[$i][2]] : 0);
                        echo $summVse14ojir3;
                        ?>
                    </td>
                    <td class="text-center"><?= $summVse14 = $summVse14Dif+$summVse14nedost+$summVse14norm+$summVse14izbitok+$summVse14ojir1+$summVse14ojir2+$summVse14ojir3?></td>
                    <!--<th colspan="8" >Все (5-9 класс)</th>-->
                    <td class="text-center">
                        <?
                        $summVse59Dif = (isset($result['village']['59']['dif'][$numStr[$i][2]]) ? (int)$result['village']['59']['dif'][$numStr[$i][2]] : 0);
                        $summVse59Dif += (isset($result['city']['59']['dif'][$numStr[$i][2]]) ? (int)$result['city']['59']['dif'][$numStr[$i][2]] : 0);
                        echo $summVse59Dif;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse59nedost = (isset($result['village']['59']['nedost'][$numStr[$i][2]]) ? (int)$result['village']['59']['nedost'][$numStr[$i][2]] : 0);
                        $summVse59nedost += (isset($result['city']['59']['nedost'][$numStr[$i][2]]) ? (int)$result['city']['59']['nedost'][$numStr[$i][2]] : 0);
                        echo $summVse59nedost;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse59norm = (isset($result['village']['59']['norm'][$numStr[$i][2]]) ? (int)$result['village']['59']['norm'][$numStr[$i][2]] : 0);
                        $summVse59norm += (isset($result['city']['59']['norm'][$numStr[$i][2]]) ? (int)$result['city']['59']['norm'][$numStr[$i][2]] : 0);
                        echo $summVse59norm;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse59izbitok = (isset($result['village']['59']['izbitok'][$numStr[$i][2]]) ? (int)$result['village']['59']['izbitok'][$numStr[$i][2]] : 0);
                        $summVse59izbitok += (isset($result['city']['59']['izbitok'][$numStr[$i][2]]) ? (int)$result['city']['59']['izbitok'][$numStr[$i][2]] : 0);
                        echo $summVse59izbitok;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse59ojir1 = (isset($result['village']['59']['ojir1'][$numStr[$i][2]]) ? (int)$result['village']['59']['ojir1'][$numStr[$i][2]] : 0);
                        $summVse59ojir1 += (isset($result['city']['59']['ojir1'][$numStr[$i][2]]) ? (int)$result['city']['59']['ojir1'][$numStr[$i][2]] : 0);
                        echo $summVse59ojir1;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse59ojir2 = (isset($result['village']['59']['ojir2'][$numStr[$i][2]]) ? (int)$result['village']['59']['ojir2'][$numStr[$i][2]] : 0);
                        $summVse59ojir2 += (isset($result['city']['59']['ojir2'][$numStr[$i][2]]) ? (int)$result['city']['59']['ojir2'][$numStr[$i][2]] : 0);
                        echo $summVse59ojir2;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse59ojir3 = (isset($result['village']['59']['ojir3'][$numStr[$i][2]]) ? (int)$result['village']['59']['ojir3'][$numStr[$i][2]] : 0);
                        $summVse59ojir3 += (isset($result['city']['59']['ojir3'][$numStr[$i][2]]) ? (int)$result['city']['59']['ojir3'][$numStr[$i][2]] : 0);
                        echo $summVse59ojir3;
                        ?>
                    </td>
                    <td class="text-center"><?= $summVse59 = $summVse59Dif+$summVse59nedost+$summVse59norm+$summVse59izbitok+$summVse59ojir1+$summVse59ojir2+$summVse59ojir3?></td>
                    <!--<th colspan="8" class="bg-info">Все (10-11 класс)</th>-->
                    <td class="text-center">
                        <?
                        $summVse1011Dif = (isset($result['village']['1011']['dif'][$numStr[$i][2]]) ? (int)$result['village']['1011']['dif'][$numStr[$i][2]] : 0);
                        $summVse1011Dif += (isset($result['city']['1011']['dif'][$numStr[$i][2]]) ? (int)$result['city']['1011']['dif'][$numStr[$i][2]] : 0);
                        echo $summVse1011Dif;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse1011nedost = (isset($result['village']['1011']['nedost'][$numStr[$i][2]]) ? (int)$result['village']['1011']['nedost'][$numStr[$i][2]] : 0);
                        $summVse1011nedost += (isset($result['city']['1011']['nedost'][$numStr[$i][2]]) ? (int)$result['city']['1011']['nedost'][$numStr[$i][2]] : 0);
                        echo $summVse1011nedost;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse1011norm = (isset($result['village']['1011']['norm'][$numStr[$i][2]]) ? (int)$result['village']['1011']['norm'][$numStr[$i][2]] : 0);
                        $summVse1011norm += (isset($result['city']['1011']['norm'][$numStr[$i][2]]) ? (int)$result['city']['1011']['norm'][$numStr[$i][2]] : 0);
                        echo $summVse1011norm;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse1011izbitok = (isset($result['village']['1011']['izbitok'][$numStr[$i][2]]) ? (int)$result['village']['1011']['izbitok'][$numStr[$i][2]] : 0);
                        $summVse1011izbitok += (isset($result['city']['1011']['izbitok'][$numStr[$i][2]]) ? (int)$result['city']['1011']['izbitok'][$numStr[$i][2]] : 0);
                        echo $summVse1011izbitok;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse1011ojir1 = (isset($result['village']['1011']['ojir1'][$numStr[$i][2]]) ? (int)$result['village']['1011']['ojir1'][$numStr[$i][2]] : 0);
                        $summVse1011ojir1 += (isset($result['city']['1011']['ojir1'][$numStr[$i][2]]) ? (int)$result['city']['1011']['ojir1'][$numStr[$i][2]] : 0);
                        echo $summVse1011ojir1;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse1011ojir2 = (isset($result['village']['1011']['ojir2'][$numStr[$i][2]]) ? (int)$result['village']['1011']['ojir2'][$numStr[$i][2]] : 0);
                        $summVse1011ojir2 += (isset($result['city']['1011']['ojir2'][$numStr[$i][2]]) ? (int)$result['city']['1011']['ojir2'][$numStr[$i][2]] : 0);
                        echo $summVse1011ojir2;
                        ?>
                    </td>
                    <td class="text-center">
                        <?
                        $summVse1011ojir3 = (isset($result['village']['1011']['ojir3'][$numStr[$i][2]]) ? (int)$result['village']['1011']['ojir3'][$numStr[$i][2]] : 0);
                        $summVse1011ojir3 += (isset($result['city']['1011']['ojir3'][$numStr[$i][2]]) ? (int)$result['city']['1011']['ojir3'][$numStr[$i][2]] : 0);
                        echo $summVse1011ojir3;
                        ?>
                    </td>
                    <td class="text-center"><?= $summVse1011 = $summVse1011Dif+$summVse1011nedost+$summVse1011norm+$summVse1011izbitok+$summVse1011ojir1+$summVse1011ojir2+$summVse1011ojir3?></td>
                    <!--<th colspan="8" class="bg-primary">Все респонденты (1-11 кл)</th>-->
                    <td><?= $summVse14Dif + $summVse59Dif + $summVse1011Dif?></td><!--<th class="bg-primary">дефицит МТ</th>-->
                    <td><?= $summVse14nedost + $summVse59nedost + $summVse1011nedost?></td><!--<th class="bg-primary">недост МТ</th>-->
                    <td><?= $summVse14norm + $summVse59norm + $summVse1011norm?></td><!--<th class="bg-primary">норм МТ</th>-->
                    <td><?= $summVse14izbitok + $summVse59izbitok + $summVse1011izbitok?></td><!--<th class="bg-primary">изб МТ</th>-->
                    <td><?= $summVse14ojir1 + $summVse59ojir1 + $summVse1011ojir1?></td><!--<th class="bg-primary">ожир 1 ст</th>-->
                    <td><?= $summVse14ojir2 + $summVse59ojir2 + $summVse1011ojir2?></td><!--<th class="bg-primary">ожир 2 ст</th>-->
                    <td><?= $summVse14ojir3 + $summVse59ojir3 + $summVse1011ojir3?></td><!--<th class="bg-primary">ожир 3 ст</th>-->
                    <td><?= $summVse14 + $summVse59 + $summVse1011?></td><!--<th class="bg-primary">итого</th>-->
                </tr>
                 <?
           }?>
        </table>
        <br>
        <br>
        <br>
    </div>
    <?
} ?>

<?
$script = <<< JS
   
    /*const federalDistrict = document.getElementById('detianket-federal_district_idreport');
    const opt = document.createElement('option');
    opt.value = '0';
    opt.innerHTML = 'Все регионы';
    federalDistrict.appendChild(opt);*/
    
    $("#pechat222").click(function () {
    var table = $('#tableId2');
        if (table && table.length) {
            var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "Выгрузка.xls",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: preserveColors
            });
        }
    });                       
   
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>
