<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContasBancarias extends Model {

    /**
     * Nome da tabela no banco de dados
     * 
     */
    protected $table = 'contas_bancarias';

    /**
     * Campos que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'bancos_id',
        'tipo_conta',
        'conta',
        'digito_conta',
        'agencia',
        'digito_agencia',
        'titular',
        'tipo_documento_titular',
        'documento_titular',
        'email_titular',
        'celular_titular',
        'status'
    ];
}

// End of file
