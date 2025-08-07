<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Categorias extends Model
{
    protected $fillable = [
        'nome',
    ];

    public function filmes() : HasMany
        {
            return $this->hasMany(Filmes::class);
        }
}