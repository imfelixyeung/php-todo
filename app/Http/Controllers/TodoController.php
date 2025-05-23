<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

$pageSchema = ['required', 'integer', 'min:0'];
$pageSize = 20;

class TodoController extends Controller
{
    private static $pageSchema = ['required', 'integer', 'min:0'];
    private static $pageSize = 20;

    public function index()
    {
        $todos = Todo::orderBy('completed', 'asc')->orderBy('created_at', 'desc')->paginate(static::$pageSize);

        return view('dashboard', [
            "todos" => $todos,
        ]);
    }

    public function create()
    {
        $values = request()->validate([
            'name' => ['required', 'min:1'],
            "page" => static::$pageSchema,
        ]);
        $page = $values['page'];

        $todo = Todo::create([
            "name" => $values['name'],
            "completed" => false,
            "user_id" => request()->user()->id,
        ]);
        $todoId = $todo['id'];

        return redirect("/dashboard/todos/$todoId?page=$page");
    }

    public function show(int $id)
    {
        $todos = Todo::orderBy('completed', 'asc')->orderBy('created_at', 'desc')->paginate(static::$pageSize);
        // prefer find() over findOrFail() in favor for non global custom 404
        $todo = Todo::find($id);

        $statusCode = $todo == null ? 404 : 200;

        return response()->view('dashboard-todo', [
            "todo" => $todo,
            "todos" => $todos,
        ], $statusCode);
    }

    public function update(Todo $todo)
    {
        $values = request()->validate([
            "completed" => ['nullable'],
            "page" => static::$pageSchema,
        ]);
        $page = $values['page'];

        $completed = array_key_exists("completed", $values) && $values['completed'] == "on"
            ? true
            : false;
        $todo->update(["completed" => $completed]);

        return redirect("/dashboard/todos/$todo->id?page=$page");
    }

    public function destroy(Todo $todo)
    {
        $values = request()->validate([
            "page" => static::$pageSchema,
        ]);
        $page = $values['page'];

        $todo->delete();

        return redirect("/dashboard?page=$page");
    }
}
