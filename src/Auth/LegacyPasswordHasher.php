<?php
// * Copyright (c) ASC All Rights Reserved.
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// * システム名称  ： ファクトシート事業部 業務連絡システム
// * モジュール名称： パスワード暗号化
// * モジュールID  ： LegacyPasswordHasher
// * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// * ［変更履歴］
// * 2016.05.16 Hieunld    ：新規作成
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
namespace App\Auth;

use Cake\Auth\AbstractPasswordHasher;

class LegacyPasswordHasher extends AbstractPasswordHasher
{

//    /**
//     * オーバーライド：暗号化無し
//     *
//     * @param array|string $password
//     * @return array|string
//     */
//    public function hash($password)
//    {
//        return $password;
//    }
//
//    /**
//     * オーバーライド：パスワードチェック
//     * @param array|string $password
//     * @param string $hashedPassword
//     * @return bool
//     */
//    public function check($password, $hashedPassword)
//    {
//        return $password === $hashedPassword;
//    }
}