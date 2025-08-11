@php
use Carbon\Carbon;
use Illuminate\Support\Str;
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
                <option value="{{ $categoria->id }}" @if(request('categoria_id')==$categoria->id) selected @endif>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded shadow">Filtrar</button>
    </form>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($filmes as $filme)
    <div 
        onclick="window.location='{{ route('filmes.show', $filme->id) }}'"
        class="card-filme relative rounded overflow-hidden shadow-lg cursor-pointer group h-64">

        {{-- Imagem --}}
        @if($filme->imagem)
            @if(Str::startsWith($filme->imagem, 'http'))
                <img src="{{ $filme->imagem }}" alt="{{ $filme->nome }}" class="img-card">
            @else
                <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->nome }}" class="img-card">
            @endif
        @endif

        {{-- Título --}}
        <div class="titulo-card">
            <h2>{{ $filme->nome }}</h2>
        </div>

        {{-- Overlay com infos --}}
        <div class="overlay-card">
            <p class="mb-2 text-center">{{ $filme->sinopse }}</p>
            <p class="text-sm">Ano: {{ Carbon::parse($filme->ano)->format('Y') }}</p>
            <p class="text-sm mb-2">Categoria: {{ $filme->categoria->nome ?? 'Sem categoria' }}</p>

            @if($filme->trailer)
                <a href="{{ $filme->trailer }}" target="_blank" onclick="event.stopPropagation()" class="btn-azul">
                    Ver Trailer
                </a>
            @endif

            @if(Auth::check() && Auth::user()->nivel_acesso == 1)
            <div class="flex gap-2 mt-2">
                <a href="{{ route('filmes.edit', $filme->id) }}" class="btn-amarelo">Editar</a>
                <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este filme?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-vermelho">Excluir</button>
                </form>
            </div>
            @endif

            <form action="{{ route('lista.store', $filme->id) }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class=" arredondar btn-verde">
                    <span class="plus  material-symbols-outlined">add_circle</span>
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>






</div>
</div>
@endsection