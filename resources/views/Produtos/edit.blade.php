@extends('layouts.app')

@section('titulo', 'Editar Produto')

@section('conteudo')

<h2>Editar Produto</h2>

<div class="card p-4 mt-3">

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required value="{{ $produto->nome }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" required>{{ $produto->descricao }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input type="number" step="0.01" name="preco" class="form-control" required value="{{ $produto->preco }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="categoria_id" class="form-control">
                @foreach($categorias as $c)
                    <option value="{{ $c->id }}" {{ $c->id == $produto->categoria_id ? 'selected' : '' }}>
                        {{ $c->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>

</div>

@endsection
