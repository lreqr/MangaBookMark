<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranobe extends Model
{
    /** @use HasFactory<\Database\Factories\RanobeFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function title()
    {
        return $this->belongsToMany(Title::class, 'title_publishers', 'publisher_id', 'title_id');
    }
}
