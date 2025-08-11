<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Filmes;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function index() {
        $lista = session()->get('lista', []);
        $categorias = Categorias::all();
        return view('lista.index', compact('lista', 'categorias'));
   }

   public function store(Filmes $filme)
    {
        $lista = session()->get('lista', []);

        if (isset($lista[$filme->id])) {
            if (!isset($lista[$filme->id]['quantidade'])) {
                $lista[$filme->id]['quantidade'] = 1;
            }
            $lista[$filme->id]['quantidade'] += 1;
        } else {
            $lista[$filme->id] = [
                'id' => $filme->id,
                'nome' => $filme->nome,
                'sinopse' => $filme->sinopse,
                'ano' => $filme->ano,
                'imagem' => $filme->imagem,
                'categoria_id' => $filme->categoria_id,
                'trailer' => $filme->trailer,
                'quantidade' => 1
            ];
        }

        session()->put('lista', $lista);

        return redirect()->route('lista.index')->with('success', 'Filme adicionado a lista!');
    }
    
    public function destroy($id) {
        $lista = session()->get('lista', []);
        if (isset($lista[$id])) {
            unset($lista[$id]);
            session()->put('lista', $lista);
        }
        return redirect()->route('lista.index')->with('success', 'Filme removido da lista!');
    }
}

