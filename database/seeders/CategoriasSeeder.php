<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorias::create([
            'nome' => 'Drama'
        ]);

        Categorias::create([
            'nome' => 'Ação'
        ]);
        
        Categorias::create([
            'nome' => 'Ficção'
        ]);
    }
}
