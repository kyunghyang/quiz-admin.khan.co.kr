<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class QnaType
{
    const DIRECT = "1대1문의";
    const AFTER_SERVICE = "AS";

    public static function getValues()
    {
        return [
            self::DIRECT,
            self::AFTER_SERVICE,
        ];
    }

    public static function options()
    {
        return [
            self::DIRECT => "1대1문의",
            self::AFTER_SERVICE => "AS",
        ];
    }
    /*const FRAME = "침대프레임";
    const MATTRESS1 = "흙보료";
    const MATTRESS2 = "흙매트";
    const MOVE = "이사 서비스";

    public static function getValues()
    {
        return [
            self::FRAME,
            self::MATTRESS1,
            self::MATTRESS2,
            self::MOVE,
        ];
    }

    public static function options()
    {
        return [
            self::FRAME => "침대프레임",
            self::MATTRESS1 => "흙보료",
            self::MATTRESS2 => "흙매트",
            self::MOVE => "이사 서비스",
        ];
    }*/
}
