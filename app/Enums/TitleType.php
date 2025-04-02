<?php

namespace App\Enums;

enum TitleType
{
    public const RANOBE = 'ranobe';
    public const ANIME = 'anime';
    public const MANGA = 'manga';

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
