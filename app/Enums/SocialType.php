<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2021-01-31
 * Time: 오후 4:04
 */

namespace App\Enums;


final class SocialType
{
    const YOUTUBE = "유튜브";
    const FACEBOOK = "페이스북";
    const NAVER = "네이버블로그";
    const INSTAGRAM = "인스타그램";

    public static function getValues()
    {
        return [
            self::YOUTUBE,
            self::FACEBOOK,
            self::NAVER,
            self::INSTAGRAM,
        ];
    }

    public static function options()
    {
        return [
            self::YOUTUBE => "유튜브",
            self::FACEBOOK => "페이스북",
            self::NAVER => "네이버블로그",
            self::INSTAGRAM => "인스타그램",
        ];
    }
}
