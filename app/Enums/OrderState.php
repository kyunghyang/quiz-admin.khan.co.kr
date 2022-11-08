<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class OrderState
{
    const FAIL = "FAIL"; // 결제실패
    const WAIT = "WAIT"; // 입금대기
    const CANCEL = "CANCEL"; // 주문취소
    const SUCCESS = "SUCCESS"; // 주문성공
    const REFUND = "REFUND"; // 환불
    const REFUNDING = "REFUNDING"; // 환불진행중

    public static function getValues()
    {
        return [self::FAIL, self::WAIT, self::SUCCESS, self::REFUND,self::REFUNDING, self::CANCEL];
    }

    public static function options()
    {
        return [
            self::FAIL => "결제실패",
            self::WAIT => "입금대기",
            self::CANCEL => "주문취소",
            self::SUCCESS => "주문성공",
            self::REFUND => "환불",
            self::REFUNDING => "환불진행중",
        ];
    }
}
