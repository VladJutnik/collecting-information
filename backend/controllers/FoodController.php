<?php

namespace backend\controllers;

use common\models\Food;
use common\models\FoodOrganizer;
use common\models\FoodTable6;
use common\models\FoodTable7;
use common\models\FoodTable8;
use common\models\FoodTable9;
use common\models\FoodTable10;
use common\models\FoodTable11;
use common\models\FoodTable12;
use common\models\FoodTable13;
use common\models\FoodSearch;
use common\models\Report;
use Mpdf\Mpdf;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FoodController implements the CRUD actions for Food model.
 */
class FoodController extends Controller
{
    use RegionReport;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'index',
                            'view',
                            'print-anket',
                            'print-anket-pattern',
                        ],
                        'allow' => true,
                        'roles' => [
                            'admin',
                            'create',
                            'food_organizer',
                            'rospotrebnadzor',
                        ],
                    ],
                    [
                        'actions' => [
                            'index',
                        ],
                        'allow' => true,
                        'roles' => [
                            'curator',
                        ],
                    ],
                    [
                        'actions' => [
                            'report-list-itog',
                        ],
                        'allow' => true,
                        'roles' => [
                            'admin',
                        ],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    Yii::$app->session->setFlash(
                        "error",
                        "У Вас нет доступа к этой  странице, пожалуйста, обратитесь к администратору!"
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
        $hasAccessMunicipality = (Yii::$app->user->can('admin') || Yii::$app->user->can(
                'rospotrebnadzor'
            )) ? true : false;

        $model = $this->findModel(Yii::$app->user->identity->id);
        $searchModel = new FoodSearch();
        $search = Yii::$app->request->queryParams;


        if (Yii::$app->user->can('curator')) {
            if (!$search['FoodSearch']['region_id']) {
                $search['FoodSearch']['municipality'] = '';
            }
        } else {
            if (Yii::$app->user->can('admin')) {
                if (!$search['FoodSearch']['federal_district_id']) {
                    $search['FoodSearch']['region_id'] = '';
                    $search['FoodSearch']['municipality'] = '';
                }
            }
        }

        $dataProvider = $searchModel->search($search);
        //tсли не админ подргужаю регионы для выборки стартовой в серч моделе
        if (Yii::$app->user->can('curator')) {
            $region_items = Yii::$app->myComponent->RegionItems(Yii::$app->user->identity->federal_district_id);
            $municipality_items = ($search['FoodSearch']['region_id']) ? Yii::$app->myComponent->MunicipalityItems(
                $search['FoodSearch']['region_id']
            ) : [];
        } else {
            if (Yii::$app->user->can('rospotrebnadzor')) {
                $municipality_items = Yii::$app->myComponent->MunicipalityItems(Yii::$app->user->identity->region_id);
            } else {
                if (Yii::$app->user->can('admin')) {
                    $region_items = ($search['FoodSearch']['federal_district_id']) ? Yii::$app->myComponent->RegionItems(
                        $search['FoodSearch']['federal_district_id']
                    ) : [];
                    $municipality_items = ($search['FoodSearch']['region_id'] && $search['FoodSearch']['federal_district_id']) ? Yii::$app->myComponent->MunicipalityItems(
                        $search['FoodSearch']['region_id']
                    ) : [];
                }
            }
        }

        return $this->render('index', [
            'status' => $model,
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
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = (Yii::$app->user->can('admin')) ? $this->findModelId($id) : $this->findModel(
            Yii::$app->user->identity->id
        );
        $foodTable6 = $this->findModelfoodTable6(
            $model->table_6
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable7 = $this->findModelfoodTable7(
            $model->table_7
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable8 = $this->findModelfoodTable8(
            $model->table_8
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable9 = $this->findModelfoodTable9(
            $model->table_9
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable10 = $this->findModelfoodTable10(
            $model->table_10
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable11 = $this->findModelfoodTable11(
            $model->table_11
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable12 = $this->findModelfoodTable12(
            $model->table_12
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable13 = $this->findModelfoodTable13(
            $model->table_13
        );//проверяем модель существует или нет! для редактирования и внесения

        if (Yii::$app->request->post()) {
            $status = true;
            $model->load(Yii::$app->request->post());
            $foodTable6->load(Yii::$app->request->post());
            $foodTable7->load(Yii::$app->request->post());
            $foodTable8->load(Yii::$app->request->post());
            $foodTable9->load(Yii::$app->request->post());
            $foodTable10->load(Yii::$app->request->post());
            $foodTable11->load(Yii::$app->request->post());
            $foodTable12->load(Yii::$app->request->post());
            $foodTable13->load(Yii::$app->request->post());

            if ($status === true) {
                $foodTable6->user_id = Yii::$app->user->identity->id;
                if ($foodTable6->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 6"
                    );
                }
            }

            if ($status === true) {
                $foodTable7->user_id = Yii::$app->user->identity->id;
                if ($foodTable7->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 7"
                    );
                }
            }

            if ($status === true) {
                $foodTable8->user_id = Yii::$app->user->identity->id;
                if ($foodTable8->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 8"
                    );
                }
            }

            if ($status === true) {
                $foodTable9->user_id = Yii::$app->user->identity->id;
                if ($foodTable9->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 9"
                    );
                }
            }

            if ($status === true) {
                $foodTable10->user_id = Yii::$app->user->identity->id;
                if ($foodTable10->validate()) {
                    $status = true;
                } else {
                    /*   print_r('<pre>');
                       foreach ($model->getErrors() as $key => $value) {
                           print_r($key.': '.$value[0]);
                           print_r('<br>');
                       }
                       print_r('<br>');
                       print_r($foodTable10);
                       print_r('<br>');
                       print_r(Yii::$app->request->post());
                       print_r('</pre>');
                       exit();*/
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 10"
                    );
                }
            }

            if ($status === true) {
                $foodTable11->user_id = Yii::$app->user->identity->id;
                if ($foodTable11->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 11"
                    );
                }
            }

            if ($status === true) {
                $foodTable12->user_id = Yii::$app->user->identity->id;
                if ($foodTable12->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 12"
                    );
                }
            }

            if ($status === true) {
                $foodTable13->user_id = Yii::$app->user->identity->id;
                if ($foodTable13->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 13"
                    );
                }
            }
            //СОХРАНЯЕМ ДАННЫЕ!
            if ($status === true) {
                $foodTable6->save(false);
                $foodTable7->save(false);
                $foodTable8->save(false);
                $foodTable9->save(false);
                $foodTable10->save(false);
                $foodTable11->save(false);
                $foodTable12->save(false);
                $foodTable13->save(false);

                $model->user_id = Yii::$app->user->identity->id;
                $model->organization_id = Yii::$app->user->identity->organization_id;
                $model->federal_district_id = Yii::$app->user->identity->federal_district_id;
                $model->region_id = Yii::$app->user->identity->region_id;
                $model->municipality_id = Yii::$app->user->identity->municipality_id;
                $model->table_6 = $foodTable6->id;
                $model->table_7 = $foodTable7->id;
                $model->table_8 = $foodTable8->id;
                $model->table_9 = $foodTable9->id;
                $model->table_10 = $foodTable10->id;
                $model->table_11 = $foodTable11->id;
                $model->table_12 = $foodTable12->id;
                $model->table_13 = $foodTable13->id;
                $model->save(false);
                Yii::$app->session->setFlash('success', "Данные успешно сохранены!");
            }

            // Создать views doc и сделать вывод на страницу!
            // сделать печать к doc
        }

        return $this->render('create', [
            'model' => $model,
            'foodTable6' => $foodTable6,
            'foodTable7' => $foodTable7,
            'foodTable8' => $foodTable8,
            'foodTable9' => $foodTable9,
            'foodTable10' => $foodTable10,
            'foodTable11' => $foodTable11,
            'foodTable12' => $foodTable12,
            'foodTable13' => $foodTable13,
        ]);
    }

    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $stausButtom = 1;
        $model = $this->findModelId($id);
        $foodOrganizerOne = FoodOrganizer::find()->where(['user_id' => $model->user_id])->all();
        $foodOrganizer = $this->findModelFoodOrganizer($model->user_id);
        $foodTable6 = $this->findModelfoodTable6(
            $model->table_6
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable7 = $this->findModelfoodTable7(
            $model->table_7
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable8 = $this->findModelfoodTable8(
            $model->table_8
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable9 = $this->findModelfoodTable9(
            $model->table_9
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable10 = $this->findModelfoodTable10(
            $model->table_10
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable11 = $this->findModelfoodTable11(
            $model->table_11
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable12 = $this->findModelfoodTable12(
            $model->table_12
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable13 = $this->findModelfoodTable13(
            $model->table_13
        );//проверяем модель существует или нет! для редактирования и внесения
        return $this->render('view', [
            'model' => $model,
            'foodOrganizer' => $foodOrganizer,
            'foodOrganizerOne' => $foodOrganizerOne,
            'stausButtom' => $stausButtom,
            'foodTable6' => $foodTable6,
            'foodTable7' => $foodTable7,
            'foodTable8' => $foodTable8,
            'foodTable9' => $foodTable9,
            'foodTable10' => $foodTable10,
            'foodTable11' => $foodTable11,
            'foodTable12' => $foodTable12,
            'foodTable13' => $foodTable13,
        ]);
    }

    //печать
    public function actionPrintAnket($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '3092M');
        ini_set("pcre.backtrack_limit", "5000000");
        $stausButtom = 0;
        $model = $this->findModelId($id);
        $foodOrganizer = $this->findModelFoodOrganizer($model->user_id);
        $foodOrganizerOne = FoodOrganizer::find()->where(['user_id' => $model->user_id])->all();
        $foodTable6 = $this->findModelfoodTable6(
            $model->table_6
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable7 = $this->findModelfoodTable7(
            $model->table_7
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable8 = $this->findModelfoodTable8(
            $model->table_8
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable9 = $this->findModelfoodTable9(
            $model->table_9
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable10 = $this->findModelfoodTable10(
            $model->table_10
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable11 = $this->findModelfoodTable11(
            $model->table_11
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable12 = $this->findModelfoodTable12(
            $model->table_12
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable13 = $this->findModelfoodTable13(
            $model->table_13
        );//проверяем модель существует или нет! для редактирования и внесения

        $this->layout = false;
        $html = $this->render(
            'view',
            [
                'model' => $model,
                'foodOrganizer' => $foodOrganizer,
                'foodOrganizerOne' => $foodOrganizerOne,
                'stausButtom' => $stausButtom,
                'foodTable6' => $foodTable6,
                'foodTable7' => $foodTable7,
                'foodTable8' => $foodTable8,
                'foodTable9' => $foodTable9,
                'foodTable10' => $foodTable10,
                'foodTable11' => $foodTable11,
                'foodTable12' => $foodTable12,
                'foodTable13' => $foodTable13,
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
        $mpdf->Output('Анкета.pdf', 'I'); //D - скачает файл!
        //$mpdf->Output(': ' . $shop->name . '.pdf', 'I'); //D - скачает файл!
    }

    //печать
    public function actionPrintAnketPattern()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '3092M');
        ini_set("pcre.backtrack_limit", "5000000");
        $stausButtom = 0;
        $model = $this->findModel(Yii::$app->user->identity->id);
        $foodOrganizer = $this->findModelFoodOrganizer(Yii::$app->user->identity->id);
        $foodOrganizerOne = FoodOrganizer::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
        $foodTable6 = $this->findModelfoodTable6(
            $model->table_6
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable7 = $this->findModelfoodTable7(
            $model->table_7
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable8 = $this->findModelfoodTable8(
            $model->table_8
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable9 = $this->findModelfoodTable9(
            $model->table_9
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable10 = $this->findModelfoodTable10(
            $model->table_10
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable11 = $this->findModelfoodTable11(
            $model->table_11
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable12 = $this->findModelfoodTable12(
            $model->table_12
        );//проверяем модель существует или нет! для редактирования и внесения
        $foodTable13 = $this->findModelfoodTable13(
            $model->table_13
        );//проверяем модель существует или нет! для редактирования и внесения

        $this->layout = false;
        $html = $this->render(
            'view',
            [
                'model' => $model,
                'foodOrganizer' => $foodOrganizer,
                'foodOrganizerOne' => $foodOrganizerOne,
                'stausButtom' => $stausButtom,
                'foodTable6' => $foodTable6,
                'foodTable7' => $foodTable7,
                'foodTable8' => $foodTable8,
                'foodTable9' => $foodTable9,
                'foodTable10' => $foodTable10,
                'foodTable11' => $foodTable11,
                'foodTable12' => $foodTable12,
                'foodTable13' => $foodTable13,
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
        $mpdf->Output('Шаблон анкеты с учетом заполненных школ.pdf', 'D'); //D - скачает файл!
        //$mpdf->Output(': ' . $shop->name . '.pdf', 'I'); //D - скачает файл!
    }

    public function actionReportListItog()
    {
        ini_set('max_execution_time', 5600);
        ini_set('memory_limit', '12092M');
        ini_set("pcre.backtrack_limit", "5000000");

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $modelReport = new Report();

        $modelReport->federal_district_idReport = Yii::$app->user->identity->federal_district_id;
        $modelReport->region_idReport = Yii::$app->user->identity->region_id;

        $district_items = $this->getArrayDistrictItems(true); //пролучаем список областей!
        $region_items = $this->getArrayRegionItems(
            Yii::$app->user->identity->federal_district_id,
            true
        ); //пролучаем список областей!

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post()['Report'];
            $modelReport->federal_district_idReport = $post['federal_district_idReport'];
            $modelReport->region_idReport = $post['region_idReport'];


            $region_items = $this->getArrayRegionItems(
                $post['federal_district_idReport'],
                true
            ); //пролучаем список областей!

            $where = [];
            ($post['federal_district_idReport'] && $post['federal_district_idReport'] !== 'v') ? $where += ['food.federal_district_id' => $post['federal_district_idReport']] : $where += [];
            ($post['region_idReport'] && $post['region_idReport'] !== 'v') ? $where += ['food.region_id' => $post['region_idReport']] : $where += [];

            $rows = (new \yii\db\Query())
                ->from('food')
                ->join('left JOIN', 'food_table_6', 'food_table_6.id = food.table_6')
                ->join('left JOIN', 'food_table_7', 'food_table_7.id = food.table_7')
                ->join('left JOIN', 'food_table_8', 'food_table_8.id = food.table_8')
                ->join('left JOIN', 'food_table_9', 'food_table_9.id = food.table_9')
                ->join('left JOIN', 'food_table_10', 'food_table_10.id = food.table_10')
                ->join('left JOIN', 'food_table_11', 'food_table_11.id = food.table_11')
                ->join('left JOIN', 'food_table_12', 'food_table_12.id = food.table_12')
                ->join('left JOIN', 'food_table_13', 'food_table_13.id = food.table_13')
                ->join('inner JOIN', 'organization', 'organization.id = food.organization_id')
                ->where($where)
                //->asArray()
                ->all();
            if($rows){
                $result = [];
                if($post['federal_district_idReport'] == 'v' && $post['region_idReport'] == 'v'){
                    $result[1] = 'Итог по РФ: ';
                } else {
                    $result[1] = ($post['region_idReport'] == 'v') ? $district_items[$post['federal_district_idReport']] : $region_items[$post['region_idReport']];
                }
                $num = 0;
                foreach ($rows as $row) {
                    $result[2] += $foodOrganizerAll = FoodOrganizer::find()->where(['user_id' => $row['user_id']])->count();
                    $result[3] += (is_numeric($row['field8_1'])) ? $row['field8_1'] : 0;
                    $result[4] += (is_numeric($row['field8_3'])) ? $row['field8_3'] : 0;
                    $result[5] += (is_numeric($row['field8_5'])) ? $row['field8_5'] : 0;
                    $result[6] += (is_numeric($row['field8_7'])) ? $row['field8_7'] : 0;
                    $result[7] += (is_numeric($row['field8_9'])) ? $row['field8_9'] : 0;

                    $result[8] += (is_numeric($row['field9_1'])) ? $row['field9_1'] : 0;
                    $result[9] += (is_numeric($row['field9_2'])) ? $row['field9_2'] : 0;
                    $result[10] += (is_numeric($row['field9_3'])) ? $row['field9_3'] : 0;
                    $result[11] += (is_numeric($row['field9_4'])) ? $row['field9_4'] : 0;
                    $result[12] += (is_numeric($row['field9_5'])) ? $row['field9_5'] : 0;

                    $result['prodrf_milk'] += (is_numeric($row['field11_1'])) ? $row['field11_1'] : 0;
                    $result['count_milk'] += (is_numeric($row['field11_2'])) ? $row['field11_2'] : 0;
                    $result['impr_milk'] += (is_numeric($row['field11_3'])) ? $row['field11_3'] : 0;

                    $result['prodrf_kislo'] += (is_numeric($row['field11_4'])) ? $row['field11_4'] : 0;
                    $result['count_kislo'] +=  (is_numeric($row['field11_5'])) ? $row['field11_5'] : 0;
                    $result['impr_kislo'] +=   (is_numeric($row['field11_6'])) ? $row['field11_6'] : 0;

                    $result['prodrf_tvorog'] += (is_numeric($row['field11_7'])) ? $row['field11_7'] : 0;
                    $result['count_tvorog'] +=  (is_numeric($row['field11_8'])) ? $row['field11_8'] : 0;
                    $result['impr_tvorog'] +=   (is_numeric($row['field11_9'])) ? $row['field11_9'] : 0;

                    $result['prodrf_meat'] += (is_numeric($row['field11_10'])) ? $row['field11_10'] : 0;
                    $result['count_meat'] +=  (is_numeric($row['field11_11'])) ? $row['field11_11'] : 0;
                    $result['impr_meat'] +=   (is_numeric($row['field11_12'])) ? $row['field11_12'] : 0;

                    $result['prodrf_fish'] += (is_numeric($row['field11_13'])) ? $row['field11_13'] : 0;
                    $result['count_fish'] +=  (is_numeric($row['field11_14'])) ? $row['field11_14'] : 0;
                    $result['impr_fish'] +=   (is_numeric($row['field11_15'])) ? $row['field11_15'] : 0;

                    $result['prodrf_bob'] += (is_numeric($row['field11_16'])) ? $row['field11_16'] : 0;
                    $result['count_bob'] +=  (is_numeric($row['field11_17'])) ? $row['field11_17'] : 0;
                    $result['impr_bob'] +=   (is_numeric($row['field11_18'])) ? $row['field11_18'] : 0;

                    $result['prodrf_veggie'] += (is_numeric($row['field11_19'])) ? $row['field11_19'] : 0;
                    $result['count_veggie'] +=  (is_numeric($row['field11_20'])) ? $row['field11_20'] : 0;
                    $result['impr_veggie'] +=   (is_numeric($row['field11_21'])) ? $row['field11_21'] : 0;

                    $result['prodrf_potato'] += (is_numeric($row['field11_22'])) ? $row['field11_22'] : 0;
                    $result['count_potato'] +=  (is_numeric($row['field11_23'])) ? $row['field11_23'] : 0;
                    $result['impr_potato'] +=   (is_numeric($row['field11_24'])) ? $row['field11_24'] : 0;

                    $result['prodrf_frutis'] += (is_numeric($row['field11_25'])) ? $row['field11_25'] : 0;
                    $result['count_frutis'] +=  (is_numeric($row['field11_26'])) ? $row['field11_26'] : 0;
                    $result['impr_frutis'] +=   (is_numeric($row['field11_27'])) ? $row['field11_27'] : 0;

                    $result['prodrf_egg'] += (is_numeric($row['field11_25'])) ? $row['field11_25'] : 0;
                    $result['count_egg'] +=  (is_numeric($row['field11_26'])) ? $row['field11_26'] : 0;
                    $result['impr_egg'] +=   (is_numeric($row['field11_27'])) ? $row['field11_27'] : 0;

                    $result['33_sum'] +=   (is_numeric($row['field12_1'])) ? $row['field12_1'] : 0;
                    $result['33_kol'] += ($row['field12_10'] != 0) ? 1 : 0;
                    $result['34_sum'] +=   (is_numeric($row['field12_4'])) ? $row['field12_4'] : 0;
                    $result['34_kol'] += ($row['field12_10'] != 0) ? 1 : 0;
                    $result['35_sum'] +=   (is_numeric($row['field12_7'])) ? $row['field12_7'] : 0;
                    $result['35_kol'] += ($row['field12_10'] != 0) ? 1 : 0;
                    $result['36_sum'] += (is_numeric($row['field12_10'])) ? $row['field12_10'] : 0;
                    $result['36_kol'] += ($row['field12_10'] != 0) ? 1 : 0;
                    $result['37_sum'] += (is_numeric($row['field12_13'])) ? $row['field12_13'] : 0;
                    $result['37_kol'] += ($row['field12_13'] != 0) ? 1 : 0;
                    $result['38_sum'] += (is_numeric($row['field12_16'])) ? $row['field12_16'] : 0;
                    $result['38_kol'] += ($row['field12_16'] != 0) ? 1 : 0;
                    $result['39_sum'] += (is_numeric($row['field12_19'])) ? $row['field12_19'] : 0;
                    $result['39_kol'] += ($row['field12_19'] != 0) ? 1 : 0;
                    $result['40_sum'] += (is_numeric($row['field12_22'])) ? $row['field12_22'] : 0;
                    $result['40_kol'] += ($row['field12_22'] != 0) ? 1 : 0;
                    $result['41_sum'] += (is_numeric($row['field12_25'])) ? $row['field12_25'] : 0;
                    $result['41_kol'] += ($row['field12_25'] != 0) ? 1 : 0;
                    $result['42_sum'] += (is_numeric($row['field12_28'])) ? $row['field12_28'] : 0;
                    $result['42_kol'] += ($row['field12_28'] != 0) ? 1 : 0;

                    $result['43_sum_m'] += (is_numeric($row['field12_2'])) ? $row['field12_2'] : 0;
                    $result['44_sum_m'] += (is_numeric($row['field12_5'])) ? $row['field12_5'] : 0;
                    $result['45_sum_m'] += (is_numeric($row['field12_8'])) ? $row['field12_8'] : 0;
                    $result['46_sum_m'] += (is_numeric($row['field12_11'])) ? $row['field12_11'] : 0;
                    $result['47_sum_m'] += (is_numeric($row['field12_14'])) ? $row['field12_14'] : 0;
                    $result['48_sum_m'] += (is_numeric($row['field12_17'])) ? $row['field12_17'] : 0;
                    $result['49_sum_m'] += (is_numeric($row['field12_20'])) ? $row['field12_20'] : 0;
                    $result['50_sum_m'] += (is_numeric($row['field12_23'])) ? $row['field12_23'] : 0;
                    $result['51_sum_m'] += (is_numeric($row['field12_26'])) ? $row['field12_26'] : 0;
                    $result['52_sum_m'] += (is_numeric($row['field12_29'])) ? $row['field12_29'] : 0;

                    $result['43_kol_m'] += ($row['field12_2'] != 0) ? 1 : 0;
                    $result['44_kol_m'] += ($row['field12_5'] != 0) ? 1 : 0;
                    $result['45_kol_m'] += ($row['field12_8'] != 0) ? 1 : 0;
                    $result['46_kol_m'] += ($row['field12_11'] != 0) ? 1 : 0;
                    $result['47_kol_m'] += ($row['field12_14'] != 0) ? 1 : 0;
                    $result['48_kol_m'] += ($row['field12_17'] != 0) ? 1 : 0;
                    $result['49_kol_m'] += ($row['field12_20'] != 0) ? 1 : 0;
                    $result['50_kol_m'] += ($row['field12_23'] != 0) ? 1 : 0;
                    $result['51_kol_m'] += ($row['field12_26'] != 0) ? 1 : 0;
                    $result['52_kol_m'] += ($row['field12_29'] != 0) ? 1 : 0;

                    $result['53_sum_i'] += (is_numeric($row['field12_3'])) ? $row['field12_3'] : 0;
                    $result['54_sum_i'] += (is_numeric($row['field12_6'])) ? $row['field12_6'] : 0;
                    $result['55_sum_i'] += (is_numeric($row['field12_9'])) ? $row['field12_9'] : 0;
                    $result['56_sum_i'] += (is_numeric($row['field12_12'])) ? $row['field12_12'] : 0;
                    $result['57_sum_i'] += (is_numeric($row['field12_15'])) ? $row['field12_15'] : 0;
                    $result['58_sum_i'] += (is_numeric($row['field12_18'])) ? $row['field12_18'] : 0;
                    $result['59_sum_i'] += (is_numeric($row['field12_21'])) ? $row['field12_21'] : 0;
                    $result['60_sum_i'] += (is_numeric($row['field12_24'])) ? $row['field12_24'] : 0;
                    $result['61_sum_i'] += (is_numeric($row['field12_30'])) ? $row['field12_30'] : 0;
                    $result['62_sum_i'] += (is_numeric($row['field12_30'])) ? $row['field12_30'] : 0;

                    $result['53_kol_i'] += ($row['field12_3'] != 0) ? 1 : 0;
                    $result['54_kol_i'] += ($row['field12_6'] != 0) ? 1 : 0;
                    $result['55_kol_i'] += ($row['field12_9'] != 0) ? 1 : 0;
                    $result['56_kol_i'] += ($row['field12_12'] != 0) ? 1 : 0;
                    $result['57_kol_i'] += ($row['field12_15'] != 0) ? 1 : 0;
                    $result['58_kol_i'] += ($row['field12_18'] != 0) ? 1 : 0;
                    $result['59_kol_i'] += ($row['field12_21'] != 0) ? 1 : 0;
                    $result['60_kol_i'] += ($row['field12_24'] != 0) ? 1 : 0;
                    $result['61_kol_i'] += ($row['field12_30'] != 0) ? 1 : 0;
                    $result['62_kol_i'] += ($row['field12_30'] != 0) ? 1 : 0;

                    $result[63] += ($row['field13_1'] == '1') ? 1 : 0;
                    $result[64] += ($row['field13_5'] == '1') ? 1 : 0;
                    $result[65] += ($row['field13_9'] == '1') ? 1 : 0;
                    $result[66] += ($row['field13_13'] == '1') ? 1 : 0;

                    $num++;
                }
                $result[13] = ($result['prodrf_milk'] != 0 && $result['impr_milk'] != 0) ? round($result['count_milk'] / ($result['prodrf_milk'] + $result['impr_milk']), 1) : 0;
                $result[14] = ($result['prodrf_kislo'] != 0 && $result['impr_kislo'] != 0) ? round($result['count_kislo'] / ($result['prodrf_kislo'] + $result['impr_kislo']), 1) : 0;
                $result[15] = ($result['prodrf_tvorog'] != 0 && $result['impr_tvorog'] != 0) ? round($result['count_tvorog'] / ($result['prodrf_tvorog'] + $result['impr_tvorog']), 1) : 0;
                $result[16] = ($result['prodrf_meat'] != 0 && $result['impr_meat'] != 0) ? round($result['count_meat'] / ($result['prodrf_meat'] + $result['impr_meat']), 1) : 0;
                $result[17] = ($result['prodrf_fish'] != 0 && $result['impr_fish'] != 0) ? round($result['count_fish'] / ($result['prodrf_fish'] + $result['impr_fish']), 1) : 0;
                $result[18] = ($result['prodrf_bob'] != 0 && $result['impr_bob'] != 0) ? round($result['count_bob'] / ($result['prodrf_bob'] + $result['impr_bob']), 1) : 0;
                $result[19] = ($result['prodrf_veggie'] != 0 && $result['impr_veggie'] != 0) ? round($result['count_veggie'] / ($result['prodrf_veggie'] + $result['impr_veggie']), 1) : 0;
                $result[20] = ($result['prodrf_potato'] != 0 && $result['impr_potato'] != 0) ? round($result['count_potato'] / ($result['prodrf_potato'] + $result['impr_potato']), 1) : 0;
                $result[21] = ($result['prodrf_frutis'] != 0 && $result['impr_frutis'] != 0) ? round($result['count_frutis'] / ($result['prodrf_frutis'] + $result['impr_frutis']), 1) : 0;
                $result[22] = ($result['prodrf_egg'] != 0 && $result['impr_egg'] != 0) ? round($result['count_egg'] / ($result['prodrf_egg'] + $result['impr_egg']), 1) : 0;

                $result[23] = ($result['prodrf_milk'] != 0 && $result['impr_milk'] != 0) ? round($result['impr_milk'] / ($result['prodrf_milk'] + $result['impr_milk']), 1) : 0;
                $result[24] = ($result['prodrf_kislo'] != 0 && $result['impr_kislo'] != 0) ? round($result['impr_kislo'] / ($result['prodrf_kislo'] + $result['impr_kislo']), 1) : 0;
                $result[25] = ($result['prodrf_tvorog'] != 0 && $result['impr_tvorog'] != 0) ? round($result['impr_tvorog'] / ($result['prodrf_tvorog'] + $result['impr_tvorog']), 1) : 0;
                $result[26] = ($result['prodrf_meat'] != 0 && $result['impr_meat'] != 0) ? round($result['impr_meat'] / ($result['prodrf_meat'] + $result['impr_meat']), 1) : 0;
                $result[27] = ($result['prodrf_fish'] != 0 && $result['impr_fish'] != 0) ? round($result['impr_fish'] / ($result['prodrf_fish'] + $result['impr_fish']), 1) : 0;
                $result[28] = ($result['prodrf_bob'] != 0 && $result['impr_bob'] != 0) ? round($result['impr_bob'] / ($result['prodrf_bob'] + $result['impr_bob']), 1) : 0;
                $result[29] = ($result['prodrf_veggie'] != 0 && $result['impr_veggie'] != 0) ? round($result['impr_veggie'] / ($result['prodrf_veggie'] + $result['impr_veggie']), 1) : 0;
                $result[30] = ($result['prodrf_potato'] != 0 && $result['impr_potato'] != 0) ? round($result['impr_potato'] / ($result['prodrf_potato'] + $result['impr_potato']), 1) : 0;
                $result[31] = ($result['prodrf_frutis'] != 0 && $result['impr_frutis'] != 0) ? round($result['impr_frutis'] / ($result['prodrf_frutis'] + $result['impr_frutis']), 1) : 0;
                $result[32] = ($result['prodrf_egg'] != 0 && $result['impr_egg'] != 0) ? round($result['impr_egg'] / ($result['prodrf_egg'] + $result['impr_egg']), 1) : 0;

                $result[33] = ($result['33_kol'] != 0) ? round($result['33_sum'] / $result['33_kol'], 1) : 0;
                $result[34] = ($result['34_kol'] != 0) ? round($result['34_sum'] / $result['34_kol'], 1) : 0;
                $result[35] = ($result['35_kol'] != 0) ? round($result['35_sum'] / $result['35_kol'], 1) : 0;
                $result[36] = ($result['36_kol'] != 0) ? round($result['36_sum'] / $result['36_kol'], 1) : 0;
                $result[37] = ($result['37_kol'] != 0) ? round($result['37_sum'] / $result['37_kol'], 1) : 0;
                $result[38] = ($result['38_kol'] != 0) ? round($result['38_sum'] / $result['38_kol'], 1) : 0;
                $result[39] = ($result['39_kol'] != 0) ? round($result['39_sum'] / $result['39_kol'], 1) : 0;
                $result[40] = ($result['40_kol'] != 0) ? round($result['40_sum'] / $result['40_kol'], 1) : 0;
                $result[41] = ($result['41_kol'] != 0) ? round($result['41_sum'] / $result['41_kol'], 1) : 0;
                $result[42] = ($result['42_kol'] != 0) ? round($result['42_sum'] / $result['42_kol'], 1) : 0;


                $result[43] = ($result['43_kol_m'] != 0) ? round($result['43_sum_m'] / $result['43_kol_m'], 1) : 0;
                $result[44] = ($result['44_kol_m'] != 0) ? round($result['44_sum_m'] / $result['44_kol_m'], 1) : 0;
                $result[45] = ($result['45_kol_m'] != 0) ? round($result['45_sum_m'] / $result['45_kol_m'], 1) : 0;
                $result[46] = ($result['46_kol_m'] != 0) ? round($result['46_sum_m'] / $result['46_kol_m'], 1) : 0;
                $result[47] = ($result['47_kol_m'] != 0) ? round($result['47_sum_m'] / $result['47_kol_m'], 1) : 0;
                $result[48] = ($result['48_kol_m'] != 0) ? round($result['48_sum_m'] / $result['48_kol_m'], 1) : 0;
                $result[49] = ($result['49_kol_m'] != 0) ? round($result['49_sum_m'] / $result['49_kol_m'], 1) : 0;
                $result[50] = ($result['50_kol_m'] != 0) ? round($result['50_sum_m'] / $result['50_kol_m'], 1) : 0;
                $result[51] = ($result['51_kol_m'] != 0) ? round($result['51_sum_m'] / $result['51_kol_m'], 1) : 0;
                $result[52] = ($result['52_kol_m'] != 0) ? round($result['52_sum_m'] / $result['52_kol_m'], 1) : 0;

                $result[53] = ($result['53_kol_i'] != 0) ? round($result['53_sum_i'] / $result['53_kol_i'], 1) : 0;
                $result[54] = ($result['54_kol_i'] != 0) ? round($result['54_sum_i'] / $result['54_kol_i'], 1) : 0;
                $result[55] = ($result['55_kol_i'] != 0) ? round($result['55_sum_i'] / $result['55_kol_i'], 1) : 0;
                $result[56] = ($result['56_kol_i'] != 0) ? round($result['56_sum_i'] / $result['56_kol_i'], 1) : 0;
                $result[57] = ($result['57_kol_i'] != 0) ? round($result['57_sum_i'] / $result['57_kol_i'], 1) : 0;
                $result[58] = ($result['58_kol_i'] != 0) ? round($result['58_sum_i'] / $result['58_kol_i'], 1) : 0;
                $result[59] = ($result['59_kol_i'] != 0) ? round($result['59_sum_i'] / $result['59_kol_i'], 1) : 0;
                $result[60] = ($result['60_kol_i'] != 0) ? round($result['60_sum_i'] / $result['60_kol_i'], 1) : 0;
                $result[61] = ($result['61_kol_i'] != 0) ? round($result['61_sum_i'] / $result['61_kol_i'], 1) : 0;
                $result[62] = ($result['62_kol_i'] != 0) ? round($result['62_sum_i'] / $result['62_kol_i'], 1) : 0;

                //print_r('<pre>');
                //print_r($result);
                //print_r('<br>');
                //print_r($region_items);
                //print_r('<br>');
                ////print_r($rows);
                //print_r('</pre>');
                //exit();
            } else {
                Yii::$app->session->setFlash('error', 'Данных не найдено!');
            }


        }

        /*print_r('<pre>');
         print_r($rows);
         print_r('</pre>');*/

        return $this->render('report-list-itog', [
            'results' => $result,
            'modelReport' => $modelReport,
            'district_items' => $district_items,
            'region_items' => $region_items,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Food::find()->where(['user_id' => $id])->one()) !== null) {
            return $model;
        } else {
            return new Food();
        }
    }

    protected function findModelId($id)
    {
        if (($model = Food::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            return new Food();
        }
    }

    protected function findModelfoodTable6($id)
    {
        if (!empty($id)) {
            if (($model = FoodTable6::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = FoodTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new FoodTable6();
            }
        } else {
            return new FoodTable6();
        }
    }

    protected function findModelFoodOrganizer($id)
    {
        if (!empty($id)) {
            if (($foodOrganizer = (new \yii\db\Query())
                    ->select(
                        [
                            'sum(`field5_1`) as  field5_1',
                            'sum(`field5_2`) as  field5_2',
                            'sum(`field5_3`) as  field5_3',
                            'sum(`field5_4`) as  field5_4',
                            'sum(`field5_5`) as  field5_5',
                            'sum(`field5_6`) as  field5_6',
                            'sum(`field5_7`) as  field5_7',
                            'sum(`field5_8`) as  field5_8',
                            'sum(`field5_9`) as  field5_9',
                            'sum(`field5_10`) as  field5_10',
                            'sum(`field5_11`) as  field5_11',
                            'sum(`field5_12`) as  field5_12',
                            'sum(`field5_13`) as  field5_13',
                            'sum(`field5_14`) as  field5_14',
                            'sum(`field5_15`) as  field5_15',
                            'sum(`field5_16`) as  field5_16',
                            'sum(`field5_17`) as  field5_17',
                            'sum(`field5_18`) as  field5_18',
                            'sum(`field5_19`) as  field5_19',
                            'sum(`field5_20`) as  field5_20',
                            'sum(`field5_21`) as  field5_21',
                            'sum(`field5_22`) as  field5_22',
                            'sum(`field5_23`) as  field5_23',
                            'sum(`field5_24`) as  field5_24',
                            'sum(`field5_25`) as  field5_25',
                            'sum(`field5_26`) as  field5_26',
                            'sum(`field5_27`) as  field5_27',
                            'sum(`field5_28`) as  field5_28',
                        ]
                    )
                    ->from('food_organizer')
                    ->where(['user_id' => $id])
                    ->one()) !== null) {
                return $foodOrganizer;
            } else {
                return new FoodOrganizer();
            }
        } else {
            return new FoodOrganizer();
        }
    }

    protected function findModelFoodTable7($id)
    {
        if (!empty($id)) {
            if (($model = FoodTable7::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = FoodTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new FoodTable7();
            }
        } else {
            return new FoodTable7();
        }
    }

    protected function findModelFoodTable8($id)
    {
        if (!empty($id)) {
            if (($model = FoodTable8::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = FoodTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new FoodTable8();
            }
        } else {
            return new FoodTable8();
        }
    }

    protected function findModelFoodTable9($id)
    {
        if (!empty($id)) {
            if (($model = FoodTable9::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = FoodTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new FoodTable9();
            }
        } else {
            return new FoodTable9();
        }
    }

    protected function findModelFoodTable10($id)
    {
        if (!empty($id)) {
            if (($model = FoodTable10::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = FoodTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new FoodTable10();
            }
        } else {
            return new FoodTable10();
        }
    }

    protected function findModelFoodTable11($id)
    {
        if (!empty($id)) {
            if (($model = FoodTable11::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = FoodTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new FoodTable11();
            }
        } else {
            return new FoodTable11();
        }
    }

    protected function findModelFoodTable12($id)
    {
        if (!empty($id)) {
            if (($model = FoodTable12::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = FoodTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new FoodTable12();
            }
        } else {
            return new FoodTable12();
        }
    }

    protected function findModelFoodTable13($id)
    {
        if (!empty($id)) {
            if (($model = FoodTable13::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = FoodTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new FoodTable13();
            }
        } else {
            return new FoodTable13();
        }
    }
}
