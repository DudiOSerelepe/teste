@extends('layouts.admin')

@section('title', 'Clientes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Clientes</h2>
    <a href="{{ route('admin.clientes.create') }}" class="btn btn-primary">+ Novo Cliente</a>
</div>

@if (session('sucesso'))
    <div class="alert alert-success">{{ session('sucesso') }}</div>
@endif

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>
                @if ($cliente->imagem)
                    <img src="{{ $cliente->imagem }}" class="rounded-circle" width="50">
                @else
                    <span class="text-muted">Sem foto</span>
                @endif
            </td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->telefone ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir cliente?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
