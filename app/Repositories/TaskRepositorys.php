<?php

namespace App\Repositories;

use App\Models\Task;

Class TaskRepositorys
{
    private $tasksModel;

    public function __construct(Task $tasksModel) // Dependency Injection
    {
        $this->tasksModel = $tasksModel; // Assign the injected model to a class property
    }

    public function store(array $data) // Create a new task
    {
        return $this->tasksModel->create($data); // Create a new task with the provided data
    }

    public function getAllTasks($filter) // Retrieve all tasks
    {
        // filtre por status se fornecido
        if ($filter === 'completed') {
            return $this->tasksModel->where('is_completed', '1')->get(); // Retrieve only completed tasks
        } elseif ($filter === 'pending') {
            return $this->tasksModel->where('is_completed', '0')->get(); // Retrieve only pending tasks
        }


        return $this->tasksModel->all(); // Retrieve all tasks from the database
    }

    public function findTaskById($id) // Find a task by its ID
    {
        return $this->tasksModel->findOrFail($id); // Find a task by its ID or fail
    }

    public function deleteTask(Task $task) // Delete a given task
    {
        return $task->delete(); // Delete the given task
    }
}