<?php

namespace App\Enums;

enum Language: string
{
    use EnumOperationsTrait;

    case FA = 'fa';
    case EN = 'en';
    case AR = 'ar';


    public static function enableLanguages(): array
    {
        return [
            self::EN,
            self::FA,
        ];
    }


    public static function rtlLanguages(): array
    {
        return [
            self::FA,
            self::AR,
        ];
    }
}

