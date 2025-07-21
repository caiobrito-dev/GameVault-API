<?php

namespace App\Http\Controllers;

use App\Models\User; // Importe o modelo User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para a autenticação
use Illuminate\Support\Facades\Hash; // Para hashing de senhas
use Illuminate\Validation\ValidationException; // Para erros de validação personalizados


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]); 

        if(Auth::attemp(['username' => $credentials['username'], 'password' => $credentials['password']])){
            $request->session()->regenerate(); 

            return redirect()->intended('home')->with('success', 'Login realizaado com sucesso');
        }

        throw ValidationException::withMessages([
            'username' => ['Nome de usuário ou senha inválidos'],
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); 
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:usuarios'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        User::create([
            'username' => $request->username, 
            'email' => $request->email,
            'password_hash' => Hash::make($request->password), 
            'role' => 'user',
        ]);

        return redirect('/login')->with('success', 'Cadastro realizado com sucesso! Faça Login!'); 
    }

    public function Logout(Request $request)
    {
        Auth::logout(); 

        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect('/login')->with('succes', 'Você foi desconectado.'); 
    }
}
