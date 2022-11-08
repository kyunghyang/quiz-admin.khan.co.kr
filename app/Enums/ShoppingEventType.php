<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class ShoppingEventType
{
    const EVENT = "이벤트"; // 이벤트
    const SPECIAL = "기획전"; // 기획전

    public static function getValues()
    {
        return [self::EVENT, self::SPECIAL];
    }

    public static function options()
    {
        return [
            self::EVENT => "이벤트",
            self::SPECIAL => "기획전",
        ];
    }
}
