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
class UsersController extends AppController
{

    /**
     * ユーザー一覧アクション
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $aryField = [
            'id' => 'Users.id',
            'username' => 'Users.username',
            'name' => 'Users.name',
            'login_date' => 'Users.login_date'
        ];

        $aryUser = $this->Users->find('all', ['order' => ['Users.created' => 'ASC']])->select($aryField)->toArray();

        $this->set('aryUser', $aryUser);
    }

    /**
     * ユーザー追加アクション
     *
     * @return \Cake\Network\Response|null
     */
    public function add()
    {
        $aryError = [];
        $objEntityUser = NULL;
        if ($this->request->is('post')) {
            $aryData = $this->request->data;
            if (isset($aryData['name']) == TRUE && $aryData['name']) {
                $strName = preg_replace('[ |　|	]', '', $aryData['name']);
                if ($strName == '') {
                    $aryData['name'] = '';
                }
            }

            if (isset($aryData['role']) == TRUE) {
                $aryData['role'] = Constant::C_USER_ROLE_ADMIN;
            }
            $objEntityUser = $this->Users->newEntity($aryData);

            if (count($aryError) == 0 && count($objEntityUser->errors()) == 0) {
                $this->Users->save($objEntityUser);
                $this->successFlash(__('正常に保存されました'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $aryError[] = Utility::getErrors($objEntityUser->errors());
                if (count($aryError) > 0) {
                    $this->errorFlash($aryError);
                }
            }
        }
        $this->set('objEntityUser', $objEntityUser);
    }

    /**
     * ユーザー編集アクション
     * @param null $intId ：ユーザーID
     * @return \Cake\Network\Response|null
     */
    public function edit($intId = NULL)
    {
        $objUser = NULL;
        // ユーザーレコードー
        $objEntityUser = NULL;
        // エラー管理配列
        $aryError = [];
        // メニュー表示
        $aryBreadcrumb = ['業務連絡一覧' => '/indication/index', 'ユーザー編集画面' => FALSE];
        // ユーザーIDがない？
        if ($intId == NULL) {
            $this->errorFlash(__('ユーザーが存在しません'));
            // 表示ページへ遷移
            return $this->redirect(array('action' => 'index'));
        }

        // ユーザーデータ取得
        $objUser = $this->Users->find()->where(['id' => $intId, 'deleted' => Constant::C_OFF])->first();
        // 取得できない？
        if ($objUser == NULL) {
            $this->errorFlash(__('ユーザーが存在しません'));
            // 表示ページへ遷移
            return $this->redirect(array('action' => 'index'));
        }
        // ポストデータがある？
        if ($this->request->is('post') || $this->request->is('put')) {
            // ポストデータを取得
            $aryData = $this->request->data;
            // パスワード修正しなければ、除く
            if ($aryData['password'] == '') {
                unset($aryData['password']);
            }
            // 氏名の入力がある？
            if (isset($aryData['name']) == TRUE && $aryData['name']) {
                $strName = preg_replace('[ |　|	]', '', $aryData['name']);
                if ($strName == '') {
                    $aryData['name'] = '';
                }
            }
            // 連絡先の選択がある？
            if (isset($aryData['renrakusaki_list']) == TRUE) {
                $aryData['renrakusaki_list'] = implode(',', array_keys($aryData['renrakusaki_list']));
            } else {
                $aryData['renrakusaki_list'] = '';
            }
            // 物件インポート権限がある？
            if (isset($aryData['is_bukken_import']) == TRUE) {
                $aryData['is_bukken_import'] = Constant::C_ON;
            } else {
                $aryData['is_bukken_import'] = Constant::C_OFF;
            }
            // レコードー作成
            $objEntityUser = $this->Users->newEntity($aryData, ['validate' => 'editUsers']);
            // 整合性チェック
            if (count($aryError) == 0 && count($objEntityUser->errors()) == 0) {
                // 保存
                $this->Users->save($objEntityUser);
                // 成功メッセージ設定
                $this->successFlash(__('正常に保存されました'));
                // 表示ページへ遷移
                return $this->redirect(array('action' => 'index'));
            } else {
                // 整合性チェックのエラーを追加
                $aryError[] = Utility::getErrors($objEntityUser->errors());
                if (count($aryError) > 0) {
                    // エラーメッセージ設定
                    $this->errorFlash($aryError);
                    // ユーザーが入力されたデータを設定
                    $objEntityUser->username = $objUser->username;
                    $objUser = $objEntityUser;
                }
            }
        } else {
            // ユーザーのデータをフォームに設定する
            $this->request->data = $objUser;
            unset($this->request->data['password']);
        }

        // 連絡先取得
        $aryRenrakusaki = $this->Renrakusaki->find('all', array('order' => array('created' => 'DESC')))->toArray();
        // 部署取得
        $aryDepartment = $this->Department->find('list', array('order' => array('created' => 'DESC')))->toArray();
        // ビューアーに渡す
        $this->set(compact('objUser', 'aryRenrakusaki', 'aryDepartment', 'aryBreadcrumb'));
        $this->set('_serialize', ['objUser', 'aryRenrakusaki', 'aryDepartment', 'aryBreadcrumb']);
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

    public function profile()
    {
        $objUser = $this->Users->find()->where(['id' => self::$m_aryUser['id']])->first();
        if(!$objUser) {

        }
        $this->set('objUser', $objUser);
    }
}
