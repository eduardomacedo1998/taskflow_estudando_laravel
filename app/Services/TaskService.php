<?php

namespace App\Services;

use App\Repositories\TaskRepositorys; // Importa o repositório TaskRepositorys

use Illuminate\Http\Request;

use Exception;

class TaskService
{
    private $taskRepository;

    public function __construct(TaskRepositorys $taskRepository) // Injeção de dependência do repositório
    {
        $this->taskRepository = $taskRepository; // Atribui o repositório à propriedade da classe
    }

    // Método para criar uma nova tarefa
    public function createTask(array $data)
    {
        try {

            // validar se os dados estão corretos

            // empty: verifica se o título está vazio
            // is_string: verifica se o título é uma string

            if (empty($data['title']) || !is_string($data['title'])) {
                throw new Exception('Título inválido para a tarefa.');
            }

            return $this->taskRepository->store($data); // Cria uma nova tarefa usando o repositório
        } catch (Exception $e) {
            // Lida com exceções, se necessário
            throw new Exception('Erro ao criar a tarefa: ' . $e->getMessage());
        }
    }

    // Método para listar todas as tarefas
    public function listAllTasks($filter = null)
    {
        return $this->taskRepository->getAllTasks($filter); // Pega todas as tarefas do banco de dados
    }

    // Método para deletar uma tarefa por ID
    public function deleteTaskById($id)
    {
        try {
            $task = $this->taskRepository->findTaskById($id); // Encontra a tarefa pelo ID ou falha
            return $this->taskRepository->deleteTask($task); // Deleta a tarefa
        } catch (Exception $e) {
            // Lida com exceções, se necessário
            throw new Exception('Erro ao deletar a tarefa: ' . $e->getMessage());
        }
    }
}