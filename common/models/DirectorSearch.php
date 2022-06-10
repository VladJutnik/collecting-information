<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class DirectorSearch extends Director
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
        if (Yii::$app->user->can('director_school')) {
            $where = [
                'director.user_id' => Yii::$app->user->identity->id,
            ];
        } else if(Yii::$app->user->can('rospotrebnadzor')){
            $where = [
                'user.federal_district_id' => Yii::$app->user->identity->federal_district_id,
                'user.region_id' => Yii::$app->user->identity->region_id,
            ];
            $where += !empty($params['DirectorSearch']['municipality']) ? ['user.municipality_id' => $params['DirectorSearch']['municipality']] : [];
        } else if(Yii::$app->user->can('curator')){
            $where = [
                'user.federal_district_id' => Yii::$app->user->identity->federal_district_id,
            ];
            $where += !empty($params['DirectorSearch']['region_id']) ? ['user.region_id' => $params['DirectorSearch']['region_id']] : [];
            $where += (!empty($params['DirectorSearch']['municipality']) && !empty($params['DirectorSearch']['region_id'])) ? ['user.municipality_id' => $params['DirectorSearch']['municipality']] : [];
        } else if(Yii::$app->user->can('admin')){
            $where = [];

            $where += !empty($params['DirectorSearch']['federal_district_id']) ? ['user.federal_district_id' => $params['DirectorSearch']['federal_district_id']] : [];
            $where += (!empty($params['DirectorSearch']['region_id']) && !empty($params['DirectorSearch']['federal_district_id'])) ? ['user.region_id' => $params['DirectorSearch']['region_id']] : [];
            $where += (!empty($params['DirectorSearch']['municipality']) && !empty($params['DirectorSearch']['region_id']) && !empty($params['DirectorSearch']['municipality'])) ? ['user.municipality_id' => $params['DirectorSearch']['municipality']] : [];
        }
       // print_r($where);
       /* $andWhere = [];
        $andWhere += !empty($params['DirectorSearch']['federal_district_id']) ? ['user.federal_district_id' => $params['DirectorSearch']['federal_district_id']] : [];
        $andWhere += !empty($params['DirectorSearch']['region_id']) ? ['user.region_id' => $params['DirectorSearch']['region_id']] : [];
        $andWhere += !empty($params['DirectorSearch']['municipality']) ? ['user.municipality_id' => $params['DirectorSearch']['municipality']] : [];*/

        /*if (Yii::$app->user->can('admin')) {
            !empty($params['DirectorSearch']['federal_district_id']) ? $where = ['user.federal_district_id' => $params['DirectorSearch']['federal_district_id']] : $where = [];
            !empty($params['DirectorSearch']['region_id']) ? $where += ['user.region_id' => $params['DirectorSearch']['region_id']] : $where += [];
            !empty($params['DirectorSearch']['municipality']) ? $where += ['user.municipality_id' => $params['DirectorSearch']['municipality']] : $where += [];
        } elseif (Yii::$app->user->can('rospotrebnadzor')) {
            $where = [
                'user.federal_district_id' => Yii::$app->user->identity->federal_district_id,
                'user.region_id' => Yii::$app->user->identity->region_id,
            ];
        }else {
            $where = [
                'user_id' => Yii::$app->user->identity->id,
            ];
        }*/
        $query = (new \yii\db\Query());
        $query->select(
            [
                'director.id as id',
                'user.organization_id as organization_id',
                'user.federal_district_id as federal_district_id',
                'user.region_id as region_id',
                'user.municipality_id as municipality',
                'director.create_at as create_at',
            ]
        );
        $query->from('director');
        $query->leftJoin('user', 'director.user_id = user.id');
        $query->where($where);

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
