<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    /** @use HasFactory<\Database\Factories\PeopleFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'names' => 'array',
    ];

    public function authoredTitles()
    {
        return $this->belongsToMany(Title::class, 'title_authors', 'people_id', 'title_id');
    }

    public function illustratedTitles()
    {
        return $this->belongsToMany(Title::class, 'title_artists', 'people_id', 'title_id');
    }
}
