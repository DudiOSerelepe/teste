@extends('layouts.admin')

@section('title', 'Produtos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Produtos</h2>
    <a href="{{ route('admin.produtos.create') }}" class="btn btn-primary">+ Novo Produto</a>
</div>

@if (session('sucesso'))
    <div class="alert alert-success">{{ session('sucesso') }}</div>
@endif

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>

            <td>
                @if ($produto->imagem)
                    <img src="{{ $produto->imagem }}" width="60" class="rounded">
                @else
                    <span class="text-muted">Sem imagem</span>
                @endif
            </td>

            <td>{{ $produto->nome }}</td>
            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
            <td>{{ $produto->estoque }}</td>

            <td>{{ $produto->categoria->nome ?? 'Sem categoria' }}</td>

            <td>
                <a href="{{ route('admin.produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('admin.produtos.destroy', $produto->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir produto?')">
                        Excluir
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
