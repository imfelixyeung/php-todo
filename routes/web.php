<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;

$pageSchema = ['required', 'integer', 'min:0'];

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    $todos = Todo::orderBy('completed', 'asc')->orderBy('created_at', 'desc')->paginate(10);

    return view('dashboard', [
        "todos" => $todos,
    ]);
});

Route::post('/dashboard/todos/create', function () use ($pageSchema) {
    $values = request()->validate([
        'name' => ['required', 'min:1'],
        "page" => $pageSchema,
    ]);
    $page = $values['page'];

    $todo = Todo::create([
        "name" => $values['name'],
        "completed" => false,
    ]);
    $todoId = $todo['id'];

    return redirect("/dashboard/todos/$todoId?page=$page");
});

Route::get('/dashboard/todos/{id}', function ($id) {
    $todos = Todo::orderBy('completed', 'asc')->orderBy('created_at', 'desc')->paginate(10);
    // prefer find() over findOrFail() in favor for non global custom 404
    $todo = Todo::find($id);

    $statusCode = $todo == null ? 404 : 200;

    return response()->view('dashboard-todo', [
        "todo" => $todo,
        "todos" => $todos,
    ], $statusCode);
});

Route::patch('/dashboard/todos/{todo}', function (Todo $todo) use ($pageSchema) {
    $values = request()->validate([
        "completed" => ['nullable'],
        "page" => $pageSchema,
    ]);
    $page = $values['page'];

    $completed = array_key_exists("completed", $values) && $values['completed'] == "on"
        ? true
        : false;
    $todo->update(["completed" => $completed]);

    return redirect("/dashboard/todos/$todo->id?page=$page");
});

Route::delete('/dashboard/todos/{todo}', function (Todo $todo) use ($pageSchema) {
    $values = request()->validate([
        "page" => $pageSchema,
    ]);
    $page = $values['page'];

    $todo->delete();

    return redirect("/dashboard?page=$page");
});
