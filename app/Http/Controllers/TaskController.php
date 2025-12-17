<?php

namespace App\Http\Controllers;

use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Listar todas as tarefas para rota task task.index
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
}
