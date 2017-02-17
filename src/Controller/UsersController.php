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
            $objEntityUser = $this->Users->newEntity($aryData);

            if (count($aryError) == 0 && count($objEntityUser->errors()) == 0) {
                if($this->Users->save($objEntityUser)) {
                    $this->Config->save($this->Config->newEntity([
                        'user_id' => $objEntityUser->id
                    ]));
                }
                $this->successFlash(__('Successfully saved'));
                return $this->redirect(['action' => 'index']);
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
     * @param null $intId
     * @return \Cake\Network\Response|null
     */
    public function edit($intId = NULL)
    {
        $aryError = [];
        if ($intId == NULL) {
            $this->errorFlash(__('User not found'));
            return $this->redirect(['action' => 'index']);
        }

        $objEntityUser = $this->Users->find()->where(['id' => $intId])->first();
        if ($objEntityUser == NULL) {
            $this->errorFlash(__('User not found'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $aryData = $this->request->data;
            if ($aryData['password'] == '') {
                unset($aryData['password']);
            }

            if (isset($aryData['name']) == TRUE && $aryData['name']) {
                $strName = preg_replace('[ |　|	]', '', $aryData['name']);
                if ($strName == '') {
                    $aryData['name'] = '';
                }
            }

            $objEntityUser = $this->Users->newEntity($aryData, ['validate' => 'editUsers']);
            if (count($aryError) == 0 && count($objEntityUser->errors()) == 0) {
                $this->Users->save($objEntityUser);
                $this->successFlash(__('Successfully saved'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $aryError[] = Utility::getErrors($objEntityUser->errors());
                if (count($aryError) > 0) {
                    $this->errorFlash($aryError);
                }
            }
        } else {
            $this->request->data = $objEntityUser;
            unset($this->request->data['password']);
        }

        $this->set('objEntityUser', $objEntityUser);
    }

    /**
     * @param null $intId
     * @return \Cake\Network\Response|null
     */
    public function delete($intId = NULL)
    {
        if ($intId == NULL) {
            $this->errorFlash(__('User does not exist'));
            return $this->redirect(['action' => 'index']);
        }
        $objUser = $this->Users->find()->where(['id' => $intId])->first();
        if ($objUser == NULL) {
            $this->errorFlash(__('User does not exist'));
        } elseif ($objUser->id == self::$m_aryUser['id']) {
            $this->errorFlash(__('Can not delete'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->successFlash(__('Successfully deleted'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
