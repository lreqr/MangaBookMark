<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    /** @use HasFactory<\Database\Factories\TitleFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'avatar_images' => 'array',
        'alternative_names' => 'array',
    ];

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'title_publishers', 'title_id', 'publisher_id');
    }

    public function franchises()
    {
        return $this->belongsToMany(Franchise::class, 'title_franchises', 'title_id', 'franchise_id');
    }

    public function authors()
    {
        return $this->belongsToMany(People::class, 'title_authors', 'title_id', 'people_id');
    }

    public function artists()
    {
        return $this->belongsToMany(People::class, 'title_artists', 'title_id', 'people_id');
    }

}
