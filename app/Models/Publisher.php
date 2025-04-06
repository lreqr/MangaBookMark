<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    /** @use HasFactory<\Database\Factories\PublisherFactory> */
    use HasFactory;

    protected $casts = [
        'names' => 'array',
    ];

    public function publisherable()
    {
        return $this->morphedByMany(Ranobe::class, 'publisherable');
//            ->union($this->morphedByMany(Anime::class, 'publisherable'))
//            ->union($this->morphedByMany(Manga::class, 'publisherable'))
//            ->union($this->morphedByMany(Ranobe::class, 'publisherable'));
    }
}
