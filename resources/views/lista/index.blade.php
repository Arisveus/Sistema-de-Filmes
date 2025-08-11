@php
use Carbon\Carbon;
@endphp
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Minha Lista de Filmes</h1>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('lista.index') }}" class="mb-6 flex flex-wrap gap-4 items-center">
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
                <div onclick="window.location='{{ route('filmes.show', $filme['id'] ?? $loop->index) }}'" class="bg-white rounded shadow p-4 hover:ring-2 hover:ring-blue-400 transition-all cursor-pointer relative">
                    @if(!empty($filme['imagem']))
                        <img src="{{ asset('storage/' . $filme['imagem']) }}" alt="{{ $filme['nome'] }}" class="w-full h-48 object-cover mb-4 rounded">
                    @endif
                    <h2 class="text-xl font-semibold">{{ $filme['nome'] }}</h2>
                    <p class="text-gray-700 mb-2">{{ $filme['sinopse'] }}</p>
                    <p class="text-gray-500">Ano: {{ Carbon::parse($filme['ano'])->format('Y') }}</p>
                    <p class="text-gray-500">Categoria: {{ $categorias->firstWhere('id', $filme['categoria_id'])?->nome ?? 'Sem categoria' }}</p>
                    @if(!empty($filme['trailer']))
                        <a href="{{ $filme['trailer'] }}" target="_blank" class="text-blue-600 underline mb-2 block mt-2">Ver Trailer</a>
                    @endif
                    <form action="{{ route('lista.destroy', $filme['id'] ?? $loop->index) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este filme da lista?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded shadow mt-2">Remover</button>
                    </form>
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
