<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class SiteType
{
    const SHOPPING = "쇼핑몰";
    const BRAND = "브랜드";

    public static function getValues()
    {
        return [self::SHOPPING, self::BRAND];
    }

    public static function options()
    {
        return [
            self::SHOPPING => "쇼핑몰",
            self::BRAND => "브랜드",
        ];
    }
}
