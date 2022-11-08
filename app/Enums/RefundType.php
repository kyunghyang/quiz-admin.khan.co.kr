<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class RefundType
{
    const REFUND = "반품";
    const TRANSLATE = "교환";
    const CANCEL = "취소";

    public static function getValues()
    {
        return [self::REFUND, self::TRANSLATE, self::CANCEL];
    }

    public static function options()
    {
        return [
            self::REFUND => "반품",
            self::TRANSLATE => "교환",
            self::CANCEL => "취소",
        ];
    }
}
