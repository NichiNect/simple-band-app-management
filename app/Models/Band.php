<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
    ];

    /**
     * Method relation One to Many with `Album` model `albums` table
     * Many
     */
    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    /**
     * Method relation Many to Many with `Genre` model `genres` table
     * Many
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'band_genre');
    }
}
