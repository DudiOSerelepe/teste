@extends('layouts.admin')

@section('title', 'Clientes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Clientes</h2>
    <a href="{{ route('admin.clientes.create') }}" class="btn btn-primary">+ Novo Cliente</a>
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
                <th>Email</th>
                <th>Telefone</th>
                <th style="width: 160px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->telefone ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Deseja excluir?')" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum cliente encontrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
