<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model {

    /**
     * Nome da tabela
     *
     * @var string
     */
    protected $table = 'clientes';

    /**
     * Campos que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'sobrenome',
        'documento',
        'cidades_id',
        'tipo_documento',
        'documento',
        'email',
        'celular',
        'telefone',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'status'
    ];
}

// End of file
