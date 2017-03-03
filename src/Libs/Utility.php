<?php
// * Copyright (c) ASC All Rights Reserved.
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// * システム名称  ： ファクトシート事業部 業務連絡システム
// * モジュール名称： 共通関数
// * モジュールID  ： Utility
// * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// * ［変更履歴］
// * 2016.05.16 Hieunld    ：新規作成
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
namespace App\Libs;

use DateTime;

class Utility
{
    /**
     * Entityの整合性チェックエラーから配列に設定する
     *
     * @param array $errors
     * @return array
     */
    public static function getErrors($errors = [])
    {
        if (!is_array($errors)) {
            return $errors;
        }
        $result = [];
        foreach ($errors as $key => $error) {
            if (!is_array($error)) {
                $result[$key][] = $error;
            } else {
                foreach ($error as $item) {
                    if (!is_array($item)) {
                        $result[$key][] = $item;
                    } else {
                        $result[$key][] = $item['message'];
                    }
                }
            }
        }

        return $result;
    }

    /**
     * @return bool|string
     */
    public static function dbDate()
    {
        return self::createDate(Constant::C_YMD_HIS_DB);
    }

    /**
     * @return bool|string
     */
    public static function uiDate()
    {
        return self::createDate(Constant::C_YMD_DB);
    }

    /**
     * 日付フォーマットを変換する
     *
     * @param $strFormat ：フォーマット
     * @param string $strDate ：日付、空白の場合は、今日にする
     * @return bool|string
     */
    public static function createDate($strFormat, $strDate = '')
    {
        if ($strDate) {
            return date($strFormat, strtotime($strDate));
        }

        return date($strFormat);
    }

    /**
     * 受付番号を作成する
     *
     * @param $strUketukeNo ：採番
     * @param $strCurrent ：日付
     * @return string
     */
    public static function createUketukeNo($strUketukeNo, $strCurrent)
    {
        return $strCurrent . '-' . str_pad($strUketukeNo, 3, '0', STR_PAD_LEFT);
    }

    public static function slidePath($strName)
    {
        return 'slides/' . $strName;
    }

    /**
     * 唯一ファイル名を作成する
     *
     * @param $strFileName
     * @param $intFileKey
     * @return string
     *
     * 例：
     * $strFileName = aaaa.png
     * $intFileKey = 4
     * return: ymdHis_005.png
     */
    public static function createImageName($strFileName, $intFileKey)
    {
        // ファイルの拡張子取得
        $aryListFileDetail = explode('.', $strFileName);
        $strExt = '';
        if (count($aryListFileDetail) > 0) {
            $strExt = '.' . end($aryListFileDetail);
        }
        return sprintf("%s", date(Constant::C_YMD_HIS_FILE, microtime(true)))
        . '_'
        . str_pad($intFileKey + 1, 3, '0', STR_PAD_LEFT)
        . $strExt;
    }

    static public function getTimestampFrom($date) {
        $date = new DateTime($date);
        return $date->getTimestamp() . '000';
    }
}