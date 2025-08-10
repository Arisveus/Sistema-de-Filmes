<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Filmes extends Model
{
    protected $fillable = [
        'nome',
        'sinopse',
        'ano',
        'categoria_id',
        'imagem',
        'trailer',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categoria() : BelongsTo
    {
        return $this->belongsTo(Categorias::class);
    }

}
