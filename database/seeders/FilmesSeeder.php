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
            'imagem' => null,
            'trailer' => 'https://www.youtube.com/watch?v=sY1S34973zA',
            'categoria_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'Pulp Fiction',
            'sinopse' => 'Histórias entrelaçadas de crime e redenção em Los Angeles.',
            'ano' => '1994-01-01',
            'imagem' => null,
            'trailer' => 'https://www.youtube.com/watch?v=tGpTpVyI_OQ',
            'categoria_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'A Origem',
            'sinopse' => 'Um ladrão invade sonhos para roubar segredos e plantar ideias.',
            'ano' => '2010-01-01',
            'imagem' => null,
            'trailer' => 'https://www.youtube.com/watch?v=YoHD9XEInc0',
            'categoria_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'Forrest Gump',
            'sinopse' => 'A vida de um homem simples que testemunha grandes eventos históricos.',
            'ano' => '1994-01-01',
            'imagem' => null,
            'trailer' => 'https://www.youtube.com/watch?v=bLvqoHBptjg',
            'categoria_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'O Senhor dos Anéis: A Sociedade do Anel',
            'sinopse' => 'Um grupo parte em uma jornada para destruir um anel maligno.',
            'ano' => '2001-01-01',
            'imagem' => null,
            'trailer' => 'https://www.youtube.com/watch?v=V75dMMIW2B4',
            'categoria_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'Matrix',
            'sinopse' => 'Um hacker descobre a verdade sobre sua realidade simulada.',
            'ano' => '1999-01-01',
            'imagem' => null,
            'trailer' => 'https://www.youtube.com/watch?v=vKQi3bBA1y8',
            'categoria_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}