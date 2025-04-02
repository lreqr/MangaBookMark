<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    /** @use HasFactory<\Database\Factories\PublisherFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'names' => 'array',
    ];

    public function titles()
    {
        return $this->belongsToMany(Title::class, 'title_publishers', 'publisher_id', 'title_id');
    }
}
