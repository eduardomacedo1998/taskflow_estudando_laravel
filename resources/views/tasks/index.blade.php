<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #f4f4f4;
            margin: 5px 0;
            padding: 10px;
            border-radius: 4px;
        }
        form {
            display: inline;
        }
        button {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <h1>Task List</h1>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->title }} - {{ $task->is_completed ? 'Completed' : 'Pending' }}</li>

            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
            
        @endforeach 
         @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    </ul>

    
   
</body>
</html>