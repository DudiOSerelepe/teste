@extends('layouts.app')

@section('titulo', 'Categorias')

@section('conteudo')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Categorias</h2>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">+ Nova Categoria</a>
</div>

@if(session('sucesso'))
    <div class="alert alert-success">
        {{ session('sucesso') }}
    </div>
@endif

<div class="card p-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th style="width: 150px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
