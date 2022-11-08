<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class FaqType
{
    const PRODUCT = "제품관련";
    const ORDER = "구매관련";
    const USER = "회원정보관련";
    const AS = "A/S안내";
    const OTHER = "기타";

    public static function getValues()
    {
        return [
            self::PRODUCT,
            self::ORDER,
            self::USER,
            self::AS,
            self::OTHER
        ];
    }

    public static function options()
    {
        return [
            self::PRODUCT => "제품관련",
            self::ORDER => "구매관련",
            self::USER => "회원정보관련",
            self::AS => "A/S안내",
            self::OTHER => "기타",
        ];
    }
}
