@extends('layouts.admin')

@section('title', 'Categorias')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Categorias</h2>
    <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">+ Nova Categoria</a>
</div>

@if(session('sucesso'))
    <div class="alert alert-success">{{ session('sucesso') }}</div>
@endif

<div class="card p-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th style="width: 160px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>
                <td>
                    <a href="{{ route('admin.categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Deseja excluir?')" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Nenhuma categoria encontrada.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
