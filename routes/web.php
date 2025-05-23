<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::controller(TodoController::class)->group(function () {
    Route::get('/dashboard', 'index');
    Route::post('/dashboard/todos', 'create');
    Route::get('/dashboard/todos/{id}', 'show');
    Route::patch('/dashboard/todos/{todo}', 'update');
    Route::delete('/dashboard/todos/{todo}', 'destroy');
});
