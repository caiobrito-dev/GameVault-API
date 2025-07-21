<?php

namespace App\Http\Controllers;

use App\Models\Jogo; // Importe o modelo Jogo
use Illuminate\Http\Request;

class GameController extends Controller
{
    // Exibe a lista pública de jogos
    public function index()
    {
        $jogos = Jogo::all(); // Pega todos os jogos do banco de dados
        return view('jogos.index', compact('jogos')); // Passa os jogos para a view
    }

    // --- Métodos para a Área Administrativa ---

    // Exibe a lista de jogos para administração
    public function adminIndex()
    {
        // Certifique-se de que este método será protegido por um middleware 'admin'
        $jogos = Jogo::all();
        return view('admin.jogos.index', compact('jogos'));
    }

    // Exibe o formulário para adicionar um novo jogo
    public function create()
    {
        // Este método também será protegido por middleware 'admin'
        return view('admin.jogos.create');
    }

    // Armazena um novo jogo no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados de entrada para o novo jogo
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_lancamento' => 'required|integer|min:1950|max:' . (date('Y') + 5), // Ano max 5 anos no futuro
            'genero' => 'required|string|max:255',
            'desenvolvedora' => 'required|string|max:255',
            'descricao' => 'nullable|string', // 'nullable' permite que o campo seja vazio
            'imagem_capa' => 'nullable|url|max:2048', // 'url' para validação de URL, max 2048 caracteres
        ]);

        // Cria um novo registro de jogo usando o modelo Jogo
        Jogo::create($request->all());

        // Redireciona de volta para a lista de jogos admin com mensagem de sucesso
        return redirect()->route('admin.jogos.index')->with('success', 'Jogo adicionado com sucesso!');
    }

    // Exibe o formulário para editar um jogo existente
    public function edit(Jogo $jogo) // Injeção de modelo para encontrar o jogo automaticamente
    {
        // Este método será protegido por middleware 'admin'
        // O Laravel injeta a instância do Jogo automaticamente pelo ID da rota
        return view('admin.jogos.edit', compact('jogo'));
    }

    // Atualiza um jogo existente no banco de dados
    public function update(Request $request, Jogo $jogo) // Injeção de modelo para encontrar e atualizar
    {
        // Validação dos dados para atualização
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_lancamento' => 'required|integer|min:1950|max:' . (date('Y') + 5),
            'genero' => 'required|string|max:255',
            'desenvolvedora' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'imagem_capa' => 'nullable|url|max:2048',
        ]);

        // Atualiza o registro de jogo
        $jogo->update($request->all());

        // Redireciona de volta para a lista de jogos admin com mensagem de sucesso
        return redirect()->route('admin.jogos.index')->with('success', 'Jogo atualizado com sucesso!');
    }

    // Remove um jogo do banco de dados
    public function destroy(Jogo $jogo) // Injeção de modelo para encontrar e deletar
    {
        // Este método será protegido por middleware 'admin'
        $jogo->delete();

        // Redireciona de volta para a lista de jogos admin com mensagem de sucesso
        return redirect()->route('admin.jogos.index')->with('success', 'Jogo excluído com sucesso!');
    }
}