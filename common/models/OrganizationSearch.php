<?php


namespace common\models;


use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class OrganizationSearch extends Organization
{
    public function rules()
    {
        return [
            [
                [
                    'number',
                    'federal_district_id',
                    'region_id',
                    'municipality_id',
                    'title',
                ],
                'safe'
            ],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {
        $post = $params['OrganizationSearch'];

        if (Yii::$app->user->can('admin')) {
            $query = Organization::find();
        } else {
            //$where = [];
            //$where=['not in', 'id', [1,3,10,11]];
                $where = [
                    'federal_district_id' =>  Organization::find()->select('federal_district_id')->where(['id'=>Yii::$app->user->identity->organization_id])->one()->federal_district_id
                ];
                $where += [
                    'region_id' => Organization::find()->select('region_id')->where(['id'=>Yii::$app->user->identity->organization_id])->one()->region_id,
                ];

            /*if ($post['municipality_id']){
                $where += [
                    'municipality_id' => $post['municipality_id'],
                ];
            }*/
            //$where += [];
            //print_r($where);
            //exit();
            $query = Organization::find()->where($where)->andWhere(['not in', 'id', [1,2,3,4,5,6,7,10,11]])->andWhere(['organization_type_id'=>5]);
            //print_r($query);

        }

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
            //'sort' => [
            //    'defaultOrder' => [
            //        'year_study' => SORT_DESC,
            //        'month_status' => SORT_DESC,
            //        //'title' => SORT_ASC,
            //    ],
            //],
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['federal_district_id' => $this->federal_district_id])
            ->andFilterWhere(['region_id' => $this->region_id])
            ->andFilterWhere(['municipality_id' => $this->municipality_id])
        ;

        return $dataProvider;
    }
}