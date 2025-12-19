<?php

namespace App\Http\Controllers;

use App\Models\Task; // Importa o modelo Task

use Illuminate\Http\Request;


use App\Services\TaskService; // Importa o serviço TaskService

class TaskController extends Controller
{
  

    public $TaskRepositorys;

    public function __construct( TaskService $TaskService) // Injeção de dependência do repositório
    {
        $this->TaskRepositorys = $TaskService; // Atribui o repositório à propriedade da classe
    }

    // Listar todas as tarefas para rota task task.index
    public function index( request $request)
    {   
        $filter = $request->query('status');
        $tasks = $this->TaskRepositorys->listAllTasks($filter); // Pega todas as tarefas do banco de dados
        return view('tasks.index', compact('tasks'));// Retorno uma view com as tarefas
    }

    //metodo de deletar tarefa
    public function destroy($id)
    {
         $this->TaskRepositorys->deleteTaskById($id); // Encontra a tarefa pelo ID ou falha
        
        
        // utiliza o redirect para a rota task.index com um mensagem de sucesso
        return redirect()->route('task.index',)->with('success', 'Tarefa deletada com sucesso!'); // Redireciona para a lista de tarefas
    }   

    //metodo de criar tarefa
    public function store(Request $request)
    {
        $data = $request->validate([ // Valida os dados recebidos
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        

        $this->TaskRepositorys->createTask($data); // Cria uma nova tarefa usando o repositório

        return redirect()->route('task.index')->with('success', 'Tarefa criada com sucesso!'); // Redireciona para a lista de tarefas com mensagem de sucesso
}

}