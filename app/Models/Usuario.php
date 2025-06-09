<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/* Define a Model e representa a tabela "usuarios" no banco de dados
   Neste caso a classe Usuário herda todos os métodos da classe Model 
   Isso facilita o processo e aumenta a segurança. */

class Usuario extends Model
{

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'data_nascimento',
        'telefone',
        'senha',
    ];
}