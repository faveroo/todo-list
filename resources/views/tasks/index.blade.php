@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')


<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">📝 Lista de Tarefas</h1>
    </div>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Verifica se há tarefas --}}
    @if($tasks->isEmpty())
        <div class="alert alert-info text-center">
            Nenhuma tarefa cadastrada ainda. <a href="{{ route('tasks.create') }}">Crie uma agora!</a>
        </div>
    @else
        <table class="table table-striped align-middle shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td class="{{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
                            {{ $task->title }}
                        </td>
                        <td  class="{{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">{{ $task->description }}</td>
                        <td>
                            @if($task->completed)
                                <span class="badge bg-success">Concluída</span>
                            @else
                                <span class="badge bg-warning text-dark">Pendente</span>
                            @endif
                        </td>
                        <td class="text-center">
                                {{-- Botão editar --}}
                                @if($task->completed)
                                    <a href="#" class="btn btn-sm btn-secondary disabled-link edit-btn-{{ $task->id }}">Editar</a>
                                @else
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-secondary edit-btn-{{ $task->id }}">Editar</a>
                                @endif

                                {{-- Botão excluir --}}
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline delete-form-{{ $task->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                        Excluir
                                    </button>
                                </form>

                                {{-- Reabrir --}}
                                @if($task->completed)
                                    <button type="button" class="btn btn-sm btn-warning reopen-btn-{{ $task->id }}" onclick="showJustification({{ $task->id }})">
                                        Reabrir
                                    </button>

                                    {{-- Formulário de justificativa (inicialmente oculto) --}}
                                    <form action="{{ route('tasks.reopen', $task->id) }}" method="POST"
                                        class="mt-2 d-none justification-form-{{ $task->id }}">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="justification_{{ $task->id }}" class="form-label">Justificativa da reabertura</label>
                                            <textarea name="justification" id="justification_{{ $task->id }}" class="form-control" rows="2" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success">Confirmar</button>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="cancelJustification({{ $task->id }})">Cancelar</button>
                                    </form>
                                @else
                                    {{-- Concluir --}}
                                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="completed" value="1">
                                        <button type="submit" class="btn btn-sm btn-success">Concluir</button>
                                    </form>
                                @endif
                            </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
