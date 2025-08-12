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
            'imagem' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Buster_and_godfather_%283996544278%29.jpg/640px-Buster_and_godfather_%283996544278%29.jpg',
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
            'imagem' => 'https://m.media-amazon.com/images/S/pv-target-images/3f122417c55feda5c465f701320892661bfea27c1dfcff81e7fb0641ba29171c.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=YoHD9XEInc0',
            'categoria_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'Forrest Gump',
            'sinopse' => 'A vida de um homem simples que testemunha grandes eventos históricos.',
            'ano' => '1994-01-01',
            'imagem' => 'https://http2.mlstatic.com/D_NQ_NP_881591-MLA74142628762_012024-B.webp',
            'trailer' => 'https://www.youtube.com/watch?v=bLvqoHBptjg',
            'categoria_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Filmes::create([
            'nome' => 'O Senhor dos Anéis: A Sociedade do Anel',
            'sinopse' => 'Um grupo parte em uma jornada para destruir um anel maligno.',
            'ano' => '2001-01-01',
            'imagem' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEinLD-vq9ZFgAo_-cNKPOwRUkawPZXlwRQhc0mgnhDX4a6j5B1qF32YPYPpwQZFrRAnu2jgsJXbKR998Qt0IjfzCSzVSFZDk8dhs9wOs_BQDGAxDmeJQ4JDl-bJqHoRm3k8j0F2Bo4Jd4lx9wuRze9uzD52c6R-JaTfbzVWtsuFbLfn2OlI38piOMpA/s2806/00%20-%20O%20Senhor%20dos%20An%C3%A9is%20A%20Sociedade%20do%20Anel%20(2001).jpg',
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