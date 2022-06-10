<?php

namespace backend\controllers;

use common\models\FoodOrganizer;
use common\models\Organization;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class FoodOrganizerController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'create',
                            'edit',
                            'delete',
                            'index',
                        ],
                        'allow' => true,
                        'roles' => [
                            'food_organizer',
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
        $dataProvider = new ActiveDataProvider([
            'query' => FoodOrganizer::find()
                ->select(['id','organization_id'])
                ->where(['user_id' => Yii::$app->user->id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new FoodOrganizer();
        $org_items = ArrayHelper::map(Organization::findAll([
            'region_id' => Yii::$app->user->identity->region_id,
            'organization_type_id' => [5]
        ]), 'id', 'title');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $post = Yii::$app->request->post()['FoodOrganizer'];
            $model->user_id = Yii::$app->user->id;
            $model->organization_id = $post['organization_id'];
            $model->field5_4 = $post['field5_1'] + $post['field5_2'] + $post['field5_3'];
            $model->field5_8 = $post['field5_5'] + $post['field5_6'] + $post['field5_7'];
            $model->field5_12 = $post['field5_9'] + $post['field5_10'] + $post['field5_11'];
            $model->field5_16 = $post['field5_13'] + $post['field5_14'] + $post['field5_15'];
            $model->field5_20 = $post['field5_17'] + $post['field5_18'] + $post['field5_19'];
            $model->field5_24 = $post['field5_21'] + $post['field5_22'] + $post['field5_23'];
            $model->field5_28 = $post['field5_25'] + $post['field5_26'] + $post['field5_27'];
            $model->save();

            Yii::$app->session->setFlash('success', 'Данные сохранены');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'org_items' => $org_items,
        ]);
    }

    public function actionEdit($id)
    {
        $model = $this->findModel($id);
        if($model->user_id === Yii::$app->user->id){
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $post = Yii::$app->request->post()['FoodOrganizer'];
                $model->field5_4 = $post['field5_1'] + $post['field5_2'] + $post['field5_3'];
                $model->field5_8 = $post['field5_5'] + $post['field5_6'] + $post['field5_7'];
                $model->field5_12 = $post['field5_9'] + $post['field5_10'] + $post['field5_11'];
                $model->field5_16 = $post['field5_13'] + $post['field5_14'] + $post['field5_15'];
                $model->field5_20 = $post['field5_17'] + $post['field5_18'] + $post['field5_19'];
                $model->field5_24 = $post['field5_21'] + $post['field5_22'] + $post['field5_23'];
                $model->field5_28 = $post['field5_25'] + $post['field5_26'] + $post['field5_27'];
                $model->save();

                Yii::$app->session->setFlash('success', 'Данные сохранены');
                return $this->redirect(['index']);
            }
            return $this->render('edit', [
                'model' => $model
            ]);
        } else {
            Yii::$app->session->setFlash(
                'error',
                "Ой! Что-то пошло не так!"
            );
            return $this->redirect(['index']);
        }
    }

    public function actionDelete($id)
    {
        $maodeDelete = $this->findModel($id);
        if($maodeDelete->user_id === Yii::$app->user->id){
            $maodeDelete->delete();
        } else {
            Yii::$app->session->setFlash(
                'error',
                "Ой! Что-то пошло не так!"
            );
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = FoodOrganizer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
