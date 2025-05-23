<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store()
    {
        $values = request()->validate([
            "email" => ['required', 'email', 'max:256'],
            'password' => ['required']
        ]);

        $success = Auth::attempt($values);
        if (!$success) {
            throw ValidationException::withMessages(["auth" => "Invalid credentials."]);
        }

        request()->session()->regenerate();

        return redirect("/dashboard");
    }

    public function destroy()
    {
        Auth::logout();

        return redirect("/");
    }
}
