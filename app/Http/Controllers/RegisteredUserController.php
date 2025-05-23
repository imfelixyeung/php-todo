<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }

    public function store()
    {
        $values = request()->validate([
            "name" => ['required', 'max:32'],
            "email" => ['required', 'email', 'max:256'],
            "password" => ['required', Password::min(8)],
        ]);

        $user = User::create($values);

        Auth::login($user);

        return redirect("/dashboard");
    }
}
