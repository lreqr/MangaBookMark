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
    ];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
