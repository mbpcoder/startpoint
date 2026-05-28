<?php


namespace App\Enums;

use ReflectionEnum;

trait EnumOperationsTrait
{
    /**
     * @return bool
     */
    public static function isEnum(): bool
    {
        return new ReflectionEnum(self::class)->isEnum();
    }

    /**
     * @return bool
     */
    public static function isBackedEnum(): bool
    {
        return new ReflectionEnum(self::class)->isBacked();
    }

    /**
     * @return \ReflectionType|null
     */
    public static function getBackingType(): \ReflectionType|null
    {
        return new ReflectionEnum(self::class)->getBackingType();
    }

    /**
     * @param string $interfaceName
     * @return bool
     */
    public static function isImplementsInterface(string $interfaceName): bool
    {
        return new ReflectionEnum(self::class)->implementsInterface($interfaceName);
    }

    /**
     * @return array
     */
    public static function getList(): array
    {
        return self::isBackedEnum() ? array_column(self::cases(), 'value') : self::cases();
    }

    /**
     * @return string
     */
    public function trans(): string
    {
        $key = self::isBackedEnum() ? $this->value : $this->name;
        return trans('enums.' . $key);
    }

    /**
     * @param string $case
     * @return bool
     */
    public static function isValidCase(string $case): bool
    {
        return !is_null(self::tryFrom($case));
    }

}
