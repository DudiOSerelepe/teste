@extends('layouts.app')

@section('titulo', 'Novo Produto')

@section('conteudo')

<h2>Cadastrar Produto</h2>

<div class="card p-4 mt-3">

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço (R$)</label>
            <input type="number" step="0.01" name="preco" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="categoria_id" class="form-control" required>
                <option value="">Selecione...</option>
                @foreach($categorias as $c)
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>

</div>

@endsection
