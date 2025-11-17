@extends('layout')

@section('titulo', 'Novo Cliente')

@section('conteudo')
<h2>Novo Cliente</h2>

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control">
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
