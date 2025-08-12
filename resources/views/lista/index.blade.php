@php
use Carbon\Carbon;
@endphp
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="title-favorito text-2xl font-bold mb-6"> ★ Filmes Favoritos ★</h1>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="filtro">
        <form method="GET" action="{{ route('lista.index') }}" class="form-ano-categoria mb-6 flex flex-wrap items-center">
            <div>
                <label for="ano" class="ano">Ano:</label>
                <input type="number" name="ano" id="ano" value="{{ request('ano') }}" class="inputs-filtros w-24">
            </div>
            <div>
                <label for="categoria_id" class="categoria">Categoria:</label>
                <select name="categoria_id" id="categoria_id" class="inputs-filtros">
                    <option value="">Todas</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @if(request('categoria_id') == $categoria->id) selected @endif>{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-filtrar text-white shadow">Filtrar</button>
        </form>
    </div>

    @php
        $ano = request('ano');
        $categoria_id = request('categoria_id');
        $filmesFiltrados = collect($lista)->filter(function($filme) use ($ano, $categoria_id) {
            $anoOk = !$ano || Carbon::parse($filme['ano'])->format('Y') == $ano;
            $catOk = !$categoria_id || (isset($filme['categoria_id']) && $filme['categoria_id'] == $categoria_id);
            return $anoOk && $catOk;
        });
    @endphp

    @if(count($filmesFiltrados) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($filmesFiltrados as $filme)
                <div onclick="window.location='{{ route('filmes.show', $filme['id'] ?? $loop->index) }}'" class="card-filme relative rounded overflow-hidden shadow-lg cursor-pointer group h-64">
                    @if(!empty($filme['imagem']))
                        <img src="{{ asset('storage/' . $filme['imagem']) }}" alt="{{ $filme['nome'] }}" class="img-card">
                    @endif
                    <div class="titulo-card">
                        <h2>{{ $filme['nome'] }}</h2>
                    </div>
                    <div class="overlay-card">
                        <p class="mb-2 text-center">{{ $filme['sinopse'] }}</p>
                        <p class="text-sm">Ano: {{ Carbon::parse($filme['ano'])->format('Y') }}</p>
                        <p class="text-sm mb-2">Categoria: {{ $categorias->firstWhere('id', $filme['categoria_id'])?->nome ?? 'Sem categoria' }}</p>
                        @if(!empty($filme['trailer']))
                            <a href="{{ $filme['trailer'] }}" target="_blank" onclick="event.stopPropagation()" class="btn-azul flex items-center justify-center gap-1">
                                Ver Trailer
                            </a>
                        @endif
                        <form action="{{ route('lista.destroy', $filme['id'] ?? $loop->index) }}" method="POST" onsubmit="event.stopPropagation();return confirm('Tem certeza que deseja remover este filme da lista?');" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-vermelho">Remover</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white p-4 rounded shadow text-center">
            <p class="text-gray-600">Nenhum filme foi adicionado à lista ainda.</p>
        </div>
    @endif
</div>
@endsection
