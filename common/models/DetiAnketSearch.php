<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class DetiAnketSearch extends DetiAnket
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
                'organization_id' => Yii::$app->user->identity->organization_id,
            ];
        } else if(Yii::$app->user->can('rospotrebnadzor') || Yii::$app->user->can('curator')){
            $where = [
                'federal_district_id' => Yii::$app->user->identity->federal_district_id,
                'region_id' => Yii::$app->user->identity->region_id,
            ];
        }else {
            $where = [];
        }
        $andWhere = [];
        $andWhere += !empty($params['DetiAnketSearch']['federal_district_id']) ? ['federal_district_id' => $params['DetiAnketSearch']['federal_district_id']] : [];
        $andWhere += !empty($params['DetiAnketSearch']['region_id']) ? ['region_id' => $params['DetiAnketSearch']['region_id']] : [];
        $andWhere += !empty($params['DetiAnketSearch']['municipality']) ? ['municipality_id' => $params['DetiAnketSearch']['municipality']] : [];

        $query = (new \yii\db\Query());
        $query->from('deti_anket');
        $query->where($where);
        $query->andWhere($andWhere);

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
                    // 'federal_district_id' => SORT_DESC,
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
