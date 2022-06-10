<?php

namespace backend\controllers;

use common\models\Organization;
use common\models\ChangePassword;
use common\models\Report;
use common\models\SignupForm;
use common\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\rbac\DbManager;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UsersController extends Controller
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
                            'login',
                            'logout',
                            'profile',
                            'edit',
                            'report-anket1',
                            'report-anket2',
                            'report-anket3',

                            //методы для подгрузки в отчет!
                            'region-list-report',
                            'municipality-list-report',
                            'organization-list-report',
                        ],
                        'allow' => true,
                        'roles' => [
                            'admin',
                            'director_school',
                            'food_organizer',
                            'rospotrebnadzor',
                            'curator',
                        ],
                    ],
                    [
                        'actions' => [
                            'profile',
                            'edit',
                            'report-anket1',
                            'report-anket2',
                            'report-anket3',

                            //методы для подгрузки в отчет!
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
                            'index',
                        ],
                        'allow' => true,
                        'roles' => [
                            'admin',
                        ],
                    ],
                    [
                        'actions' => [
                            'rospotrebnadzor-index',
                            'login-school',
                        ],
                        'allow' => true,
                        'roles' => [
                            'admin',
                            'rospotrebnadzor',
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

    public function actionProfile()
    {
        $user = User::find()
            ->select(
                [
                    'user.name as name',
                    'user.login as login',
                    'organization.title as title',
                    'federal_district.name as federal_district',
                    'region.name as region',
                    'municipality.name as municipality',
                ]
            )
            ->leftJoin('organization', 'organization.id = user.organization_id')
            ->innerJoin('federal_district', 'federal_district.id = user.federal_district_id')
            ->innerJoin('region', 'region.id = user.region_id')
            ->innerJoin('municipality', 'municipality.id = user.municipality_id')
            ->where(['user.id' => Yii::$app->user->identity->id])
            ->asArray()
            ->one();

        $model = new User();
        $u_role = $model->get_role(Yii::$app->user->id);

        return $this->render('profile', [
            'user' => $user,
            'u_role' => $u_role,
        ]);
    }

    public function actionLogin($id)
    {
        $model = User::findOne($id);

        Yii::$app->user->login($model);

        return $this->redirect(['site/index']);
    }

    public function actionLoginSchool()
    {
        $post = Yii::$app->request->post();
        $model = User::findOne($post['id']);

        if ($model->federal_district_id === Yii::$app->user->identity->federal_district_id && $model->region_id === Yii::$app->user->identity->region_id) {
            Yii::$app->user->login($model);

            return $this->redirect(['site/index']);
        } else {
            Yii::$app->session->setFlash(
                "error",
                "У Вас нет доступа, сообщите об этом в чате!"
            );

            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionRospotrebnadzorIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (Yii::$app->user->can('rospotrebnadzor') || Yii::$app->user->can('admin')) {
            $whereUser = [
                'organization.federal_district_id' => Yii::$app->user->identity->federal_district_id,
                'organization.region_id' => Yii::$app->user->identity->region_id,
                'user.status' => 10,
            ];
            //3-food_organizer
            //5-school
            $whereOrganization = [
                'or',
                ['organization.organization_type_id' => '3'],
                ['organization.organization_type_id' => '5'],
            ];
            $query = (new \yii\db\Query());
            $query->select(
                [
                    'user.id as userId',
                    'user.name as userName',
                    'organization_type.decryption as decryptionOrganizationType',
                    'organization.title as organizationTitle',
                ]
            );
            $query->from('organization');
            $query->innerJoin('user', 'user.organization_id = organization.id');
            $query->innerJoin('organization_type', 'organization.organization_type_id = organization_type.id');
            $query->where($whereUser);
            $query->andWhere($whereOrganization);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 100,
                ],
                'sort' => [
                    'defaultOrder' => [
                        //'organization.title' => SORT_DESC,
                        //'title' => SORT_ASC,
                    ],
                ],
            ]);

            return $this->render('rospotrebnadzor-index', [
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->goHome();
        }
    }

    public function actionEdit()
    {
        $model = User::findOne(Yii::$app->user->identity->id);

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionCreateUser()
    {
        if (Yii::$app->user->can('admin')) {
            $done = 'no';
            $org = new Organization();
            $org->title = 'Центральный аппарат';
            $org->federal_district_id = '7';
            $org->region_id = '69';
            $org->municipality_id = '1215';
            if ($org->save()) {
                $user = new User();
                $user->name = 'Центральный аппарат';
                $user->login = 'gsen2021';
                $user->organization_id = $org->id;
                $user->parent_id = 0;
                $user->email = 'gsen';
                $user->phone = 'gsen';
                $user->post = 'gsen';
                $user->application = 1;
                $user->setPassword('mskgsen2021');
                $user->generateAuthKey();
                if ($user->save()) {
                    $r = new DbManager();
                    $r->init();
                    $assign = $r->createRole('admin');
                    $r->assign($assign, $user->id);
                    $done = 'yes';
                }
            }
            print_r($done);
            die();
        } else {
            print_r(34534534);
            die();
        }
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (Yii::$app->user->can('admin')) {
            $dataProvider = new ActiveDataProvider([
                'query' => User::find()->where(['status' => 10]),
                'pagination' => [
                    'pageSize' => 1000,
                ],
                'sort' => [
                    'defaultOrder' => [
                        'created_at' => SORT_DESC,
                        //'title' => SORT_ASC,
                    ],
                ],
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->goHome();
        }
    }

    public function actionChangePassword()
    {
        $passChange = new ChangePassword();

        if ($passChange->load(Yii::$app->request->post()) && $passChange->validate()) {
            $user = User::findOne(Yii::$app->user->id);
            $user->setPassword(Yii::$app->request->post()['PasswordChange']['password_new']);
            if ($user->save()) {
                Yii::$app->session->setFlash('success', "ПАРОЛЬ ИЗМЕНЕН");

                return $this->redirect(['change-password']);
            }
        }

        return $this->render('change-password', [
            'model' => $passChange,
        ]);
    }

    public function actionReportAnket1()
    {
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '5092M');
        ini_set("pcre.backtrack_limit", "5000000");
        //ALTER TABLE `director` ADD INDEX user (`user_id`)
        //ALTER TABLE `director` ADD INDEX organization (`organization_id`)
        //ALTER TABLE `director` ADD INDEX district (`federal_district_id`,`region_id`,`municipality_id`)
        //в зависимости от роли будем давать видимость для юзеров
        $hasAccessFederalDistrict = (Yii::$app->user->can('admin') || Yii::$app->user->can('curator')) ? true : false;
        $hasAccessRegion = (Yii::$app->user->can('admin') || Yii::$app->user->can('curator')) ? true : false;
        $hasAccessMunicipality = (Yii::$app->user->can('admin') || Yii::$app->user->can(
                'curator'
            ) || Yii::$app->user->can('rospotrebnadzor')) ? true : false;
        $hasAccessShow = (Yii::$app->user->can('admin')) ? true : false;

        $modelReport = new Report();
        if (Yii::$app->user->can('curator')) {
            $strArrya = explode('/', Yii::$app->user->identity->work_position);
            $district_items = $this->getArrayDistrictItemsCurat($strArrya);
            $region_items = $this->getArrayRegionItems(
                $strArrya[0],
                true
            ); //пролучаем список областей!
            $municipality_items = ['v' => 'Все']; //пролучаем список областей!
        } else {
            $modelReport->federal_district_idReport = Yii::$app->user->identity->federal_district_id;
            $modelReport->region_idReport = Yii::$app->user->identity->region_id;
            $modelReport->municipality_idReport = Yii::$app->user->identity->municipality_id;

            $district_items = $this->getArrayDistrictItems(true); //пролучаем список областей!
            $region_items = $this->getArrayRegionItems(
                Yii::$app->user->identity->federal_district_id,
                true
            ); //пролучаем список областей!
            $municipality_items = $this->getArrayMunicipalityItems(
                Yii::$app->user->identity->region_id,
                true
            ); //пролучаем список областей!
        }

        // print_r($modelReport);
        // print_r('<br><br><br>');
        // print_r($district_items);
        // print_r('<br><br><br>');
        // print_r($region_items);
        // print_r('<br><br><br>');
        // print_r($municipality_items);
        // print_r('<br><br><br>');
        // exit();

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post()['Report'];
            $modelReport->federal_district_idReport = $post['federal_district_idReport'];
            $modelReport->region_idReport = $post['region_idReport'];
            $modelReport->municipality_idReport = $post['municipality_idReport'];
            $modelReport->yearReport = $post['region_idReport'];
            $modelReport->showReport = $post['showReport'];

            $where = ['organization_type_id' => 5];
            //!!! Собирать будет только по тем результатам что пришли!!!
            if ($post['federal_district_idReport'] && $post['federal_district_idReport'] !== 'v') {
                $where += ['federal_district_id' => $post['federal_district_idReport']];
                $region_items = $this->getArrayRegionItems(
                    $post['federal_district_idReport'],
                    true
                ); //пролучаем список областей!
            }

            if ($post['region_idReport'] && $post['region_idReport'] !== 'v') {
                $where += ['region_id' => $post['region_idReport']];
                $municipality_items = $this->getArrayMunicipalityItems(
                    $post['region_idReport'],
                    true
                );
            }
            if ($post['municipality_idReport'] && $post['municipality_idReport'] !== 'v') {
                $where += ['municipality_id' => $post['municipality_idReport']];
            }

            if (Yii::$app->user->can('rospotrebnadzor')) {
                $where += [
                    'federal_district_id' => Yii::$app->user->identity->federal_district_id,
                    'region_id' => Yii::$app->user->identity->region_id
                ];
            }
            if (Yii::$app->user->can('director_school')) {
                $where += ['id' => Yii::$app->user->identity->organization_id];
            }

            /*print_r('<pre>');
            print_r($where);
            print_r('</pre>');*/
            //SELECT `id`, `federal_district_id`, `region_id`, `municipality_id`, `title`, (SELECT id from `director` where `director`.organization_id = `organization`.id) as 'result' FROM `organization` order by `federal_district_id`, `region_id`, `municipality_id` ASC
            $rows = (new \yii\db\Query())
                ->select(
                    [
                        'id',
                        'federal_district_id',
                        'region_id',
                        'municipality_id',
                        'title',
                        '(SELECT id from `director` where `director`.organization_id = `organization`.id) as result',
                    ]
                )
                ->from('organization')
                ->where($where)
                ->andWhere(['not in', 'organization.id', [1, 3, 4, 5, 6, 7, 10, 11]])
                ->orderBy([
                    'federal_district_id' => SORT_ASC,
                    'region_id' => SORT_ASC,
                    'municipality_id' => SORT_ASC,
                ])
                //->asArray()
                ->all();
            /* print_r($rows->createCommand()->rawSQL);
             exit();*/
            //СДЕЛАТЬ ИТОГОВУЮ СТРОККУ!!
            if (!$rows) {
                Yii::$app->session->setFlash('error', 'Данных не найдено!');
            } else {
                //Cначало прохожу и собираю массивы по школам по регионам по округам
                //потом на странице пройдусь по школам и буду отслеживать изменится ли
                $result['school'] = [];

                $region = $rows[0]['region_id'];
                $federal = $rows[0]['federal_district_id'];
                $arrayRegion = [
                    'typeRow' => 'itogReg',
                    'total' => 0,
                    'noTotal' => 0
                ];
                $arrayFederal = [
                    'typeRow' => 'itoFed',
                    'total' => 0,
                    'noTotal' => 0
                ];

                foreach ($rows as $row) {
                    //Проверяем если строка соответсвует федеральному округу
                    if ($federal == $row['federal_district_id']) {
                        if ($region == $row['region_id']) {
                            //загонгяем строку с результатом по школе
                            $row += ['typeRow' => 'string'];
                            $result['school'][] = $row;
                            //записываем название региона
                            $arrayRegion['regin'] = $row['region_id'];
                            $arrayRegion['total'] += 1;
                            if (!$row['result']) {
                                $arrayRegion['noTotal'] += 1;
                            }
                            //записать название федерального округа
                            $arrayFederal['total'] += 1;
                            if (!$row['result']) {
                                $arrayFederal['noTotal'] += 1;
                            }
                            $arrayFederal['fed'] = $row['federal_district_id'];
                        } else {
                            //загонгяем строку с результатом по региону
                            $result['school'][] = $arrayRegion;
                            //обнуляем для нового региона!
                            $arrayRegion = [
                                'typeRow' => 'itogReg',
                                'total' => 0,
                                'noTotal' => 0
                            ];
                            $region = $row['region_id'];
                            //что бы не терять строку добавлем её в новый массив что бы не потерять
                            $row += ['typeRow' => 'string'];
                            $result['school'][] = $row;

                            $arrayRegion['regin'] = $row['region_id'];
                            $arrayRegion['total'] += 1;
                            if (!$row['result']) {
                                $arrayRegion['noTotal'] += 1;
                            }

                            $arrayFederal['total'] += 1;
                            if (!$row['result']) {
                                $arrayFederal['noTotal'] += 1;
                            }
                            $arrayFederal['fed'] = $row['federal_district_id'];
                        }
                    } else {
                        $result['school'][] = $arrayRegion;
                        //обнуляем для нового региона!
                        $arrayRegion = [
                            'typeRow' => 'itogReg',
                            'total' => 0,
                            'noTotal' => 0
                        ];
                        $region = $row['region_id'];

                        //загонгяем строку с результатом по фед округу
                        $result['school'][] = $arrayFederal;
                        //обнуляем для нового округа!
                        $arrayFederal = [
                            'typeRow' => 'itoFed',
                            'total' => 0,
                            'noTotal' => 0
                        ];
                        $federal = $row['federal_district_id'];

                        //что бы не терять строку добавлем её в новый массив что бы не потерять
                        $row += ['typeRow' => 'string'];
                        $result['school'][] = $row;
                        $arrayRegion['regin'] = $row['region_id'];
                        $arrayRegion['total'] += 1;
                        if (!$row['result']) {
                            $arrayRegion['noTotal'] += 1;
                        }

                        $arrayFederal['total'] += 1;
                        if (!$row['result']) {
                            $arrayFederal['noTotal'] += 1;
                        }
                        $arrayFederal['fed'] = $row['federal_district_id'];
                    }
                }

                //Если выбран один округ то у меня тут
                //$arrayFederal = [
                //  'typeRow' => 'itoFed',
                //  'total' => 0,
                //  'noTotal' => 0
                //];
                //Лежит строка с округом я могу просто дописать иф
                //if($post['municipality_idReport'] !== 'v')  $result['school'][] = $arrayRegion;
                $result['school'][] = $arrayRegion;
                $result['school'][] = $arrayFederal;
                //print_r('<pre>');
                //print_r($result['school']);
                //print_r('</pre>');
            }
        }

        return $this->render(
            'report-anket1',
            [
                'modelReport' => $modelReport,

                'district_items' => $district_items,
                'region_items' => $region_items,
                'municipality_items' => $municipality_items,

                'hasAccessFederalDistrict' => $hasAccessFederalDistrict,
                'hasAccessRegion' => $hasAccessRegion,
                'hasAccessMunicipality' => $hasAccessMunicipality,

                'result' => $result,
                'hasAccessShow' => $hasAccessShow,
            ]
        );
    }

    public function actionReportAnket2()
    {
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '5092M');
        ini_set("pcre.backtrack_limit", "5000000");
        //ALTER TABLE `food` ADD INDEX user (`user_id`)
        //ALTER TABLE `food` ADD INDEX organization (`organization_id`)
        //ALTER TABLE `food` ADD INDEX district (`federal_district_id`,`region_id`,`municipality_id`)
        //в зависимости от роли будем давать видимость для юзеров
        $hasAccessFederalDistrict = (Yii::$app->user->can('admin') || Yii::$app->user->can('curator')) ? true : false;
        $hasAccessRegion = (Yii::$app->user->can('admin') || Yii::$app->user->can('curator')) ? true : false;
        $hasAccessMunicipality = (Yii::$app->user->can('admin') || Yii::$app->user->can(
                'curator'
            ) || Yii::$app->user->can('rospotrebnadzor')) ? true : false;
        $hasAccessShow = (Yii::$app->user->can('admin')) ? true : false;
        $modelReport = new Report();

        if (Yii::$app->user->can('curator')) {
            $strArrya = explode('/', Yii::$app->user->identity->work_position);
            $district_items = $this->getArrayDistrictItemsCurat($strArrya);
            $region_items = $this->getArrayRegionItems(
                $strArrya[0],
                true
            ); //пролучаем список областей!
            $municipality_items = ['v' => 'Все']; //пролучаем список областей!
        } else {
            $modelReport->federal_district_idReport = Yii::$app->user->identity->federal_district_id;
            $modelReport->region_idReport = Yii::$app->user->identity->region_id;
            $modelReport->municipality_idReport = Yii::$app->user->identity->municipality_id;

            $district_items = $this->getArrayDistrictItems(true); //пролучаем список областей!
            $region_items = $this->getArrayRegionItems(
                Yii::$app->user->identity->federal_district_id,
                true
            ); //пролучаем список областей!
            $municipality_items = $this->getArrayMunicipalityItems(
                Yii::$app->user->identity->region_id,
                true
            ); //пролучаем список областей!
        }

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post()['Report'];
            $modelReport->federal_district_idReport = $post['federal_district_idReport'];
            $modelReport->region_idReport = $post['region_idReport'];
            $modelReport->municipality_idReport = $post['municipality_idReport'];
            $modelReport->yearReport = $post['region_idReport'];
            $modelReport->showReport = $post['showReport'];
            $where = ['`auth_assignment`.`item_name`' => 'food_organizer'];
            //!!! Собирать будет только по тем результатам что пришли!!!
            if ($post['federal_district_idReport'] && $post['federal_district_idReport'] !== 'v') {
                $where += ['`user`.federal_district_id' => $post['federal_district_idReport']];
                $region_items = $this->getArrayRegionItems(
                    $post['federal_district_idReport'],
                    true
                ); //пролучаем список областей!
            }
            if ($post['region_idReport'] && $post['region_idReport'] !== 'v') {
                $where += ['`user`.region_id' => $post['region_idReport']];
                $municipality_items = $this->getArrayMunicipalityItems(
                    $post['region_idReport'],
                    true
                );
            }
            if ($post['municipality_idReport'] && $post['municipality_idReport'] !== 'v') {
                $where += ['`user`.municipality_id' => $post['municipality_idReport']];
            }
            if (Yii::$app->user->can('rospotrebnadzor')) {
                $where += [
                    '`user`.federal_district_id' => Yii::$app->user->identity->federal_district_id,
                    '`user`.region_id' => Yii::$app->user->identity->region_id
                ];
            }
            if (Yii::$app->user->can('food_organizer')) {
                $where += ['organization_id' => Yii::$app->user->identity->organization_id];
            }

            /*
                SELECT
                    `user`.`id` as user_id,
                    `user`.`federal_district_id` as federal_district_id,
                    `user`.`region_id` as region_id,
                    `user`.`municipality_id` as municipality_id,
                    `organization`.`title` as title,
                    (SELECT count(*) from `food_organizer` where `food_organizer`.user_id = `user`.id) as countResult,
                    (SELECT id from `food` where `food`.user_id = `user`.id) as result
                FROM `auth_assignment`
                INNER join `user` on `user`.id = auth_assignment.user_id
                INNER join `organization` on `user`.organization_id = organization.id
                where `auth_assignment`.`item_name` = 'food_organizer'
            */

            $rows = (new \yii\db\Query())
                ->select(
                    [
                        '`user`.`id` as user_id',
                        '`user`.`federal_district_id` as federal_district_id',
                        '`user`.`region_id` as region_id',
                        '`user`.`municipality_id` as municipality_id',
                        '`organization`.`title` as title',
                        '`organization`.`id` as organizationId',
                        '(SELECT count(*) from `food_organizer` where `food_organizer`.user_id = `user`.id) as countResult',
                        '(SELECT id from `food` where `food`.user_id = `user`.id) as result',
                    ]
                )
                ->from('auth_assignment')
                ->join('INNER JOIN', 'user', 'auth_assignment.user_id = `user`.id')
                ->join('INNER JOIN', 'organization', '`user`.organization_id = organization.id')
                ->where($where)
                //->having(['not in', '`organization`.`id`', [1,3,4,5,6,7,10,11]])
                ->andWhere(['!=', 'organization.region_id', '2'])
                ->orderBy([
                    '`user`.federal_district_id' => SORT_ASC,
                    '`user`.region_id' => SORT_ASC,
                    '`user`.municipality_id' => SORT_ASC,
                ])
                //->asArray()
                ->all();

            //print_r('<pre>');
            //print_r($rows->createCommand()->rawSQL);
            //print_r('</pre>');
            //exit();
            // HAVING `organizationId` NOT IN (1, 3, 4, 5, 6, 7, 10, 11)
            /* print_r($rows->createCommand()->rawSQL);
             exit();*/
            //СДЕЛАТЬ ИТОГОВУЮ СТРОККУ!!
            if (!$rows) {
                Yii::$app->session->setFlash('error', 'Данных не найдено!');
            } else {
                //Cначало прохожу и собираю массивы по школам по регионам по округам
                //потом на странице пройдусь по школам и буду отслеживать изменится ли
                $result['school'] = [];

                $region = $rows[0]['region_id'];
                $federal = $rows[0]['federal_district_id'];
                $arrayRegion = [
                    'typeRow' => 'itogReg',
                    'schoolCount' => 0,//количество прикрепленных школ
                    'total' => 0,//общее количество организаций
                    'noTotal' => 0//не заполненные количество организаций
                ];
                $arrayFederal = [
                    'typeRow' => 'itoFed',
                    'schoolCount' => 0,//количество прикрепленных школ
                    'total' => 0,//общее количество организаций
                    'noTotal' => 0//не заполненные количество организаций
                ];

                foreach ($rows as $row) {
                    //Проверяем если строка соответсвует федеральному округу
                    if ($federal == $row['federal_district_id']) {
                        if ($region == $row['region_id']) {
                            //загонгяем строку с результатом по школе
                            $row += ['typeRow' => 'string'];
                            $result['school'][] = $row;
                            //записываем название региона
                            $arrayRegion['regin'] = $row['region_id'];
                            $arrayRegion['total'] += 1;
                            $arrayRegion['schoolCount'] += $row['countResult'];
                            if (!$row['result']) {
                                $arrayRegion['noTotal'] += 1;
                            }
                            //записать название федерального округа
                            $arrayFederal['total'] += 1;
                            $arrayFederal['schoolCount'] += $row['countResult'];
                            if (!$row['result']) {
                                $arrayFederal['noTotal'] += 1;
                            }
                            $arrayFederal['fed'] = $row['federal_district_id'];
                        } else {
                            //загонгяем строку с результатом по региону
                            $result['school'][] = $arrayRegion;
                            //обнуляем для нового региона!
                            $arrayRegion = [
                                'typeRow' => 'itogReg',
                                'total' => 0,
                                'noTotal' => 0
                            ];
                            $region = $row['region_id'];
                            //что бы не терять строку добавлем её в новый массив что бы не потерять
                            $row += ['typeRow' => 'string'];
                            $result['school'][] = $row;

                            $arrayRegion['regin'] = $row['region_id'];
                            $arrayRegion['total'] += 1;
                            $arrayRegion['schoolCount'] += $row['countResult'];
                            if (!$row['result']) {
                                $arrayRegion['noTotal'] += 1;
                            }

                            $arrayFederal['total'] += 1;
                            $arrayFederal['schoolCount'] += $row['countResult'];
                            if (!$row['result']) {
                                $arrayFederal['noTotal'] += 1;
                            }
                            $arrayFederal['fed'] = $row['federal_district_id'];
                        }
                    } else {
                        $result['school'][] = $arrayRegion;
                        //обнуляем для нового региона!
                        $arrayRegion = [
                            'typeRow' => 'itogReg',
                            'schoolCount' => 0,
                            'total' => 0,
                            'noTotal' => 0
                        ];
                        $region = $row['region_id'];

                        //загонгяем строку с результатом по фед округу
                        $result['school'][] = $arrayFederal;
                        //обнуляем для нового округа!
                        $arrayFederal = [
                            'typeRow' => 'itoFed',
                            'schoolCount' => 0,
                            'total' => 0,
                            'noTotal' => 0
                        ];
                        $federal = $row['federal_district_id'];

                        //что бы не терять строку добавлем её в новый массив что бы не потерять
                        $row += ['typeRow' => 'string'];
                        $result['school'][] = $row;
                        $arrayRegion['regin'] = $row['region_id'];
                        $arrayRegion['total'] += 1;
                        $arrayRegion['schoolCount'] += $row['countResult'];
                        if (!$row['result']) {
                            $arrayRegion['noTotal'] += 1;
                        }

                        $arrayFederal['total'] += 1;
                        $arrayFederal['schoolCount'] += $row['countResult'];
                        if (!$row['result']) {
                            $arrayFederal['noTotal'] += 1;
                        }
                        $arrayFederal['fed'] = $row['federal_district_id'];
                    }
                }

                //Если выбран один округ то у меня тут
                //$arrayFederal = [
                //  'typeRow' => 'itoFed',
                //  'total' => 0,
                //  'noTotal' => 0
                //];
                //Лежит строка с округом я могу просто дописать иф
                //if($post['municipality_idReport'] !== 'v')  $result['school'][] = $arrayRegion;
                $result['school'][] = $arrayRegion;
                $result['school'][] = $arrayFederal;
                /*print_r('<pre>');
                print_r($result['school']);
                print_r('</pre>');*/
                //print_r('<pre>');
                //print_r($result['school']);
                //print_r('</pre>');
            }
        }

        return $this->render(
            'report-anket2',
            [
                'modelReport' => $modelReport,

                'district_items' => $district_items,
                'region_items' => $region_items,
                'municipality_items' => $municipality_items,

                'hasAccessFederalDistrict' => $hasAccessFederalDistrict,
                'hasAccessRegion' => $hasAccessRegion,
                'hasAccessMunicipality' => $hasAccessMunicipality,
                'hasAccessShow' => $hasAccessShow,

                'result' => $result,
            ]
        );
    }

    public function actionReportAnket3()
    {
        ini_set('max_execution_time', 5600);
        ini_set('memory_limit', '15092M');
        ini_set("pcre.backtrack_limit", "15000000");
        //ALTER TABLE `deti_anket` ADD INDEX organization (`organization_id`)
        //ALTER TABLE `deti_anket` ADD INDEX district (`federal_district_id`,`region_id`,`municipality_id`)

        //в зависимости от роли будем давать видимость для юзеров
        $hasAccessFederalDistrict = (Yii::$app->user->can('admin') || Yii::$app->user->can('curator')) ? true : false;
        $hasAccessRegion = (Yii::$app->user->can('admin') || Yii::$app->user->can('curator')) ? true : false;
        $hasAccessMunicipality = (Yii::$app->user->can('admin') || Yii::$app->user->can(
                'curator'
            ) || Yii::$app->user->can('rospotrebnadzor')) ? true : false;
        $hasAccessShow = (Yii::$app->user->can('admin')) ? true : false;

        $modelReport = new Report();

        if (Yii::$app->user->can('curator')) {
            $strArrya = explode('/', Yii::$app->user->identity->work_position);
            $district_items = $this->getArrayDistrictItemsCurat($strArrya);
            $region_items = $this->getArrayRegionItems(
                $strArrya[0],
                true
            ); //пролучаем список областей!
            $municipality_items = ['v' => 'Все']; //пролучаем список областей!
        } else {
            $modelReport->federal_district_idReport = Yii::$app->user->identity->federal_district_id;
            $modelReport->region_idReport = Yii::$app->user->identity->region_id;
            $modelReport->municipality_idReport = Yii::$app->user->identity->municipality_id;

            $district_items = $this->getArrayDistrictItems(true); //пролучаем список областей!
            $region_items = $this->getArrayRegionItems(
                Yii::$app->user->identity->federal_district_id,
                true
            ); //пролучаем список областей!
            $municipality_items = $this->getArrayMunicipalityItems(
                Yii::$app->user->identity->region_id,
                true
            ); //пролучаем список областей!
        }

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post()['Report'];
            $modelReport->federal_district_idReport = $post['federal_district_idReport'];
            $modelReport->region_idReport = $post['region_idReport'];
            $modelReport->municipality_idReport = $post['municipality_idReport'];
            $modelReport->yearReport = $post['region_idReport'];
            $modelReport->showReport = $post['showReport'];

            $where = ['organization_type_id' => 5];
            //!!! Собирать будет только по тем результатам что пришли!!!
            if ($post['federal_district_idReport'] && $post['federal_district_idReport'] !== 'v') {
                $where += ['federal_district_id' => $post['federal_district_idReport']];
                $region_items = $this->getArrayRegionItems(
                    $post['federal_district_idReport'],
                    true
                ); //пролучаем список областей!
            }
            if ($post['region_idReport'] && $post['region_idReport'] !== 'v') {
                $where += ['region_id' => $post['region_idReport']];
                $municipality_items = $this->getArrayMunicipalityItems(
                    $post['region_idReport'],
                    true
                );
            }
            if ($post['municipality_idReport'] && $post['municipality_idReport'] !== 'v') {
                $where += ['municipality_id' => $post['municipality_idReport']];
            }
            if (Yii::$app->user->can('rospotrebnadzor')) {
                $where += [
                    'federal_district_id' => Yii::$app->user->identity->federal_district_id,
                    'region_id' => Yii::$app->user->identity->region_id
                ];
            }
            if (Yii::$app->user->can('director_school')) {
                $where += ['id' => Yii::$app->user->identity->organization_id];
            }

            /*
            SELECT
               `id`,
               `federal_district_id`,
               `region_id`,
               `municipality_id`,
               `title`,
               `sch2`,
               `sch5`,
               `sch10`,
               (SELECT count(*) from `deti_anket` where `deti_anket`.`organization_id` = `organization`.id) as countResult,
               (SELECT count(*) from `deti_anket` where `deti_anket`.`organization_id` = `organization`.id and field1_1 = 2) as countsch2,
               (SELECT count(*) from `deti_anket` where `deti_anket`.`organization_id` = `organization`.id and field1_1 = 5) as countsch5,
               (SELECT count(*) from `deti_anket` where `deti_anket`.`organization_id` = `organization`.id and field1_1 = 10) as countsch10
            FROM `organization`
            where organization_type_id = 5
            order by `federal_district_id`, `region_id`, `municipality_id` ASC
            */
            $rows = (new \yii\db\Query())
                ->select(
                    [
                        'id',
                        'federal_district_id',
                        'region_id',
                        'municipality_id',
                        'title',
                        'sch2',
                        'sch5',
                        'sch10',
                        '(SELECT count(*) from `deti_anket` where `deti_anket`.`organization_id` = `organization`.id) as countResult',
                        '(SELECT count(*) from `deti_anket` where `deti_anket`.`organization_id` = `organization`.id and field1_1 = 2) as countsch2',
                        '(SELECT count(*) from `deti_anket` where `deti_anket`.`organization_id` = `organization`.id and field1_1 = 5) as countsch5',
                        '(SELECT count(*) from `deti_anket` where `deti_anket`.`organization_id` = `organization`.id and field1_1 = 10) as countsch10',
                    ]
                )
                ->from('organization')
                ->where($where)
                ->andWhere(['not in', '`organization`.id', [1, 3, 4, 5, 6, 7, 10, 11]])
                ->orderBy([
                    'federal_district_id' => SORT_ASC,
                    'region_id' => SORT_ASC,
                    'municipality_id' => SORT_ASC,
                ])
                ->all();
            /* print_r($rows->createCommand()->rawSQL);
             exit();*/
            /*   print_r('<pre>');
            print_r($rows);
            print_r('</pre>');
            exit();*/
            //СДЕЛАТЬ ИТОГОВУЮ СТРОККУ!!
            if (!$rows) {
                Yii::$app->session->setFlash('error', 'Данных не найдено!');
            } else {
                //Cначало прохожу и собираю массивы по школам по регионам по округам
                //потом на странице пройдусь по школам и буду отслеживать изменится ли
                $result['school'] = [];

                $region = $rows[0]['region_id'];
                $federal = $rows[0]['federal_district_id'];
                $arrayRegion = [
                    'typeRow' => 'itogReg',
                    'planSch2' => 0,
                    'planSch5' => 0,
                    'planSch10' => 0,
                    'factSch2' => 0,
                    'factSch5' => 0,
                    'factSch10' => 0,
                ];
                $arrayFederal = [
                    'typeRow' => 'itoFed',
                    'planSch2' => 0,
                    'planSch5' => 0,
                    'planSch10' => 0,
                    'factSch2' => 0,
                    'factSch5' => 0,
                    'factSch10' => 0,
                ];

                foreach ($rows as $row) {
                    //Проверяем если строка соответсвует федеральному округу
                    if ($federal == $row['federal_district_id']) {
                        if ($region == $row['region_id']) {
                            //загонгяем строку с результатом по школе
                            $row += ['typeRow' => 'string'];
                            $result['school'][] = $row;

                            //записываем название региона
                            $arrayRegion['regin'] = $row['region_id'];
                            $arrayRegion['planSch2'] += $row['sch2'];
                            $arrayRegion['planSch5'] += $row['sch5'];
                            $arrayRegion['planSch10'] += $row['sch10'];
                            if ($row['countsch2']) {
                                $arrayRegion['factSch2'] += $row['countsch2'];
                            }
                            if ($row['countsch5']) {
                                $arrayRegion['factSch5'] += $row['countsch5'];
                            }
                            if ($row['countsch10']) {
                                $arrayRegion['factSch10'] += $row['countsch10'];
                            }
                            /*остальное*/
                            if ($row['countResult']) {
                                $arrayRegion['countResult'] += $row['countResult'];
                            }
                            //записать название федерального округа
                            $arrayFederal['fed'] = $row['federal_district_id'];
                            $arrayFederal['planSch2'] += $row['sch2'];
                            $arrayFederal['planSch5'] += $row['sch5'];
                            $arrayFederal['planSch10'] += $row['sch10'];
                            if ($row['countsch2']) {
                                $arrayFederal['factSch2'] += $row['countsch2'];
                            }
                            if ($row['countsch5']) {
                                $arrayFederal['factSch5'] += $row['countsch5'];
                            }
                            if ($row['countsch10']) {
                                $arrayFederal['factSch10'] += $row['countsch10'];
                            }
                            /*остальное*/
                            if ($row['countResult']) {
                                $arrayFederal['countResult'] += $row['countResult'];
                            }
                        } else {
                            //загонгяем строку с результатом по региону
                            $result['school'][] = $arrayRegion;
                            //обнуляем для нового региона!
                            $arrayRegion = [
                                'typeRow' => 'itogReg',
                                'planSch2' => 0,
                                'planSch5' => 0,
                                'planSch10' => 0,
                                'factSch2' => 0,
                                'factSch5' => 0,
                                'factSch10' => 0,
                            ];
                            $region = $row['region_id'];
                            //что бы не терять строку добавлем её в новый массив что бы не потерять
                            $row += ['typeRow' => 'string'];
                            $result['school'][] = $row;

                            //записываем название региона
                            $arrayRegion['regin'] = $row['region_id'];
                            $arrayRegion['planSch2'] += $row['sch2'];
                            $arrayRegion['planSch5'] += $row['sch5'];
                            $arrayRegion['planSch10'] += $row['sch10'];
                            if ($row['countsch2']) {
                                $arrayRegion['factSch2'] += $row['countsch2'];
                            }
                            if ($row['countsch5']) {
                                $arrayRegion['factSch5'] += $row['countsch5'];
                            }
                            if ($row['countsch10']) {
                                $arrayRegion['factSch10'] += $row['countsch10'];
                            }
                            /*остальное*/
                            if ($row['countResult']) {
                                $arrayRegion['countResult'] += $row['countResult'];
                            }

                            //записать название федерального округа
                            $arrayFederal['fed'] = $row['federal_district_id'];
                            $arrayFederal['planSch2'] += $row['sch2'];
                            $arrayFederal['planSch5'] += $row['sch5'];
                            $arrayFederal['planSch10'] += $row['sch10'];
                            if ($row['countsch2']) {
                                $arrayFederal['factSch2'] += $row['countsch2'];
                            }
                            if ($row['countsch5']) {
                                $arrayFederal['factSch5'] += $row['countsch5'];
                            }
                            if ($row['countsch10']) {
                                $arrayFederal['factSch10'] += $row['countsch10'];
                            }
                            /*остальное*/
                            if ($row['countResult']) {
                                $arrayFederal['countResult'] += $row['countResult'];
                            }
                        }
                    } else {
                        $result['school'][] = $arrayRegion;
                        //обнуляем для нового региона!
                        $arrayRegion = [
                            'typeRow' => 'itogReg',
                            'planSch2' => 0,
                            'planSch5' => 0,
                            'planSch10' => 0,
                            'factSch2' => 0,
                            'factSch5' => 0,
                            'factSch10' => 0,
                        ];
                        $region = $row['region_id'];
                        //загонгяем строку с результатом по фед округу
                        $result['school'][] = $arrayFederal;
                        //обнуляем для нового округа!
                        $arrayFederal = [
                            'typeRow' => 'itoFed',
                            'planSch2' => 0,
                            'planSch5' => 0,
                            'planSch10' => 0,
                            'factSch2' => 0,
                            'factSch5' => 0,
                            'factSch10' => 0,
                        ];
                        $federal = $row['federal_district_id'];

                        //что бы не терять строку добавлем её в новый массив что бы не потерять c новым фед округом
                        $row += ['typeRow' => 'string'];
                        $result['school'][] = $row;

                        //записываем название региона
                        $arrayRegion['regin'] = $row['region_id'];
                        $arrayRegion['planSch2'] += $row['sch2'];
                        $arrayRegion['planSch5'] += $row['sch5'];
                        $arrayRegion['planSch10'] += $row['sch10'];
                        if ($row['countsch2']) {
                            $arrayRegion['factSch2'] += $row['countsch2'];
                        }
                        if ($row['countsch5']) {
                            $arrayRegion['factSch5'] += $row['countsch5'];
                        }
                        if ($row['countsch10']) {
                            $arrayRegion['factSch10'] += $row['countsch10'];
                        }
                        /*остальное*/
                        if ($row['countResult']) {
                            $arrayRegion['countResult'] += $row['countResult'];
                        }

                        //записать название федерального округа
                        $arrayFederal['fed'] = $row['federal_district_id'];
                        $arrayFederal['planSch2'] += $row['sch2'];
                        $arrayFederal['planSch5'] += $row['sch5'];
                        $arrayFederal['planSch10'] += $row['sch10'];
                        if ($row['countsch2']) {
                            $arrayFederal['factSch2'] += $row['countsch2'];
                        }
                        if ($row['countsch5']) {
                            $arrayFederal['factSch5'] += $row['countsch5'];
                        }
                        if ($row['countsch10']) {
                            $arrayFederal['factSch10'] += $row['countsch10'];
                        }
                        /*остальное*/
                        if ($row['countResult']) {
                            $arrayFederal['countResult'] += $row['countResult'];
                        }
                    }
                }

                //Если выбран один округ то у меня тут
                //$arrayFederal = [
                //  'typeRow' => 'itoFed',
                //  'total' => 0,
                //  'noTotal' => 0
                //];
                //Лежит строка с округом я могу просто дописать иф
                //if($post['municipality_idReport'] !== 'v')  $result['school'][] = $arrayRegion;
                $result['school'][] = $arrayRegion;
                $result['school'][] = $arrayFederal;
                /* print_r('<pre>');
                 print_r($result['school']);
                 print_r('</pre>');*/
            }
        }

        return $this->render(
            'report-anket3',
            [
                'modelReport' => $modelReport,

                'district_items' => $district_items,
                'region_items' => $region_items,
                'municipality_items' => $municipality_items,

                'hasAccessFederalDistrict' => $hasAccessFederalDistrict,
                'hasAccessRegion' => $hasAccessRegion,
                'hasAccessMunicipality' => $hasAccessMunicipality,
                'hasAccessShow' => $hasAccessShow,

                'result' => $result,
            ]
        );
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
