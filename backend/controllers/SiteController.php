<?php

namespace backend\controllers;

use common\models\DetiAnket;
use common\models\Director;
use common\models\FederalDistrict;
use common\models\Table1;
use common\models\UserAutorizationStatistic;
use common\models\Municipality;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\ChangeForm;
use common\models\SignupForm;
use common\models\User;
use common\models\Organization;
use common\models\Region;
use yii\rbac\DbManager;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'badbrowser',
                            'login',
                            'logout',
                            'error',
                            'signup',
                            'subjectslist',
                            'municipalitylist',
                            'organization-name',
                        ],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [
                            'test-load-organization',
                            'create-org',
                            'create-rosp',
                        ],
                        'allow' => true,
                        'roles' => [
                            'admin',
                        ],
                    ],
                    [
                        'actions' => ['badbrowser', 'login', 'logout', 'index', 'error', 'report'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '5092M');
        ini_set("pcre.backtrack_limit", "5000000");
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/site/index']);
        }

        $model = new LoginForm();
        $change = new ChangeForm();

        if ($change->load(Yii::$app->request->post())) {
            if ($change->changePassword()) {
                Yii::$app->session->setFlash('changePassword', 'Дождитесь письма с новым паролем.', false);
                $this->redirect(['/site/login']);
            } else {
                Yii::$app->session->setFlash('changeErrorPassword', 'Дождитесь письма с новым паролем.', false);
                $this->redirect(['/site/login']);
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $stat = new UserAutorizationStatistic();
            $stat->user_id = Yii::$app->user->id;
            $stat->time_auth = time();
            $stat->save();

            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
                'change' => $change,
            ]);
        }
    }

    public function actionLogout()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/index']);
        }
        Yii::$app->user->logout();

        return $this->goHome();
    }

    //Регистрация "
    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $post = Yii::$app->request->post()['SignupForm'];

            $organization = new Organization();
            if (!$organization->validate()) {
                return null;
            }
            $organization->title = $post['name_organization'];
            $organization->federal_district_id = $post['federal_district_id'];
            $organization->region_id = $post['region_id'];
            $organization->municipality_id = $post['municipality_id'];
            $organization->email = $post['email'];
            $organization->organization_type_id = 3;
            if ($organization->save()) {
                if($model->signup($organization['id']) === 'ok'){
                    Yii::$app->session->setFlash('success', 'Спасибо за регистрацию');
                    return $this->redirect(['login']);
                } else {
                    Yii::$app->session->setFlash('error', 'Ошибка при регистрации');
                }

            }
        }

        $district_items = ArrayHelper::map(
            FederalDistrict::find()->all(),
            'id',
            'name'
        );
        $post_items = [
            'Руководитель' => 'Руководитель',
            'Иное' => 'Иное',
        ];

        return $this->render('signup', [
            'model' => $model,
            'district_items' => $district_items,
            'post_items' => $post_items,
        ]);
    }

    public function actionBadbrowser()
    {
        $this->layout = false;

        return $this->render('badbrowser');
        //return $this->redirect(['badbrowser']);
    }

    /*Подставляет регионы в выпадающий список*/
    public function actionSubjectslist($id)
    {
        $groups = Region::find()->where(['district_id' => $id])->orderby(['name' => SORT_ASC])->all();

        $data = [];
        $data[] = '<option value="">Выберите регион...</option>';
        if (!empty($groups)) {
            foreach ($groups as $key => $group) {
                $data[] = '<option value="' . $group->id . '">' . $group->name . '</option>';
            }
        }

        print_r($data);
        //return $data;
    }

    /*Подставляет муниципальные образования в выпадающий список*/
    public function actionMunicipalitylist($id)
    {
        $groups = Municipality::find()->where(['region_id' => $id])->orderby(['name' => SORT_ASC])->all();

        $data = [];
        $data[] = '<option value="">Выберите муниципальное образование...</option>';
        if (!empty($groups)) {
            foreach ($groups as $key => $group) {
                $data[] = '<option value="' . $group->id . '">' . $group->name . '</option>';
            }
        }

        print_r($data);
    }

    /*Подставляет организации в выпадающий список*/
    public function actionOrganizationName($id)
    {
        $groups = Organization::find()->where(['municipality_id' => $id])->orderby(['title' => SORT_ASC])->all();

        $data = [];
        $data[] = '<option value="">Выберите Вашу организацию...</option>';
        if (!empty($groups)) {
            foreach ($groups as $key => $group) {
                $data[] = '<option value="' . $group->id . '">' . $group->title . '</option>';
            }
        } else {
            $data[] = '<option value="">Организации не добавлены.</option>';
        }
        print_r($data);
    }

    public function actionReport()
    {
        $model = new Table1();

        $resultTable1 = '';
        $federalDistricts = '';
        $fed = 100;
        $reg = 0;
        $month_status = 9;
        $where = [];
        if (Yii::$app->request->post()) {
            /* $post = Yii::$app->request->post()['Table1'];
             if($post['federal_district_id'] !== '100'){
                 $fed = $post['federal_district_id'];
                 $where = [
                     'federal_district.id' => $post['federal_district_id'],
                 ];
             }
             $federalDistricts = \common\models\FederalDistrict::find()->
             select([
                 'federal_district.id as district_id',
                 'federal_district.name as federal',
                 'region.id as region_id',
                 'region.name as region'
             ])->
             leftJoin('region', 'federal_district.id = region.district_id')->
             where($where)->
             asArray()->
             all();*/
            $post = Yii::$app->request->post()['Table1'];
            if (Yii::$app->user->can('admin')) {
                $reg = $post['region_id'];
                if ($post['federal_district_id'] !== '100') {
                    $fed = $post['federal_district_id'];
                    $where = [
                        'federal_district.id' => $post['federal_district_id'],
                    ];
                }
            } else {
                $organizate = Organization::findone(Yii::$app->user->identity->organization_id);
                $where = [
                    'federal_district.id' => $organizate->federal_district_id,
                    'region.id' => $organizate->region_id,
                ];
            }
            $federalDistricts = \common\models\FederalDistrict::find()->
            select([
                       'federal_district.id as district_id',
                       'federal_district.name as federal',
                       'region.id as region_id',
                       'region.name as region',
                   ])->
            leftJoin('region', 'federal_district.id = region.district_id')->
            where($where)->
            asArray()->
            all();
        }

        return $this->render('report', [
            'models' => $resultTable1,
            'federalDistricts' => $federalDistricts,
            'month_status' => $month_status,
            'fed' => $fed,
            'reg' => $reg,
            'model' => $model,
        ]);
    }


    public function actionTestLoadOrganization()
    {
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '5092M');
        ini_set("pcre.backtrack_limit", "5000000");
        $num = 1;
        $num = 1;
        $maodelFederal = FederalDistrict::find()->all();
        foreach ($maodelFederal as $federal) {
            $maodelRegion = Region::find()->where(['district_id' => $federal->id])->all();
            foreach ($maodelRegion as $region) {
                $maodelMunicipality = Municipality::find()->where(['region_id' => $region->id])->all();
                foreach ($maodelMunicipality as $municipality) {
                    //добавляем школы для каждого муниципального
                    $model = new Organization();
                    $model->number = 0;
                    $model->title = "ШКОЛА {$municipality->name}";
                    $model->email = "{$num}@mil.ru";
                    $model->federal_district_id = $federal->id;
                    $model->region_id = $region->id;
                    $model->municipality_id = $municipality->id;
                    $model->organization_type_id = 5;
                    $model->terrain = 0;
                    $model->size = 0;
                    $model->sch2 = 1;
                    $model->sch5 = 1;
                    $model->sch10 = 1;
                    $model->itog = 3;
                    $model->save(false);
                    //школьники заполняем анкеты
                    $initi = rand(1, 5);
                    for ($i = 0; $i <= $initi; $i++) {
                        $modelDetiAnket = new DetiAnket();
                        $modelDetiAnket->federal_district_id = $federal->id;
                        $modelDetiAnket->region_id = $federal->id;
                        $modelDetiAnket->municipality_id = $municipality->id;
                        $modelDetiAnket->organization_id = $model->id;
                        $modelDetiAnket->field1_1 = 1;
                        $modelDetiAnket->field1_2 = date("Y-m-d");
                        $modelDetiAnket->field1_3 = date("Y-m-d");
                        $modelDetiAnket->field1_4 = 1;
                        $modelDetiAnket->field1_5 = 1;
                        $modelDetiAnket->field1_6 = 1;
                        $modelDetiAnket->field1_7 = 1;
                        $modelDetiAnket->field1_8 = 1;
                        $modelDetiAnket->field1_9 = 1;
                        $modelDetiAnket->field1_10 = 1;
                        $modelDetiAnket->field1_11 = 1;
                        $modelDetiAnket->field1_12 = 1;
                        $modelDetiAnket->field1_13 = 1;
                        $modelDetiAnket->field1_14 = 1;
                        $modelDetiAnket->field1_15 = 1;
                        $modelDetiAnket->field1_16 = 1;
                        $modelDetiAnket->field1_17 = 1;
                        $modelDetiAnket->field1_18 = 1;
                        $modelDetiAnket->field1_19 = 1;
                        $modelDetiAnket->field1_20 = 1;
                        $modelDetiAnket->field1_21 = 1;
                        $modelDetiAnket->table_18_27 = 1;
                        $modelDetiAnket->table_28_34 = 1;
                        $modelDetiAnket->table_35_44 = 1;
                        $modelDetiAnket->table_45_48 = 1;
                        $modelDetiAnket->interviewer_fio = 1;
                        $modelDetiAnket->save(false);
                    }
                    //ДИРЕКТОРА для школы
                    $user = new User();
                    $user->name = "ШКОЛА {$municipality->name}";
                    $user->login = "{$num}@mil.ru";
                    $user->email = "{$num}@mil.ru";
                    $user->federal_district_id = $federal->id;
                    $user->region_id = $region->id;
                    $user->municipality_id = $municipality->id;
                    $user->organization_id = $model->id;
                    $user->work_position = 'Шэф';
                    $user->setPassword('123456');
                    $user->generateAuthKey();
                    if ($user->save()) {
                        $r = new DbManager();
                        $r->init();
                        $assign = $r->createRole('director_school');
                        $r->assign($assign, $user['id']);
                    }
                    //Заполняем анкету директора
                    $modelDirector = new Director();
                    $modelDirector->user_id = $user->id;
                    $modelDirector->organization_id = $model->id;
                    $modelDirector->table_4 = 1;
                    $modelDirector->table_5 = 1;
                    $modelDirector->table_6 = 1;
                    $modelDirector->table_7 = 1;
                    $modelDirector->table_8 = 1;
                    $modelDirector->table_9 = 1;
                    $modelDirector->table_10 = 1;
                    $modelDirector->table_11 = 1;
                    $modelDirector->table_12 = 1;
                    $modelDirector->table_13 = 1;
                    $modelDirector->table_14 = 1;
                    $modelDirector->table_15 = 1;
                    $modelDirector->table_16 = 1;
                    $modelDirector->table_17 = 1;
                    $modelDirector->table_18 = 1;
                    $modelDirector->table_19 = 1;
                    $modelDirector->table_20 = 1;
                    $modelDirector->table_21 = 1;
                    $modelDirector->table_23 = 1;
                    $modelDirector->table_24 = 1;
                    $modelDirector->table_25 = 1;
                    $modelDirector->table_26 = 1;
                    $modelDirector->table_27 = 1;
                    $modelDirector->table_28 = 1;
                    $modelDirector->table_29 = 1;
                    $modelDirector->table_30 = 1;
                    $modelDirector->table_31 = 1;
                    $modelDirector->table_32 = 1;
                    $modelDirector->table_33 = 1;
                    $modelDirector->interviewer_fio = 1;
                    $modelDirector->school_menu = 1;
                    $modelDirector->save(false);

                    $num++;
                }
            }
        }
    }
}
