<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class KakaoTemplate
{
    const ORDER_SUCCESS = "ORDER_SUCCESS"; // 주문완료
    const ANSWER_REGISTER = "ANSWER_REGISTER"; // 답변등록
    const PASSWORD_RESET = "PASSWORD_RESET"; // 비밀번호 초기화
    const NUMBER_SEND = "NUMBER_SEND"; // 인증번호발송
    // const START_DELIVERY = "DELIVERY_DONE"; // 배송완료

    public static function getTemplateId($template)
    {
        $templateIds = [
            self::ORDER_SUCCESS =>  "KA01TP220913023424774QAWH0zC2KTx",
            self::ANSWER_REGISTER =>  "KA01TP220913023047840j1uTGe4O41d",
            self::PASSWORD_RESET =>  "KA01TP220913022247340CLqIkHqbS4h",
            self::NUMBER_SEND =>  "KA01TP220913021350405DkIfcZILSCY",
        ];

        return $templateIds[$template];
    }

    public static function getValues()
    {
        return [
            self::ORDER_SUCCESS,
            self::ANSWER_REGISTER,
            self::PASSWORD_RESET,
            self::NUMBER_SEND,
        ];
    }
}
