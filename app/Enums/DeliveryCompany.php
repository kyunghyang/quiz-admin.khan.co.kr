<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class DeliveryCompany
{
    const CJ = "CJ대한통운";
    const LOGEN = "로젠택배";

    public static function getValues()
    {
        return [self::LOTTE, self::CJ, self::HANJIN, self::LOGEN];
    }

    public static function options()
    {
        return [
            /*self::LOTTE => "롯데택배",
            self::CJ => "CJ대한통운",
            self::HANJIN => "한진택배",*/
            self::LOGEN => "로젠택배",
        ];
    }
}
