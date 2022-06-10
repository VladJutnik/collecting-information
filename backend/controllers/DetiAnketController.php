<?php

namespace backend\controllers;

use Cassandra\Date;
use common\models\DetiAnketSearch;
use common\models\DetiAnketTable1827;
use common\models\DetiAnketTable2834;
use common\models\DetiAnketTable3544;
use common\models\DetiAnketTable4548;
use common\models\FederalDistrict;
use common\models\Municipality;
use common\models\Organization;
use common\models\Region;
use common\models\Report;
use Mpdf\Mpdf;
use Yii;
use common\models\DetiAnket;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetiAnketController implements the CRUD actions for DetiAnket model.
 */
class DetiAnketController extends Controller
{
    use RegionReport;

    // подключаем трейт

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            //'create',
                            'region-list',
                            'organization-list',
                            'municipality-list',
                            'index',
                            'view',
                            'print-anket',
                            'report',
                            'region-list-report',
                            'municipality-list-report',
                            'organization-list-report',
                        ],
                        'allow' => true,
                        'roles' => [
                            'admin',
                            'director_school',
                            'rospotrebnadzor',
                        ],
                    ],
                    [
                        'actions' => [
                            'index',
                            'report',
                            'region-list-report',
                            'municipality-list-report',
                            'organization-list-report',
                        ],
                        'allow' => true,
                        'roles' => [
                            'curator',
                        ],
                    ],
                    [
                        'actions' => [
                            'create',
                            'report',
                            'report-admin',
                            'report-admin-itog',
                            'report-admin-matrix',
                        ],
                        'allow' => true,
                        'roles' => [
                            'admin',
                        ],
                    ],
                    [
                        'actions' => [
                            'create',
                            'region-list',
                            'organization-list',
                            'municipality-list',
                        ],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    Yii::$app->session->setFlash(
                        "error",
                        "У Вас нет доступа к этой странице, пожалуйста, обратитесь к администратору!"
                    );
                    if (Yii::$app->user->isGuest) {
                        return $this->goHome();
                    } else {
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                },
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $hasAccessFederalDistrict = (Yii::$app->user->can('admin')) ? true : false;
        $hasAccessRegion = (Yii::$app->user->can('admin') || Yii::$app->user->can('curator')) ? true : false;
        $hasAccessMunicipality = (Yii::$app->user->can('admin') || Yii::$app->user->can('curator') || Yii::$app->user->can('rospotrebnadzor')) ? true : false;

        $searchModel = new DetiAnketSearch();
        $search = Yii::$app->request->queryParams;
        if (!Yii::$app->user->can('admin')) {
            $region_items = Yii::$app->myComponent->RegionItems(Yii::$app->user->identity->federal_district_id);
        }
        $dataProvider = $searchModel->search($search);
        if ($search['DetiAnketSearch']['federal_district_id']) {
            $region_items = (Yii::$app->user->can('curator') || Yii::$app->user->can('rospotrebnadzor')) ? Yii::$app->myComponent->RegionItems(Yii::$app->user->identity->federal_district_id) : Yii::$app->myComponent->RegionItems($search['DetiAnketSearch']['federal_district_id']);
        }
        if ($search['DetiAnketSearch']['region_id']) {
            //$municipality_items = Yii::$app->myComponent->MunicipalityItems($search['DetiAnketSearch']['region_id']);
            $municipality_items = Yii::$app->myComponent->MunicipalityItems($search['DetiAnketSearch']['region_id']);
        } else {
            $municipality_items = Yii::$app->myComponent->MunicipalityItems(Yii::$app->user->identity->region_id);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'region_items' => $region_items,
            'municipality_items' => $municipality_items,
            'hasAccessFederalDistrict' => $hasAccessFederalDistrict,
            'hasAccessRegion' => $hasAccessRegion,
            'hasAccessMunicipality' => $hasAccessMunicipality,
        ]);
    }

    public function actionCreate($id = false)
    {
        if ($id) {
            if (Yii::$app->user->isGuest) {
                return $this->goHome();
            }
            $model = $this->findModel($id);
            $DetiAnketTable1827 = $this->findDetiAnketTable1827($model->table_18_27);
            $DetiAnketTable2834 = $this->findDetiAnketTable2834($model->table_28_34);
            $DetiAnketTable3544 = $this->findDetiAnketTable3544($model->table_35_44);
            $DetiAnketTable4548 = $this->findDetiAnketTable4548($model->table_45_48);

            $district_items = ArrayHelper::map(FederalDistrict::find()->all(), 'id', 'name');
            $region_items = ArrayHelper::map(Region::find()->where(['district_id' => $model->federal_district_id])->all(),
                'id', 'name');
            $municipality_items = ArrayHelper::map(Municipality::find()->where(['region_id' => $model->region_id])->all(),
                'id', 'name');
            $org_items = ArrayHelper::map(Organization::find()->where([
                'municipality_id' => $model->municipality_id,
                'organization_type_id' => [5],
            ])->all(), 'id', 'title');
        } else {
            if (Yii::$app->user->isGuest) {
                $model = new DetiAnket();
                $model->field1_2 = date("Y-m-d");
                $DetiAnketTable1827 = new DetiAnketTable1827();
                $DetiAnketTable2834 = new DetiAnketTable2834();
                $DetiAnketTable3544 = new DetiAnketTable3544();
                $DetiAnketTable4548 = new DetiAnketTable4548();

                $district_items = ArrayHelper::map(FederalDistrict::find()->all(), 'id', 'name');
                $region_items = ArrayHelper::map(Region::find()->where(['district_id' => 1])->all(), 'id', 'name');
                $municipality_items = ArrayHelper::map(Municipality::find()->where(['region_id' => 1])->all(), 'id',
                    'name');
                $org_items = ArrayHelper::map(Organization::find()->where([
                    'municipality_id' => 1565,
                    'organization_type_id' => [5],
                ])->all(), 'id', 'title');
            } else {
                $district_items = ArrayHelper::map(FederalDistrict::find()->all(), 'id', 'name');
                $region_items = ArrayHelper::map(Region::find()->where(['district_id' => Yii::$app->user->identity->federal_district_id])->all(),
                    'id', 'name');
                $municipality_items = ArrayHelper::map(Municipality::find()->where(['region_id' => Yii::$app->user->identity->region_id])->all(),
                    'id', 'name');
                $org_items = ArrayHelper::map(Organization::find()->where([
                    'municipality_id' => Yii::$app->user->identity->municipality_id,
                    'organization_type_id' => [5],
                ])->all(), 'id', 'title');

                $model = new DetiAnket();
                $model->federal_district_id = Yii::$app->user->identity->federal_district_id;
                $model->region_id = Yii::$app->user->identity->region_id;
                $model->municipality_id = Yii::$app->user->identity->municipality_id;
                $model->organization_id = Yii::$app->user->identity->organization_id;
                $model->field1_2 = date("Y-m-d");
                $DetiAnketTable1827 = new DetiAnketTable1827();
                $DetiAnketTable2834 = new DetiAnketTable2834();
                $DetiAnketTable3544 = new DetiAnketTable3544();
                $DetiAnketTable4548 = new DetiAnketTable4548();
            }
        }

        if (Yii::$app->request->post()) {
            $status = true;
            $model->load(Yii::$app->request->post());
            $DetiAnketTable1827->load(Yii::$app->request->post());
            $DetiAnketTable2834->load(Yii::$app->request->post());
            $DetiAnketTable3544->load(Yii::$app->request->post());
            $DetiAnketTable4548->load(Yii::$app->request->post());

            $region_items = ($model->region_id) ? $this->getArrayRegionItems($model->federal_district_id) : $this->getArrayRegionItems(); //пролучаем список областей!
            $municipality_items = ($model->municipality_id) ? $this->getArrayMunicipalityItems($model->region_id) : $this->getArrayMunicipalityItems(); //пролучаем список областей!
            $org_items = ($model->organization_id) ? $this->getArrayOrganizationItems($model->municipality_id,
                5) : $this->getArrayOrganizationItems(); //пролучаем список областей!

            if (!$model->federal_district_id || !$model->region_id || !$model->municipality_id || !$model->organization_id) {
                $status = false;
                Yii::$app->session->setFlash(
                    'error',
                    "Проверьте правильность внесения: Федерального округа, Субъекта федерации, Муниципального образования или 2. Школа."
                );
            }

            if ($status === true) {
                if ($DetiAnketTable1827->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! В впоросах с 18 по 27"
                    );
                }
            }

            if ($status === true) {
                if ($DetiAnketTable2834->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! В впоросах с 28 по 35"
                    );
                }
            }

            if ($status === true) {
                if ($DetiAnketTable3544->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! В впоросах с 36 по 44"
                    );
                }
            }

            if ($status === true) {
                if ($DetiAnketTable4548->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! В вопросах с 45 по 48"
                    );
                }
            }

            if ($status === true) {
                if ($model->field1_2 < '2022-03-01' || $model->field1_2 > '2022-04-30') {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка в 4. Дата заполнения анкеты: (возможные варианты с 01.03 по 30.04)"
                    );
                }
                /*$birthday_timestamp = strtotime($model->field1_3);
                $age = date('Y') - date('Y', $birthday_timestamp);
                if (date('md', $birthday_timestamp) > date('md', strtotime($model->field1_2))) {
                    $age--;
                }
                if ($model->field1_4 !== $age) {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка в 5 и 6. Дата рождения ребенка не совпадает с возрастом на дату внесения анкеты"
                    );
                }*/
            }

            if ($status === true) {
                if ($model->field1_3 < '2000-01-01' || $model->field1_3 > '2016-12-31') {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка в 5. Дата рождения ребенка: (возможные варианты даты в диапозоне с 2000 по 2016 год)"
                    );
                }
            }

            if ($status === true) {
                $weight = $model->field1_16; //15.1. вес ребенка (в кг)
                $growth = $model->field1_17; //15.2. рост ребенка (в см):
                /*if($weight > 2 && $growth >2) {
                    $imt2 = round($weight / (($growth / 100) * ($growth / 100)), 2);
                    //print_r($imt2);
                    if ($imt2 > 15 && $imt2 < 50) {
                        $status = true;
                    } else {
                        $status = false;
                        Yii::$app->session->setFlash(
                            'error',
                            "У Вас ошибка при внесении вопроса 15: некорректные данные веса и роста"
                        );
                    }
                }*/
                if ($weight > 2 && $growth > 2) {
                    if ($weight > 13 && $weight < 151) {
                        $status = true;
                    } else {
                        $status = false;
                        Yii::$app->session->setFlash(
                            'error',
                            "У Вас ошибка при внесении вопроса 15: некорректные данные веса"
                        );
                    }
                }
                if ($weight > 2 && $growth > 2) {
                    if ($growth > 99 && $growth < 221) {
                        $status = true;
                    } else {
                        $status = false;
                        Yii::$app->session->setFlash(
                            'error',
                            "У Вас ошибка при внесении вопроса 15: некорректные данные роста"
                        );
                    }
                }
            }

            if ($status === true) {
                $weight = $model->field1_18;
                $growth = $model->field1_19;
                /*if($weight > 2 && $growth >2) {
                    $imt2 = round($weight / (($growth / 100) * ($growth / 100)), 2);
                    //print_r($imt2);
                    if ($imt2 > 15 && $imt2 < 50) {
                        $status = true;
                    } else {
                        $status = false;
                        Yii::$app->session->setFlash(
                            'error',
                            "У Вас ошибка при внесении вопроса 16: некорректные данные веса и роста"
                        );
                    }
                }*/
                if ($weight > 2 && $growth > 2) {
                    if ($weight > 29 && $weight < 251) {
                        $status = true;
                    } else {
                        $status = false;
                        Yii::$app->session->setFlash(
                            'error',
                            "У Вас ошибка при внесении вопроса 16: некорректные данные веса"
                        );
                    }
                }
                if ($weight > 2 && $growth > 2) {
                    if ($growth > 119 && $growth < 231) {
                        $status = true;
                    } else {
                        $status = false;
                        Yii::$app->session->setFlash(
                            'error',
                            "У Вас ошибка при внесении вопроса 16: некорректные данные роста"
                        );
                    }
                }
                if ($status === true) {
                    $weight = $model->field1_20;
                    $growth = $model->field1_21;
                    /*if($weight > 2 && $growth >2) {
                        $imt2 = round($weight / (($growth / 100) * ($growth / 100)), 2);
                        //print_r($imt2);
                        if ($imt2 > 15 && $imt2 < 50) {
                            $status = true;
                        } else {
                            $status = false;
                            Yii::$app->session->setFlash(
                                'error',
                                "У Вас ошибка при внесении вопроса 17: некорректные данные веса и роста"
                            );
                        }
                    }*/
                    if ($weight > 2 && $growth > 2) {
                        if ($weight > 29 && $weight < 251) {
                            $status = true;
                        } else {
                            $status = false;
                            Yii::$app->session->setFlash(
                                'error',
                                "У Вас ошибка при внесении вопроса 17: некорректные данные веса"
                            );
                        }
                    }
                    if ($weight > 2 && $growth > 2) {
                        if ($growth > 119 && $growth < 231) {
                            $status = true;
                        } else {
                            $status = false;
                            Yii::$app->session->setFlash(
                                'error',
                                "У Вас ошибка при внесении вопроса 17: некорректные данные роста"
                            );
                        }
                    }
                }
            }

            if ($status === true) {
                if ($DetiAnketTable1827->save(false)) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! В таблице 1827"
                    );
                }
            }
            if ($status === true) {
                if ($DetiAnketTable2834->save(false)) {
                    $status = true;
                } else {
                    $status = false;
                    $DetiAnketTable1827->delete();
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! В таблице 2834"
                    );
                }
            }
            if ($status === true) {
                if ($DetiAnketTable3544->save(false)) {
                    $status = true;
                } else {
                    $status = false;
                    $DetiAnketTable1827->delete();
                    $DetiAnketTable2834->delete();
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! В таблице 3544"
                    );
                }
            }
            if ($status === true) {
                if ($DetiAnketTable4548->save(false)) {
                    $status = true;
                } else {
                    $status = false;
                    $DetiAnketTable1827->delete();
                    $DetiAnketTable2834->delete();
                    $DetiAnketTable3544->delete();
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! В таблице 4548"
                    );
                }
            }

            //СОХРАНЯЕМ ДАННЫЕ!
            if ($status === true) {
                $model->user_id = (Yii::$app->user->isGuest) ? 0 : Yii::$app->user->identity->id;
                $model->table_18_27 = $DetiAnketTable1827->id;
                $model->table_28_34 = $DetiAnketTable2834->id;
                $model->table_35_44 = $DetiAnketTable3544->id;
                $model->table_45_48 = $DetiAnketTable4548->id;
                if ($model->save(false)) {
                    //$sex = $model->field1_5; //пол
                    $weight = $model->field1_16; //15.1. вес ребенка (в кг)
                    $growth = $model->field1_17; //15.2. рост ребенка (в см):
                    //$age = $model->field1_4; //возраст

                    if (!is_numeric($weight)) {
                        $weight = 1;
                    }
                    if ($weight === '0') {
                        $weight = 1;
                    }
                    if ($growth === '0') {
                        $growth = 1;
                    }
                    if (!is_numeric($growth)) {
                        $growth = 1;
                    }


                    $imt2 = round($weight / (($growth / 100) * ($growth / 100)), 2);
                    /* $imt_str = '';
                     if($imt == 'Дефицит массы тела'){
                         $imt_str = 'отмечается дефицит массы';
                     }
                     elseif($imt == 'Нормальный вес'){
                         $imt_str = 'гармоничное';
                     }
                     elseif($imt == 'Избыточная масса тела'){
                         $imt_str = 'отмечается избыток массы';
                     }
                     elseif($imt == 'Ожирение'){
                         $imt_str = 'отмечается ожирение';
                     }*/

                    Yii::$app->session->setFlash(
                        'success',
                        " Анкета принята. <br> Спасибо за сотрудничество! <br>"
                    );
                } else {
                    $DetiAnketTable1827->delete();
                    $DetiAnketTable2834->delete();
                    $DetiAnketTable3544->delete();
                    $DetiAnketTable4548->delete();
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении!"
                    );
                }

                return $this->redirect('create');
            }

            // Создать views doc и сделать вывод на страницу!
            // сделать печать к doc
        }

        return $this->render('create', [
            'model' => $model,
            'district_items' => $district_items,
            'region_items' => $region_items,
            'municipality_items' => $municipality_items,
            'org_items' => $org_items,
            'DetiAnketTable1827' => $DetiAnketTable1827,
            'DetiAnketTable2834' => $DetiAnketTable2834,
            'DetiAnketTable3544' => $DetiAnketTable3544,
            'DetiAnketTable4548' => $DetiAnketTable4548,
        ]);
    }

    //вынесу в отдельный метод редактирование

    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $stausButtom = 1;
        $model = $this->findModel($id);
        $DetiAnketTable1827 = $this->findDetiAnketTable1827($model->table_18_27);
        $DetiAnketTable2834 = $this->findDetiAnketTable2834($model->table_28_34);
        $DetiAnketTable3544 = $this->findDetiAnketTable3544($model->table_35_44);
        $DetiAnketTable4548 = $this->findDetiAnketTable4548($model->table_45_48);

        return $this->render('view', [
            'model' => $model,
            'stausButtom' => $stausButtom,
            'DetiAnketTable1827' => $DetiAnketTable1827,
            'DetiAnketTable2834' => $DetiAnketTable2834,
            'DetiAnketTable3544' => $DetiAnketTable3544,
            'DetiAnketTable4548' => $DetiAnketTable4548,
        ]);
    }

    public function actionReport()
    {
        ini_set('max_execution_time', 9600);
        ini_set('memory_limit', '15092M');
        ini_set("pcre.backtrack_limit", "5000000");

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $modelReport = new Report();

        $hasAccessFederalDistrict = (Yii::$app->user->can('admin')|| Yii::$app->user->can('curator')) ? true : false;
        $hasAccessRegion = (Yii::$app->user->can('admin')|| Yii::$app->user->can('curator')) ? true : false;
        $hasAccessMunicipality = (Yii::$app->user->can('admin')|| Yii::$app->user->can('curator') || Yii::$app->user->can('rospotrebnadzor')) ? true : false;
        $hasAccessOrg = (Yii::$app->user->can('admin')|| Yii::$app->user->can('curator') || Yii::$app->user->can('rospotrebnadzor')) ? true : false;

        $modelReport->federal_district_idReport = Yii::$app->user->identity->federal_district_id;
        $modelReport->region_idReport = Yii::$app->user->identity->region_id;
        $modelReport->municipality_idReport = Yii::$app->user->identity->municipality_id;

        $district_items = $this->getArrayDistrictItems(true); //пролучаем список областей!
        $region_items = $this->getArrayRegionItems(Yii::$app->user->identity->federal_district_id,
            true); //пролучаем список областей!
        $municipality_items = $this->getArrayMunicipalityItems(Yii::$app->user->identity->region_id,
            true); //пролучаем список областей!
        $org_items = $this->getArrayOrganizationItems(Yii::$app->user->identity->municipality_id, 5,
            true); //пролучаем список областей!

        /*   print_r($district_items);
        print_r('<br>');
        print_r('<br>');
        print_r($region_items);
        print_r('<br>');
        print_r('<br>');
        print_r($municipality_items);
        print_r('<br>');
        print_r('<br>');
        print_r($org_items);
        print_r('<br>');
        print_r('<br>');
        exit();*/
        /*SELECT * FROM `deti_anket`
        inner join deti_anket_table_18_27 on deti_anket.`table_18_27` = deti_anket_table_18_27.id
        INNER join deti_anket_table_28_34 on deti_anket.`table_28_34` = deti_anket_table_28_34.id
        INNER join deti_anket_table_35_44 on deti_anket.`table_35_44` = deti_anket_table_35_44.id
        INNER join deti_anket_table_45_48 on deti_anket.`table_45_48` = deti_anket_table_45_48.id*/
        /* $model = DetiAnket::find()->
        innerJoin('deti_anket_table_18_27', 'deti_anket_table_18_27.id = deti_anket.table_18_27')->
        asArray()->
        all();*/
        /* $rows = (new \yii\db\Query())
            ->from('user')
            ->where(['last_name' => 'Smith'])
            ->limit(10)
            ->all();*/

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post()['Report'];
            $modelReport->federal_district_idReport = $post['federal_district_idReport'];
            $modelReport->region_idReport = $post['region_idReport'];
            $modelReport->municipality_idReport = $post['municipality_idReport'];
            $modelReport->organization_idReport = $post['organization_idReport'];
            /*//[federal_district_idReport]
            //[region_idReport]
            $where = [];*/
            $region_items = $this->getArrayRegionItems($post['federal_district_idReport'],true); //пролучаем список областей!
            $municipality_items = $this->getArrayMunicipalityItems($post['region_idReport'],
                true); //пролучаем список областей!
            $org_items = $this->getArrayOrganizationItems($post['municipality_idReport'], 5,
                true); //пролучаем список областей!

            $where = [];
            ($post['federal_district_idReport'] && $post['federal_district_idReport'] !== 'v') ? $where += ['deti_anket.federal_district_id' => $post['federal_district_idReport']] : $where += [];
            ($post['region_idReport'] && $post['region_idReport'] !== 'v') ? $where += ['deti_anket.region_id' => $post['region_idReport']] : $where += [];
            ($post['municipality_idReport'] && $post['municipality_idReport'] !== 'v') ? $where += ['deti_anket.municipality_id' => $post['municipality_idReport']] : $where += [];
            ($post['organization_idReport'] && $post['organization_idReport'] !== 'v') ? $where += ['deti_anket.organization_id' => $post['organization_idReport']] : $where += [];
            if (Yii::$app->user->can('rospotrebnadzor')) {
                $where += [
                    'deti_anket.federal_district_id' => Yii::$app->user->identity->federal_district_id,
                    'deti_anket.region_id' => Yii::$app->user->identity->region_id
                ];
            }
            $rows = (new \yii\db\Query())
                ->from('deti_anket')
                ->join('left JOIN', 'deti_anket_table_18_27', 'deti_anket_table_18_27.id = deti_anket.table_18_27')
                ->join('left JOIN', 'deti_anket_table_28_34', 'deti_anket_table_28_34.id = deti_anket.table_28_34')
                ->join('left JOIN', 'deti_anket_table_35_44', 'deti_anket_table_35_44.id = deti_anket.table_35_44')
                ->join('left JOIN', 'deti_anket_table_45_48', 'deti_anket_table_45_48.id = deti_anket.table_45_48')
                ->where($where)
                //->asArray()
                ->all();
            /*  print_r('<pre>');
              print_r($rows);
              print_r('</pre>');
              exit();*/
            if (!$rows) {
                Yii::$app->session->setFlash('error', 'Данных не найдено!');
            }
        }

        /*print_r('<pre>');
         print_r($rows);
         print_r('</pre>');*/

        return $this->render('report', [
            'hasAccessFederalDistrict' => $hasAccessFederalDistrict,
            'hasAccessRegion' => $hasAccessRegion,
            'hasAccessMunicipality' => $hasAccessMunicipality,
            'hasAccessOrg' => $hasAccessOrg,

            'models' => $rows,
            'modelReport' => $modelReport,
            'district_items' => $district_items,
            'region_items' => $region_items,
            'municipality_items' => $municipality_items,
            'org_items' => $org_items,
        ]);
    }

    public function actionReportAdmin()
    {
        ini_set('max_execution_time', 4600);
        ini_set('memory_limit', '12092M');
        ini_set("pcre.backtrack_limit", "5000000");

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $modelReport = new Report();
        $modelDeti = new DetiAnket();

        $hasAccessFederalDistrict = (Yii::$app->user->can('admin')) ? true : false;
        $hasAccessRegion = (Yii::$app->user->can('admin')) ? true : false;
        $hasAccessMunicipality = (Yii::$app->user->can('admin') || Yii::$app->user->can('rospotrebnadzor')) ? true : false;
        $hasAccessOrg = (Yii::$app->user->can('admin') || Yii::$app->user->can('rospotrebnadzor')) ? true : false;

        $modelReport->federal_district_idReport = Yii::$app->user->identity->federal_district_id;
        $modelReport->region_idReport = Yii::$app->user->identity->region_id;
        $modelReport->municipality_idReport = Yii::$app->user->identity->municipality_id;

        $district_items = $this->getArrayDistrictItems(true); //пролучаем список областей!
        $region_items = $this->getArrayRegionItems(Yii::$app->user->identity->federal_district_id,
            true); //пролучаем список областей!
        $municipality_items = $this->getArrayMunicipalityItems(Yii::$app->user->identity->region_id,
            true); //пролучаем список областей!
        $org_items = $this->getArrayOrganizationItems(Yii::$app->user->identity->municipality_id, 5,
            true); //пролучаем список областей!

        /*   print_r($district_items);
        print_r('<br>');
        print_r('<br>');
        print_r($region_items);
        print_r('<br>');
        print_r('<br>');
        print_r($municipality_items);
        print_r('<br>');
        print_r('<br>');
        print_r($org_items);
        print_r('<br>');
        print_r('<br>');
        exit();*/
        /*SELECT * FROM `deti_anket`
        inner join deti_anket_table_18_27 on deti_anket.`table_18_27` = deti_anket_table_18_27.id
        INNER join deti_anket_table_28_34 on deti_anket.`table_28_34` = deti_anket_table_28_34.id
        INNER join deti_anket_table_35_44 on deti_anket.`table_35_44` = deti_anket_table_35_44.id
        INNER join deti_anket_table_45_48 on deti_anket.`table_45_48` = deti_anket_table_45_48.id*/
        /* $model = DetiAnket::find()->
        innerJoin('deti_anket_table_18_27', 'deti_anket_table_18_27.id = deti_anket.table_18_27')->
        asArray()->
        all();*/
        /* $rows = (new \yii\db\Query())
            ->from('user')
            ->where(['last_name' => 'Smith'])
            ->limit(10)
            ->all();*/

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post()['Report'];
            $modelReport->federal_district_idReport = $post['federal_district_idReport'];
            $modelReport->region_idReport = $post['region_idReport'];
            $modelReport->municipality_idReport = $post['municipality_idReport'];
            $modelReport->organization_idReport = $post['organization_idReport'];
            /*//[federal_district_idReport]
            //[region_idReport]
            $where = [];*/
            $region_items = $this->getArrayRegionItems($post['federal_district_idReport'],true); //пролучаем список областей!
            $municipality_items = $this->getArrayMunicipalityItems($post['region_idReport'],
                true); //пролучаем список областей!
            $org_items = $this->getArrayOrganizationItems($post['municipality_idReport'], 5,
                true); //пролучаем список областей!
            $where = [];
            ($post['federal_district_idReport'] && $post['federal_district_idReport'] !== 'v') ? $where += ['deti_anket.federal_district_id' => $post['federal_district_idReport']] : $where += [];
            ($post['region_idReport'] && $post['region_idReport'] !== 'v') ? $where += ['deti_anket.region_id' => $post['region_idReport']] : $where += [];
            ($post['municipality_idReport'] && $post['municipality_idReport'] !== 'v') ? $where += ['deti_anket.municipality_id' => $post['municipality_idReport']] : $where += [];
            ($post['organization_idReport'] && $post['organization_idReport'] !== 'v') ? $where += ['deti_anket.organization_id' => $post['organization_idReport']] : $where += [];
            if (Yii::$app->user->can('rospotrebnadzor')) {
                $where += [
                    'deti_anket.federal_district_id' => Yii::$app->user->identity->federal_district_id,
                    'deti_anket.region_id' => Yii::$app->user->identity->region_id
                ];
            }
            $rows = (new \yii\db\Query())
                ->from('deti_anket')
                ->join('left JOIN', 'deti_anket_table_18_27', 'deti_anket_table_18_27.id = deti_anket.table_18_27')
                ->join('left JOIN', 'deti_anket_table_28_34', 'deti_anket_table_28_34.id = deti_anket.table_28_34')
                ->join('left JOIN', 'deti_anket_table_35_44', 'deti_anket_table_35_44.id = deti_anket.table_35_44')
                ->join('left JOIN', 'deti_anket_table_45_48', 'deti_anket_table_45_48.id = deti_anket.table_45_48')
                ->join('inner JOIN', 'organization', 'organization.id = deti_anket.organization_id')
                ->where($where)
                //->asArray()
                ->all();
            /* print_r('<pre>');
             print_r($rows);
             print_r('</pre>');
             exit();*/
            if (!$rows) {
                Yii::$app->session->setFlash('error', 'Данных не найдено!');
            }
        }

        /*print_r('<pre>');
         print_r($rows);
         print_r('</pre>');*/

        return $this->render('report-admin', [
            'hasAccessFederalDistrict' => $hasAccessFederalDistrict,
            'hasAccessRegion' => $hasAccessRegion,
            'hasAccessMunicipality' => $hasAccessMunicipality,
            'hasAccessOrg' => $hasAccessOrg,

            'modelDeti' => $modelDeti,
            'models' => $rows,
            'modelReport' => $modelReport,
            'district_items' => $district_items,
            'region_items' => $region_items,
            'municipality_items' => $municipality_items,
            'org_items' => $org_items,
        ]);
    }

    public function actionReportAdminItog()
    {
        ini_set('max_execution_time', 5600);
        ini_set('memory_limit', '13092M');
        ini_set("pcre.backtrack_limit", "5000000");

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $modelReport = new Report();
        $modelDeti = new DetiAnket();

        $modelReport->federal_district_idReport = Yii::$app->user->identity->federal_district_id;
        $modelReport->region_idReport = Yii::$app->user->identity->region_id;
        $modelReport->municipality_idReport = Yii::$app->user->identity->municipality_id;

        $district_items = $this->getArrayDistrictItems(true); //пролучаем список областей!
        $region_items = $this->getArrayRegionItems(Yii::$app->user->identity->federal_district_id,
            true); //пролучаем список областей!
        $municipality_items = $this->getArrayMunicipalityItems(Yii::$app->user->identity->region_id,
            true); //пролучаем список областей!
        $org_items = $this->getArrayOrganizationItems(Yii::$app->user->identity->municipality_id, 5,
            true); //пролучаем список областей!

        /*   print_r($district_items);
        print_r('<br>');
        print_r('<br>');
        print_r($region_items);
        print_r('<br>');
        print_r('<br>');
        print_r($municipality_items);
        print_r('<br>');
        print_r('<br>');
        print_r($org_items);
        print_r('<br>');
        print_r('<br>');
        exit();*/
        /*SELECT * FROM `deti_anket`
        inner join deti_anket_table_18_27 on deti_anket.`table_18_27` = deti_anket_table_18_27.id
        INNER join deti_anket_table_28_34 on deti_anket.`table_28_34` = deti_anket_table_28_34.id
        INNER join deti_anket_table_35_44 on deti_anket.`table_35_44` = deti_anket_table_35_44.id
        INNER join deti_anket_table_45_48 on deti_anket.`table_45_48` = deti_anket_table_45_48.id*/
        /* $model = DetiAnket::find()->
        innerJoin('deti_anket_table_18_27', 'deti_anket_table_18_27.id = deti_anket.table_18_27')->
        asArray()->
        all();*/
        /* $rows = (new \yii\db\Query())
            ->from('user')
            ->where(['last_name' => 'Smith'])
            ->limit(10)
            ->all();*/

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post()['Report'];

            $modelReport->federal_district_idReport = $post['federal_district_idReport'];
            $modelReport->region_idReport = $post['region_idReport'];
            $modelReport->municipality_idReport = $post['municipality_idReport'];
            $modelReport->organization_idReport = $post['organization_idReport'];
            $modelReport->terrain = $post['terrain'];
            $modelReport->typeSchool = $post['typeSchool'];
            $modelReport->sex = $post['sex'];
            $modelReport->showReport = $post['showReport'];
            $modelReport->class = $post['class'];
            /*//[federal_district_idReport]
            //[region_idReport]
            $where = [];*/

            $region_items = $this->getArrayRegionItems($post['federal_district_idReport'],true); //пролучаем список областей!
            $municipality_items = $this->getArrayMunicipalityItems($post['region_idReport'],
                true); //пролучаем список областей!
            $org_items = $this->getArrayOrganizationItems($post['municipality_idReport'], 5,
                true); //пролучаем список областей!

            $where = [];
            ($post['federal_district_idReport'] && $post['federal_district_idReport'] !== 'v') ? $where += ['deti_anket.federal_district_id' => $post['federal_district_idReport']] : $where += [];
            ($post['region_idReport'] && $post['region_idReport'] !== 'v') ? $where += ['deti_anket.region_id' => $post['region_idReport']] : $where += [];
            ($post['municipality_idReport'] && $post['municipality_idReport'] !== 'v') ? $where += ['deti_anket.municipality_id' => $post['municipality_idReport']] : $where += [];
            ($post['organization_idReport'] && $post['organization_idReport'] !== 'v') ? $where += ['deti_anket.organization_id' => $post['organization_idReport']] : $where += [];
            ($post['terrain'] && $post['terrain'] !== 'v') ? $where += ['organization.terrain' => $modelReport->getTrain($post['terrain'])] : $where += [];
            ($post['typeSchool'] && $post['typeSchool'] !== 'v') ? $where += ['organization.size' => $modelReport->getTypeSchool($post['typeSchool'])] : $where += [];
            ($post['sex'] && $post['sex'] !== 'v') ? $where += ['deti_anket.field1_5' => $post['sex']] : $where += [];
            ($post['class'] && $post['class'] !== 'v') ? $whereAnd = [
                'in',
                'deti_anket.field1_1',
                $modelReport->getClass($post['class'])
            ] : $whereAnd = [];

            $where2 = [['deti_anket.municipality_id' => 2347]];
            $where3 = [['deti_anket.municipality_id' => 2348]];

            /*$rows = (new \yii\db\Query())
                ->from('deti_anket')
                ->join('left JOIN', 'deti_anket_table_18_27', 'deti_anket_table_18_27.id = deti_anket.table_18_27')
                ->join('left JOIN', 'deti_anket_table_28_34', 'deti_anket_table_28_34.id = deti_anket.table_28_34')
                ->join('left JOIN', 'deti_anket_table_35_44', 'deti_anket_table_35_44.id = deti_anket.table_35_44')
                ->join('left JOIN', 'deti_anket_table_45_48', 'deti_anket_table_45_48.id = deti_anket.table_45_48')
                ->join('inner JOIN', 'organization', 'organization.id = deti_anket.organization_id')
                ->where($where2)
                ->andWhere($where3)
                //->asArray()
                ->all();*/

            $rows = (new \yii\db\Query())
                ->from('deti_anket')
                ->join('left JOIN', 'deti_anket_table_18_27', 'deti_anket_table_18_27.id = deti_anket.table_18_27')
                ->join('left JOIN', 'deti_anket_table_28_34', 'deti_anket_table_28_34.id = deti_anket.table_28_34')
                ->join('left JOIN', 'deti_anket_table_35_44', 'deti_anket_table_35_44.id = deti_anket.table_35_44')
                ->join('left JOIN', 'deti_anket_table_45_48', 'deti_anket_table_45_48.id = deti_anket.table_45_48')
                ->join('inner JOIN', 'organization', 'organization.id = deti_anket.organization_id')
                ->where($where)
                //->where(['in', 'deti_anket.municipality_id', [2347, 2348, 2349]])
                //->asArray()
                ->all();
            /* print_r('<pre>');
             print_r($rows);
             print_r('</pre>');
             exit();*/
            /*
            print_r('<pre>');
            print_r($rows);
            print_r('</pre>');
            exit();
            print_r($post);
            print_r('<br><br>');
            print_r($where);
            exit();*/
            if (!$rows) {
                Yii::$app->session->setFlash('error', 'Данных не найдено!');
            }
        }

        /*print_r('<pre>');
         print_r($rows);
         print_r('</pre>');*/

        return $this->render('report-admin-itog', [
            'hasAccessFederalDistrict' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessRegion' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessMunicipality' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessOrg' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessTerrain' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessTypeSchool' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessSex' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessShow' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessClass' => (Yii::$app->user->can('admin')) ? true : false,

            'modelDeti' => $modelDeti,
            'models' => $rows,
            'modelReport' => $modelReport,
            'district_items' => $district_items,
            'region_items' => $region_items,
            'municipality_items' => $municipality_items,
            'org_items' => $org_items,
            'showReport' => Yii::$app->request->post()['Report']['showReport'],
        ]);
    }

    public function actionReportAdminMatrix()
    {
        ini_set('max_execution_time', 5600);
        ini_set('memory_limit', '12092M');
        ini_set("pcre.backtrack_limit", "5000000");

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $modelReport = new Report();
        $modelDeti = new DetiAnket();

        $modelReport->federal_district_idReport = Yii::$app->user->identity->federal_district_id;
        $modelReport->region_idReport = Yii::$app->user->identity->region_id;
        $modelReport->municipality_idReport = Yii::$app->user->identity->municipality_id;

        $district_items = $this->getArrayDistrictItems(true); //пролучаем список областей!
        $region_items = $this->getArrayRegionItems(Yii::$app->user->identity->federal_district_id,
            true); //пролучаем список областей!
        $municipality_items = $this->getArrayMunicipalityItems(Yii::$app->user->identity->region_id,
            true); //пролучаем список областей!
        $org_items = $this->getArrayOrganizationItems(Yii::$app->user->identity->municipality_id, 5,
            true); //пролучаем список областей!

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post()['Report'];
            $modelReport->federal_district_idReport = $post['federal_district_idReport'];
            $modelReport->region_idReport = $post['region_idReport'];
            $modelReport->municipality_idReport = $post['municipality_idReport'];
            $modelReport->organization_idReport = $post['organization_idReport'];

            $region_items = $this->getArrayRegionItems($post['federal_district_idReport'],true); //пролучаем список областей!
            $municipality_items = $this->getArrayMunicipalityItems($post['region_idReport'],
                true); //пролучаем список областей!
            $org_items = $this->getArrayOrganizationItems($post['municipality_idReport'], 5,
                true); //пролучаем список областей!
            
            $where = [];
            ($post['federal_district_idReport'] && $post['federal_district_idReport'] !== 'v') ? $where += ['deti_anket.federal_district_id' => $post['federal_district_idReport']] : $where += [];
            ($post['region_idReport'] && $post['region_idReport'] !== 'v') ? $where += ['deti_anket.region_id' => $post['region_idReport']] : $where += [];
            ($post['municipality_idReport'] && $post['municipality_idReport'] !== 'v') ? $where += ['deti_anket.municipality_id' => $post['municipality_idReport']] : $where += [];
            ($post['organization_idReport'] && $post['organization_idReport'] !== 'v') ? $where += ['deti_anket.organization_id' => $post['organization_idReport']] : $where += [];

            $rows = (new \yii\db\Query())
                ->from('deti_anket')
                ->join('left JOIN', 'deti_anket_table_18_27', 'deti_anket_table_18_27.id = deti_anket.table_18_27')
                ->join('left JOIN', 'deti_anket_table_28_34', 'deti_anket_table_28_34.id = deti_anket.table_28_34')
                ->join('left JOIN', 'deti_anket_table_35_44', 'deti_anket_table_35_44.id = deti_anket.table_35_44')
                ->join('left JOIN', 'deti_anket_table_45_48', 'deti_anket_table_45_48.id = deti_anket.table_45_48')
                ->join('inner JOIN', 'organization', 'organization.id = deti_anket.organization_id')
                ->where($where)
                ->all();
            $result = [];
            $resultAnketCount = [
                'countUnaccountedFor' => 0,//количество не учтенных анкет
                'countAnket' => 0,//всего анкет
            ];
            foreach ($rows as $row) {
                if (
                    $row['field1_16'] == 0 ||
                    $row['field1_16'] == 1 ||
                    $row['field1_16'] == '' ||
                    $row['field1_17'] == 0 ||
                    $row['field1_17'] == 1 ||
                    $row['field1_17'] == ''
                ) {
                    $resultAnketCount['countUnaccountedFor']++;
                } else {
                    $resultAnketOne = $modelDeti->getResultAnket($row);
                    //0-сельская, 1-городская  //определил какая область
                    if ($row['terrain'] == 0) {
                        $arraName = 'village';
                    } else {
                        $arraName = 'city';
                    }
                    //определяем какая ростовка
                    if ($row['field1_1'] < 5) {
                        $arraName2 = '14';
                    } elseif ($row['field1_1'] >= 5 && $row['field1_1'] < 10) {
                        $arraName2 = '59';
                    } else {
                        $arraName2 = '1011';
                    }
                    //$row['field1_16']; //10. Укажите массу тела (кг) //$row['field1_17']; //10.1 Укажите длину тела в см //возраст $row['field1_4'];
                    $sex = ($row['field1_5'] == '1') ? 0 : 1; //пол
                    $imt = $modelDeti->get_imt($row['field1_16'], $row['field1_17']);
                    $imtStr = $modelDeti->getImtNew($imt, $sex, $row['field1_4']);
                    if ($imtStr === 'Дефицит массы тела (выраженный дефицит)') {
                        $arraName3 = 'dif';
                    } elseif ($imtStr === 'Недостаточная масса тела (дефицит легкой степени)') {
                        $arraName3 = 'nedost';
                    } elseif ($imtStr === 'Нормальная масса тела') {
                        $arraName3 = 'norm';
                    } elseif ($imtStr === 'Избыточная масса тела') {
                        $arraName3 = 'izbitok';
                    } elseif ($imtStr === 'Ожирение 1 ст') {
                        $arraName3 = 'ojir1';
                    } elseif ($imtStr === 'Ожирение 2 ст') {
                        $arraName3 = 'ojir2';
                    } else {
                        $arraName3 = 'ojir3';
                    }
                    //ЭТО КУДА НУЖНО ПОЛОЖИТЬ (СУММИРОВАТЬ) РЕЗУЛЬТАТ АНКЕТЫ $result[$arraName][$arraName2][$arraName3]
                    //ЭТО САМ РЕЗУЛЬТАТ $resultAnketOne
                    foreach ($resultAnketOne as $key => $one) {
                        if (is_numeric($one)) {
                            $result[$arraName][$arraName2][$arraName3][$key] += $one;
                        } else {
                            $result[$arraName][$arraName2][$arraName3][$key] = $one;
                        }
                    }
                    $resultAnketCount['countAnket']++;
                }
            }

            //print_r('<pre>');
            //print_r($resultAnketCount);
            //print_r('<br>');
            //print_r($result);
            //print_r('</pre>');

            //print_r('<pre>');
            //print_r($rows);
            //print_r('</pre>');
            //exit();

            if (!$rows) {
                Yii::$app->session->setFlash('error', 'Данных не найдено!');
            }
        }

        return $this->render('report-admin-matrix', [
            'hasAccessFederalDistrict' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessRegion' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessMunicipality' => (Yii::$app->user->can('admin')) ? true : false,
            'hasAccessOrg' => (Yii::$app->user->can('admin')) ? true : false,

            'modelDeti' => $modelDeti,
            'result' => $result,
            'resultAnketCount' => $resultAnketCount,
            'modelReport' => $modelReport,
            'district_items' => $district_items,
            'region_items' => $region_items,
            'municipality_items' => $municipality_items,
            'org_items' => $org_items,
            'showReport' => Yii::$app->request->post()['Report']['showReport'],
        ]);
    }

    //печать
    public function actionPrintAnket($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '7092M');
        ini_set("pcre.backtrack_limit", "5000000");
        $stausButtom = 0;
        $model = $this->findModel($id);
        $DetiAnketTable1827 = $this->findDetiAnketTable1827($model->table_18_27);
        $DetiAnketTable2834 = $this->findDetiAnketTable2834($model->table_28_34);
        $DetiAnketTable3544 = $this->findDetiAnketTable3544($model->table_35_44);
        $DetiAnketTable4548 = $this->findDetiAnketTable4548($model->table_45_48);

        $this->layout = false;
        $html = $this->render(
            'view',
            [
                'model' => $model,
                'stausButtom' => $stausButtom,
                'DetiAnketTable1827' => $DetiAnketTable1827,
                'DetiAnketTable2834' => $DetiAnketTable2834,
                'DetiAnketTable3544' => $DetiAnketTable3544,
                'DetiAnketTable4548' => $DetiAnketTable4548,
            ]
        );

        $mpdf = new Mpdf([
            'margin_top' => 5,
            'margin_left' => 20,
            'margin_right' => 10,
            //'mirrorMargins' => true
            //Установлено значение 1, в документе будут отображаться значения левого и правого полей на нечетных и четных страницах, т. е. они станут внутренними и внешними полями.
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Анкета.pdf', 'D'); //D - скачает файл!
        //$mpdf->Output(': ' . $shop->name . '.pdf', 'I'); //D - скачает файл!
    }

    public function actionRegionList($id)
    {
        $groups = Region::find()->where(['district_id' => $id])->orderby(['name' => SORT_ASC])->all();

        $data = [];
        $data[] = '<option value=\'\'>Выберите регион...</option>';
        if (!empty($groups)) {
            foreach ($groups as $key => $group) {
                $data[] = '<option value=\'' . $group->id . '\'>' . $group->name . '</option>';
            }
        }

        return Json::encode($data);
        //return $data;
    }

    public function actionMunicipalityList($id)
    {
        $groups = Municipality::find()->where(['region_id' => $id])->orderby(['name' => SORT_ASC])->all();

        $data = [];
        $data[] = "<option value=''>Выберите муниципальное образование...</option>";
        if (!empty($groups)) {
            foreach ($groups as $key => $group) {
                $data[] = '<option value=\'' . $group->id . '\'>' . $group->name . '</option>';
            }
        }

        return Json::encode($data);
        //return $data;
    }

    public function actionOrganizationList($id)
    {
        $groups = Organization::find()->where([
            'municipality_id' => $id,
            'organization_type_id' => 5,
        ])->orderby(['title' => SORT_ASC])->all();

        $data = [];
        $data[] = '<option value=\'\'>Выберите Вашу организацию ...</option>';
        if (!empty($groups)) {
            foreach ($groups as $key => $group) {
                $data[] = '<option value=\'' . $group->id . '\'>' . $group->title . '</option>';
            }
        }

        //return $data;
        return Json::encode($data);
        //return $data;
    }

    protected function findModel($id)
    {
        if (($model = DetiAnket::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            return new DetiAnket();
        }
    }

    protected function findDetiAnketTable1827($id)
    {
        if (!empty($id)) {
            if (($model = DetiAnketTable1827::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DetiTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DetiAnketTable1827();
            }
        } else {
            return new DetiAnketTable1827();
        }
    }

    protected function findDetiAnketTable2834($id)
    {
        if (!empty($id)) {
            if (($model = DetiAnketTable2834::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DetiTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DetiAnketTable2834();
            }
        } else {
            return new DetiAnketTable2834();
        }
    }

    protected function findDetiAnketTable3544($id)
    {
        if (!empty($id)) {
            if (($model = DetiAnketTable3544::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DetiTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DetiAnketTable3544();
            }
        } else {
            return new DetiAnketTable3544();
        }
    }

    protected function findDetiAnketTable4548($id)
    {
        if (!empty($id)) {
            if (($model = DetiAnketTable4548::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DetiTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DetiAnketTable4548();
            }
        } else {
            return new DetiAnketTable4548();
        }
    }

}
