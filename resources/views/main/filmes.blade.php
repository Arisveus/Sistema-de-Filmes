@php 
use Carbon\Carbon;
@endphp
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex items-center justify-between mb-6">
        
        <a href="{{ route('filmes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">Adicionar Filme</a>
    </div>
    <div class="inicio block bg-white  shadow p-4  mb-6">
            <p class="bem-vindos">Bem vindos ao <br> Step Brother's Films!</p>
        </div>
    <form method="GET" action="{{ route('filmes.index') }}" class="mb-6 flex flex-wrap gap-4 items-center">
        <div>
            <label for="ano" class="font-semibold">Ano:</label>
            <input type="number" name="ano" id="ano" value="{{ request('ano') }}" class="border rounded px-2 py-1 w-24">
        </div>
        <div>
            <label for="categoria_id" class="font-semibold">Categoria:</label>
            <select name="categoria_id" id="categoria_id" class="border rounded px-2 py-1">
                <option value="">Todas</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if(request('categoria_id') == $categoria->id) selected @endif>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded shadow">Filtrar</button>
    </form>
   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($filmes as $filme)
        <div 
            onclick="window.location='{{ route('filmes.show', $filme->id) }}'" 
            class="bg-white rounded shadow p-4 hover:ring-2 hover:ring-blue-400 transition-all cursor-pointer relative"
        >
            @if($filme->imagem)
                <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->nome }}" class="w-full h-48 object-cover mb-4 rounded">
            @endif
            <h2 class="text-xl font-semibold">{{ $filme->nome }}</h2>
            <p class="text-gray-700 mb-2">{{ $filme->sinopse }}</p>
            <p class="text-gray-500">Ano: {{ Carbon::parse($filme->ano)->format('Y') }}</p>
            <p class="text-gray-500">Categoria: {{ $filme->categoria->nome ?? 'Sem categoria' }}</p>

            @if($filme->trailer)
                <a 
                    href="{{ $filme->trailer }}" 
                    target="_blank" 
                    class="text-blue-600 underline mb-2 block mt-2"
                    onclick="event.stopPropagation()" 
                >
                    Ver Trailer
                </a>
            @endif

            @if(Auth::check() && Auth::user()->nivel_acesso == 1)
                <div class="flex gap-2 mt-2">
                    <a href="{{ route('filmes.edit', $filme->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded shadow">Editar</a>
                    <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este filme?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded shadow">Excluir</button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
</div>


      
    </div>
</div>
@endsection
