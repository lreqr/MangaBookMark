<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    /** @use HasFactory<\Database\Factories\FranchiseFactory> */
    use HasFactory;

    protected $casts = [
        'names' => 'array',
    ];

    public function franchiseable()
    {
        return $this->morphedByMany(Ranobe::class, 'franchiseable');
//            ->union($this->morphedByMany(Anime::class, 'publisherable'))
//            ->union($this->morphedByMany(Manga::class, 'publisherable'))
//            ->union($this->morphedByMany(Ranobe::class, 'publisherable'));
    }
}
