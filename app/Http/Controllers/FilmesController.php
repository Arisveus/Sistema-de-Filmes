<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Filmes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index()
    {
        $query = Filmes::with('categoria');
        if (request('ano')) {
            $query->whereYear('ano', request('ano'));
        }
        if (request('categoria_id')) {
            $query->where('categoria_id', request('categoria_id'));
        }
        $filmes = $query->get();
        $categorias = Categorias::all();
        return view('main.filmes', [
            'filmes' => $filmes,
            'categorias' => $categorias,
        ]);
    }

    public function show($id)
    {
        $filme = Filmes::with('categoria')->findOrFail($id);
        return view('main.show', compact('filme'));
    }

    public function create()
    {
        $categorias = Categorias::all();
        return view('create.filme', compact('categorias'));
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
            'trailer' => 'nullable|url',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('filmes', 'public');
        } else {
            unset($validated['imagem']);
        }
        Filmes::create($validated);
        return redirect()->route('filmes.index');
    }

    public function edit($id)
    {
        $filme = Filmes::findOrFail($id);
        $categorias = Categorias::all();
        return view('main.editar', compact('filme', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->nivel_acesso != 1) {
            abort(403, 'Acesso não autorizado.');
        }
        $filme = Filmes::findOrFail($id);
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sinopse' => 'required|string|max:1000',
            'ano' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:avif,jpeg,png,jpg,gif|max:2048',
            'trailer' => 'nullable|url',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('filmes', 'public');
        }

        $filme->update($validated);
        return redirect()->route('filmes.index')->with('success', 'Filme atualizado com sucesso!');
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->nivel_acesso != 1) {
            abort(403, 'Acesso não autorizado.');
        }
        $filme = Filmes::findOrFail($id);
        if ($filme->imagem) {
            Storage::disk('public')->delete($filme->imagem);
        }
        $filme->delete();
        return redirect()->route('filmes.index')->with('success', 'Filme excluído com sucesso!');
    }
}
