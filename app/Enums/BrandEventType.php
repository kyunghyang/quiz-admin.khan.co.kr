<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class BrandEventType
{
    const EVENT = "이벤트";
    const LUCKY = "당첨자 발표";
    const SNS = "SNS";

    public static function getValues()
    {
        return [self::EVENT, self::LUCKY, self::SNS];
    }

    public static function options()
    {
        return [
            self::EVENT => "이벤트",
            self::LUCKY => "당첨자 발표",
            self::SNS => "SNS",
        ];
    }
}
