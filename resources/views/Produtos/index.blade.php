@extends('layouts.app')

@section('titulo', 'Produtos')

@section('conteudo')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Produtos</h2>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary">+ Novo Produto</a>
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
                <th>Categoria</th>
                <th>Preço</th>
                <th style="width: 160px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->categoria->nome }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>

                <td>
                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Deseja excluir?')" class="btn btn-sm btn-danger">
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
