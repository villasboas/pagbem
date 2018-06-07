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
     * Obtem o status da movimentacao
     *
     * @return void
     */
    function movimentacao() {
        return $this->hasOne('App\Models\Movimentacoes', 'faturas_id');
    }

    /**
     * Boot da model
     *
     * @return void
     */
    static function boot() {
        self::observe( \App\Observers\FaturasObserver::class);
    }

    /**
     * Cria a movimentacao respectiva a essa cobranca
     *
     * @return void
     */
    function criarMovimentacao() {
        $movimentacao = new Movimentacoes();
        $movimentacao->valor = $this->valor;
        $movimentacao->tipo = 'E';
        $movimentacao->faturas_id = $this->id;
        $movimentacao->contas_bancarias_id = $this->contas_bancarias_id;
        $movimentacao->save();
    }
}

// End of file
