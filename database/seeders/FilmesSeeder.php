<?php

namespace Database\Seeders;

use App\Models\Filmes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmesSeeder extends Seeder
{
    public function run()
    {
        Filmes::create([
            'nome' => 'O Poderoso Chefão',
            'sinopse' => 'Um patriarca do crime organiza a sucessão de seu império familiar.',
            'ano' => '1972-01-01',
            'imagem' => 'https://upload.wikimedia.org/wikipedia/pt/0/05/The_Godfather_poster.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=sY1S34973zA',
            'categoria_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'Pulp Fiction',
            'sinopse' => 'Histórias entrelaçadas de crime e redenção em Los Angeles.',
            'ano' => '1994-01-01',
            'imagem' => 'https://upload.wikimedia.org/wikipedia/pt/8/82/Pulp_Fiction_cover.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=tGpTpVyI_OQ',
            'categoria_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'A Origem',
            'sinopse' => 'Um ladrão invade sonhos para roubar segredos e plantar ideias.',
            'ano' => '2010-01-01',
            'imagem' => 'https://upload.wikimedia.org/wikipedia/pt/2/2e/Inception_%282010%29.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=YoHD9XEInc0',
            'categoria_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'Forrest Gump',
            'sinopse' => 'A vida de um homem simples que testemunha grandes eventos históricos.',
            'ano' => '1994-01-01',
            'imagem' => 'https://upload.wikimedia.org/wikipedia/pt/6/67/Forrest_Gump_poster.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=bLvqoHBptjg',
            'categoria_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'O Senhor dos Anéis: A Sociedade do Anel',
            'sinopse' => 'Um grupo parte em uma jornada para destruir um anel maligno.',
            'ano' => '2001-01-01',
            'imagem' => 'https://upload.wikimedia.org/wikipedia/pt/8/87/The_Fellowship_of_the_Ring_poster.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=V75dMMIW2B4',
            'categoria_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'Matrix',
            'sinopse' => 'Um hacker descobre a verdade sobre sua realidade simulada.',
            'ano' => '1999-01-01',
            'imagem' => 'https://upload.wikimedia.org/wikipedia/pt/c/c1/The_Matrix_Poster.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=vKQi3bBA1y8',
            'categoria_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}