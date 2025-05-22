<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    $todos = Todo::orderBy('completed', 'asc')->orderBy('created_at', 'desc')->paginate(10);

    return view('dashboard', [
        "todos" => $todos,
    ]);
});

Route::get('/dashboard/todos/{id}', function ($id) {
    $todos = Todo::orderBy('completed', 'asc')->orderBy('created_at', 'desc')->paginate(10);
    $todo = Todo::find($id);

    $statusCode = $todo == null ? 404 : 200;

    return response()->view('dashboard-todo', [
        "todo" => $todo,
        "todos" => $todos,
    ], $statusCode);
});
