<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Lista de Tarefas</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>



<form action="{{ route('task.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Descrição:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <button type="submit">Criar Tarefa</button>
</form>





    <div class="container">
        <h1>TaskFlow - Lista de Tarefas</h1>

        <div id="filtro_tarefas">
            <a href="{{ route('tasks.index', ['status' => 'all']) }}" class="filtro_option">Todas</a>
            <a href="{{ route('tasks.index', ['status' => 'completed']) }}" class="filtro_option">Concluídas</a>
            <a href="{{ route('tasks.index', ['status' => 'pending']) }}" class="filtro_option">Pendentes</a>
        </div>
        
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif
        
        <ul>
            @foreach($tasks as $task)
                <li>
                    <span class="task-text">{{ $task->title }}</span>
                    <span class="task-status {{ $task->is_completed ? 'completed' : 'pending' }}">
                        {{ $task->is_completed ? 'Concluída' : 'Pendente' }}
                    </span>
                    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</button>
                    </form>
                </li>
            @endforeach 
        </ul>
    </div>
</body>
</html>