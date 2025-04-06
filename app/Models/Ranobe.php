<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranobe extends Model
{
    /** @use HasFactory<\Database\Factories\RanobeFactory> */
    use HasFactory;

    protected $casts = [
        'avatar_images' => 'array',
        'alternative_names' => 'array',
    ];

    public function publishers()
    {
        return $this->morphToMany(Publisher::class, 'publisherable', 'publisherables');
    }

    public function franchises()
    {
        return $this->morphToMany(Franchise::class, 'franchiseable', 'franchiseables');
    }

    public function authors()
    {
        return $this->morphToMany(People::class, 'authorable', 'authorables');
    }

    public function artists()
    {
        return $this->belongsToMany(People::class, 'title_artists', 'title_id', 'people_id');
    }
}
