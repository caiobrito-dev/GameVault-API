<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para acesso ao usuário logado

class AdminController extends Controller
{
    // Exibe o painel de administração (dashboard)
    public function dashboard()
    {
        // Este método será protegido por middleware 'admin'
        // A view pode exibir informações gerais, links para gerenciar jogos/plataformas, etc.
        return view('admin.dashboard');
    }
}