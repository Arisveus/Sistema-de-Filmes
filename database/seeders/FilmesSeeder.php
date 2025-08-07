<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmesSeeder extends Seeder
{
    public function run()
    {
        DB::table('filmes')->insert([
            [
                'titulo' => 'O Poderoso Chefão',
                'categoria_id' => 1, // Exemplo de categoria
                'ano' => 1972,
                'diretor' => 'Francis Ford Coppola',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Pulp Fiction',
                'categoria_id' => 2,
                'ano' => 1994,
                'diretor' => 'Quentin Tarantino',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'A Origem',
                'categoria_id' => 3,
                'ano' => 2010,
                'diretor' => 'Christopher Nolan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}