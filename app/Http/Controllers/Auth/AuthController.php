<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()

    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        //return $request->validated();
        User::query()->create($request->validated());
        return redirect()->route('auth.login')->with('ok', 'Votre compte a bien été créé');
    }


    public function showLogin()
    {
        return view('auth.login');
    }
    public function Login(LoginRequest $request )
    {
        $registered = Auth::attempt($request->validated());
         if (!$registered){
            session()->regenerate();
         }
        return redirect()->route('blog.index')->with('ok', 'Vous êtes connecté');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('blog.index')->with('ok', 'Vous êtes déconnecté');
    }
}
