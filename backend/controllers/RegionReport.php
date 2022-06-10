<?php

namespace backend\controllers;

use common\models\FederalDistrict;
use common\models\Municipality;
use common\models\Organization;
use common\models\Region;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

trait RegionReport
{
    public function getArrayDistrictItems($statusReport = false)
    {
        if ($statusReport !== false) {
            return ArrayHelper::merge(
                ['v' => 'Все'],
                ArrayHelper::map(FederalDistrict::find()->all(), 'id', 'name')
            );
        } else {
            return ArrayHelper::map(FederalDistrict::find()->all(), 'id', 'name');
        }
    }

    public function getArrayDistrictItemsCurat($statusReport)
    {
        return ArrayHelper::map(FederalDistrict::find()->where(['in', 'id', $statusReport])->all(), 'id', 'name');
    }

    public function getArrayRegionItems($id = 0, $statusReport = false)
    {
        $where = ($id != 0) ? ['district_id' => $id] : ['district_id' => 1];
        if ($statusReport !== false) {
            return ArrayHelper::merge(
                ['v' => 'Все'],
                ArrayHelper::map(
                    Region::find()->where($where)->all(),
                    'id',
                    'name'
                )
            );
        } else {
            return ArrayHelper::map(
                Region::find()->where($where)->all(),
                'id',
                'name'
            );
        }
    }

    public function getArrayMunicipalityItems($id = 0, $statusReport = false)
    {
        $where = ($id != 0) ? ['region_id' => $id] : ['region_id' => 1];
        if ($statusReport !== false) {
            return ArrayHelper::merge(
                ['v' => 'Все'],
                ArrayHelper::map(
                    Municipality::find()->where($where)->all(),
                    'id',
                    'name'
                )
            );
        } else {
            return ArrayHelper::map(
                Municipality::find()->where($where)->all(),
                'id',
                'name'
            );
        }
    }

    public function getArrayOrganizationItems($id = 0, $type_id = 0, $statusReport = false)
    {
        $where = ($id != 0 && $type_id != 0) ? [
            'municipality_id' => $id,
            'organization_type_id' => $type_id
        ] : ['municipality_id' => 1565, 'organization_type_id' => 5];
        if ($statusReport !== false) {
            return ArrayHelper::merge(
                ['v' => 'Все'],
                ArrayHelper::map(
                    Organization::find()->where($where)->all(),
                    'id',
                    'title'
                )
            );
        } else {
            return ArrayHelper::map(
                Organization::find()->where($where)->all(),
                'id',
                'title'
            );
        }
    }


    public function actionRegionListReport($id)
    {
        $groups = Region::find()->where(['district_id' => $id])->orderby(['name' => SORT_ASC])->all();

        $data = [];
        $data[] = '<option value=\'v\'>Все</option>';
        if (!empty($groups)) {
            foreach ($groups as $key => $group) {
                $data[] = '<option value=\'' . $group->id . '\'>' . $group->name . '</option>';
            }
        }

        return Json::encode($data);
    }

    public function actionMunicipalityListReport($id)
    {
        $groups = Municipality::find()->where(['region_id' => $id])->orderby(['name' => SORT_ASC])->all();

        $data = [];
        $data[] = '<option value=\'v\'>Все</option>';
        if (!empty($groups)) {
            foreach ($groups as $key => $group) {
                $data[] = '<option value=\'' . $group->id . '\'>' . $group->name . '</option>';
            }
        }

        return Json::encode($data);
    }

    public function actionOrganizationListReport($id)
    {
        $groups = Organization::find()->where([
            'municipality_id' => $id,
            'organization_type_id' => 5,
        ])->orderby(['title' => SORT_ASC])->all();

        $data = [];
        $data[] = '<option value=\'v\'>Все</option>';
        if (!empty($groups)) {
            foreach ($groups as $key => $group) {
                $data[] = '<option value=\'' . $group->id . '\'>' . $group->title . '</option>';
            }
        }

        return Json::encode($data);
    }
}