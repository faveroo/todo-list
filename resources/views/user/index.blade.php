@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Perfil do Usuário</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ Auth::user()->name }}</h5>
            <p class="card-text">
                <strong>Email:</strong> {{ Auth::user()->email }}<br>
                <strong>Tarefas Concluídas:</strong> {{ Auth::user()->completed_tasks }}
            </p>
            <hr>
            <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary">Ver Minhas Tarefas</a>
            <a href="{{ route('user.edit', Auth::user()->id) }}" class="btn btn-outline-secondary">Editar Perfil</a>
        </div>
    </div>
</div>
@endsection
