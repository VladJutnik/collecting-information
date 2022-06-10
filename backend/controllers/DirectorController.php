<?php

namespace backend\controllers;

use common\models\DirectorSearch;
use common\models\DirectorTable4;
use common\models\DirectorTable5;
use common\models\DirectorTable6;
use common\models\DirectorTable7;
use common\models\DirectorTable8;
use common\models\DirectorTable9;
use common\models\DirectorTable10;
use common\models\DirectorTable11;
use common\models\DirectorTable12;
use common\models\DirectorTable13;
use common\models\DirectorTable14;
use common\models\DirectorTable15;
use common\models\DirectorTable16;
use common\models\DirectorTable17;
use common\models\DirectorTable18;
use common\models\DirectorTable19;
use common\models\DirectorTable20;
use common\models\DirectorTable21;
use common\models\DirectorTable23;
use common\models\DirectorTable24;
use common\models\DirectorTable25;
use common\models\DirectorTable26;
use common\models\DirectorTable27;
use common\models\DirectorTable28;
use common\models\DirectorTable29;
use common\models\DirectorTable30;
use common\models\DirectorTable31;
use common\models\DirectorTable32;
use common\models\DirectorTable33;
use common\models\Report;
use Mpdf\Mpdf;
use Yii;
use common\models\Director;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DirectorController implements the CRUD actions for Director model.
 */
class DirectorController extends Controller
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
                            'create',
                        ],
                        'allow' => true,
                        'roles' => [
                            'admin',
                            'director_school',
                            'rospotrebnadzor',
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
        $searchModel = new DirectorSearch();
        $search = Yii::$app->request->queryParams;
        if (Yii::$app->user->can('curator')) {
            if (!$search['DirectorSearch']['region_id']) {
                $search['DirectorSearch']['municipality'] = '';
            }
        } else {
            if (Yii::$app->user->can('admin')) {
                if (!$search['DirectorSearch']['federal_district_id']) {
                    $search['DirectorSearch']['region_id'] = '';
                    $search['DirectorSearch']['municipality'] = '';
                }
            }
        }

        $dataProvider = $searchModel->search($search);
        //tсли не админ подргужаю регионы для выборки стартовой в серч моделе
        if (Yii::$app->user->can('curator')) {
            $region_items = Yii::$app->myComponent->RegionItems(Yii::$app->user->identity->federal_district_id);
            $municipality_items = ($search['DirectorSearch']['region_id']) ? Yii::$app->myComponent->MunicipalityItems(
                $search['DirectorSearch']['region_id']
            ) : [];
        } else {
            if (Yii::$app->user->can('rospotrebnadzor')) {
                $municipality_items = Yii::$app->myComponent->MunicipalityItems(Yii::$app->user->identity->region_id);
            } else {
                if (Yii::$app->user->can('admin')) {
                    $region_items = ($search['DirectorSearch']['federal_district_id']) ? Yii::$app->myComponent->RegionItems(
                        $search['DirectorSearch']['federal_district_id']
                    ) : [];
                    $municipality_items = ($search['DirectorSearch']['region_id'] && $search['DirectorSearch']['federal_district_id']) ? Yii::$app->myComponent->MunicipalityItems(
                        $search['DirectorSearch']['region_id']
                    ) : [];
                }
            }
        }

        //проверяю параметры для выборки
        /* if ($search['DirectorSearch']['federal_district_id']) {
             $region_items = (Yii::$app->user->can('curator') || Yii::$app->user->can('rospotrebnadzor')) ? Yii::$app->myComponent->RegionItems(Yii::$app->user->identity->federal_district_id) : Yii::$app->myComponent->RegionItems($search['DirectorSearch']['federal_district_id']);
         }
         if ($search['DirectorSearch']['region_id']) {
             $municipality_items = Yii::$app->myComponent->MunicipalityItems($search['DirectorSearch']['region_id']);
         } else {
             $municipality_items = [];
         }*/

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

    public function actionView($id)
    {
        /* $query = (new \yii\db\Query());
        $query->from('director');
        $query->leftJoin('director_table_4', 'director_table_4.id = director.table_4');
        $query->leftJoin('director_table_5', 'director_table_5.id = director.table_5');
        $query->where(['director.id'=>$id]);
        //$query->asArray();
        $query->all();

        $messages_user = Director::find()
            ->innerJoin('director_table_4', 'director_table_4.id = director.table_4')
            ->innerJoin('director_table_5', 'director_table_5.id = director.table_5')
            ->where(['director.id'=>$id])
            ->asArray()
            ->one();

        //$model_ter = new Therapist();
        //$model_ter->attributes = $ter->attributes;
        //$model_ter->user_id = $model->id;
        //$model_ter->save(false);

        print_r($messages_user);
        exit();*/
        /*$messages_user = Chat::find()
            ->select(
                [
                    'chat.id as chat_id',
                    'chat.sender_user_id',
                    'chat.receiver_user_id',
                    'chat.message',
                    'chat.status',
                    'chat.created_at',
                    'auth_assignment.item_name',
                    #'user.type_listener',
                    #'user.training_id',
                    'user.name as u_name',
                    'user.login as u_login',
                    'organization.id as org_id',
                    'organization.title as org_title',

                ]
            )
            ->leftJoin('user', 'user.id=chat.sender_user_id')
            ->leftJoin('organization', 'organization.id=user.organization_id')
            ->leftJoin('auth_assignment', 'auth_assignment.user_id=user.id')
            ->where(['chat.sender_user_id' => $id])
            ->orWhere(['chat.receiver_user_id' => $id])
            ->asArray()
            ->all();*/
        /*$ter = Therapist::find()->where(['user_id' => $id])->one(); //сколько было продублировано пациентов
        if (!empty($ter)) {
            $model_ter = new Therapist();
            $model_ter->attributes = $ter->attributes;
            $model_ter->user_id = $model->id;
            $model_ter->save(false);
        }*/
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $stausButtom = 1;
        $model = $this->findModelId($id);
        $directorTable4 = $this->findModelDirectorTable4(
            $model->table_4
        );
        $directorTable5 = $this->findModelDirectorTable5(
            $model->table_5
        );
        $directorTable6 = $this->findModelDirectorTable6(
            $model->table_6
        );
        $directorTable7 = $this->findModelDirectorTable7(
            $model->table_7
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable8 = $this->findModelDirectorTable8(
            $model->table_8
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable9 = $this->findModelDirectorTable9(
            $model->table_9
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable10 = $this->findModelDirectorTable10(
            $model->table_10
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable11 = $this->findModelDirectorTable11(
            $model->table_11
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable12 = $this->findModelDirectorTable12(
            $model->table_12
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable13 = $this->findModelDirectorTable13(
            $model->table_13
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable14 = $this->findModelDirectorTable14(
            $model->table_14
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable15 = $this->findModelDirectorTable15(
            $model->table_15
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable16 = $this->findModelDirectorTable16(
            $model->table_16
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable17 = $this->findModelDirectorTable17(
            $model->table_17
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable18 = $this->findModelDirectorTable18(
            $model->table_18
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable19 = $this->findModelDirectorTable19(
            $model->table_19
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable20 = $this->findModelDirectorTable20(
            $model->table_20
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable21 = $this->findModelDirectorTable21(
            $model->table_21
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable23 = $this->findModelDirectorTable23(
            $model->table_23
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable24 = $this->findModelDirectorTable24(
            $model->table_24
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable25 = $this->findModelDirectorTable25(
            $model->table_25
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable26 = $this->findModelDirectorTable26(
            $model->table_26
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable27 = $this->findModelDirectorTable27(
            $model->table_27
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable28 = $this->findModelDirectorTable28(
            $model->table_28
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable29 = $this->findModelDirectorTable29(
            $model->table_29
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable30 = $this->findModelDirectorTable30(
            $model->table_30
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable31 = $this->findModelDirectorTable31(
            $model->table_31
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable32 = $this->findModelDirectorTable32(
            $model->table_32
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable33 = $this->findModelDirectorTable33(
            $model->table_33
        );//проверяем модель существует или нет! для редактирования и внесения
        return $this->render('view', [
            'model' => $model,
            'stausButtom' => $stausButtom,
            'directorTable4' => $directorTable4,
            'directorTable5' => $directorTable5,
            'directorTable6' => $directorTable6,
            'directorTable7' => $directorTable7,
            'directorTable8' => $directorTable8,
            'directorTable9' => $directorTable9,
            'directorTable10' => $directorTable10,
            'directorTable11' => $directorTable11,
            'directorTable12' => $directorTable12,
            'directorTable13' => $directorTable13,
            'directorTable14' => $directorTable14,
            'directorTable15' => $directorTable15,
            'directorTable16' => $directorTable16,
            'directorTable17' => $directorTable17,
            'directorTable18' => $directorTable18,
            'directorTable19' => $directorTable19,
            'directorTable20' => $directorTable20,
            'directorTable21' => $directorTable21,
            'directorTable23' => $directorTable23,
            'directorTable24' => $directorTable24,
            'directorTable25' => $directorTable25,
            'directorTable26' => $directorTable26,
            'directorTable27' => $directorTable27,
            'directorTable28' => $directorTable28,
            'directorTable29' => $directorTable29,
            'directorTable30' => $directorTable30,
            'directorTable31' => $directorTable31,
            'directorTable32' => $directorTable32,
            'directorTable33' => $directorTable33,
        ]);
    }

    public function actionCreate()
    {
        //$model = new Director();
        //$directorTable4 = new DirectorTable4();
        //$directorTable5 = new DirectorTable5();
        //$id = Yii::$app->user->identity->id;
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel(Yii::$app->user->identity->id);
        $directorTable4 = $this->findModelDirectorTable4(
            $model->table_4
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable5 = $this->findModelDirectorTable5(
            $model->table_5
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable6 = $this->findModelDirectorTable6(
            $model->table_6
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable7 = $this->findModelDirectorTable7(
            $model->table_7
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable8 = $this->findModelDirectorTable8(
            $model->table_8
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable9 = $this->findModelDirectorTable9(
            $model->table_9
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable10 = $this->findModelDirectorTable10(
            $model->table_10
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable11 = $this->findModelDirectorTable11(
            $model->table_11
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable12 = $this->findModelDirectorTable12(
            $model->table_12
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable13 = $this->findModelDirectorTable13(
            $model->table_13
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable14 = $this->findModelDirectorTable14(
            $model->table_14
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable15 = $this->findModelDirectorTable15(
            $model->table_15
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable16 = $this->findModelDirectorTable16(
            $model->table_16
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable17 = $this->findModelDirectorTable17(
            $model->table_17
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable18 = $this->findModelDirectorTable18(
            $model->table_18
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable19 = $this->findModelDirectorTable19(
            $model->table_19
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable20 = $this->findModelDirectorTable20(
            $model->table_20
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable21 = $this->findModelDirectorTable21(
            $model->table_21
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable23 = $this->findModelDirectorTable23(
            $model->table_23
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable24 = $this->findModelDirectorTable24(
            $model->table_24
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable25 = $this->findModelDirectorTable25(
            $model->table_25
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable26 = $this->findModelDirectorTable26(
            $model->table_26
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable27 = $this->findModelDirectorTable27(
            $model->table_27
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable28 = $this->findModelDirectorTable28(
            $model->table_28
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable29 = $this->findModelDirectorTable29(
            $model->table_29
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable30 = $this->findModelDirectorTable30(
            $model->table_30
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable31 = $this->findModelDirectorTable31(
            $model->table_31
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable32 = $this->findModelDirectorTable32(
            $model->table_32
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable33 = $this->findModelDirectorTable33(
            $model->table_33
        );//проверяем модель существует или нет! для редактирования и внесения

        if (Yii::$app->request->post()) {
            /* $ter = Therapist::find()->where(['user_id' => $id])->one(); //сколько было продублировано пациентов
             if (!empty($ter)) {
                 $model_ter = new Therapist();
                 $model_ter->attributes = $ter->attributes;
                 $model_ter->user_id = $model->id;
                 $model_ter->save(false);
             }*/
            //$directorTable6->attributes = Yii::$app->request->post()['DirectorTable6'];
            //print_r($directorTable6);
            //print_r('<br><br><br><br>');

            $status = true;
            $model->load(Yii::$app->request->post());
            $directorTable4->load(Yii::$app->request->post());
            $directorTable5->load(Yii::$app->request->post());
            $directorTable6->load(Yii::$app->request->post());
            $directorTable7->load(Yii::$app->request->post());
            $directorTable8->load(Yii::$app->request->post());
            $directorTable9->load(Yii::$app->request->post());
            $directorTable10->load(Yii::$app->request->post());
            $directorTable11->load(Yii::$app->request->post());
            $directorTable12->load(Yii::$app->request->post());
            $directorTable13->load(Yii::$app->request->post());
            $directorTable14->load(Yii::$app->request->post());
            $directorTable15->load(Yii::$app->request->post());
            $directorTable16->load(Yii::$app->request->post());
            $directorTable17->load(Yii::$app->request->post());
            $directorTable18->load(Yii::$app->request->post());
            $directorTable19->load(Yii::$app->request->post());
            $directorTable20->load(Yii::$app->request->post());
            $directorTable21->load(Yii::$app->request->post());
            $directorTable23->load(Yii::$app->request->post());
            $directorTable24->load(Yii::$app->request->post());
            $directorTable25->load(Yii::$app->request->post());
            $directorTable26->load(Yii::$app->request->post());
            $directorTable27->load(Yii::$app->request->post());
            $directorTable28->load(Yii::$app->request->post());
            $directorTable29->load(Yii::$app->request->post());
            $directorTable30->load(Yii::$app->request->post());
            $directorTable31->load(Yii::$app->request->post());
            $directorTable32->load(Yii::$app->request->post());
            $directorTable33->load(Yii::$app->request->post());

            if ($status === true) {
                $directorTable4->user_id = Yii::$app->user->identity->id;
                $directorTable4->field4_4 = array_sum(
                    [$directorTable4->field4_1, $directorTable4->field4_2, $directorTable4->field4_3]
                );
                $directorTable4->field4_8 = array_sum(
                    [$directorTable4->field4_5, $directorTable4->field4_6, $directorTable4->field4_7]
                );
                $directorTable4->field4_12 = array_sum(
                    [$directorTable4->field4_9, $directorTable4->field4_10, $directorTable4->field4_11]
                );
                $directorTable4->field4_16 = array_sum(
                    [$directorTable4->field4_13, $directorTable4->field4_14, $directorTable4->field4_15]
                );
                $directorTable4->field4_20 = array_sum(
                    [$directorTable4->field4_17, $directorTable4->field4_18, $directorTable4->field4_19]
                );
                $directorTable4->field4_24 = array_sum(
                    [$directorTable4->field4_21, $directorTable4->field4_22, $directorTable4->field4_23]
                );
                if ($directorTable4->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 4: 4.1=4.1.1+4.1.2+4.1.3, 4.3=4.1+4.2"
                    );
                }
            }

            if ($status === true) {
                $directorTable5->user_id = Yii::$app->user->identity->id;
                $directorTable5->field5_4 = array_sum(
                    [$directorTable5->field5_1, $directorTable5->field5_2, $directorTable5->field5_3]
                );
                $directorTable5->field5_8 = array_sum(
                    [$directorTable5->field5_5, $directorTable5->field5_6, $directorTable5->field5_7]
                );
                if ($directorTable5->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 5"
                    );
                }
            }

            if ($status === true) {
                $directorTable6->user_id = Yii::$app->user->identity->id;
                $directorTable6->field6_4 = array_sum(
                    [$directorTable6->field6_1, $directorTable6->field6_2, $directorTable6->field6_3]
                );
                $directorTable6->field6_8 = array_sum(
                    [$directorTable6->field6_5, $directorTable6->field6_6, $directorTable6->field6_7]
                );
                $directorTable6->field6_12 = array_sum(
                    [$directorTable6->field6_9, $directorTable6->field6_10, $directorTable6->field6_11]
                );
                $directorTable6->field6_16 = array_sum(
                    [$directorTable6->field6_13, $directorTable6->field6_14, $directorTable6->field6_15]
                );
                $directorTable6->field6_20 = array_sum(
                    [$directorTable6->field6_17, $directorTable6->field6_18, $directorTable6->field6_19]
                );
                $directorTable6->field6_24 = array_sum(
                    [$directorTable6->field6_21, $directorTable6->field6_22, $directorTable6->field6_23]
                );
                $directorTable6->field6_28 = array_sum(
                    [$directorTable6->field6_25, $directorTable6->field6_26, $directorTable6->field6_27]
                );
                $directorTable6->field6_32 = array_sum(
                    [$directorTable6->field6_29, $directorTable6->field6_30, $directorTable6->field6_31]
                );
                if ($directorTable6->validate()) {
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
                $directorTable7->user_id = Yii::$app->user->identity->id;
                $directorTable7->field7_4 = array_sum(
                    [$directorTable7->field7_1, $directorTable7->field7_2, $directorTable7->field7_3]
                );
                $directorTable7->field7_8 = array_sum(
                    [$directorTable7->field7_5, $directorTable7->field7_6, $directorTable7->field7_7]
                );
                $directorTable7->field7_12 = array_sum(
                    [$directorTable7->field7_9, $directorTable7->field7_10, $directorTable7->field7_11]
                );
                $directorTable7->field7_16 = array_sum(
                    [$directorTable7->field7_13, $directorTable7->field7_14, $directorTable7->field7_15]
                );
                $directorTable7->field7_20 = array_sum(
                    [$directorTable7->field7_17, $directorTable7->field7_18, $directorTable7->field7_19]
                );
                $directorTable7->field7_24 = array_sum(
                    [$directorTable7->field7_21, $directorTable7->field7_22, $directorTable7->field7_23]
                );
                if ($directorTable7->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 7: 7.1=7.1.1+7.1.2, 7.4=7.1+7.2+7.3, 7.4<=4.1.1, "
                    );
                }
            }

            if ($status === true) {
                $directorTable8->user_id = Yii::$app->user->identity->id;
                $directorTable8->field8_4 = array_sum(
                    [$directorTable8->field8_1, $directorTable8->field8_2, $directorTable8->field8_3]
                );
                $directorTable8->field8_8 = array_sum(
                    [$directorTable8->field8_5, $directorTable8->field8_6, $directorTable8->field8_7]
                );
                $directorTable8->field8_12 = array_sum(
                    [$directorTable8->field8_9, $directorTable8->field8_10, $directorTable8->field8_11]
                );
                $directorTable8->field8_16 = array_sum(
                    [$directorTable8->field8_13, $directorTable8->field8_14, $directorTable8->field8_15]
                );
                $directorTable8->field8_20 = array_sum(
                    [$directorTable8->field8_17, $directorTable8->field8_18, $directorTable8->field8_19]
                );
                $directorTable8->field8_24 = array_sum(
                    [$directorTable8->field8_21, $directorTable8->field8_22, $directorTable8->field8_23]
                );
                if ($directorTable8->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 8: 8.1=8.1.1+8.1.2, 8.4=8.1+8.2+8.3"
                    );
                }
            }

            if ($status === true) {
                $directorTable9->user_id = Yii::$app->user->identity->id;
                $directorTable9->field9_4 = array_sum(
                    [$directorTable9->field9_1, $directorTable9->field9_2, $directorTable9->field9_3]
                );
                $directorTable9->field9_8 = array_sum(
                    [$directorTable9->field9_5, $directorTable9->field9_6, $directorTable9->field9_7]
                );
                $directorTable9->field9_12 = array_sum(
                    [$directorTable9->field9_9, $directorTable9->field9_10, $directorTable9->field9_11]
                );
                $directorTable9->field9_16 = array_sum(
                    [$directorTable9->field9_13, $directorTable9->field9_14, $directorTable9->field9_15]
                );
                $directorTable9->field9_20 = array_sum(
                    [$directorTable9->field9_17, $directorTable9->field9_18, $directorTable9->field9_19]
                );
                $directorTable9->field9_24 = array_sum(
                    [$directorTable9->field9_21, $directorTable9->field9_22, $directorTable9->field9_23]
                );
                if ($directorTable9->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 9: 9.1=9.1.1+9.1.2, 9.4=9.1+9.2+9.3"
                    );
                }
            }

            if ($status === true) {
                $directorTable10->user_id = Yii::$app->user->identity->id;
                $directorTable10->field10_4 = array_sum(
                    [$directorTable10->field10_1, $directorTable10->field10_2, $directorTable10->field10_3]
                );
                $directorTable10->field10_8 = array_sum(
                    [$directorTable10->field10_5, $directorTable10->field10_6, $directorTable10->field10_7]
                );
                $directorTable10->field10_12 = array_sum(
                    [$directorTable10->field10_9, $directorTable10->field10_10, $directorTable10->field10_11]
                );
                $directorTable10->field10_16 = array_sum(
                    [$directorTable10->field10_13, $directorTable10->field10_14, $directorTable10->field10_15]
                );
                $directorTable10->field10_20 = array_sum(
                    [$directorTable10->field10_17, $directorTable10->field10_18, $directorTable10->field10_19]
                );
                $directorTable10->field10_24 = array_sum(
                    [$directorTable10->field10_21, $directorTable10->field10_22, $directorTable10->field10_23]
                );
                if ($directorTable10->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 10: 10.1=10.1.1+10.1.2, 10.4=10.1+10.2+10.3"
                    );
                }
            }

            if ($status === true) {
                $directorTable11->user_id = Yii::$app->user->identity->id;
                if ($directorTable11->validate()) {
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
                $directorTable12->user_id = Yii::$app->user->identity->id;
                $directorTable12->field12_4 = array_sum(
                    [$directorTable12->field12_1, $directorTable12->field12_2, $directorTable12->field12_3]
                );
                $directorTable12->field12_8 = array_sum(
                    [$directorTable12->field12_5, $directorTable12->field12_6, $directorTable12->field12_7]
                );
                $directorTable12->field12_12 = array_sum(
                    [$directorTable12->field12_9, $directorTable12->field12_10, $directorTable12->field12_11]
                );
                $directorTable12->field12_16 = array_sum(
                    [$directorTable12->field12_13, $directorTable12->field12_14, $directorTable12->field12_15]
                );
                $directorTable12->field12_20 = array_sum(
                    [$directorTable12->field12_17, $directorTable12->field12_18, $directorTable12->field12_19]
                );
                $directorTable12->field12_24 = array_sum(
                    [$directorTable12->field12_21, $directorTable12->field12_22, $directorTable12->field12_23]
                );
                if ($directorTable12->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 12: 12.1=12.1.1+12.1.2, 12.1.2=12.1.2.1+12.1.2.2+12.1.2.3"
                    );
                }
            }

            if ($status === true) {
                $directorTable13->user_id = Yii::$app->user->identity->id;
                $directorTable13->field13_4 = array_sum(
                    [$directorTable13->field13_1, $directorTable13->field13_2, $directorTable13->field13_3]
                );
                $directorTable13->field13_8 = array_sum(
                    [$directorTable13->field13_5, $directorTable13->field13_6, $directorTable13->field13_7]
                );
                $directorTable13->field13_12 = array_sum(
                    [$directorTable13->field13_9, $directorTable13->field13_10, $directorTable13->field13_11]
                );
                $directorTable13->field13_16 = array_sum(
                    [$directorTable13->field13_13, $directorTable13->field13_14, $directorTable13->field13_15]
                );
                $directorTable13->field13_20 = array_sum(
                    [$directorTable13->field13_17, $directorTable13->field13_18, $directorTable13->field13_19]
                );
                $directorTable13->field13_24 = array_sum(
                    [$directorTable13->field13_21, $directorTable13->field13_22, $directorTable13->field13_23]
                );
                if ($directorTable13->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 13: 13.1=13.1.1+13.1.2, 13.1.2=13.1.2.1+13.1.2.2+13.1.2.3"
                    );
                }
            }

            if ($status === true) {
                $directorTable14->user_id = Yii::$app->user->identity->id;
                $directorTable14->field14_4 = array_sum(
                    [$directorTable14->field14_1, $directorTable14->field14_2, $directorTable14->field14_3]
                );
                $directorTable14->field14_8 = array_sum(
                    [$directorTable14->field14_5, $directorTable14->field14_6, $directorTable14->field14_7]
                );
                $directorTable14->field14_12 = array_sum(
                    [$directorTable14->field14_9, $directorTable14->field14_10, $directorTable14->field14_11]
                );
                $directorTable14->field14_16 = array_sum(
                    [$directorTable14->field14_13, $directorTable14->field14_14, $directorTable14->field14_15]
                );
                $directorTable14->field14_20 = array_sum(
                    [$directorTable14->field14_17, $directorTable14->field14_18, $directorTable14->field14_19]
                );
                $directorTable14->field14_24 = array_sum(
                    [$directorTable14->field14_21, $directorTable14->field14_22, $directorTable14->field14_23]
                );
                if ($directorTable14->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 14: 14.1=14.1.1+14.1.2, 14.1.2=14.1.2.1+14.1.2.2+14.1.2.3"
                    );
                }
            }

            if ($status === true) {
                $directorTable15->user_id = Yii::$app->user->identity->id;
                $directorTable15->field15_4 = array_sum(
                    [$directorTable15->field15_1, $directorTable15->field15_2, $directorTable15->field15_3]
                );
                $directorTable15->field15_8 = array_sum(
                    [$directorTable15->field15_5, $directorTable15->field15_6, $directorTable15->field15_7]
                );
                $directorTable15->field15_12 = array_sum(
                    [$directorTable15->field15_9, $directorTable15->field15_10, $directorTable15->field15_11]
                );
                $directorTable15->field15_16 = array_sum(
                    [$directorTable15->field15_13, $directorTable15->field15_14, $directorTable15->field15_15]
                );
                $directorTable15->field15_20 = array_sum(
                    [$directorTable15->field15_17, $directorTable15->field15_18, $directorTable15->field15_19]
                );
                $directorTable15->field15_24 = array_sum(
                    [$directorTable15->field15_21, $directorTable15->field15_22, $directorTable15->field15_23]
                );
                if ($directorTable15->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 15: 15.1=15.1.1+15.1.2, 15.1.2=15.1.2.1+15.1.2.2+15.1.2.3"
                    );
                }
            }

            if ($status === true) {
                $directorTable16->user_id = Yii::$app->user->identity->id;
                $directorTable16->field16_4 = array_sum(
                    [$directorTable16->field16_1, $directorTable16->field16_2, $directorTable16->field16_3]
                );
                $directorTable16->field16_8 = array_sum(
                    [$directorTable16->field16_5, $directorTable16->field16_6, $directorTable16->field16_7]
                );
                $directorTable16->field16_12 = array_sum(
                    [$directorTable16->field16_9, $directorTable16->field16_10, $directorTable16->field16_11]
                );
                $directorTable16->field16_16 = array_sum(
                    [$directorTable16->field16_13, $directorTable16->field16_14, $directorTable16->field16_15]
                );
                $directorTable16->field16_20 = array_sum(
                    [$directorTable16->field16_17, $directorTable16->field16_18, $directorTable16->field16_19]
                );
                $directorTable16->field16_24 = array_sum(
                    [$directorTable16->field16_21, $directorTable16->field16_22, $directorTable16->field16_23]
                );
                if ($directorTable16->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 16: 16.1=16.1.1+16.1.2, 16.1.2=16.1.2.1+16.1.2.2+16.1.2.3"
                    );
                }
            }

            if ($status === true) {
                $directorTable17->user_id = Yii::$app->user->identity->id;
                $directorTable17->field17_4 = array_sum(
                    [$directorTable17->field17_1, $directorTable17->field17_2, $directorTable17->field17_3]
                );
                $directorTable17->field17_8 = array_sum(
                    [$directorTable17->field17_5, $directorTable17->field17_6, $directorTable17->field17_7]
                );
                $directorTable17->field17_12 = array_sum(
                    [$directorTable17->field17_9, $directorTable17->field17_10, $directorTable17->field17_11]
                );
                $directorTable17->field17_16 = array_sum(
                    [$directorTable17->field17_13, $directorTable17->field17_14, $directorTable17->field17_15]
                );
                $directorTable17->field17_20 = array_sum(
                    [$directorTable17->field17_17, $directorTable17->field17_18, $directorTable17->field17_19]
                );
                $directorTable17->field17_24 = array_sum(
                    [$directorTable17->field17_21, $directorTable17->field17_22, $directorTable17->field17_23]
                );
                if ($directorTable17->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 17: 17.1=17.1.1+17.1.2, 17.1.2=17.1.2.1+17.1.2.2+17.1.2.3"
                    );
                }
            }

            if ($status === true) {
                $directorTable18->user_id = Yii::$app->user->identity->id;
                if ($directorTable18->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 18"
                    );
                }
            }

            if ($status === true) {
                $directorTable19->user_id = Yii::$app->user->identity->id;
                if ($directorTable19->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 19"
                    );
                }
            }

            if ($status === true) {
                $directorTable20->user_id = Yii::$app->user->identity->id;
                if ($directorTable20->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 20"
                    );
                }
            }

            if ($status === true) {
                $directorTable21->user_id = Yii::$app->user->identity->id;
                if ($directorTable21->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 21"
                    );
                }
            }

            if ($status === true) {
                $directorTable23->user_id = Yii::$app->user->identity->id;
                $directorTable23->field23_4 = array_sum(
                    [$directorTable23->field23_1, $directorTable23->field23_2, $directorTable23->field23_3]
                );
                $directorTable23->field23_8 = array_sum(
                    [$directorTable23->field23_5, $directorTable23->field23_6, $directorTable23->field23_7]
                );
                $directorTable23->field23_12 = array_sum(
                    [$directorTable23->field23_9, $directorTable23->field23_10, $directorTable23->field23_11]
                );
                $directorTable23->field23_16 = array_sum(
                    [$directorTable23->field23_13, $directorTable23->field23_14, $directorTable23->field23_15]
                );
                $directorTable23->field23_20 = array_sum(
                    [$directorTable23->field23_23, $directorTable23->field23_18, $directorTable23->field23_19]
                );
                $directorTable23->field23_24 = array_sum(
                    [$directorTable23->field23_21, $directorTable23->field23_22, $directorTable23->field23_23]
                );
                $directorTable23->field23_28 = array_sum(
                    [$directorTable23->field23_25, $directorTable23->field23_26, $directorTable23->field23_27]
                );
                $directorTable23->field23_32 = array_sum(
                    [$directorTable23->field23_29, $directorTable23->field23_30, $directorTable23->field23_31]
                );
                $directorTable23->field23_36 = array_sum(
                    [$directorTable23->field23_33, $directorTable23->field23_34, $directorTable23->field23_35]
                );
                $directorTable23->field23_40 = array_sum(
                    [$directorTable23->field23_37, $directorTable23->field23_38, $directorTable23->field23_39]
                );
                $directorTable23->field23_44 = array_sum(
                    [$directorTable23->field23_41, $directorTable23->field23_42, $directorTable23->field23_43]
                );
                $directorTable23->field23_48 = array_sum(
                    [$directorTable23->field23_45, $directorTable23->field23_46, $directorTable23->field23_47]
                );
                $directorTable23->field23_52 = array_sum(
                    [$directorTable23->field23_49, $directorTable23->field23_50, $directorTable23->field23_51]
                );
                $directorTable23->field23_56 = array_sum(
                    [$directorTable23->field23_53, $directorTable23->field23_54, $directorTable23->field23_55]
                );
                $directorTable23->field23_60 = array_sum(
                    [$directorTable23->field23_57, $directorTable23->field23_58, $directorTable23->field23_59]
                );
                $directorTable23->field23_64 = array_sum(
                    [$directorTable23->field23_61, $directorTable23->field23_62, $directorTable23->field23_63]
                );
                $directorTable23->field23_68 = array_sum(
                    [$directorTable23->field23_65, $directorTable23->field23_66, $directorTable23->field23_67]
                );
                $directorTable23->field23_72 = array_sum(
                    [$directorTable23->field23_69, $directorTable23->field23_70, $directorTable23->field23_71]
                );
                $directorTable23->field23_76 = array_sum(
                    [$directorTable23->field23_73, $directorTable23->field23_74, $directorTable23->field23_75]
                );
                $directorTable23->field23_80 = array_sum(
                    [$directorTable23->field23_77, $directorTable23->field23_78, $directorTable23->field23_79]
                );
                $directorTable23->field23_84 = array_sum(
                    [$directorTable23->field23_81, $directorTable23->field23_82, $directorTable23->field23_83]
                );
                $directorTable23->field23_88 = array_sum(
                    [$directorTable23->field23_85, $directorTable23->field23_86, $directorTable23->field23_87]
                );
                $directorTable23->field23_92 = array_sum(
                    [$directorTable23->field23_89, $directorTable23->field23_90, $directorTable23->field23_91]
                );
                if ($directorTable23->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 23"
                    );
                }
            }

            if ($status === true) {
                $directorTable24->user_id = Yii::$app->user->identity->id;
                if ($directorTable24->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 24"
                    );
                }
            }

            if ($status === true) {
                $directorTable25->user_id = Yii::$app->user->identity->id;
                if ($directorTable25->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 25"
                    );
                }
            }

            if ($status === true) {
                $directorTable26->user_id = Yii::$app->user->identity->id;
                if ($directorTable26->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 26"
                    );
                }
            }

            if ($status === true) {
                $directorTable27->user_id = Yii::$app->user->identity->id;
                if ($directorTable27->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 27"
                    );
                }
            }

            if ($status === true) {
                $directorTable28->user_id = Yii::$app->user->identity->id;
                if ($directorTable28->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 28"
                    );
                }
            }

            if ($status === true) {
                $directorTable29->user_id = Yii::$app->user->identity->id;
                $directorTable29->field29_4 = array_sum(
                    [$directorTable29->field29_1, $directorTable29->field29_2, $directorTable29->field29_3]
                );
                $directorTable29->field29_8 = array_sum(
                    [$directorTable29->field29_5, $directorTable29->field29_6, $directorTable29->field29_7]
                );
                $directorTable29->field29_12 = array_sum(
                    [$directorTable29->field29_9, $directorTable29->field29_10, $directorTable29->field29_11]
                );
                $directorTable29->field29_16 = array_sum(
                    [$directorTable29->field29_13, $directorTable29->field29_14, $directorTable29->field29_15]
                );
                if ($directorTable29->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 29"
                    );
                }
            }

            if ($status === true) {
                $directorTable30->user_id = Yii::$app->user->identity->id;
                $directorTable30->field30_4 = array_sum(
                    [$directorTable30->field30_1, $directorTable30->field30_2, $directorTable30->field30_3]
                );
                $directorTable30->field30_8 = array_sum(
                    [$directorTable30->field30_5, $directorTable30->field30_6, $directorTable30->field30_7]
                );
                $directorTable30->field30_12 = array_sum(
                    [$directorTable30->field30_9, $directorTable30->field30_10, $directorTable30->field30_11]
                );
                if ($directorTable30->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 30"
                    );
                }
            }

            if ($status === true) {
                $directorTable31->user_id = Yii::$app->user->identity->id;
                if ($directorTable31->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 31"
                    );
                }
            }

            if ($status === true) {
                $directorTable32->user_id = Yii::$app->user->identity->id;
                if ($directorTable32->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 32"
                    );
                }
            }

            if ($status === true) {
                $directorTable33->user_id = Yii::$app->user->identity->id;
                if ($directorTable33->validate()) {
                    $status = true;
                } else {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 33"
                    );
                }
            }
            //7 п. 7.4 ≤ п. 4.1.1.
            if ($status === true) {
                //7 п. 7.4 ≤ п. 4.1.1.
                if ($directorTable7->field7_24 > $directorTable4->field4_8) {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 7. Сумма в строке 7.4 должна быть меньше чем в строке 4.1.1."
                    );
                }
            }
            //8 п. 8.4 ≤ п. 4.1.2.
            if ($status === true) {
                //8 п. 8.4 ≤ п. 4.1.2.
                if ($directorTable8->field8_24 > $directorTable4->field4_12) {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 8. Сумма в строке 8.4 должна быть меньше чем в строке 4.1.2."
                    );
                }
            }
            //9 п. 9.4 ≤ п. 4.1.3.
            if ($status === true) {
                //9 п. 9.4 ≤ п. 4.1.3.
                if ($directorTable9->field9_24 > $directorTable4->field4_16) {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 9. Сумма в строке 9.4 должна быть меньше чем в строке 4.1.3."
                    );
                }
            }
            //10 п. 10.4 ≤ п. 4.3.
            if ($status === true) {
                //10 п. 10.4 ≤ п. 4.3.
                if ($directorTable10->field10_24 > $directorTable4->field4_24) {
                    $status = false;
                    Yii::$app->session->setFlash(
                        'error',
                        "У Вас ошибка при внесении! Проверьте внесения данных! В вопросе 10. Сумма в строке 10.4 должна быть меньше чем в строке 4.3."
                    );
                }
            }

            //СОХРАНЯЕМ ДАННЫЕ!
            if ($status === true) {
                $directorTable4->save(false);
                $directorTable5->save(false);
                $directorTable6->save(false);
                $directorTable7->save(false);
                $directorTable8->save(false);
                $directorTable9->save(false);
                $directorTable10->save(false);
                $directorTable11->save(false);
                $directorTable12->save(false);
                $directorTable13->save(false);
                $directorTable14->save(false);
                $directorTable15->save(false);
                $directorTable16->save(false);
                $directorTable17->save(false);
                $directorTable18->save(false);
                $directorTable19->save(false);
                $directorTable20->save(false);
                $directorTable21->save(false);
                $directorTable23->save(false);
                $directorTable24->save(false);
                $directorTable25->save(false);
                $directorTable26->save(false);
                $directorTable27->save(false);
                $directorTable28->save(false);
                $directorTable29->save(false);
                $directorTable30->save(false);
                $directorTable31->save(false);
                $directorTable32->save(false);
                $directorTable33->save(false);
                $model->user_id = Yii::$app->user->identity->id;
                $model->organization_id = Yii::$app->user->identity->organization_id;
                $model->federal_district_id = Yii::$app->user->identity->federal_district_id;
                $model->region_id = Yii::$app->user->identity->region_id;
                $model->municipality_id = Yii::$app->user->identity->municipality_id;
                $model->table_4 = $directorTable4->id;
                $model->table_5 = $directorTable5->id;
                $model->table_6 = $directorTable6->id;
                $model->table_7 = $directorTable7->id;
                $model->table_8 = $directorTable8->id;
                $model->table_9 = $directorTable9->id;
                $model->table_10 = $directorTable10->id;
                $model->table_11 = $directorTable11->id;
                $model->table_12 = $directorTable12->id;
                $model->table_13 = $directorTable13->id;
                $model->table_14 = $directorTable14->id;
                $model->table_15 = $directorTable15->id;
                $model->table_16 = $directorTable16->id;
                $model->table_17 = $directorTable17->id;
                $model->table_18 = $directorTable18->id;
                $model->table_19 = $directorTable19->id;
                $model->table_20 = $directorTable20->id;
                $model->table_21 = $directorTable21->id;
                $model->table_23 = $directorTable23->id;
                $model->table_24 = $directorTable24->id;
                $model->table_25 = $directorTable25->id;
                $model->table_26 = $directorTable26->id;
                $model->table_27 = $directorTable27->id;
                $model->table_28 = $directorTable28->id;
                $model->table_29 = $directorTable29->id;
                $model->table_30 = $directorTable30->id;
                $model->table_31 = $directorTable31->id;
                $model->table_32 = $directorTable32->id;
                $model->table_33 = $directorTable33->id;
                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', "Данные успешно сохранены!");
                    return $this->redirect('index');
                }
            }

            // Создать views doc и сделать вывод на страницу!
            // сделать печать к doc
        }

        return $this->render('create', [
            'model' => $model,
            'directorTable4' => $directorTable4,
            'directorTable5' => $directorTable5,
            'directorTable6' => $directorTable6,
            'directorTable7' => $directorTable7,
            'directorTable8' => $directorTable8,
            'directorTable9' => $directorTable9,
            'directorTable10' => $directorTable10,
            'directorTable11' => $directorTable11,
            'directorTable12' => $directorTable12,
            'directorTable13' => $directorTable13,
            'directorTable14' => $directorTable14,
            'directorTable15' => $directorTable15,
            'directorTable16' => $directorTable16,
            'directorTable17' => $directorTable17,
            'directorTable18' => $directorTable18,
            'directorTable19' => $directorTable19,
            'directorTable20' => $directorTable20,
            'directorTable21' => $directorTable21,
            'directorTable23' => $directorTable23,
            'directorTable24' => $directorTable24,
            'directorTable25' => $directorTable25,
            'directorTable26' => $directorTable26,
            'directorTable27' => $directorTable27,
            'directorTable28' => $directorTable28,
            'directorTable29' => $directorTable29,
            'directorTable30' => $directorTable30,
            'directorTable31' => $directorTable31,
            'directorTable32' => $directorTable32,
            'directorTable33' => $directorTable33,
        ]);
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

            $region_items = $this->getArrayRegionItems(
                $post['federal_district_idReport'],
                true
            ); //пролучаем список областей!

            $where = [];
            ($post['federal_district_idReport'] && $post['federal_district_idReport'] !== 'v') ? $where += ['director.federal_district_id' => $post['federal_district_idReport']] : $where += [];
            ($post['region_idReport'] && $post['region_idReport'] !== 'v') ? $where += ['director.region_id' => $post['region_idReport']] : $where += [];

            $rows = (new \yii\db\Query())
                ->from('director')
                ->join('inner JOIN', 'organization', 'organization.id = director.organization_id')
                ->join('left JOIN', 'director_table_4', 'director_table_4.id = director.table_4')
                ->join('left JOIN', 'director_table_5', 'director_table_5.id = director.table_5')
                ->join('left JOIN', 'director_table_6', 'director_table_6.id = director.table_6')
                ->join('left JOIN', 'director_table_7', 'director_table_7.id = director.table_7')
                ->join('left JOIN', 'director_table_8', 'director_table_8.id = director.table_8')
                ->join('left JOIN', 'director_table_9', 'director_table_9.id = director.table_9')
                ->join('left JOIN', 'director_table_10', 'director_table_10.id = director.table_10')
                ->join('left JOIN', 'director_table_11', 'director_table_11.id = director.table_11')
                ->join('left JOIN', 'director_table_12', 'director_table_12.id = director.table_12')
                ->join('left JOIN', 'director_table_13', 'director_table_13.id = director.table_13')
                ->join('left JOIN', 'director_table_14', 'director_table_14.id = director.table_14')
                ->join('left JOIN', 'director_table_15', 'director_table_15.id = director.table_15')
                ->join('left JOIN', 'director_table_16', 'director_table_16.id = director.table_16')
                ->join('left JOIN', 'director_table_17', 'director_table_17.id = director.table_17')
                ->join('left JOIN', 'director_table_18', 'director_table_18.id = director.table_18')
                ->join('left JOIN', 'director_table_19', 'director_table_19.id = director.table_19')
                ->join('left JOIN', 'director_table_20', 'director_table_20.id = director.table_20')
                ->join('left JOIN', 'director_table_21', 'director_table_21.id = director.table_21')
                ->join('left JOIN', 'director_table_23', 'director_table_23.id = director.table_23')
                ->join('left JOIN', 'director_table_24', 'director_table_24.id = director.table_24')
                ->join('left JOIN', 'director_table_25', 'director_table_25.id = director.table_25')
                ->join('left JOIN', 'director_table_26', 'director_table_26.id = director.table_26')
                ->join('left JOIN', 'director_table_27', 'director_table_27.id = director.table_27')
                ->join('left JOIN', 'director_table_28', 'director_table_28.id = director.table_28')
                ->join('left JOIN', 'director_table_29', 'director_table_29.id = director.table_29')
                ->join('left JOIN', 'director_table_30', 'director_table_30.id = director.table_30')
                ->join('left JOIN', 'director_table_31', 'director_table_31.id = director.table_31')
                ->join('left JOIN', 'director_table_32', 'director_table_32.id = director.table_32')
                ->join('left JOIN', 'director_table_33', 'director_table_33.id = director.table_33')
                ->where($where)
                //->asArray()
                ->all();
            if ($rows) {
                $result = [];
                if ($post['federal_district_idReport'] == 'v' && $post['region_idReport'] == 'v') {
                    $result[1] = 'Итог по РФ: ';
                } else {
                    $result[1] = ($post['region_idReport'] == 'v') ? $district_items[$post['federal_district_idReport']] : $region_items[$post['region_idReport']];
                }
                foreach ($rows as $row) {
                    $result[2] += 1;
                    //$row['terrain'] == '0' cельская местность
                    if ($row['terrain'] == '0') {
                        $result[3] += 1;
                        $result[137] += (is_numeric($row['field4_24'])) ? $row['field4_24'] : 0;
                        $result[144] += (is_numeric($row['field4_24'])) ? $row['field4_24'] : 0;
                    } else {
                        $result[4] += 1;
                        $result[138] += (is_numeric($row['field4_24'])) ? $row['field4_24'] : 0;
                        $result[145] += (is_numeric($row['field4_24'])) ? $row['field4_24'] : 0;
                    }
                    if ($row['field3'] <= '100') {
                        $result[5] += 1;
                        $result[139] += (is_numeric($row['field4_24'])) ? $row['field4_24'] : 0;
                    } elseif ($row['field3'] >= '101' && $row['field3'] <= '500') {
                        $result[6] += 1;
                        $result[140] += (is_numeric($row['field4_24'])) ? $row['field4_24'] : 0;
                    } elseif ($row['field3'] >= '501' && $row['field3'] <= '1000') {
                        $result[7] += 1;
                        $result[141] += (is_numeric($row['field4_24'])) ? $row['field4_24'] : 0;
                    } else {
                        $result[8] += 1;
                        $result[142] += (is_numeric($row['field4_24'])) ? $row['field4_24'] : 0;
                    }
                    $result[9] += ($row['field6_9'] == '1') ? 1 : 0;
                    $result[10] += ($row['field6_13'] == '1') ? 1 : 0;
                    $result[11] += ($row['field6_17'] == '1') ? 1 : 0;
                    $result[12] += ($row['field6_21'] == '1') ? 1 : 0;
                    $result[13] += ($row['field6_25'] == '1') ? 1 : 0;
                    $result[14] += ($row['field6_29'] == '1') ? 1 : 0;

                    $result[15] += ($row['field18_1'] == '1') ? 1 : 0;
                    $result[16] += ($row['field18_2'] == '1') ? 1 : 0;
                    $result[17] += ($row['field18_3'] == '1') ? 1 : 0;
                    $result[18] += ($row['field18_4'] == '1') ? 1 : 0;
                    $result[19] += ($row['field18_5'] == '1') ? 1 : 0;

                    $result[20] += ($row['field19_1'] == '1') ? 1 : 0;
                    $result[21] += ($row['field19_2'] == '1') ? 1 : 0;
                    $result[22] += ($row['field19_3'] == '1') ? 1 : 0;

                    $result[23] += ($row['field21_1'] == '1') ? 1 : 0;
                    $result[24] += ($row['field21_3'] == '1') ? 1 : 0;
                    $result[25] += ($row['field21_5'] == '1') ? 1 : 0;
                    $result[26] += ($row['field21_7'] == '1') ? 1 : 0;
                    $result[27] += ($row['field21_9'] == '1') ? 1 : 0;
                    $result[28] += ($row['field21_11'] == '1') ? 1 : 0;

                    $result['23_m'] += ($row['field21_2'] == '1') ? 1 : 0;
                    $result['24_m'] += ($row['field21_4'] == '1') ? 1 : 0;
                    $result['25_m'] += ($row['field21_6'] == '1') ? 1 : 0;
                    $result['26_m'] += ($row['field21_8'] == '1') ? 1 : 0;
                    $result['27_m'] += ($row['field21_10'] == '1') ? 1 : 0;
                    $result['28_m'] += ($row['field21_12'] == '1') ? 1 : 0;

                    $result[29] += ($row['field25_1'] == '1') ? 1 : 0;
                    $result[30] += ($row['field25_2'] == '1') ? 1 : 0;
                    $result[31] += ($row['field25_3'] == '1') ? 1 : 0;

                    $result[32] += ($row['field26_1'] == '1') ? 1 : 0;
                    $result[33] += ($row['field26_2'] == '1') ? 1 : 0;
                    $result[34] += ($row['field26_3'] == '1') ? 1 : 0;
                    $result[35] += ($row['field26_4'] == '1') ? 1 : 0;

                    $result[36] += ($row['field27_1'] == '1') ? 1 : 0;
                    $result[37] += ($row['field27_2'] == '1') ? 1 : 0;
                    $result[38] += ($row['field27_3'] == '1') ? 1 : 0;
                    $result[39] += ($row['field27_4'] == '1') ? 1 : 0;
                    $result[40] += ($row['field27_5'] == '1') ? 1 : 0;
                    $result[41] += ($row['field27_6'] == '1') ? 1 : 0;
                    $result[42] += ($row['field27_7'] == '1') ? 1 : 0;
                    $result[43] += ($row['field27_8'] == '1') ? 1 : 0;
                    $result[44] += ($row['field27_9'] == '1') ? 1 : 0;
                    $result[45] += ($row['field27_10'] == '1') ? 1 : 0;
                    $result[46] += ($row['field27_11'] == '1') ? 1 : 0;
                    $result[47] += ($row['field27_12'] == '1') ? 1 : 0;
                    $result[48] += ($row['field27_13'] == '1') ? 1 : 0;
                    $result[49] += ($row['field27_14'] == '1') ? 1 : 0;
                    $result[50] += ($row['field27_15'] == '1') ? 1 : 0;
                    //$row['terrain'] == '0' cельская местность
                    if ($row['terrain'] == '0') {
                        $result[56] += ($row['field28_1'] == '1') ? 1 : 0;
                        $result[57] += ($row['field28_2'] == '1') ? 1 : 0;
                        $result[58] += ($row['field28_3'] == '1') ? 1 : 0;
                        $result[59] += ($row['field28_4'] == '1') ? 1 : 0;
                        $result[60] += ($row['field28_5'] == '1') ? 1 : 0;
                    } else {
                        $result[51] += ($row['field28_1'] == '1') ? 1 : 0;
                        $result[52] += ($row['field28_2'] == '1') ? 1 : 0;
                        $result[53] += ($row['field28_3'] == '1') ? 1 : 0;
                        $result[54] += ($row['field28_4'] == '1') ? 1 : 0;
                        $result[55] += ($row['field28_5'] == '1') ? 1 : 0;
                    }

                    $result[61] += ($row['field29_1'] == '1') ? 1 : 0;
                    $result[62] += ($row['field29_5'] == '1') ? 1 : 0;
                    $result[63] += ($row['field29_9'] == '1') ? 1 : 0;
                    $result[64] += ($row['field29_13'] == '1') ? 1 : 0;

                    $result[65] += ($row['field29_2'] == '1') ? 1 : 0;
                    $result[66] += ($row['field29_6'] == '1') ? 1 : 0;
                    $result[67] += ($row['field29_10'] == '1') ? 1 : 0;
                    $result[68] += ($row['field29_14'] == '1') ? 1 : 0;

                    $result[69] += ($row['field29_3'] == '1') ? 1 : 0;
                    $result[70] += ($row['field29_7'] == '1') ? 1 : 0;
                    $result[71] += ($row['field29_11'] == '1') ? 1 : 0;
                    $result[72] += ($row['field29_15'] == '1') ? 1 : 0;

                    $result['73_sum'] += (is_numeric($row['field30_1'])) ? $row['field30_1'] : 0;
                    $result['74_sum'] += (is_numeric($row['field30_5'])) ? $row['field30_5'] : 0;
                    $result['75_sum'] += (is_numeric($row['field30_9'])) ? $row['field30_9'] : 0;

                    $result[76] += ($row['field31_1'] == '1') ? 1 : 0;
                    $result[77] += ($row['field31_2'] == '1') ? 1 : 0;
                    $result[78] += ($row['field31_3'] == '1') ? 1 : 0;
                    $result[79] += ($row['field31_4'] == '1') ? 1 : 0;
                    $result[80] += ($row['field31_5'] == '1') ? 1 : 0;
                    $result[81] += ($row['field31_6'] == '1') ? 1 : 0;
                    $result[82] += ($row['field31_7'] == '1') ? 1 : 0;
                    $result[83] += ($row['field31_8'] == '1') ? 1 : 0;
                    $result[84] += ($row['field31_9'] == '1') ? 1 : 0;
                    $result[85] += ($row['field31_10'] == '1') ? 1 : 0;
                    $result[86] += ($row['field31_11'] == '1') ? 1 : 0;
                    $result[87] += ($row['field31_12'] == '1') ? 1 : 0;
                    $result[88] += ($row['field31_13'] == '1') ? 1 : 0;
                    $result[89] += ($row['field31_14'] == '1') ? 1 : 0;
                    $result[90] += ($row['field31_15'] == '1') ? 1 : 0;
                    $result[91] += ($row['field31_16'] == '1') ? 1 : 0;
                    $result[92] += ($row['field31_17'] == '1') ? 1 : 0;
                    $result[93] += ($row['field31_18'] == '1') ? 1 : 0;
                    $result[94] += ($row['field31_19'] == '1') ? 1 : 0;

                    $result[95] += ($row['field32_1'] == '1') ? 1 : 0;
                    $result[96] += ($row['field32_2'] == '1') ? 1 : 0;
                    $result[97] += ($row['field32_3'] == '1') ? 1 : 0;
                    $result[98] += ($row['field32_4'] == '1') ? 1 : 0;
                    $result[99] += ($row['field32_5'] == '1') ? 1 : 0;
                    $result[100] += ($row['field32_6'] == '1') ? 1 : 0;
                    $result[101] += ($row['field32_7'] == '1') ? 1 : 0;
                    $result[102] += ($row['field32_8'] == '1') ? 1 : 0;
                    $result[103] += ($row['field32_9'] == '1') ? 1 : 0;
                    $result[104] += ($row['field32_10'] == '1') ? 1 : 0;
                    $result[105] += ($row['field32_11'] == '1') ? 1 : 0;
                    $result[106] += ($row['field32_12'] == '1') ? 1 : 0;
                    $result[107] += ($row['field32_13'] == '1') ? 1 : 0;
                    $result[108] += ($row['field32_14'] == '1') ? 1 : 0;
                    $result[109] += ($row['field32_15'] == '1') ? 1 : 0;
                    $result[110] += ($row['field32_16'] == '1') ? 1 : 0;
                    $result[111] += ($row['field32_17'] == '1') ? 1 : 0;
                    $result[112] += ($row['field32_18'] == '1') ? 1 : 0;
                    $result[113] += ($row['field32_19'] == '1') ? 1 : 0;
                    $result[114] += ($row['field32_20'] == '1') ? 1 : 0;
                    $result[115] += ($row['field32_21'] == '1') ? 1 : 0;
                    //$row['terrain'] == '0' cельская местность
                    if ($row['terrain'] == '0') {
                        $result[116] += ($row['field33_1'] == '1') ? 1 : 0;
                        $result[117] += ($row['field33_5'] == '1') ? 1 : 0;
                        $result[118] += ($row['field33_9'] == '1') ? 1 : 0;
                        $result[119] += ($row['field33_13'] == '1') ? 1 : 0;
                    } else {
                        $result[120] += ($row['field33_1'] == '1') ? 1 : 0;
                        $result[121] += ($row['field33_5'] == '1') ? 1 : 0;
                        $result[122] += ($row['field33_9'] == '1') ? 1 : 0;
                        $result[123] += ($row['field33_13'] == '1') ? 1 : 0;
                    }
                    if ($row['field19_1'] == '1') {
                        $result[124] += ($row['field33_1'] == '1') ? 1 : 0;
                        $result[125] += ($row['field33_5'] == '1') ? 1 : 0;
                        $result[126] += ($row['field33_9'] == '1') ? 1 : 0;
                        $result[127] += ($row['field33_13'] == '1') ? 1 : 0;
                    }
                    if ($row['field19_2'] == '1') {
                        $result[128] += ($row['field33_1'] == '1') ? 1 : 0;
                        $result[129] += ($row['field33_5'] == '1') ? 1 : 0;
                        $result[130] += ($row['field33_9'] == '1') ? 1 : 0;
                        $result[131] += ($row['field33_13'] == '1') ? 1 : 0;
                    }
                    if ($row['field19_3'] == '1') {
                        $result[132] += ($row['field33_1'] == '1') ? 1 : 0;
                        $result[133] += ($row['field33_5'] == '1') ? 1 : 0;
                        $result[134] += ($row['field33_9'] == '1') ? 1 : 0;
                        $result[135] += ($row['field33_13'] == '1') ? 1 : 0;
                    }
                    //$result[136] = 0;
                    //$result[137] = 0;
                    //$result[138] = 0;
                    //$result[139] = 0;
                    //$result[140] = 0;
                    //$result[141] = 0;
                    //$result[142] = 0;
                    //$result[143] = 0;
                    //$result[144] = 0;
                    //$result[145] = 0;

                    $result[146] += (is_numeric($row['field4_24'])) ? $row['field4_24'] : 0;
                    $result[147] += (is_numeric($row['field4_21'])) ? $row['field4_21'] : 0;
                    $result[148] += (is_numeric($row['field4_22'])) ? $row['field4_22'] : 0;
                    $result[149] += (is_numeric($row['field4_23'])) ? $row['field4_23'] : 0;

                    $result[150] += (is_numeric($row['field4_4'])) ? $row['field4_4'] : 0;
                    $result[151] += (is_numeric($row['field4_1'])) ? $row['field4_1'] : 0;
                    $result[152] += (is_numeric($row['field4_2'])) ? $row['field4_2'] : 0;
                    $result[153] += (is_numeric($row['field4_3'])) ? $row['field4_3'] : 0;

                    $result[154] += (is_numeric($row['field4_20'])) ? $row['field4_20'] : 0;
                    $result[155] += (is_numeric($row['field4_17'])) ? $row['field4_17'] : 0;
                    $result[156] += (is_numeric($row['field4_18'])) ? $row['field4_18'] : 0;
                    $result[157] += (is_numeric($row['field4_19'])) ? $row['field4_19'] : 0;

                    $result[158] += (is_numeric($row['field5_4'])) ? $row['field5_4'] : 0;
                    $result[159] += (is_numeric($row['field5_1'])) ? $row['field5_1'] : 0;
                    $result[160] += (is_numeric($row['field5_2'])) ? $row['field5_2'] : 0;
                    $result[161] += (is_numeric($row['field5_3'])) ? $row['field5_3'] : 0;

                    $result[162] += (is_numeric($row['field5_8'])) ? $row['field5_8'] : 0;
                    $result[163] += (is_numeric($row['field5_5'])) ? $row['field5_5'] : 0;
                    $result[164] += (is_numeric($row['field5_6'])) ? $row['field5_6'] : 0;
                    $result[165] += (is_numeric($row['field5_7'])) ? $row['field5_7'] : 0;

                    $result[166] += (is_numeric($row['field7_24']) && is_numeric($row['field8_24']) && is_numeric($row['field9_24'])) ? $row['field7_24'] + $row['field8_24'] + $row['field9_24'] : 0;
                    $result[167] += (is_numeric($row['field7_4']) && is_numeric($row['field8_4']) && is_numeric($row['field9_4'])) ? $row['field7_4'] + $row['field8_4'] + $row['field9_4'] : 0;
                    $result[168] += (is_numeric($row['field7_16']) && is_numeric($row['field8_16']) && is_numeric($row['field9_16'])) ? $row['field7_16'] + $row['field8_16'] + $row['field9_16'] : 0;
                    $result[169] += (is_numeric($row['field7_20']) && is_numeric($row['field8_20']) && is_numeric($row['field9_20'])) ? $row['field7_20'] + $row['field8_20'] + $row['field9_20'] : 0;

                    $result[170] += (is_numeric($row['field7_24']) && is_numeric($row['field8_24']) && is_numeric($row['field9_24'])) ? $row['field7_24'] + $row['field8_24'] + $row['field9_24'] : 0;
                    $result[171] += (is_numeric($row['field7_1']) && is_numeric($row['field8_1']) && is_numeric($row['field9_1'])) ? $row['field7_1'] + $row['field8_1'] + $row['field9_1'] : 0;
                    $result[172] += (is_numeric($row['field7_13']) && is_numeric($row['field8_13']) && is_numeric($row['field9_13'])) ? $row['field7_13'] + $row['field8_13'] + $row['field9_13'] : 0;
                    $result[173] += (is_numeric($row['field7_17']) && is_numeric($row['field8_17']) && is_numeric($row['field9_17'])) ? $row['field7_17'] + $row['field8_17'] + $row['field9_17'] : 0;


                    $result[174] += (is_numeric($row['field7_24']) && is_numeric($row['field8_24']) && is_numeric($row['field9_24'])) ? $row['field7_24'] + $row['field8_24'] + $row['field9_24'] : 0;
                    $result[175] += (is_numeric($row['field7_2']) && is_numeric($row['field8_2']) && is_numeric($row['field9_2'])) ? $row['field7_2'] + $row['field8_2'] + $row['field9_2'] : 0;
                    $result[176] += (is_numeric($row['field7_14']) && is_numeric($row['field8_14']) && is_numeric($row['field9_14'])) ? $row['field7_14'] + $row['field8_14'] + $row['field9_14'] : 0;
                    $result[177] += (is_numeric($row['field7_18']) && is_numeric($row['field8_18']) && is_numeric($row['field9_18'])) ? $row['field7_18'] + $row['field8_18'] + $row['field9_18'] : 0;

                    $result[178] += (is_numeric($row['field7_24']) && is_numeric($row['field8_24']) && is_numeric($row['field9_24'])) ? $row['field7_24'] + $row['field8_24'] + $row['field9_24'] : 0;
                    $result[179] += (is_numeric($row['field7_3']) && is_numeric($row['field8_3']) && is_numeric($row['field9_3'])) ? $row['field7_3'] + $row['field8_3'] + $row['field9_3'] : 0;
                    $result[180] += (is_numeric($row['field7_15']) && is_numeric($row['field8_15']) && is_numeric($row['field9_15'])) ? $row['field7_15'] + $row['field8_15'] + $row['field9_15'] : 0;
                    $result[181] += (is_numeric($row['field7_19']) && is_numeric($row['field8_19']) && is_numeric($row['field9_19'])) ? $row['field7_19'] + $row['field8_19'] + $row['field9_19'] : 0;


                    $result[182] += (is_numeric($row['field12_1'])) ? $row['field12_1'] : 0;
                    $result[183] += (is_numeric($row['field12_5'])) ? $row['field12_5'] : 0;
                    $result[184] += (is_numeric($row['field12_9'])) ? $row['field12_9'] : 0;
                    $result[185] += (is_numeric($row['field12_13'])) ? $row['field12_13'] : 0;
                    $result[186] += (is_numeric($row['field12_17'])) ? $row['field12_17'] : 0;
                    $result[187] += (is_numeric($row['field12_21'])) ? $row['field12_21'] : 0;

                    $result[188] += (is_numeric($row['field12_2'])) ? $row['field12_2'] : 0;
                    $result[189] += (is_numeric($row['field12_6'])) ? $row['field12_6'] : 0;
                    $result[190] += (is_numeric($row['field12_10'])) ? $row['field12_10'] : 0;
                    $result[191] += (is_numeric($row['field12_14'])) ? $row['field12_14'] : 0;
                    $result[192] += (is_numeric($row['field12_18'])) ? $row['field12_18'] : 0;
                    $result[193] += (is_numeric($row['field12_22'])) ? $row['field12_22'] : 0;

                    $result[194] += (is_numeric($row['field12_3'])) ? $row['field12_3'] : 0;
                    $result[195] += (is_numeric($row['field12_7'])) ? $row['field12_7'] : 0;
                    $result[196] += (is_numeric($row['field12_11'])) ? $row['field12_11'] : 0;
                    $result[197] += (is_numeric($row['field12_15'])) ? $row['field12_15'] : 0;
                    $result[198] += (is_numeric($row['field12_19'])) ? $row['field12_19'] : 0;
                    $result[199] += (is_numeric($row['field12_23'])) ? $row['field12_23'] : 0;

                    $result[200] += (is_numeric($row['field13_1'])) ? $row['field13_1'] : 0;
                    $result[201] += (is_numeric($row['field13_5'])) ? $row['field13_5'] : 0;
                    $result[202] += (is_numeric($row['field13_9'])) ? $row['field13_9'] : 0;
                    $result[203] += (is_numeric($row['field13_13'])) ? $row['field13_13'] : 0;
                    $result[204] += (is_numeric($row['field13_17'])) ? $row['field13_17'] : 0;
                    $result[205] += (is_numeric($row['field13_21'])) ? $row['field13_21'] : 0;

                    $result[206] += (is_numeric($row['field13_2'])) ? $row['field13_2'] : 0;
                    $result[207] += (is_numeric($row['field13_6'])) ? $row['field13_6'] : 0;
                    $result[208] += (is_numeric($row['field13_10'])) ? $row['field13_10'] : 0;
                    $result[209] += (is_numeric($row['field13_14'])) ? $row['field13_14'] : 0;
                    $result[210] += (is_numeric($row['field13_18'])) ? $row['field13_18'] : 0;
                    $result[211] += (is_numeric($row['field13_22'])) ? $row['field13_22'] : 0;

                    $result[212] += (is_numeric($row['field13_3'])) ? $row['field13_3'] : 0;
                    $result[213] += (is_numeric($row['field13_7'])) ? $row['field13_7'] : 0;
                    $result[214] += (is_numeric($row['field13_11'])) ? $row['field13_11'] : 0;
                    $result[215] += (is_numeric($row['field13_15'])) ? $row['field13_15'] : 0;
                    $result[216] += (is_numeric($row['field13_19'])) ? $row['field13_19'] : 0;
                    $result[217] += (is_numeric($row['field13_23'])) ? $row['field13_23'] : 0;

                    $result[218] += (is_numeric($row['field14_1'])) ? $row['field14_1'] : 0;
                    $result[219] += (is_numeric($row['field14_5'])) ? $row['field14_5'] : 0;
                    $result[220] += (is_numeric($row['field14_9'])) ? $row['field14_9'] : 0;
                    $result[221] += (is_numeric($row['field14_13'])) ? $row['field14_13'] : 0;
                    $result[222] += (is_numeric($row['field14_17'])) ? $row['field14_17'] : 0;
                    $result[223] += (is_numeric($row['field14_21'])) ? $row['field14_21'] : 0;

                    $result[224] += (is_numeric($row['field14_2'])) ? $row['field14_2'] : 0;
                    $result[225] += (is_numeric($row['field14_6'])) ? $row['field14_6'] : 0;
                    $result[226] += (is_numeric($row['field14_10'])) ? $row['field14_10'] : 0;
                    $result[227] += (is_numeric($row['field14_14'])) ? $row['field14_14'] : 0;
                    $result[228] += (is_numeric($row['field14_18'])) ? $row['field14_18'] : 0;
                    $result[229] += (is_numeric($row['field14_22'])) ? $row['field14_22'] : 0;

                    $result[230] += (is_numeric($row['field14_3'])) ? $row['field14_3'] : 0;
                    $result[231] += (is_numeric($row['field14_7'])) ? $row['field14_7'] : 0;
                    $result[232] += (is_numeric($row['field14_11'])) ? $row['field14_11'] : 0;
                    $result[233] += (is_numeric($row['field14_15'])) ? $row['field14_15'] : 0;
                    $result[234] += (is_numeric($row['field14_19'])) ? $row['field14_19'] : 0;
                    $result[235] += (is_numeric($row['field14_23'])) ? $row['field14_23'] : 0;

                    $result[236] += (is_numeric($row['field17_1'])) ? $row['field17_1'] : 0;
                    $result[237] += (is_numeric($row['field17_5'])) ? $row['field17_5'] : 0;
                    $result[238] += (is_numeric($row['field17_9'])) ? $row['field17_9'] : 0;

                    $result[239] += (is_numeric($row['field17_2'])) ? $row['field17_2'] : 0;
                    $result[240] += (is_numeric($row['field17_6'])) ? $row['field17_6'] : 0;
                    $result[241] += (is_numeric($row['field17_10'])) ? $row['field17_10'] : 0;

                    $result[242] += (is_numeric($row['field17_3'])) ? $row['field17_3'] : 0;
                    $result[243] += (is_numeric($row['field17_7'])) ? $row['field17_7'] : 0;
                    $result[244] += (is_numeric($row['field17_11'])) ? $row['field17_11'] : 0;
                }
                $result[73] = round($result['73_sum'] / $result[2], 1);
                $result[74] = round($result['74_sum'] / $result[2], 1);
                $result[75] = round($result['75_sum'] / $result[2], 1);

                $result[136] = $result[137] + $result[138];
                $result[143] = $result[144] + $result[145];
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

        return $this->render('report-list-itog', [
            'results' => $result,
            'modelReport' => $modelReport,
            'district_items' => $district_items,
            'region_items' => $region_items,
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
        $directorTable4 = $this->findModelDirectorTable4(
            $model->table_4
        );
        $directorTable5 = $this->findModelDirectorTable5(
            $model->table_5
        );
        $directorTable6 = $this->findModelDirectorTable6(
            $model->table_6
        );
        $directorTable7 = $this->findModelDirectorTable7(
            $model->table_7
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable8 = $this->findModelDirectorTable8(
            $model->table_8
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable9 = $this->findModelDirectorTable9(
            $model->table_9
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable10 = $this->findModelDirectorTable10(
            $model->table_10
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable11 = $this->findModelDirectorTable11(
            $model->table_11
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable12 = $this->findModelDirectorTable12(
            $model->table_12
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable13 = $this->findModelDirectorTable13(
            $model->table_13
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable14 = $this->findModelDirectorTable14(
            $model->table_14
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable15 = $this->findModelDirectorTable15(
            $model->table_15
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable16 = $this->findModelDirectorTable16(
            $model->table_16
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable17 = $this->findModelDirectorTable17(
            $model->table_17
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable18 = $this->findModelDirectorTable18(
            $model->table_18
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable19 = $this->findModelDirectorTable19(
            $model->table_19
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable20 = $this->findModelDirectorTable20(
            $model->table_20
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable21 = $this->findModelDirectorTable21(
            $model->table_21
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable23 = $this->findModelDirectorTable23(
            $model->table_23
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable24 = $this->findModelDirectorTable24(
            $model->table_24
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable25 = $this->findModelDirectorTable25(
            $model->table_25
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable26 = $this->findModelDirectorTable26(
            $model->table_26
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable27 = $this->findModelDirectorTable27(
            $model->table_27
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable28 = $this->findModelDirectorTable28(
            $model->table_28
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable29 = $this->findModelDirectorTable29(
            $model->table_29
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable30 = $this->findModelDirectorTable30(
            $model->table_30
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable31 = $this->findModelDirectorTable31(
            $model->table_31
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable32 = $this->findModelDirectorTable32(
            $model->table_32
        );//проверяем модель существует или нет! для редактирования и внесения
        $directorTable33 = $this->findModelDirectorTable33(
            $model->table_33
        );//проверяем модель существует или нет! для редактирования и внесения
        $this->layout = false;
        $html = $this->render(
            'view',
            //'director\view?id='.$id.'&stausButtom=0',
            [
                'model' => $model,
                'stausButtom' => $stausButtom,
                'directorTable4' => $directorTable4,
                'directorTable5' => $directorTable5,
                'directorTable6' => $directorTable6,
                'directorTable7' => $directorTable7,
                'directorTable8' => $directorTable8,
                'directorTable9' => $directorTable9,
                'directorTable10' => $directorTable10,
                'directorTable11' => $directorTable11,
                'directorTable12' => $directorTable12,
                'directorTable13' => $directorTable13,
                'directorTable14' => $directorTable14,
                'directorTable15' => $directorTable15,
                'directorTable16' => $directorTable16,
                'directorTable17' => $directorTable17,
                'directorTable18' => $directorTable18,
                'directorTable19' => $directorTable19,
                'directorTable20' => $directorTable20,
                'directorTable21' => $directorTable21,
                'directorTable23' => $directorTable23,
                'directorTable24' => $directorTable24,
                'directorTable25' => $directorTable25,
                'directorTable26' => $directorTable26,
                'directorTable27' => $directorTable27,
                'directorTable28' => $directorTable28,
                'directorTable29' => $directorTable29,
                'directorTable30' => $directorTable30,
                'directorTable31' => $directorTable31,
                'directorTable32' => $directorTable32,
                'directorTable33' => $directorTable33,
            ]
        );

        $mpdf = new Mpdf([
            'margin_top' => 5,
            'margin_left' => 20,
            'margin_right' => 10,
            //'mirrorMargins' => true//для двухсторонней печати !
            //Установлено значение 1, в документе будут отображаться значения левого и правого полей на нечетных и четных страницах, т. е. они станут внутренними и внешними полями.
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Заполненная анкета.pdf', 'I'); //D - скачает файл!
        //$mpdf->Output(': ' . $shop->name . '.pdf', 'I'); //D - скачает файл!
    }

    protected function findModel($id)
    {
        if (($model = Director::find()->where(['user_id' => $id])->one()) !== null) {
            return $model;
        } else {
            return new Director();
        }
    }

    protected function findModelId($id)
    {
        if (($model = Director::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            return new Director();
        }
    }

    protected function findModelDirectorTable4($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable4::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable4();
            }
        } else {
            return new DirectorTable4();
        }
    }

    protected function findModelDirectorTable5($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable5::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable5();
            }
        } else {
            return new DirectorTable5();
        }
    }

    protected function findModelDirectorTable6($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable6::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable6();
            }
        } else {
            return new DirectorTable6();
        }
    }

    protected function findModelDirectorTable7($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable7::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable7();
            }
        } else {
            return new DirectorTable7();
        }
    }

    protected function findModelDirectorTable8($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable8::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable8();
            }
        } else {
            return new DirectorTable8();
        }
    }

    protected function findModelDirectorTable9($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable9::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable9();
            }
        } else {
            return new DirectorTable9();
        }
    }

    protected function findModelDirectorTable10($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable10::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable10();
            }
        } else {
            return new DirectorTable10();
        }
    }

    protected function findModelDirectorTable11($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable11::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable11();
            }
        } else {
            return new DirectorTable11();
        }
    }

    protected function findModelDirectorTable12($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable12::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable12();
            }
        } else {
            return new DirectorTable12();
        }
    }

    protected function findModelDirectorTable13($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable13::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable13();
            }
        } else {
            return new DirectorTable13();
        }
    }

    protected function findModelDirectorTable14($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable14::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable14();
            }
        } else {
            return new DirectorTable14();
        }
    }

    protected function findModelDirectorTable15($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable15::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable15();
            }
        } else {
            return new DirectorTable15();
        }
    }

    protected function findModelDirectorTable16($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable16::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable16();
            }
        } else {
            return new DirectorTable16();
        }
    }

    protected function findModelDirectorTable17($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable17::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable17();
            }
        } else {
            return new DirectorTable17();
        }
    }

    protected function findModelDirectorTable18($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable18::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable18();
            }
        } else {
            return new DirectorTable18();
        }
    }

    protected function findModelDirectorTable19($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable19::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable19();
            }
        } else {
            return new DirectorTable19();
        }
    }

    protected function findModelDirectorTable20($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable20::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable20();
            }
        } else {
            return new DirectorTable20();
        }
    }

    protected function findModelDirectorTable21($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable21::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable21();
            }
        } else {
            return new DirectorTable21();
        }
    }

    protected function findModelDirectorTable23($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable23::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable23();
            }
        } else {
            return new DirectorTable23();
        }
    }

    protected function findModelDirectorTable24($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable24::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable24();
            }
        } else {
            return new DirectorTable24();
        }
    }

    protected function findModelDirectorTable25($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable25::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable25();
            }
        } else {
            return new DirectorTable25();
        }
    }

    protected function findModelDirectorTable26($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable26::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable26();
            }
        } else {
            return new DirectorTable26();
        }
    }

    protected function findModelDirectorTable27($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable27::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable27();
            }
        } else {
            return new DirectorTable27();
        }
    }

    protected function findModelDirectorTable28($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable28::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable28();
            }
        } else {
            return new DirectorTable28();
        }
    }

    protected function findModelDirectorTable29($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable29::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable29();
            }
        } else {
            return new DirectorTable29();
        }
    }

    protected function findModelDirectorTable30($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable30::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable30();
            }
        } else {
            return new DirectorTable30();
        }
    }

    protected function findModelDirectorTable31($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable31::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable31();
            }
        } else {
            return new DirectorTable31();
        }
    }

    protected function findModelDirectorTable32($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable32::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable32();
            }
        } else {
            return new DirectorTable32();
        }
    }

    protected function findModelDirectorTable33($id)
    {
        if (!empty($id)) {
            if (($model = DirectorTable33::find()->where(['id' => $id])->one()) !== null) {
                //if (($model = DirectorTable4::find()->one()) !== null) {
                return $model;
            } else {
                return new DirectorTable33();
            }
        } else {
            return new DirectorTable33();
        }
    }
}



