<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    // Define o nome da tabela no banco de dados, se for diferente do padrão 'jogos' (plural do nome do modelo)
    protected $table = 'jogos'; // Sua tabela se chama 'jogos'

    // Define a chave primária da tabela, se for diferente do padrão 'id'
    protected $primaryKey = 'id_jogo'; // Sua chave primária é 'id_jogo'

    // Define se o modelo deve gerenciar automaticamente as colunas 'created_at' e 'updated_at'.
    // Se sua tabela 'jogos' não as possui, defina como 'false'.
    public $timestamps = false; // Descomente esta linha se sua tabela 'jogos' NÃO tiver created_at/updated_at

    /**
     * Os atributos que podem ser preenchidos em massa (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'ano_lancamento',
        'genero',
        'desenvolvedora',
        'descricao',
        'imagem_capa',
    ];

    /**
     * Os atributos que devem ser ocultados para serialização.
     * Por exemplo, para não expor dados sensíveis em APIs.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // Não há campos sensíveis para ocultar aqui, mas é bom ter o array.
    ];

    /**
     * Obtenha os atributos que devem ser convertidos (cast).
     * Útil para converter strings para tipos específicos (int, bool, datetime, array, etc.).
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Exemplo: 'ano_lancamento' => 'integer', se você quiser garantir que sempre seja um inteiro.
        ];
    }
}