<?php
use common\models\DetiAnket;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Выгрузка данных ИТОГОВЫХ ЗНАЧЕНИЙ по анкетам организаторов питания ';

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
            //'hasAccessMunicipality' => true,
            //'hasAccessOrg' => true,
            //'hasAccessTerrain' => true,
            //'hasAccessTypeSchool' => true,
            //'hasAccessShow' => true,
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
            <th class="text-center" rowspan="2">Субъект</th>
            <th class="text-center" rowspan="2">Количество обслуживаемых школ операторами питания</th>
            <th class="text-center" colspan="5">Количество школ в которые поставляется обогащенная ВИТАМИНАМИ продукция</th>
            <th class="text-center" colspan="5">Количество школ, в которые поставляется пищевая продукция, после проведения дополнительных исследований </th>
            <th class="text-center" colspan="10">Удельный вес МЕСТНОЙ продукции в структуре поставляемой в школы продукции (в%)</th>
            <th class="text-center" colspan="10">Удельный вес ИМПОРТНОЙ продукции в структуре поставляемой в школы продукции (в%)</th>
            <th class="text-center" colspan="10">Среднее количество поставщиков продуктов от производителя до школы по группам продуктов (Продукция РФ)</th>
            <th class="text-center" colspan="10">Среднее количество поставщиков продуктов от производителя до школы по группам продуктов (местная продукция)</th>
            <th class="text-center" colspan="10">Среднее количество поставщиков продуктов от производителя до школы по группам продуктов (импортная продукция)</th>
            <th class="text-center" colspan="4">Количество операторов питания, оценивших организацию питания в обслуживаемых школах с оценкой</th>
        </tr>
        <tr class="row1">
            <th class="text-center">всего</th>
            <th class="text-center">хлеб</th>
            <th class="text-center">молочная продукция</th>
            <th class="text-center">кисели</th>
            <th class="text-center">напитки</th>
            <th class="text-center">по показателям фальсификации</th>
            <th class="text-center">на а/б</th>
            <th class="text-center">на пестициды</th>
            <th class="text-center">на содержание витаминов и минералов</th>
            <th class="text-center">на м/б показатели</th>
            <th class="text-center">молоко</th>
            <th class="text-center">кисломолочная продукция</th>
            <th class="text-center">Творог</th>
            <th class="text-center">мясо</th>
            <th class="text-center">рыба</th>
            <th class="text-center">крупы и бобовые</th>
            <th class="text-center">овощи</th>
            <th class="text-center">картофель</th>
            <th class="text-center">фрукты</th>
            <th class="text-center">яйца</th>
            <th class="text-center">молоко</th>
            <th class="text-center">кисломолочная продукция</th>
            <th class="text-center">Творог</th>
            <th class="text-center">мясо</th>
            <th class="text-center">рыба</th>
            <th class="text-center">крупы и бобовые</th>
            <th class="text-center">овощи</th>
            <th class="text-center">картофель</th>
            <th class="text-center">фрукты</th>
            <th class="text-center">яйца</th>
            <th class="text-center">молоко</th>
            <th class="text-center">кисломолочная продукция</th>
            <th class="text-center">Творог</th>
            <th class="text-center">мясо</th>
            <th class="text-center">рыба</th>
            <th class="text-center">крупы и бобовые</th>
            <th class="text-center">овощи</th>
            <th class="text-center">картофель</th>
            <th class="text-center">фрукты</th>
            <th class="text-center">яйца</th>
            <th class="text-center">молоко</th>
            <th class="text-center">кисломолочная продукция</th>
            <th class="text-center">Творог</th>
            <th class="text-center">мясо</th>
            <th class="text-center">рыба</th>
            <th class="text-center">крупы и бобовые</th>
            <th class="text-center">овощи</th>
            <th class="text-center">картофель</th>
            <th class="text-center">фрукты</th>
            <th class="text-center">яйца</th>
            <th class="text-center">молоко</th>
            <th class="text-center">кисломолочная продукция</th>
            <th class="text-center">Творог</th>
            <th class="text-center">мясо</th>
            <th class="text-center">рыба</th>
            <th class="text-center">крупы и бобовые</th>
            <th class="text-center">овощи</th>
            <th class="text-center">картофель</th>
            <th class="text-center">фрукты</th>
            <th class="text-center">яйца</th>
            <th class="text-center">отлично</th>
            <th class="text-center">хорошо</th>
            <th class="text-center">удовлетворительно</th>
            <th class="text-center">не удовлетворительно</th>
        </tr>
        <tr>
            <?
            for ($i = 1; $i <= 66; $i++) { ?>
                <th class="text-center"><?= $i ?></th>
                <?
            } ?>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?
            for ($i = 1; $i <= 66; $i++) {
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
                filename: 'Анкета организаторов питания '+name+'.xls',
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