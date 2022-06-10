<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class DetiSearch extends DetiAnket
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
        if (Yii::$app->user->can('admin')) {
            !empty($params['detiSearch']['federal_district_id']) ? $where = ['user.federal_district_id' => $params['detiSearch']['federal_district_id']] : $where = [];
            !empty($params['detiSearch']['region_id']) ? $where += ['user.region_id' => $params['detiSearch']['region_id']] : $where += [];
            !empty($params['detiSearch']['municipality']) ? $where += ['user.municipality_id' => $params['detiSearch']['municipality']] : $where += [];
        } elseif (Yii::$app->user->can('rospotrebnadzor')) {
            $where = [
                'user.federal_district_id' => Yii::$app->user->identity->federal_district_id,
                'user.region_id' => Yii::$app->user->identity->region_id,
            ];
        }else {
            $where = [
                'user_id' => Yii::$app->user->identity->id,
            ];
        }

        $query = (new \yii\db\Query());
        $query->select(
            [
                'deti_anket.id as id',
                'user.organization_id as organization_id',
                'user.federal_district_id as federal_district_id',
                'user.region_id as region_id',
                'user.municipality_id as municipality',
                'deti_anket.create_at as create_at',
            ]
        );
        $query->from('deti_anket');
        $query->innerJoin('user', 'deti.user_id = user.id');
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
