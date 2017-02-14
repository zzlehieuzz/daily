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
     * ユーザー一覧アクション
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

        $this->set('aryData', $aryData);
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
                $objEntity->date_y_m = $objEntity->date_process;

                $this->Daily->save($objEntity);
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
     * @return \Cake\Network\Response|null
     */
    public function edit($strDateYM = NULL)
    {
        $aryField = [
            'id' => 'Daily.id',
            'date_y_m' => 'Daily.date_y_m',
            'date_process' => 'Daily.date_process',
            'category_id' => 'Daily.category_id',
            'amount' => 'Daily.amount'
        ];

        $objEntity = null;

        $aryCategory = $this->Category->find('list', ['order' => ['created' => 'DESC']])->toArray();
        $aryDaily = $this->Daily->find('all', ['order' => ['Daily.date_process' => 'DESC']])
            ->select($aryField)
            ->where(['Daily.user_id' => self::$m_aryUser['id']])
            ->where(['Daily.date_y_m' => $strDateYM])
            ->toArray();

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
    }

    public function loadToEdit()
    {
        $this->autoRender = FALSE;
        $aryDaily = [];
        $intId = $this->request->query('int_Id');
        if($intId) {
            $aryDaily = $this->Daily->find()
                ->where(['id' => $intId, 'user_id' => self::$m_aryUser['id']])
                ->first()->toArray();
        }

        return $this->jsonResponse($aryDaily, TRUE);
    }

    public function processEdit()
    {
        $this->autoRender = FALSE;
        $aryDaily = [];
        $intId = $this->request->param('int_Id');
        if($this->request->is('post') && $intId) {




//            $aryDaily = $this->Daily->find()
//                ->where(['id' => $intId, 'user_id' => self::$m_aryUser['id']])
//                ->first()->toArray();
        }

        return $this->jsonResponse($aryDaily, TRUE);
    }

    /**
     * 削除アクション
     * @param null $intId ：ユーザーID
     * @return \Cake\Network\Response|null
     */
    public function delete($intId = NULL)
    {
        // ユーザーレコードー
        $objUser = NULL;
        // ユーザーIDがない？
        if ($intId == NULL) {
            // エラーメッセージ設定
            $this->errorFlash(__('ユーザーは存在しません'));
            // 表示ページへ遷移
            return $this->redirect(array('action' => 'index'));
        }
        // ユーザーデータ取得
        $objUser = $this->Users->find()->where(['id' => $intId, 'deleted' => Constant::C_OFF])->first();
        if ($objUser == NULL) {
            // 削除失敗
            $this->errorFlash(__('ユーザーは存在しません'));
        } // 自身削除している？
        elseif ($objUser->id == self::$m_aryUser['id']) {
            // エラーメッセージ設定
            $this->errorFlash(__('自身削除ができません'));
            return $this->redirect(array('action' => 'edit/' . $intId));
        } // 削除を行う
        else {
            $this->Users->updateAll(['deleted' => Constant::C_ON], ['id' => $objUser->id]);
            // 成功メッセージ設定
            $this->successFlash(__('正常に削除されました'));
        }
        // 表示ページへ遷移
        return $this->redirect(array('action' => 'index'));
    }
}
