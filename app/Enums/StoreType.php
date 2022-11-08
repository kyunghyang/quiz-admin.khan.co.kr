<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class StoreType
{
    const DEPARTMENT = "백화점";
    const AGENCY = "대리점";

    public static function getValues()
    {
        return [self::DEPARTMENT, self::AGENCY];
    }

    public static function options()
    {
        return [
            self::DEPARTMENT => "백화점",
            self::AGENCY => "대리점"
        ];
    }
}
