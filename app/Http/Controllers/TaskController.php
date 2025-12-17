<?php

namespace App\Http\Controllers;

use App\Models\Task; // Importa o modelo Task

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Listar todas as tarefas para rota task task.index
    public function index()
    {
        $tasks = Task::all(); // Pega todas as tarefas do banco de dados
        return view('tasks.index', compact('tasks'));// Retorno uma view com as tarefas
    }

    //metodo de deletar tarefa
    public function destroy($id)
    {
        $task = Task::findOrFail($id); // Encontra a tarefa pelo ID
        $task->delete(); // Deleta a tarefa
        return redirect()->route('task.index'); // Redireciona para a lista de tarefas
    }   

}