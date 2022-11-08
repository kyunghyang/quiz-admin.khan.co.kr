<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class QnaState
{
    const WAIT = "접수";
    const DONE = "처리완료";

    public static function getValues()
    {
        return [self::WAIT, self::DONE];
    }

    public static function options()
    {
        return [
            self::WAIT => "접수",
            self::DONE => "처리완료",
        ];
    }
}
