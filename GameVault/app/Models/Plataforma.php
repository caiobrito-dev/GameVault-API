<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    use HasFactory;

    // Define o nome da tabela no banco de dados, se for diferente do padrão 'plataformas' (plural do nome do modelo)
    protected $table = 'plataformas'; // Sua tabela se chama 'plataformas'

    // Define a chave primária da tabela, se for diferente do padrão 'id'
    protected $primaryKey = 'id_plataforma'; // Sua chave primária é 'id_plataforma'

    // Define se o modelo deve gerenciar automaticamente as colunas 'created_at' e 'updated_at'.
    // Se sua tabela 'plataformas' não as possui, defina como 'false'.
    public $timestamps = false; // Descomente esta linha se sua tabela 'plataformas' NÃO tiver created_at/updated_at

    /**
     * Os atributos que podem ser preenchidos em massa (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_plataforma',
        'fabricante',
        'tipo',
    ];

    /**
     * Os atributos que devem ser ocultados para serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // Não há campos sensíveis para ocultar aqui.
    ];

    /**
     * Obtenha os atributos que devem ser convertidos (cast).
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            //
        ];
    }
}