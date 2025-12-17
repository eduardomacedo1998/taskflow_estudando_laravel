<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// Rota /sobre
Route::get('/sobre', function () {
    $nome = 'eduardo';
    return view('askFlow v1.0 - Desenvolvido por ' . $nome);
});


// Rota /status

Route::get('/status', function () {
    return response()->json(['status' => 'operacional','servidor' => 'laravel']);
});
