@extends('layout')

@section('titulo', 'Editar Cliente')

@section('conteudo')
<h2>Editar Cliente</h2>

<form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" value="{{ $cliente->nome }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" value="{{ $cliente->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" value="{{ $cliente->telefone }}" class="form-control">
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
