<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class OrderProductState
{
    const FAIL = "주문실패"; // 주문실패
    const WAIT = "주문접수"; // 주문접수
    const READY = "상품준비"; // 상품준비
    const ONGOING = "배송중"; // 배송중
    const DONE = "배송완료"; // 배송완료
    const REFUND = "반품"; // 반품
    const TRANSLATE = "교환"; // 교환
    const CANCEL = "취소"; // 취소

    public static function getValues()
    {
        return [self::FAIL, self::WAIT, self::READY, self::ONGOING,self::DONE, self::REFUND, self::TRANSLATE, self::CANCEL];
    }

    public static function options()
    {
        return [
            self::FAIL => "주문실패",
            self::WAIT => "주문접수",
            self::READY => "상품준비",
            self::ONGOING => "배송시작",
            self::DONE => "배송완료",
            self::REFUND => "반품",
            self::TRANSLATE => "교환",
            self::CANCEL => "취소",
            // "배송완료" => self::DONE
        ];
    }
}
