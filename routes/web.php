<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rota / para index em controller TaskController
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Rota /criar-tarefa para criar tarefa
Route::post('/criar-tarefa', [TaskController::class, 'store'])->name('task.store');

// Rota /sobre
Route::get('/sobre', function () {
    $nome = 'eduardo';
    return view('askFlow v1.0 - Desenvolvido por ' . $nome);
});

// rota deletar tarefa
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');


// 


// Rota /status

Route::get('/status', function () {
    return response()->json(['status' => 'operacional','servidor' => 'laravel']);
});


