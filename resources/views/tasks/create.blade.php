<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4">📝 Nova Tarefa</h1>

    {{-- Mensagem de erro do Laravel --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título da Tarefa</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Ex: Estudar Laravel" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Descreva a tarefa..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Criar Tarefa</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

</body>
</html>
