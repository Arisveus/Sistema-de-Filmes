@php 
use Carbon\Carbon;
@endphp
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-lg">
    <h1 class="text-2xl font-bold mb-6">{{ $filme->nome }}</h1>
    @if($filme->imagem)
        <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->nome }}" class="w-full h-64 object-cover mb-4 rounded">
    @endif
    <p class="mb-2"><strong>Sinopse:</strong> {{ $filme->sinopse }}</p>
    <p class="mb-2"><strong>Ano:</strong> {{ Carbon::parse($filme->ano)->format('Y') }}</p>
    <p class="mb-2"><strong>Categoria:</strong> {{ $filme->categoria->nome ?? 'Sem categoria' }}</p>
    @if($filme->trailer)
        <p class="mb-2"><strong>Trailer:</strong> <a href="{{ $filme->trailer }}" target="_blank" class="text-blue-600 underline">Assistir no YouTube</a></p>
    @endif
    <a href="{{ route('filmes.index') }}" class="inline-block mt-6 bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded shadow">Voltar</a>
</div>
@endsection
