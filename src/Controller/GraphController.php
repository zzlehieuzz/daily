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

    public function index($pYear = null, $pMonth = null, $pType = 'Y')
    {
        $curYear = date('Y');
        if(!$pYear) {
            $pYear = $curYear;
        }
        $curMonth = date('m');
        if(!$pMonth) {
            $pMonth = $curMonth;
        }

        $aryYear = $aryMonth = [];
        $midYear = 10;

        $midYear += $curYear - Constant::START_YEAR;
        if($midYear) {
            for($i = Constant::START_YEAR; $i <= ($midYear + Constant::START_YEAR); $i++) {
                $aryYear[$i] = $i;
            }
        }

        for($i = 1; $i <= 12; $i++) {
            $aryMonth[Utility::strPad($i)] = $i;
        }

        $aryDailyPercent = [];
        $intAmountTotal = 0;
        if($pType == 'Y') {
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
                ->where(['user_id' => self::$m_aryUser['id'], 'date_y_m LIKE' => $pYear . '-%'])
                ->toArray();

            if($aryDaily) {
                $intAmountTotal = array_sum($aryDaily);
                $intI = 0;
                foreach($aryDaily as $aryDailyKey => $aryDailyItem) {
                    $aryDailyPercent[$intI]['label'] = $aryDailyKey;
                    $aryDailyPercent[$intI]['data']  = ($aryDailyItem/$intAmountTotal)*100;

                    $intI++;
                }
            }

        } else {
            $aryField = [
                'category_id' => 'category_id',
                'amount' => 'SUM(amount)'
            ];

            $aryDaily = $this->Daily->find('list', [
                'keyField' => 'category_id',
                'valueField' => 'amount',
                'order' => ['category_id' => 'DESC']])
                ->group(['category_id'])
                ->select($aryField)
                ->where(['user_id' => self::$m_aryUser['id'], 'date_y_m' => $pYear . '-' . $pMonth])
                ->toArray();

            if($aryDaily) {
                $aryCategory = $this->Category->find('list', ['order' => ['created' => 'DESC']])->toArray();
                $intAmountTotal = array_sum($aryDaily);
                $intI = 0;
                foreach($aryDaily as $aryDailyKey => $aryDailyItem) {
                    $aryDailyPercent[$intI]['label'] = $aryCategory[$aryDailyKey];
                    $aryDailyPercent[$intI]['data']  = ($aryDailyItem/$intAmountTotal)*100;

                    $intI++;
                }
            }
        }

        $this->set('aryDailyPercent', $aryDailyPercent);
        $this->set('intAmountTotal', $intAmountTotal);
        $this->set('aryYear', $aryYear);
        $this->set('aryMonth', $aryMonth);
        $this->set('pYear', $pYear);
        $this->set('pMonth', $pMonth);
        $this->set('pType', $pType);
    }

    public function group() {

    }

    public function output() {

    }

    public function calendar() {

    }
}
