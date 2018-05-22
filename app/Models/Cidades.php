<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model {

    /**
     * Tabela no banco de dados
     *
     * @var string
     */
    protected $table = 'cidades';

    /**
     * Adiciona a relacao com estados
     */
    function estado() {
        return $this->belongsTo('\App\Models\Estados', 'estados_id');
    }
}

// End of file
