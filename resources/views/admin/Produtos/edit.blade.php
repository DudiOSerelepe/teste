@extends('layouts.admin')

@section('title', 'Editar Produto')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Editar Produto</h2>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.produtos.update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required value="{{ old('nome', $produto->nome) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control" rows="4">{{ old('descricao', $produto->descricao) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Preço</label>
        <input type="number" step="0.01" name="preco" class="form-control" required value="{{ old('preco', $produto->preco) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Estoque</label>
        <input type="number" name="estoque" class="form-control" required value="{{ old('estoque', $produto->estoque) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select name="categoria_id" class="form-select" required>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    {{ $categoria->id == $produto->categoria_id ? 'selected' : '' }}>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">URL da Imagem</label>
        <input type="url" name="imagem" class="form-control" value="{{ old('imagem', $produto->imagem) }}">
    </div>

    @if ($produto->imagem)
        <div class="mb-3">
            <label>Imagem Atual:</label> <br>
            <img src="{{ $produto->imagem }}" width="100" class="rounded">
        </div>
    @endif

    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('admin.produtos.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
