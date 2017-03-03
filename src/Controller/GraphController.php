<?php
// * Copyright (c) ASC All Rights Reserved.
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// * モジュールID  ： GraphController
// * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// * ［変更履歴］
// * 2017.03.03 Hieunld    ：新規作成
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
namespace App\Controller;

use App\Libs\Constant;
use App\Libs\Utility;

class GraphController extends AppController
{

    public function index()
    {
        $aryField = [
            'date_y_m' => 'date_y_m',
            'amount' => 'SUM(amount)'
        ];
        $aryDaily = $this->Daily->find('list', [
            'keyField' => 'date_y_m',
            'valueField' => 'amount',
            'order' => ['date_y_m' => 'DESC']])
            ->group(['date_y_m'])
            ->select($aryField)
            ->where(['user_id' => self::$m_aryUser['id']])
            ->toArray();
        $aryDailyPercent = [];
        $aryBarChart = [];
        $intAmountTotal = 0;
        if($aryDaily) {
            $intAmountTotal = array_sum($aryDaily);
            $intI = 0;
            foreach($aryDaily as $aryDailyKey => $aryDailyItem) {
                $aryDailyPercent[$intI]['label'] = $aryDailyKey;
                $aryDailyPercent[$intI]['data']  = ($aryDailyItem/$intAmountTotal)*100;

                $aryBarChart[$intI][0] = Utility::getTimestampFrom($aryDailyKey);
//                pr($aryBarChart[$intI][0]);
//                pr(intval($aryBarChart[$intI][0]));
//                die;
                $aryBarChart[$intI][]  = $aryDailyItem;

                $intI++;
            }
        }
//        var_dump($aryBarChart);
//        die;
        $year = '2017';
        $this->set('aryDailyPercent', $aryDailyPercent);
        $this->set('aryBarChart', $aryBarChart);
        $this->set('intAmountTotal', $intAmountTotal);
        $this->set('year', $year);
    }

    public function group() {

    }

    public function output() {

    }

    public function calendar() {

    }
}
