<?php
// * Copyright (c) ASC All Rights Reserved.
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// * システム名称  ： ファクトシート事業部 業務連絡システム
// * モジュール名称： ユーザー制御コントローラー
// * モジュールID  ： UsersController
// * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// * ［変更履歴］
// * 2016.05.16 Hieunld    ：新規作成
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
namespace App\Controller;

use App\Libs\Constant;
use App\Libs\Utility;

/**
 * @property \App\Model\Table\UsersTable $Users
 */
class DailyController extends AppController
{

    /**
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $aryField = [
            'id' => 'Daily.id',
            'date_y_m' => 'Daily.date_y_m',
            'category_id' => 'Daily.category_id',
            'amount' => 'SUM(Daily.amount)'
        ];
        $aryCategory = $this->Category->find('list', ['order' => ['created' => 'DESC']])->toArray();
        $aryDaily = $this->Daily->find('all', ['order' => ['Daily.date_y_m' => 'DESC']])
        ->group(['Daily.date_y_m'])
        ->group(['Daily.category_id'])
        ->select($aryField)
        ->where(['Daily.user_id' => self::$m_aryUser['id']])
        ->toArray();

        $aryData = [];
        foreach($aryDaily as $aryDailyItem) {
            if(isset($aryData[$aryDailyItem['date_y_m']][$aryDailyItem['category_id']])) {
                $aryData[$aryDailyItem['date_y_m']][$aryDailyItem['category_id']] += $aryDailyItem['amount'];
            } else {
                $aryData[$aryDailyItem['date_y_m']][$aryDailyItem['category_id']] = $aryDailyItem['amount'];
            }
        }
        $arySalary = [];
        $arySalaryOri = $this->Salary->find('all', [
            'order' => ['created' => 'DESC']])
            ->where(['user_id' => self::$m_aryUser['id']])->toArray();

        foreach($arySalaryOri as $arySalaryItem) {
            $arySalary[$arySalaryItem['date_y_m']]['default_value'] = $arySalaryItem['default_value'];
            $arySalary[$arySalaryItem['date_y_m']]['real_value'] = $arySalaryItem['real_value'];
        }

//        pr($arySalary);die;

        $this->set('aryData', $aryData);
        $this->set('arySalary', $arySalary);
        $this->set('aryCategory', $aryCategory);
    }

    /**
     * @return \Cake\Network\Response|null
     */
    public function add()
    {
        $aryCategory = $this->Category->find('list', ['order' => ['sort' => 'ASC', 'created' => 'DESC']])->toArray();

        if ($this->request->is('post')) {
            $aryData = $this->request->data;
            $objEntity = $this->Daily->newEntity($aryData);

            if (count($objEntity->errors()) == 0) {
                $objEntity->user_id = self::$m_aryUser['id'];
                $objEntity->date_y_m = substr($objEntity->date_process, 0, 7);

                if($this->Daily->save($objEntity)) {
                    $intSalary = $this->Salary->find()
                        ->where(['user_id' => self::$m_aryUser['id'], 'date_y_m' => $objEntity->date_y_m])
                        ->count();

                    if($intSalary == 0) {
                        $this->Salary->save($this->Salary->newEntity([
                            'date_y_m' => $objEntity->date_y_m,
                            'user_id' => self::$m_aryUser['id']
                        ]));
                    }
                }

                $this->successFlash(__('Successfully saved'));
                return $this->redirect(['action' => 'add']);
            } else {
                $aryError = Utility::getErrors($objEntity->errors());
                if(count($aryError) > 0) {
                    $this->errorFlash($aryError);
                }
            }
        } else {
            $objEntity = $this->Daily->newEntity([
                'date_process' => Utility::uiDate(),
                'amount' => 1
            ]);
        }

        $this->set('aryCategory', $aryCategory);
        $this->set('objEntity', $objEntity);
    }

    /**
     * @param null $strDateYM
     * @param null $intCategory
     * @return \Cake\Network\Response|null
     */
    public function edit($strDateYM = NULL, $intCategory = NULL)
    {
        $aryField = [
            'id' => 'Daily.id',
            'date_y_m' => 'Daily.date_y_m',
            'date_process' => 'Daily.date_process',
            'category_id' => 'Daily.category_id',
            'description' => 'Daily.description',
            'amount' => 'Daily.amount'
        ];

        $objEntity = null;

        $aryCategory = $this->Category->find('list', ['order' => ['created' => 'DESC']])->toArray();
        $aryDaily = $this->Daily->find('all', ['order' => ['date_process' => 'DESC']])
            ->select($aryField)
            ->where(['user_id' => self::$m_aryUser['id']]);
        if($strDateYM) {
            $aryDaily->where(['date_y_m' => $strDateYM]);
        }
        if($intCategory) {
            $aryDaily->where(['category_id' => $intCategory]);
        }
        $aryDaily->toArray();

        if($this->request->is('post')) {
            $aryData = $this->request->data;
            $aryData['user_id'] = self::$m_aryUser['id'];
            $objEntity = $this->Daily->newEntity($aryData);

            if (count($objEntity->errors()) == 0) {
                $intUser = $this->Daily->find()->where(['id' => $aryData['id'], 'user_id' => self::$m_aryUser['id']])->count();
                if ($intUser <= 0) {
                    $this->errorFlash(['Data not found']);
                } else {
                    $objEntity->date_y_m = $objEntity->date_process;

                    $this->Daily->save($objEntity);
                    $this->successFlash(__('Successfully saved'));
                    return $this->redirect(['action' => 'edit/' . $strDateYM]);
                }
            } else {
                $aryError = Utility::getErrors($objEntity->errors());
                if(count($aryError) > 0) {
                    $this->errorFlash($aryError);
                }
            }
        }

        $this->set('objEntity', $objEntity);
        $this->set('aryData', $aryDaily);
        $this->set('aryCategory', $aryCategory);
        $this->set('strDateYM', $strDateYM);
        $this->set('intCategory', $intCategory);
    }

    public function loadToEdit()
    {
        $this->autoRender = FALSE;
        $aryDaily = [];
        $intId = $this->request->query('id');
        if($intId) {
            $aryDaily = $this->Daily->find()
                ->where(['id' => $intId, 'user_id' => self::$m_aryUser['id']])
                ->first()->toArray();
        }

        return $this->jsonResponse($aryDaily, TRUE);
    }

    public function delete()
    {
        $this->autoRender = false;
        $aryData = $this->request->data;
        $result = false;
        if($this->request->is('post') && isset($aryData['aryId']) && ($aryId = $aryData['aryId'])) {
            $intDaily = $this->Daily
                ->find()
                ->where(['id IN' => $aryId, 'user_id' => self::$m_aryUser['id']])->count();
            if($intDaily == count($aryId)) {
                if($this->Daily->deleteAll(['Daily.id IN' => $aryId])) {
                    $result = true;
                    $this->successFlash(__('Successfully deleted'));
                }
            } else {
                $this->errorFlash(__('Can not delete'));
            }
        }

        return $this->jsonResponse([], $result);
    }

    public function salary($intId = null)
    {
        $objEntity = null;
        $arySalary = $this->Salary->find('list', [
            'keyField' => 'id',
            'valueField' => 'date_y_m',
            'order' => ['created' => 'DESC']])
        ->where(['user_id' => self::$m_aryUser['id']])->toArray();

        if($this->request->is('post') || $this->request->is('put')) {
            $aryData = $this->request->data;

            $aryData['user_id'] = self::$m_aryUser['id'];
            $objEditEntity = $this->Salary->newEntity($aryData);

            if (count($objEditEntity->errors()) == 0) {
                $intSalary = $this->Salary->find()
                    ->where(['id' => $aryData['id'], 'user_id' => self::$m_aryUser['id']])->count();

                if ($intSalary <= 0) {
                    $this->errorFlash(['Data not found']);
                } else {
                    $this->Salary->save($objEditEntity);
                    $this->successFlash(__('Successfully saved'));
                    return $this->redirect(['action' => 'salary/' . $aryData['id']]);
                }
            } else {
                $aryError = Utility::getErrors($objEditEntity->errors());
                if(count($aryError) > 0) {
                    $this->errorFlash($aryError);
                }
            }
            $objEntity = $objEditEntity;
        } else {
            if(count($arySalary) > 0) {
                if(!$intId) {
                    $intId = current(array_keys($arySalary));
                }
                $objEntity = $this->Salary->find()
                    ->where(['id' => $intId, 'user_id'=> self::$m_aryUser['id']])->first();
            }
        }

        $this->set('objEntity', $objEntity);
        $this->set('arySalary', $arySalary);
    }
}
