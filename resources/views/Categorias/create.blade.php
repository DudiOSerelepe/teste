@extends('layouts.app')

@section('titulo', 'Nova Categoria')

@section('conteudo')

<h2>Cadastrar Nova Categoria</h2>

<div class="card p-4 mt-3">
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome da Categoria</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

@endsection
