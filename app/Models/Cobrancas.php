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

    /**
     * Undocumented function
     *
     * @return void
     */
    function updateTotal() {

        // obtem os totais
        $total = $this->total;
        $totalCalculado = 0;

        // Calcula o total registrado nas faturas
        foreach( $this->faturas as $fatura ) {
            if ( $fatura->status != 'C' ) $totalCalculado += $fatura->valor;
        }

        // Verifica se são diferentes e, se forem, salva o novo total
        if ( $total <> $totalCalculado ) {
            $this->total = $totalCalculado;
            $this->save();
        }
    }
}

// End of file
