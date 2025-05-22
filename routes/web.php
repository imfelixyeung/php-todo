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
