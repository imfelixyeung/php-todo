<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        "todos" => [
            [
                "name" => "Learn PHP",
                "completed" => true
            ],
            [
                "name" => "Learn Laravel",
                "completed" => true
            ],
            [
                "name" => "Learn MySQL",
                "completed" => false
            ],
        ]
    ]);
});
