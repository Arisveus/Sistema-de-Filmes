<?php

namespace App\Http\Controllers;

use App\Models\Filmes;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index()
    {
        $filmes = Filmes::all();
        return view('filmes/index', [
            'filmes' => $filmes,
        ]);
    }

    public function show($id)
    {
        return view('filmes.show', ['id' => $id]);
    }

    public function create()
    {
        $filmes = Filmes::all();
        return view('filmes.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        // Lógica para armazenar o filme
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sinopse' => 'required|string|max:1000',
            'ano' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:avif,jpeg,png,jpg,gif|max:2048',
            
        ]);

        $caminhoImagem = null;
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('filmes', 'public');
            $validated['imagem'] = $caminhoImagem;
        }
        Filmes::create($validated);
        return redirect()->route('filmes.index');
    }

    // public function edit($id)
    // {
    //     return view('filmes.edit', ['id' => $id]);
    // }

    // public function update(Request $request, $id)


}
