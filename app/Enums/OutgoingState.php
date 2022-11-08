<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class OutgoingState
{
    const FAIL = "FAIL"; // 주문실패
    const WAIT = "WAIT"; // 주문접수
    const READY = "READY"; // 상품준비
    const ONGOING = "ONGOING"; // 배송중
    const DONE = "DONE"; // 배송완료

    public static function getValues()
    {
        return [self::FAIL, self::WAIT, self::READY, self::ONGOING,self::DONE];
    }

    public static function options()
    {
        return [
            self::FAIL => "주문실패",
            self::WAIT => "주문접수",
            self::READY => "상품준비",
            self::ONGOING => "배송시작",
            self::DONE => "배송완료"
            // "배송완료" => self::DONE
        ];
    }
}
