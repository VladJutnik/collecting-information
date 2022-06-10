<?php

use common\models\DetiAnket;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Выгрузка данных ИТОГОВЫХ ЗНАЧЕНИЙ по анкетам руководителей учебных организаций';

$itogArr = [];

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

                'hasAccessFederalDistrict' => true,
                'hasAccessRegion' => true,
            ]
        ); ?>
        <div class="form-group row">
            <?= Html::submitButton('Показать', ['class' => 'btn btn-success main-color form-control col-12 mt-3']) ?>
        </div>
        <?php
        ActiveForm::end(); ?>

    </div>

<?
if ($results) { ?>
    <div class="container">
        <input type="button" class="btn btn-warning btn-block table2excel mb-3 mt-3"
               title="Вы можете скачать в формате Excel" value="Скачать в Excel" id="pechat222">
    </div>
    <h4 class="text-center"><?=$this->title?></h4>
    <div class="table-responsive">
        <table id="tableId2" class="table table-bordered table-sm table2excel_with_color">
            <thead>
            <tr class="row0">
                <th class="text-center" rowspan="3">Субъект</th>
                <th class="text-center" colspan="3">Количество школ</th>
                <th class="text-center" colspan="4">Количество школ с численностью школьников</th>
                <th class="text-center" colspan="6">Количестов школ в которых имеется  меню для детей 1-4 кл.с </th>
                <th class="text-center" colspan="5">количество школ с пищеблоками, которые работают</th>
                <th class="text-center" colspan="3">Количество школ работающих по организации питания</th>
                <th class="text-center" colspan="6">Количество школ, использующих в меню обогащенную продукцию Витаминами</th>
                <th class="text-center" colspan="6">Количество школ, использующих в меню обогащенную продукцию Микроэлементами</th>
                <th class="text-center" colspan="3">Количество школ со следующими формами организации питания</th>
                <th class="text-center" colspan="4">Количество школ со следующими формами организации дополнительного питания</th>
                <th class="text-center" colspan="15">Ассортимент продукции, реализуемой в качестве дополнительного питания</th>
                <th class="text-center" colspan="5">Количество ГОРОДСКИХ школ со следующими формами питьевого режима</th>
                <th class="text-center" colspan="5">Количество СЕЛЬСКИХ школ со следующими формами питьевого режима</th>
                <th class="text-center" colspan="4">Количество школ реализующих для школьников 1-4 классов образовательные программы</th>
                <th class="text-center" colspan="4">Количество школ реализующих для школьников 5-9 классов образовательные программы</th>
                <th class="text-center" colspan="4">Количество школ реализующих для школьников 10-11 классов образовательные программы</th>
                <th class="text-center" colspan="3">Средняя по региону стоимость школьного питания для детей 1-4 кл</th>
                <th class="text-center" colspan="19">Среднее значение количества (раз в две недели) влючения отдельных групп блюд и продуктов в школьные ЗАВТРАКИ</th>
                <th class="text-center" colspan="21">Среднее значение количества (раз в две недели) влючения отдельных групп блюд и продуктов в школьные ОБЕДЫ</th>
                <th class="text-center" colspan="4">Количество СЕЛЬСКИХ ШКОЛ, руководители которых оценивают организацию питания в школе (ЗАВТРАКИ) на </th>
                <th class="text-center" colspan="4">Количество ГОРОДСКИХ ШКОЛ, руководители которых оценивают организацию питания в школе (ЗАВТРАКИ) на </th>
                <th class="text-center" colspan="4">Количество ШКОЛ РАБОТАЮЩИХ НА АУТСОРСИНГЕ (ПОСТАВКА ПРОДУКТОВ +ПРИГОТОВЛЕНИЕ БЛЮД, руководители которых оценивают организацию питания в школе (ЗАВТРАКИ) на </th>
                <th class="text-center" colspan="4">Количество ШКОЛ РАБОТАЮЩИХ НА АУТСОРСИНГЕ (ПОСТАВКА ПРОДУКТОВ)  руководители которых оценивают организацию питания в школе (ЗАВТРАКИ) на </th>
                <th class="text-center" colspan="4">Количество ШКОЛ РАБОТАЮЩИХ БЕЗ СТОРОННИХ ОРГАНИЗАЦИЙ В ОРГАНИЗАЦИИ ПИТАНИЯ, руководители которых оценивают организацию питания в школе (ЗАВТРАКИ) на </th>
                <th class="text-center" colspan="3">Количество школьников</th>
                <th class="text-center" colspan="4">Количество школьников, обучающихся в школах с численностью численностью школьников</th>

                <th class="text-center" colspan="4">Количество школьников </th>
                <th class="text-center" colspan="4">Количество школьников на очном обучении</th>
                <th class="text-center" colspan="4">Количество школьников на домашнем обучении обучении</th>
                <th class="text-center" colspan="4">Количество школьников посещающих группу продленного дня</th>
                <th class="text-center" colspan="4">Количество школьников посещающих группу продленного дня</th>
                <th class="text-center" colspan="4">Количество школьников , охваченных организованным питанием (ВСЕГО)</th>
                <th class="text-center" colspan="4">Количество школьников , охваченных организованным питанием (1-4 кл)</th>
                <th class="text-center" colspan="4">Количество школьников , охваченных организованным питанием (5-9 кл)</th>
                <th class="text-center" colspan="4">Количество школьников , охваченных организованным питанием (10-11 кл)</th>
                <th class="text-center" colspan="6">Количество школьников с СД  (1-4 кл)</th>
                <th class="text-center" colspan="6">Количество школьников с СД  (5-9 кл)</th>
                <th class="text-center" colspan="6">Количество школьников с СД  (10-11 кл)</th>
                <th class="text-center" colspan="6">Количество школьников с пищевой аллергией  (1-4 кл)</th>
                <th class="text-center" colspan="6">Количество школьников с пищевой аллергией  (5-9 кл)</th>
                <th class="text-center" colspan="6">Количество школьников с пищевой аллергией  (10-11 кл)</th>
                <th class="text-center" colspan="6">Количество школьников с целиакией  (1-4 кл)</th>
                <th class="text-center" colspan="6">Количество школьников с целиакией  (5-9 кл)</th>
                <th class="text-center" colspan="6">Количество школьников с целиакией  (10-11 кл)</th>
                <th class="text-center" colspan="3">Количество школьников с ОВЗ  (1-4 кл)</th>
                <th class="text-center" colspan="3">Количество школьников с ОВЗ  (5-9 кл)</th>
                <th class="text-center" colspan="3">Количество школьников с ОВЗ  (10-11 кл)</th>
            </tr>
            <tr class="row1">
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" rowspan="2">сельских</th>
                <th class="text-center" rowspan="2">городских</th>
                <th class="text-center" rowspan="2">до 100 ч.</th>
                <th class="text-center" rowspan="2">101-500 ч.</th>
                <th class="text-center" rowspan="2">501-1000 ч.</th>
                <th class="text-center" rowspan="2">более 1000 ч.</th>
                <th class="text-center" rowspan="2">СД</th>
                <th class="text-center" rowspan="2">ПА</th>
                <th class=" text-center" rowspan="2">целиакия</th>
                <th class="text-center" rowspan="2">ФКУ</th>
                <th class=" text-center" rowspan="2">муковисцидоз</th>
                <th class="text-center" rowspan="2">ОВЗ</th>
                <th class="text-center" rowspan="2">на сырье</th>
                <th class=" text-center" rowspan="2">на сырье и полуфабрикатах</th>
                <th class=" text-center" rowspan="2">на  полуфабрикатах</th>
                <th class=" text-center" rowspan="2">в режиме буфета-раздаточной</th>
                <th class=" text-center" rowspan="2">комната для приема пищи</th>
                <th class="text-center" colspan="2">аутсорсинг</th>
                <th class=" text-center" rowspan="2">без привлечения сторонних организаций</th>
                <th class=" text-center" rowspan="2">всего</th>
                <th class="text-center" colspan="5">в том числе</th>
                <th class=" text-center" rowspan="2">всего</th>
                <th class="text-center" colspan="5">в том числе</th>
                <th class=" text-center" rowspan="2">классический завтрак и обед (1 ассартимент)</th>
                <th class=" text-center" rowspan="2">&nbsp;завтрак и обед по выбору (несколько вариантов)</th>
                <th class=" text-center" rowspan="2">шведский стол</th>
                <th class=" text-center" rowspan="2">буфет</th>
                <th class=" "></th>
                <th class=" text-center" rowspan="2">предоставление блюд по выбору с линии раздачи</th>
                <th class=" text-center" rowspan="2">вендинговые аппараты</th>
                <th class=" text-center" rowspan="2">салаты</th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" text-center" rowspan="2">выпечные изделия</th>
                <th class=" text-center" rowspan="2">бутерброды</th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" text-center" rowspan="2">питьевые фонтанчики</th>
                <th class=" text-center" rowspan="2">кулеры</th>
                <th class=" text-center" rowspan="2">бутилированная вода</th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" text-center" rowspan="2">питьевые фонтанчики</th>
                <th class=" text-center" rowspan="2">кулеры</th>
                <th class=" text-center" rowspan="2">бутилированная вода</th>
                <th class=" "></th>
                <th class=" "></th>
                <th class=" text-center" rowspan="2">&quot;Основы здорового питания&quot; РПН</th>
                <th class=" text-center" rowspan="2">&quot;Школьное молоко&quot;</th>
                <th class=" text-center" rowspan="2">&quot;Разговор о правильном питании&quot;</th>
                <th class=" text-center" rowspan="2">Образовательные программы не реализуются</th>
                <th class=" text-center" rowspan="2">&quot;Основы здорового питания&quot; РПН</th>
                <th class=" text-center" rowspan="2">&quot;Школьное молоко&quot;</th>
                <th class=" text-center" rowspan="2">&quot;Разговор о правильном питании&quot;</th>
                <th class=" text-center" rowspan="2">Образовательные программы не реализуются</th>
                <th class=" text-center" rowspan="2">&quot;Основы здорового питания&quot; РПН</th>
                <th class=" text-center" rowspan="2">&quot;Школьное молоко&quot;</th>
                <th class=" text-center" rowspan="2">&quot;Разговор о правильном питании&quot;</th>
                <th class=" text-center" rowspan="2">Образовательные программы не реализуются</th>
                <th class=" text-center" rowspan="2">завтраки</th>
                <th class=" text-center" rowspan="2">обеды</th>
                <th class=" text-center" rowspan="2">полдники</th>
                <th class=" text-center" rowspan="2">салаты из свежих овощей</th>
                <th class=" text-center" rowspan="2">салаты из вареных овощей</th>
                <th class=" text-center" rowspan="2">кончконсервированные продукты (горох, фасоль, кукуруза, кабачковая икра)</th>
                <th class=" text-center" rowspan="2">каши</th>
                <th class=" text-center" rowspan="2">молочный суп</th>
                <th class=" text-center" rowspan="2">творожные блюда</th>
                <th class=" text-center" rowspan="2">яичные блюда</th>
                <th class=" text-center" rowspan="2">бутерброды</th>
                <th class=" text-center" rowspan="2">гарниры из круп и макарон</th>
                <th class=" "></th>
                <th class=" text-center" rowspan="2">гарниры из картофеля</th>
                <th class=" text-center" rowspan="2">гарниры из бобовых</th>
                <th class=" text-center" rowspan="2">основное мясное блюдо (без птицы)</th>
                <th class=" text-center" rowspan="2">основное мясное блюдо (птица)</th>
                <th class=" text-center" rowspan="2">основное рыбное блюдо </th>
                <th class=" text-center" rowspan="2">колбасные изделия включая сосиски и сардельки</th>
                <th class=" text-center" rowspan="2">фрукты, ягоды</th>
                <th class=" text-center" rowspan="2">кондитерские изделия промышленного изготовления</th>
                <th class=" text-center" rowspan="2">выпечные изделия</th>
                <th class=" text-center" rowspan="2">Первые блюда из круп и макарон</th>
                <th class=" text-center" rowspan="2">Первые блюда овощные</th>
                <th class=" text-center" rowspan="2">салаты из свежих овощей (овощи в нарезке)</th>
                <th class=" text-center" rowspan="2">салаты из вареных овощей</th>
                <th class=" text-center" rowspan="2">гарниры из круп или макарон</th>
                <th class=" text-center" rowspan="2">овощные гарниры (не включая блюда из картофеля)</th>
                <th class="text-center" rowspan="2">гарниры из картофеля</th>
                <th class="text-center" rowspan="2">гарниры из бобовых</th>
                <th class="text-center" rowspan="2">основное мясное блюдо (без мяса птицы)</th>
                <th class="text-center" rowspan="2">основное мясное блюдо (птицА)</th>
                <th class="text-center" rowspan="2">основное рыбное блюдо</th>
                <th class="text-center" rowspan="2">колбасные изделия (сосиски, сардельки)</th>
                <th class="text-center" rowspan="2">творожные блюда</th>
                <th class="text-center" rowspan="2">яичные блюда</th>
                <th class="text-center" rowspan="2">фрукты</th>
                <th class="text-center" rowspan="2">консервированные продукты (горох, фасоль, кукуруза, кабачковая икра)</th>
                <th class="text-center" rowspan="2">кондитерские изделия промышленного изготовления</th>
                <th class="text-center" rowspan="2">выпечные изделия</th>
                <th class="text-center" rowspan="2">Компоты</th>
                <th class="text-center" rowspan="2">Кисели</th>
                <th class="text-center" rowspan="2">Соки</th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class=""></th>
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" rowspan="2">сельских</th>
                <th class="text-center" rowspan="2">городских</th>
                <th class="text-center" rowspan="2">до 100 ч.</th>
                <th class="text-center" rowspan="2">101-500 ч.</th>
                <th class="text-center" rowspan="2">501-1000 ч.</th>
                <th class="text-center" rowspan="2">более 1000 ч.</th>
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" colspan="3">в том числе</th>
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" colspan="3">в том числе</th>
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" colspan="3">в том числе</th>
                <th class="text-center" rowspan="2">всего  </th>
                <th class="text-center" colspan="3">в том числе</th>
                <th class="text-center" rowspan="2">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="text-center" rowspan="2">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="text-center" rowspan="2">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" colspan="3">в т.ч.</th>
                <th class="text-center" rowspan="2">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" rowspan="2">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
                <th class="text-center" rowspan="2">всего</th>
                <th class="text-center" colspan="2">из них обучается</th>
            </tr>
            <tr class="row2">
                <th class="text-center ">поставка пищевых продуктов + приготовление блюд</th>
                <th class="text-center ">поставка пищевых продуктов </th>
                <th class="text-center ">хлеб</th>
                <th class="text-center ">молочная продукция</th>
                <th class="text-center ">кисели</th>
                <th class="text-center ">напитки</th>
                <th class="text-center ">иная продукция</th>
                <th class="text-center ">хлеб</th>
                <th class="text-center ">молочная продукция</th>
                <th class="text-center ">кисели</th>
                <th class="text-center ">напитки</th>
                <th class="text-center ">иная продукция</th>
                <th class="text-center ">комплексные обеды с линии раздачи</th>
                <th class="text-center ">первые блюда</th>
                <th class="text-center ">гарниры</th>
                <th class="text-center ">мясные и рыбные блюда</th>
                <th class="text-center ">каши</th>
                <th class="text-center ">молоко</th>
                <th class="text-center ">соки</th>
                <th class="text-center ">сокосодержащие напитки с сахаром</th>
                <th class="text-center ">кондитерские изделия</th>
                <th class="text-center ">печенье</th>
                <th class="text-center ">злаковые и фруктовые батончики</th>
                <th class="text-center ">фрукты</th>
                <th class="text-center ">сладкие газированные напитки</th>
                <th class="text-center ">кипяченая вода</th>
                <th class="text-center ">питьевой режим не организован</th>
                <th class="text-center ">кипяченая вода</th>
                <th class="text-center ">питьевой режим не организован</th>
                <th class="text-center ">овощные гарниры (не включая блюда из картофеля)</th>
                <th class="text-center3 ">отлично</th>
                <th class="text-center3 ">хорошо</th>
                <th class="text-center3 ">удовлетворительно</th>
                <th class="text-center3 ">неудовлетворительно</th>
                <th class="text-center3 ">отлично</th>
                <th class="text-center3 ">хорошо</th>
                <th class="text-center3 ">удовлетворительно</th>
                <th class="text-center3 ">неудовлетворительно</th>
                <th class="text-center3 ">отлично</th>
                <th class="text-center3 ">хорошо</th>
                <th class="text-center3 ">удовлетворительно</th>
                <th class="text-center3 ">неудовлетворительно</th>
                <th class="text-center3 ">отлично</th>
                <th class="text-center3 ">хорошо</th>
                <th class="text-center3 ">удовлетворительно</th>
                <th class="text-center3 ">неудовлетворительно</th>
                <th class="text-center3 ">отлично</th>
                <th class="text-center3 ">хорошо</th>
                <th class="text-center3 ">удовлетворительно</th>
                <th class="text-center3 ">неудовлетворительно</th>
                <th class="text-center8 ">1-4 кл</th>
                <th class="text-center8 ">5-9 кл</th>
                <th class="text-center8 ">10 -11 кл</th>
                <th class="text-center8 ">1-4 кл</th>
                <th class="text-center8 ">5-9 кл</th>
                <th class="text-center8 ">10 -11 кл</th>
                <th class="text-center8 ">1-4 кл</th>
                <th class="text-center8 ">5-9 кл</th>
                <th class="text-center8 ">10 -11 кл</th>
                <th class="text-center8 ">1-4 кл</th>
                <th class="text-center8 ">5-9 кл</th>
                <th class="text-center8 ">10 -11 кл</th>
                <th class="text-center8 ">1-4 кл</th>
                <th class="text-center8 ">5-9 кл</th>
                <th class="text-center8 ">10 -11 кл</th>
                <th class="text-center0 ">одноразовое</th>
                <th class="text-center0 ">двухразовое</th>
                <th class="text-center0 ">трех разовое</th>
                <th class="text-center0 ">одноразовое</th>
                <th class="text-center0 ">двухразовое</th>
                <th class="text-center0 ">трех разовое</th>
                <th class="text-center0 ">одноразовое</th>
                <th class="text-center0 ">двухразовое</th>
                <th class="text-center0 ">трех разовое</th>
                <th class="text-center0 ">одноразовое</th>
                <th class="text-center0 ">двухразовое</th>
                <th class="text-center0 ">трех разовое</th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">питается по меню</th>
                <th class="text-center8 ">еда из дома</th>
                <th class="text-center8 ">не питается</th>
                <th class="text-center8 "></th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">питается по меню</th>
                <th class="text-center8 ">еда из дома</th>
                <th class="text-center8 ">не питается</th>
                <th class="text-center8 "></th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">питается по меню</th>
                <th class="text-center8 ">еда из дома</th>
                <th class="text-center8 ">не питается</th>
                <th class="text-center8 "></th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">питается по меню</th>
                <th class="text-center8 ">еда из дома</th>
                <th class="text-center8 ">не питается</th>
                <th class="text-center8 "></th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">питается по меню</th>
                <th class="text-center8 ">еда из дома</th>
                <th class="text-center8 ">не питается</th>
                <th class="text-center8 "></th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">питается по меню</th>
                <th class="text-center8 ">еда из дома</th>
                <th class="text-center8 ">не питается</th>
                <th class="text-center8 "></th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">питается по меню</th>
                <th class="text-center8 ">еда из дома</th>
                <th class="text-center8 ">не питается</th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">питается по меню</th>
                <th class="text-center8 ">еда из дома</th>
                <th class="text-center8 ">не питается</th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">питается по меню</th>
                <th class="text-center8 ">еда из дома</th>
                <th class="text-center8 ">не питается</th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
                <th class="text-center8 ">дома</th>
                <th class="text-center8 ">очно</th>
            </tr>
            <tr>
                <?
                for ($i = 1; $i <= 247; $i++) { ?>
                    <th class="text-center"><?= $i ?></th>
                    <?
                } ?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?
                for ($i = 1; $i <= 28; $i++) {
                    ?>
                    <td class="text-center"><?= $results[$i] ?></td>
                    <?
                } ?>
                <td class="text-center"><?= $results['23_m'] ?></td>
                <td class="text-center"><?= $results['24_m'] ?></td>
                <td class="text-center"><?= $results['25_m'] ?></td>
                <td class="text-center"><?= $results['26_m'] ?></td>
                <td class="text-center"><?= $results['27_m'] ?></td>
                <td class="text-center"><?= $results['28_m'] ?></td>
                <?
                for ($i = 29; $i <= 142; $i++) {
                    ?>
                    <td class="text-center"><?= $results[$i] ?></td>
                    <?
                } ?>
                <?
                for ($i = 146; $i <= 244; $i++) {
                    ?>
                    <td class="text-center"><?= $results[$i] ?></td>
                    <?
                } ?>
            </tr>
            </tbody>
        </table>
        <br>
        <br>
    </div>
    <?
} ?>
    <script type="text/javascript">
        const name = '<?php echo $results[1];?>';
    </script>
<?
$script = <<< JS
    $("#pechat222").click(function () {
        var table = $('#tableId2');
        if (table && table.length) {
            var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: 'Анкета директоров '+name+'.xls',
                fileext: ".xl",
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