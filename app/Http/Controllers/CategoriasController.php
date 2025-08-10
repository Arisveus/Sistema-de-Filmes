<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index', [
            'categorias' => $categorias,
        ]);
    }
    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Categorias::create($request->only('nome'));

        return redirect()->route('categorias.index');
    }

    public function show(Categorias $categoria)
    {
        $filmes = $categoria->filmes;
        return view('categorias.show', compact('categoria', 'filmes'));
    }
}
