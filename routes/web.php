<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    $todos = Todo::orderBy('completed', 'asc')->orderBy('created_at', 'desc')->get();

    return view('dashboard', [
        "todos" => $todos,
    ]);
});

Route::get('/dashboard/todos/{id}', function ($id) {
    $todos = Todo::orderBy('completed', 'asc')->orderBy('created_at', 'desc')->get();
    $todo = Todo::find($id);

    return view('dashboard-todo', [
        "todo" => $todo,
        "todos" => $todos,
    ]);
});