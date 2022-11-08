<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class DiscountType
{
    const RATIO = "비율할인";
    const PRICE = "금액할인";

    public static function getValues()
    {
        return [self::RATIO, self::PRICE];
    }

    public static function options()
    {
        return [
            self::RATIO => "비율할인",
            self::PRICE => "금액할인",
        ];
    }
}
