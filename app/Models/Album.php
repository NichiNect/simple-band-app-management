<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    /**
     * Method relation One to Many with `Band` model `bands` table
     * One
     */
    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    /**
     * Method relation One to Many with `Lyric` model `lyrics` table
     * Many
     */
    public function lyrics()
    {
        return $this->hasMany(Lyric::class);
    }
}
