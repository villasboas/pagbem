<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faturas extends Model {

    /**
     * Tabela no banco de dados
     *
     * @var string
     */
    protected $table = 'faturas';

    /**
     * Campos preenchidos 
     *
     * @var array
     */
    protected $fillable = [
        'cobrancas_id',
        'contas_bancarias_id',
        'codigo',
        'valor',
        'vencimento',
        'nota_fiscal',
        'link_pagseguro',
        'status'
    ];

    /**
     * Relacao com cobranca
     *
     * @return void
     */
    function cobranca() {
        return $this->belongsTo('App\Models\Cobrancas', 'cobrancas_id');
    }

    /**
     * Boot da model
     *
     * @return void
     */
    static function boot() {
        self::observe( \App\Observers\FaturasObserver::class);
    }
}

// End of file
