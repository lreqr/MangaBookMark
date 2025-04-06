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

    public function authorable()
    {
        return $this->morphedByMany(Ranobe::class, 'authorable');
    }

    public function artistable()
    {
        return $this->morphedByMany(Ranobe::class, 'artistable');
    }
}
