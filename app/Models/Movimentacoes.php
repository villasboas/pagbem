<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacoes extends Model {
    
    /**
     * Nome da tabela no banco de dados
     *
     * @var string
     */
    protected $table = 'movimentacoes';

    /**
     * Campos que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = [
        'contas_bancarias_id',
        'valor',
        'status'
    ];
}

// End of file
