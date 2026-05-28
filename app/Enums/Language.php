<?php

namespace App\Enums;

enum Language: string
{
    use EnumOperationsTrait;

    case FA = 'fa';
    case EN = 'en';
    case AR = 'ar';

    public static function enabledLanguages(): array
    {
        return [
            self::FA,
            self::EN,
            self::AR,
        ];
    }

    public static function rtlLanguages(): array
    {
        return [
            self::FA,
            self::AR,
        ];
    }

    public function isRtl(): bool
    {
        return in_array($this, self::rtlLanguages());
    }

    public function direction(): string
    {
        return $this->isRtl() ? 'rtl' : 'ltr';
    }

    public function label(): string
    {
        return match($this) {
            self::FA => 'فارسی',
            self::EN => 'English',
            self::AR => 'العربية',
        };
    }
}
