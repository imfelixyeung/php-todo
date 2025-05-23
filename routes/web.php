<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get('/dashboard', [TodoController::class, 'index']);

Route::post('/dashboard/todos/create', [TodoController::class, 'create']);

Route::get('/dashboard/todos/{id}', [TodoController::class, 'show']);

Route::patch('/dashboard/todos/{todo}', [TodoController::class, 'update']);

Route::delete('/dashboard/todos/{todo}', [TodoController::class, 'destroy']);
