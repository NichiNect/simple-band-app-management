<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lyric extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'band_id',
        'album_id',
        'title',
        'slug',
        'body',
    ];

    /**
     * Method relation One to Many with `Album` model `albums` table
     * One
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * Method relation One to Many with `Band` model `bands` table
     * One
     */
    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
