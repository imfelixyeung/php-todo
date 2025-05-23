<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::controller(TodoController::class)->group(function () {
    Route::get('/dashboard', 'index');
    Route::post('/dashboard/todos', 'create')->middleware(["auth"])->can("create", Todo::class);
    Route::get('/dashboard/todos/{id}', 'show');
    Route::patch('/dashboard/todos/{todo}', 'update')->middleware(["auth"])->can("update", 'todo');
    Route::delete('/dashboard/todos/{todo}', 'destroy')->middleware(['auth'])->can("delete", 'todo');;
});

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create');
    Route::post('/register', 'store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create')->name("login");
    Route::post('/login', 'store');
    Route::post('/logout', 'destroy');
});
