<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cobrancas extends Model {

    /**
     * Tabela no banco de dados
     *
     * @var string
     */
    protected $table = 'cobrancas';

    /**
     * Campos que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = [
        'clientes_id',
        'descricao',
        'total',
        'parcelas',
        'vencimento_primeira_parcela',
        'status'
    ];

    /**
     * Boot da model
     *
     * @return void
     */
    static function boot() {
        self::observe( \App\Observers\CobrancasObserver::class);
    }

    /**
     * Relacao com fatura
     *
     * @return void
     */
    function faturas() {
        return $this->hasMany('App\Models\Faturas');
    }

    /**
     * Relacao com o cliente
     *
     * @return void
     */
    function cliente() {
        return $this->belongsTo('App\Models\Clientes', 'clientes_id');
    }
}

// End of file
