@php
use Carbon\Carbon;
use Illuminate\Support\Str;
@endphp
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
@if(Auth::check() && Auth::user()->nivel_acesso == 1)
    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('filmes.create') }}" class="btn-adicionar-filme text-white  shadow">Adicionar Filme</a>
    </div>
    @endif
    <div class="inicio block bg-white  shadow p-4  mb-6">
        <p class="bem-vindos">Bem vindos ao <br> Step Brother's Films!</p>
    </div>
    <div class="filtro">
    <form method="GET" action="{{ route('filmes.index') }}" class="form-ano-categoria mb-6 flex flex-wrap items-center">
        <div>
            <label for="ano" class="ano">Ano:</label>
            <input type="number" name="ano" id="ano" value="{{ request('ano') }}" class="inputs-filtros w-24">
        </div>
        <div>
            <label for="categoria_id" class="categoria">Categoria:</label>
            <select name="categoria_id" id="categoria_id" class="inputs-filtros">
                <option value="">Todas</option>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" @if(request('categoria_id')==$categoria->id) selected @endif>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn-filtrar text-white  shadow">Filtrar</button>
    </form>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($filmes as $filme)
    <div 
    onclick="window.location='{{ route('filmes.show', $filme->id) }}'"
    class="card-filme relative rounded overflow-hidden shadow-lg cursor-pointer group h-64">

    
    @if($filme->imagem)
        @if(Str::startsWith($filme->imagem, 'http'))
            <img src="{{ $filme->imagem }}" alt="{{ $filme->nome }}" class="img-card">
        @else
            <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->nome }}" class="img-card">
        @endif
    @endif

    
    <div class="titulo-card">
        <h2>{{ $filme->nome }}</h2>
    </div>

    
    <div class="overlay-card">
        <p class="mb-2 text-center">{{ $filme->sinopse }}</p>
        <p class="text-sm">Ano: {{ Carbon::parse($filme->ano)->format('Y') }}</p>
        <p class="text-sm mb-2">Categoria: {{ $filme->categoria->nome ?? 'Sem categoria' }}</p>

        @if(Auth::check() && Auth::user()->nivel_acesso == 1)
        <div class="flex gap-2 mt-2">
            <a href="{{ route('filmes.edit', $filme->id) }}" class="btn-amarelo">Editar</a>
            <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-vermelho">Excluir</button>
            </form>
        </div>
        @endif

       @if($filme->trailer)
    <div class="flex items-center gap-2 mt-2">
        <a href="{{ $filme->trailer }}" target="_blank" onclick="event.stopPropagation()" class="btn-azul flex items-center justify-center gap-1">
            Ver Trailer
        </a>
        <form action="{{ route('lista.store', $filme->id) }}" method="POST">
            @csrf
            <button type="submit" class="arredondar btn-verde flex items-center justify-center">
                <span class="plus material-symbols-outlined">add_circle</span>
            </button>
        </form>
    </div>
@endif
    </div>
</div>
    @endforeach
</div>
</div>
</div>
@endsection