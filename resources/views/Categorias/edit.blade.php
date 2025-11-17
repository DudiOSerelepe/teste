@extends('layouts.app')

@section('titulo', 'Editar Categoria')

@section('conteudo')

<h2>Editar Categoria</h2>

<div class="card p-4 mt-3">
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome da Categoria</label>
            <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

@endsection
