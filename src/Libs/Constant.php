<?php
// * Copyright (c) ASC All Rights Reserved.
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// * システム名称  ： ファクトシート事業部 業務連絡システム
// * モジュール名称： コンスタント管理
// * モジュールID  ： Constant
// * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// * ［変更履歴］
// * 2016.05.16 Hieunld    ：新規作成
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
namespace App\Libs;

class Constant
{

    // ページのタイトル
    const C_TITLE = 'MAINICHI';
    // ログインコントローラー定義
    static $C_ROUTE_DEFAULT = ['controller' => 'Pages', 'action' => 'home'];
    static $C_ROUTE_LOGIN = ['controller' => 'Auth', 'action' => 'login'];
    // ログイン成功時、遷移ページ
    static $C_ROUTE_LOGIN_REDIRECT = ['controller' => 'Daily', 'action' => 'index'];
    // ログアウト後、遷移ページ
    static $C_ROUTE_LOGOUT_REDIRECT = ['controller' => 'Auth', 'action' => 'login'];

    // ユーザーの権限
    const C_USER_ROLE_SUPER = 0;
    const C_USER_ROLE_ADMIN = 1;
    const C_USER_ROLE_USER  = 2;
    static $C_USER_ROLE = [
        'SUPER',
        self::C_USER_ROLE_ADMIN => 'ADMIN',
        self::C_USER_ROLE_USER => 'USER'
    ];

    static $C_USER_CURRENCY = [1 => '¥', 'VND'];

    // 日付フォーマット
    const C_YMD_BR_HI = "Y/m/d \n H:i";
    const C_YMD_HIS = 'Y/m/d H:i:s';
    const C_YMD_HIS_DB = 'Y-m-d H:i:s';
    const C_YMD_DB = 'Y-m-d';
    const C_YMD_UI = 'Y/m/d';
    const C_YMD = 'ymd';
    const C_YMD_HIS_FILE = 'ymdHis';

    // DBの削除フラグの値
    const C_OFF = FALSE;
    const C_ON = TRUE;



    // 指示種別の値
    const C_INDICATION_TYPE_CONTACT = 1;
    const C_INDICATION_TYPE_IMPORTANT = 2;
    const C_INDICATION_TYPE_EMERGENCY = 3;
    // 指示種別の表示

    // 指示の対応の値
    const C_INDICATION_STATUS_NOT_YES = 1;
    const C_INDICATION_STATUS_PROCESS = 2;
    const C_INDICATION_STATUS_ALREADY = 3;

    // 物件のCSVファイルのタイプ
    const C_BUKKEN_TYPE_SHUTOKEN = 1;
    const C_BUKKEN_TYPE_KINKI = 2;


    // ファイル保存のフォルダー
    const C_INDICATION_FILE_PATH = 'upload';
    // フォルダーの権限
    const C_FOLDER_PERMISSION = 0777;

    // 指示のデフォルトの並び替え
    const C_INDICATION_DEFAULT_SORT = 'DESC';

    // アップロードファイルの制限数
    const C_LIMIT_FILE = 10;
    // 全アップロードファイルの容量制限
    // 物件インポートファイルの拡張子
    const C_BUKKEN_EXTENSION = 'csv';
    // ファイルのエンコード
    const C_SHIFTJIS_ENCODING = 'SHIFT-JIS';
    const C_UTF8_ENCODING = 'UTF-8';
    // CSVファイルの項目数
    const C_CSV_COL = 8;

    // 古いデータの期間
    const C_OLD_DATA_TIME = "-90 day";

    //
    const C_DB_LENGTH_50 = 50;
    const C_DB_LENGTH_255 = 255;
    const C_DB_LENGTH_10 = 10;

    //
    const C_CATEGORY_INPUT = '入力';
}