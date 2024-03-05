<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;

    public function artistas()
    {
        return $this->belongsToMany(Artista::class);
    }

    public function albunes()
    {
        return $this->belongsToMany(Album::class);
    }
}
