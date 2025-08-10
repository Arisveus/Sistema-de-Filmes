@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-lg">
    <h1 class="text-2xl font-bold mb-6">Adicionar Filme</h1>
    <form action="{{ route('filmes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="nome" class="block font-semibold">Nome</label>
            <input type="text" name="nome" id="nome" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="sinopse" class="block font-semibold">Sinopse</label>
            <textarea name="sinopse" id="sinopse" rows="3" class="w-full border rounded px-3 py-2" required></textarea>
        </div>
        <div>
            <label for="ano" class="block font-semibold">Ano</label>
            <input type="date" name="ano" id="ano" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="categoria_id" class="block font-semibold">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="w-full border rounded px-3 py-2" required>
                <option value="">Selecione</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="trailer" class="block font-semibold">Link do Trailer (YouTube)</label>
            <input type="url" name="trailer" id="trailer" class="w-full border rounded px-3 py-2" placeholder="https://youtube.com/...">
        </div>
        <div>
            <label for="imagem" class="block font-semibold">Imagem</label>
            <input type="file" name="imagem" id="imagem" class="w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">Salvar</button>
    </form>
</div>
@endsection
