@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Bem-vindo ao Dashboard</h1>
            <p>Aqui você pode gerenciar seus produtos, usuários e outras entidades.</p>
        </div>
    </div>

    <!-- Exemplo de cards ou algo visual para mostrar métricas -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Total de Produtos</h5>
                    <p>{{ $totalProducts ?? '-' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Total de Usuários</h5>
                    <p>{{ $totalUsers ?? '-' }}</p>
                </div>
            </div>
        </div>
        <!-- outros cards -->
    </div>
@endsection
