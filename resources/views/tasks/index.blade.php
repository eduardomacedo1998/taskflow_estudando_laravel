<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Lista de Tarefas</title>

    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo da página */
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
        }

        /* Container principal */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        /* Título */
        h1 {
            color: #495057;
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 15px;
        }

        /* Lista de tarefas */
        ul {
            list-style: none;
        }

        /* Item da tarefa */
        li {
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        li:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        /* Texto da tarefa */
        .task-text {
            flex-grow: 1;
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Status da tarefa */
        .task-status {
            font-size: 0.9rem;
            font-weight: 400;
            color: #6c757d;
            margin-left: 10px;
        }

        .task-status.completed {
            color: #28a745;
            font-weight: 600;
        }

        .task-status.pending {
            color: #ffc107;
            font-weight: 600;
        }

        /* Formulário de exclusão */
        form {
            margin-left: 15px;
        }

        /* Botão de excluir */
        button {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
        }

        button:hover {
            background: #c82333;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        /* Mensagem de sucesso */
        .alert {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 6px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 2rem;
            }

            li {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .task-text {
                margin-bottom: 10px;
            }

            button {
                align-self: flex-end;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>TaskFlow - Lista de Tarefas</h1>
        
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