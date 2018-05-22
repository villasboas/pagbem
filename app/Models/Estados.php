<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model {

    /**
     * Tabela no banco de dados
     *
     * @var string
     */
    protected $table = 'estados';

    /**
     * Relacao com cidades
     */
    function cidades() {
        return $this->hasMany('\App\Models\Cidades', 'estados_id');
    }
}

// End of file
