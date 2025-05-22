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

Route::post('/dashboard/todos/create', function () {
    $page = request('page');

    $todo = Todo::create([
        "name" => request('name'),
        "completed" => false,
    ]);
    $todoId = $todo['id'];

    return redirect("/dashboard/todos/$todoId?page=$page");
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

Route::post('/dashboard/todos/{id}/update', function ($id) {
    $page = request('page');
    $completed = request("completed") == "on" ? true : false;
    $todo = Todo::find($id);
    $todo->update(["completed" => $completed]);

    return redirect("/dashboard/todos/$id?page=$page");
});

Route::post('/dashboard/todos/{id}/delete', function ($id) {
    $page = request('page');
    $todo = Todo::find($id);
    $todo->delete();

    return redirect("/dashboard?page=$page");
});
