<?php

namespace App\Http\Controllers;

use App\Models\Plataforma; // Importe o modelo Plataforma
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    // Exibe a lista pública de plataformas
    public function index()
    {
        $plataformas = Plataforma::all(); // Pega todas as plataformas do banco de dados
        return view('plataformas.index', compact('plataformas')); // Passa as plataformas para a view
    }

    // --- Métodos para a Área Administrativa ---

    // Exibe a lista de plataformas para administração
    public function adminIndex()
    {
        // Este método será protegido por middleware 'admin'
        $plataformas = Plataforma::all();
        return view('admin.plataformas.index', compact('plataformas'));
    }

    // Exibe o formulário para adicionar uma nova plataforma
    public function create()
    {
        // Este método também será protegido por middleware 'admin'
        return view('admin.plataformas.create');
    }

    // Armazena uma nova plataforma no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados de entrada
        $request->validate([
            'nome_plataforma' => 'required|string|max:255|unique:plataformas', // Garante nome único
            'fabricante' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
        ]);

        Plataforma::create($request->all());

        return redirect()->route('admin.plataformas.index')->with('success', 'Plataforma adicionada com sucesso!');
    }

    // Exibe o formulário para editar uma plataforma existente
    public function edit(Plataforma $plataforma) // Injeção de modelo
    {
        // Este método será protegido por middleware 'admin'
        return view('admin.plataformas.edit', compact('plataforma'));
    }

    // Atualiza uma plataforma existente no banco de dados
    public function update(Request $request, Plataforma $plataforma) // Injeção de modelo
    {
        // Validação dos dados para atualização
        $request->validate([
            'nome_plataforma' => 'required|string|max:255|unique:plataformas,nome_plataforma,' . $plataforma->id_plataforma . ',id_plataforma', // Ignora o ID atual na verificação de unicidade
            'fabricante' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
        ]);

        $plataforma->update($request->all());

        return redirect()->route('admin.plataformas.index')->with('success', 'Plataforma atualizada com sucesso!');
    }

    // Remove uma plataforma do banco de dados
    public function destroy(Plataforma $plataforma) // Injeção de modelo
    {
        // Este método será protegido por middleware 'admin'
        $plataforma->delete();

        return redirect()->route('admin.plataformas.index')->with('success', 'Plataforma excluída com sucesso!');
    }
}