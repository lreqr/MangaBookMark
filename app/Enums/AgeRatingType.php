<?php

namespace App\Enums;

class AgeRatingType
{
    public const NO = 0;
    public const SIX_PLUS = 1;
    public const TWELVE_PLUS = 2;
    public const SIXTEEN_PLUS = 3;
    public const EIGHTEEN_PLUS = 4;

    public static function getLabel(int $value): string
    {
        return match ($value) {
            self::NO => 'нет',
            self::SIX_PLUS => '6+',
            self::TWELVE_PLUS => '12+',
            self::SIXTEEN_PLUS => '16+',
            self::EIGHTEEN_PLUS => '18+',
            default => 'неизвестно',
        };
    }
}

