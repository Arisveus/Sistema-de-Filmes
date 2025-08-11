@php 
    use Carbon\Carbon;
    $isUrl = Str::startsWith($filme->imagem, 'http');
    $imgSrc = $isUrl ? $filme->imagem : asset('storage/' . $filme->imagem);
@endphp
@extends('layouts.app')

@section('content')
<style>
    .filme-bg {
        position: fixed;
        inset: 0;
        width: 100vw;
        height: 100vh;
        z-index: 0;
        object-fit: cover;
        filter: brightness(0.4);
        pointer-events: none;
    }
    .filme-overlay {
        position: fixed;
        inset: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,0.6);
        z-index: 1;
        pointer-events: none;
    }
    .filme-card {
        position: relative;
        z-index: 2;
        background: #fff;
        border-radius: 12px;
        max-width: 600px;
        margin: 60px auto;
        padding: 40px 32px 32px 32px;
        box-shadow: 0 8px 32px 0 rgba(0,0,0,0.25);
    }
    .filme-card h1 {
        color: #222;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }
    .filme-card p,
    .filme-card a {
        color: #222;
        font-size: 1rem;
    }
    .filme-card .btns {
        display: flex;
        gap: 12px;
        margin-top: 18px;
        align-items: center;
    }
    .filme-card .btn {
        background: #eee;
        color: #222;
        border: none;
        border-radius: 6px;
        padding: 8px 18px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.2s;
    }
    .filme-card .btn.trailer { background: #bbb; }
    .filme-card .btn.trailer:hover { background: #888; color: #fff; }
    .filme-card .btn.add { background: #22c55e; color: #fff; }
    .filme-card .btn.add:hover { background: #16a34a; }
    .filme-card .btn.edit { background: #facc15; color: #fff; }
    .filme-card .btn.edit:hover { background: #eab308; }
    .filme-card .btn.delete { background: #dc2626; color: #fff; }
    .filme-card .btn.delete:hover { background: #b91c1c; }
</style>

@if($filme->imagem)
    <img src="{{ $imgSrc }}" alt="{{ $filme->nome }}" class="filme-bg">
    <div class="filme-overlay"></div>
@endif

<div class="filme-card">
    <h1>{{ $filme->nome }}</h1>
    <p><strong>Sinopse:</strong> {{ $filme->sinopse }}</p>
    <p><strong>Ano:</strong> {{ Carbon::parse($filme->ano)->format('Y') }}</p>
    <p><strong>Categoria:</strong> {{ $filme->categoria->nome ?? 'Sem categoria' }}</p>
    <div class="btns">
        @if($filme->trailer)
            <a href="{{ $filme->trailer }}" target="_blank" class="btn trailer">Trailer</a>
        @endif
        <form action="{{ route('lista.store', $filme->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn add">Adicionar à lista</button>
        </form>
        @if(Auth::check() && Auth::user()->nivel_acesso == 1)
            <a href="{{ route('filmes.edit', $filme->id) }}" class="btn edit">Editar</a>
            <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este filme?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn delete">Excluir</button>
            </form>
        @endif
    </div>
    <a href="{{ route('filmes.index') }}" class="btn mt-6" style="margin-top:32px;">Voltar</a>
</div>
@endsection