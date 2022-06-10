<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Alert;
use common\models\Organization;
use common\models\SelectOrgForm;
use yii\bootstrap4\ActiveForm;
use xtetis\bootstrap4glyphicons\assets\GlyphiconAsset;

GlyphiconAsset::register($this);

AppAsset::register($this);
date_default_timezone_set('Europe/Moscow');
?>
<?php
$this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php
    $this->head() ?>
</head>
<body>
<?php
$this->beginBody() ?>
<style>
    .main-color {
        background-color: #0ea1a8 !important;
    }

    .dropdown-menu-right-2 {
        right: auto !important;;
        left: 0 !important;;
    }

    .menu-custom {
        font-size: 1.05rem !important;
        font-family: serif !important;
    }

    .footer {
        height: 40px !important;
    }
</style>

<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => Yii::$app->name,
        //'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-dark main-color navbar-expand-lg p-0',
        ],
    ]);

    $model_user = new \common\models\User();
    if (Yii::$app->user->isGuest) {
        $menuItems[] = [
            'label' => 'Авторизация',
            'url' => ['/site/login'],
            'options' => ['class' => 'btn btn-outline-light mr-3 mt-2 mb-2'],
        ];
        $menuItems[] = [
            'label' => 'Регистрация для операторов питания',
            'url' => ['/site/signup'],
            'options' => ['class' => 'btn btn-outline-light mr-3 mt-2 mb-2'],
        ];
        $menuItems[] = [
            'label' => 'Анкета №3 "Анкета детей и родителей обучающихся"',
            'url' => ['/table3/index'],
            'options' => ['class' => 'btn btn-outline-light mr-3 mt-2 mb-2'],
        ];
        $logout = '';
    }
    if (Yii::$app->user->can('admin')) {
        $menuItems = [
            ['label' => 'Главная', 'url' => ['site/index'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
            ['label' => 'Личные данные', 'url' => ['users/profile'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
            [
                'label' => 'Просмотр внесенных данных',
                'url' => ['#'],
                'options' => ['class' => 'mr-3 p-2 menu-custom'],
                'items' => [
                    ['label' => 'Анкета директоров', 'url' => ['/director/index'], 'options' => ['class' => '']],
                    [
                        'label' => 'Анкета организаторов питания',
                        'url' => ['/food/index'],
                        'options' => ['class' => ''],
                    ],
                    ['label' => 'Анкета школьников', 'url' => ['/table3/index'], 'options' => ['class' => '']],
                ],
            ],
            [
                'label' => 'Отчеты',
                'url' => ['#'],
                'options' => ['class' => 'mr-3 p-2 menu-custom'],
                'items' => [
                    ['label' => 'Анкета директоров', 'url' => ['/director/report'], 'options' => ['class' => '']],
                    [
                        'label' => 'Анкета организаторов питания',
                        'url' => ['/food/report'],
                        'options' => ['class' => ''],
                    ],
                    ['label' => 'Анкета школьников', 'url' => ['/table3/index'], 'options' => ['class' => '']],
                ],
            ],
            [
                'label' => 'Пользователи',
                'url' => ['/users/index'],
                'options' => ['style' => 'background-color: #621363 !important;', 'class' => 'mr-3 p-2 menu-custom'],
                'items' => [
                    //['label' => 'Форма заполнения документа', 'url' => ['/report-excel/create'], 'options' => ['class' => '']],
                ],
            ],
			['label' => 'Прикрепление организаций', 'url' => ['/food-organizer'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
            ['label' => 'Чат', 'url' => ['/chat'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
           
        ];

        //$organization_name = Organization::find()->select('title')->where(['id'=>Yii::$app->user->identity->organization_id])->one();
        $logout = Html::begintag('div', ['class' => 'text-right'])
            .Html::tag('div', 'Пользователь: ' . Yii::$app->user->identity->name . ' (' . Yii::$app->myComponent->get_orgainization_name(Yii::$app->user->identity->organization_id) . ')', ['class' => ''])
            .Html::beginForm(['/site/logout'], 'post')
            .Html::submitButton(' Выход', ['class' => 'btn main-button-2-outline logout'])
            .Html::endForm()
            .Html::endTag('div');
    }
    if (Yii::$app->user->can('director_school')) {
        $menuItems = [
            ['label' => 'Оперативная информация', 'url' => ['site/index'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
            ['label' => 'Личные данные', 'url' => ['users/profile'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
            [
                'label' => 'Внесение данных',
                'url' => ['#'],
                'options' => ['class' => 'mr-3 p-2 menu-custom'],
                'items' => [
                    ['label' => 'Анкета руководителей образовательных организаций', 'url' => ['/director/index'], 'options' => ['class' => '']],
                    ['label' => 'Анкета детей и родителей обучающихся', 'url' => ['/table3/index'], 'options' => ['class' => '']],
                ],
            ],
            ['label' => 'Отчеты (планируемая и фактическая информация)', 'url' => ['#'], 'options' => ['class' => 'mr-3 p-2 menu-custom'],
                'items' => [
                    ['label' => 'Анкета детей и родителей обучающихся', 'url' => ['#'], 'options' => ['class' => '']],
                ]
            ],
            ['label' => 'Чат', 'url' => ['/chat'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
        ];

        //$organization_name = Organization::find()->select('title')->where(['id'=>Yii::$app->user->identity->organization_id])->one();
        $logout = Html::begintag('div', ['class' => 'text-right'])
            .Html::tag('div', 'Пользователь: ' . Yii::$app->user->identity->name . ' (' . Yii::$app->myComponent->get_orgainization_name(Yii::$app->user->identity->organization_id) . ')', ['class' => ''])
            .Html::beginForm(['/site/logout'], 'post')
            .Html::submitButton(' Выход', ['class' => 'btn main-button-2-outline logout'])
            .Html::endForm()
            .Html::endTag('div');
    }

    if (Yii::$app->user->can('food_organizer') || Yii::$app->user->can('rospotrebnadzor')) {
        $menuItems = [
            /*['label' => 'Главная', 'url' => ['site/index'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],*/
            ['label' => 'Оперативная информация', 'url' => ['site/index'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
            ['label' => 'Личные данные', 'url' => ['users/profile'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
			['label' => 'Прикрепление организаций', 'url' => ['/food-organizer'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
            [
                'label' => 'Внесение данных',
                'url' => ['#'],
                'options' => ['class' => 'mr-3 p-2 menu-custom'],
                'items' => [
                    ['label' => 'Анкета руководителей образовательных организаций', 'url' => ['/director/index'], 'options' => ['class' => '']],
                    [
                        'label' => 'Анкета организаторов (операторов) питания',
                        'url' => ['/food/index'],
                        'options' => ['class' => ''],
                    ],
                    ['label' => 'Анкета детей и родителей обучающихся', 'url' => ['/table3/index'], 'options' => ['class' => '']],
                ],
            ],
            ['label' => 'Отчеты (планируемая и фактическая информация)', 'url' => ['#'], 'options' => ['class' => 'mr-3 p-2 menu-custom'],
                'items' => [
                    ['label' => 'Анкета руководителей образовательных организаций', 'url' => ['/users/report-anket1'], 'options' => ['class' => '']],
                    ['label' => 'Анкета организаторов (операторов) питания', 'url' => ['/users/report-anket2'], 'options' => ['class' => '']],
                    ['label' => 'Анкета детей и родителей обучающихся', 'url' => ['/users/report-anket3'], 'options' => ['class' => '']],
                ]
            ],
            ['label' => 'Чат', 'url' => ['/chat'], 'options' => ['class' => 'mr-3 p-2 menu-custom']],
        ];

        //$organization_name = Organization::find()->select('title')->where(['id'=>Yii::$app->user->identity->organization_id])->one();
        $logout = Html::begintag('div', ['class' => 'text-right'])
            .Html::tag('div', 'Пользователь: ' . Yii::$app->user->identity->name . ' (' . Yii::$app->myComponent->get_orgainization_name(Yii::$app->user->identity->organization_id) . ')', ['class' => ''])
            .Html::beginForm(['/site/logout'], 'post')
            .Html::submitButton(' Выход', ['class' => 'btn main-button-2-outline logout'])
            .Html::endForm()
            .Html::endTag('div');
    }

    //повсем
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left main-color '],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid mt-3 ">
        <?= $logout ?>
        <?
        if (!Yii::$app->user->isGuest) { ?>
            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'homeLink'=>false
                ]); ?>
            </div>
            <?
        } ?>
        <?php
        if (Yii::$app->session->hasFlash('success')): ?>
            <div class="container alert alert-success alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <?php
                echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php
        endif; ?>
        <?php
        if (Yii::$app->session->hasFlash('error')): ?>
            <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <?php
                echo Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php
        endif; ?>


        <?= $content ?>
    </div>

</div>

<footer class="footer main-color">
    <p class="text-light ml-3 font-weight-bold">Разработчик: <a href="http://niig.su"
                                                                class="text-light font-weight-normal">ФБУН
            "Новосибирский НИИ гигиены" Роспотребнадзора</a></p>
    <!-- <p class="text-light ml-3 font-weight-bold">2021 год</p>-->
</footer>

<?php
$this->endBody() ?>
</body>
</html>
<?php
$this->endPage() ?>
