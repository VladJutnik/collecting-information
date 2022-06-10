<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FoodSearch extends Director
{
    public $federal_district_id;
    public $region_id;
    public $municipality;

    public function rules()
    {
        return [
            [
                [
                    'federal_district_id',
                    'region_id',
                    'municipality',
                ],
                'safe',
            ],
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        if (Yii::$app->user->can('food_organizer')) {
            $where = [
                'food.user_id' => Yii::$app->user->identity->id,
            ];
        } else if(Yii::$app->user->can('rospotrebnadzor')){
            $where = [
                'user.federal_district_id' => Yii::$app->user->identity->federal_district_id,
                'user.region_id' => Yii::$app->user->identity->region_id,
            ];
            $where += !empty($params['FoodSearch']['municipality']) ? ['user.municipality_id' => $params['FoodSearch']['municipality']] : [];
        } else if(Yii::$app->user->can('curator')){
            $where = [
                'user.federal_district_id' => Yii::$app->user->identity->federal_district_id,
            ];
            $where += !empty($params['FoodSearch']['region_id']) ? ['user.region_id' => $params['FoodSearch']['region_id']] : [];
            $where += (!empty($params['FoodSearch']['municipality']) && !empty($params['FoodSearch']['region_id'])) ? ['user.municipality_id' => $params['FoodSearch']['municipality']] : [];
        } else if(Yii::$app->user->can('admin')){
            $where = [];

            $where += !empty($params['FoodSearch']['federal_district_id']) ? ['user.federal_district_id' => $params['FoodSearch']['federal_district_id']] : [];
            $where += (!empty($params['FoodSearch']['region_id']) && !empty($params['FoodSearch']['federal_district_id'])) ? ['user.region_id' => $params['FoodSearch']['region_id']] : [];
            $where += (!empty($params['FoodSearch']['municipality']) && !empty($params['FoodSearch']['region_id']) && !empty($params['FoodSearch']['municipality'])) ? ['user.municipality_id' => $params['FoodSearch']['municipality']] : [];
        }


        /* if (Yii::$app->user->can('food_organizer')) {
             $where = [
                 'food.user_id' => Yii::$app->user->identity->id,
             ];
         } else if(Yii::$app->user->can('rospotrebnadzor') || Yii::$app->user->can('curator')){
             $where = [
                 'user.federal_district_id' => Yii::$app->user->identity->federal_district_id,
                 'user.region_id' => Yii::$app->user->identity->region_id,
             ];
         }else {
             $where = [];
         }
         $andWhere = [];
         $andWhere += !empty($params['FoodSearch']['federal_district_id']) ? ['user.federal_district_id' => $params['FoodSearch']['federal_district_id']] : [];
         $andWhere += !empty($params['FoodSearch']['region_id']) ? ['user.region_id' => $params['FoodSearch']['region_id']] : [];
         $andWhere += !empty($params['FoodSearch']['municipality']) ? ['user.municipality_id' => $params['FoodSearch']['municipality']] : [];
         print_r($andWhere);
         exit();*/
        $query = (new \yii\db\Query());
        $query->select(
            [
                'food.id as id',
                'user.organization_id as organization_id',
                'user.federal_district_id as federal_district_id',
                'user.region_id as region_id',
                'user.municipality_id as municipality',
                'food.create_at as create_at',
            ]
        );
        $query->from('food');
        $query->leftJoin('user', 'food.user_id = user.id');
        $query->where($where);
        //print_r($query->createCommand()->rawSQL);
        //exit();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                //'forcePageParam' => false,
                //'pageSizeParam' => false,
                'pageSize' => 50,
            ],
            'sort' => [
                'defaultOrder' => [
                    // 'user.federal_district_id' => SORT_DESC,
                ],
            ],
        ]);

        //$query->andFilterWhere(['=', 'month_status', $this->month_status]);

        /*$query->andFilterWhere(['like', 'ugroup', $this->ugroup]);

        if(Yii::$app->user->can('admin')){
            $query->andFilterWhere(['=', 'city_id', $this->city_id]);

            $query->andFilterWhere(['like', 'ugroup', $this->ugroup]);
        }*/

        return $dataProvider;
    }
}