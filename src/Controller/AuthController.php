<?php
// * Copyright (c) ASC All Rights Reserved.
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// * システム名称  ： ファクトシート事業部 業務連絡システム
// * モジュール名称： ログイン制御コントローラー
// * モジュールID  ： AuthController
// * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// * ［変更履歴］
// * 2016.05.16 Hieunld    ：新規作成
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

namespace App\Controller;

use App\Libs\Utility;
use Cake\Core\Configure;

/**
 * @property \App\Model\Table\UsersTable $Users
 */
class AuthController extends AppController
{

    /**
     * 初期化アクション
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    /**
     * ログインアクション
     *
     * @return \Cake\Network\Response|null
     */
    public function login()
    {
        $this->viewBuilder()->layout('login');
        $request = $this->request;
        // ポストデータがある？
        if ($request->is('post')) {
            // ログイン処理
            $user = $this->Auth->identify();
            if ($user != NULL) {
                // ユーザー情報をセクションに保存
                $this->Auth->setUser($user);
                // ログイン日時更新
                $this->Users->updateAll(['login_date' => Utility::dbDate()], ['id' => $user['id']]);
                // 表示ページへ遷移
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                // ログイン認証失敗
                $this->errorFlash([__('ユーザー名またはパスワードが正しくありません')]);
            }
        }
    }

    /**
     * ログアウトアクション
     *
     * @return \Cake\Network\Response|null
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
