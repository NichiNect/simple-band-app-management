<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * Method relation Many to Many with `Band` model `bands` table
     * Many
     */
    public function bands()
    {
        return $this->belongsToMany(Band::class, 'band_genre');
    }
}
