<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash; // Adicionado para lidar com a senha

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. Especificar o nome da tabela (se for diferente do padrão 'users')
    protected $table = 'usuarios';

    // 2. Especificar a chave primária (se for diferente do padrão 'id')
    protected $primaryKey = 'id_usuario';

    public $timestapms = false; 

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',      // Corresponde à sua coluna 'username'
        'email',
        'password_hash', // Corresponde à sua coluna 'password_hash'
        'role',          // Adicione a coluna 'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password_hash', // Oculta a senha hashed
        'remember_token', // Manter se você usa o "remember me"
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            // 'password' => 'hashed', // Removido, pois vamos lidar com 'password_hash' manualmente para compatibilidade
        ];
    }

    // 3. Sobrescrever o método getAuthPassword para usar sua coluna 'password_hash'
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    // 4. Adicionar um método para verificar se o usuário é administrador
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Opcional: Mutator para salvar a senha hashed, se você for usar 'password' no fillable
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password_hash'] = Hash::make($value);
    // }
}