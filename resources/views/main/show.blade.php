@php 
    use Carbon\Carbon;
    $isUrl = Str::startsWith($filme->imagem, 'http');
    $imgSrc = $isUrl ? $filme->imagem : asset('storage/' . $filme->imagem);
@endphp
@extends('layouts.app')

@section('content')

@if($filme->imagem)
    <img src="{{ $imgSrc }}" alt="{{ $filme->nome }}" class="filme-bg">
    <div class="filme-overlay"></div>
@endif

<div class="filme-card">
    <h1 class="title-card">{{ $filme->nome }}</h1>
    <p class="desc"><strong>Sinopse:</strong> {{ $filme->sinopse }}</p>
    <p class="desc"><strong>Ano:</strong> {{ Carbon::parse($filme->ano)->format('Y') }}</p>
    <p class="desc"><strong>Categoria:</strong> {{ $filme->categoria->nome ?? 'Sem categoria' }}</p>
    
    <div class="flex items-center gap-4 mt-6">
        @if($filme->trailer)
            <a href="{{ $filme->trailer }}" target="_blank" class="btn trailer" style=" font-size:30px;">Trailer</a>
        @endif
        <form action="{{ route('lista.store', $filme->id) }}" method="POST">
            @csrf
            <button type="submit" class="arredondar" style="min-width:20px;"> <span class="plus material-symbols-outlined">add_circle</span></button>
        </form>
    </div>
    
    <div class="flex items-center gap-4 mt-4">
        @if(Auth::check() && Auth::user()->nivel_acesso == 1)
            <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este filme?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn delete" >Excluir</button>
            </form>
            <a href="{{ route('filmes.edit', $filme->id) }}" class="btn edit" >Editar</a>
        @endif
    </div>
  <div class="voltar">
    <a href="{{ route('filmes.index') }}" class="voltar2">Voltar</a>
    </div>
</div>
@endsection