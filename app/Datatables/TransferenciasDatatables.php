<?php

namespace App\Datatables;

use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;

class TransferenciasDatatables extends CoreDatatables {

    /**
     * Instancia do builder
     * 
     */
    static $builder;

    /**
     * Colunas da tabela
     * 
     */
    static $columns = [
        'Código' => 'movimentacoes.id',
        'Conta Bancária'  => 'contas_bancarias.nome',
        'Valor'  => 'movimentacoes.valor',
        'Data'   => 'movimentacoes.created_at',
        'Ações'  => 'actions'
    ];

    /**
     * Renderiza a tabela
     *
     * @return void
     */
    static function render() {
        
        // Monta a query
        $query = Db::table('movimentacoes')
        ->join('contas_bancarias', 'movimentacoes.contas_bancarias_id', '=', 'contas_bancarias.id')
        ->select([  'movimentacoes.id as movimentacoes.id', 
                    'contas_bancarias.nome as contas_bancarias.nome', 
                    'movimentacoes.valor as movimentacoes.valor',
                    'movimentacoes.created_at as movimentacoes.created_at' ])
        ->where('movimentacoes.tipo', 'S');

        // Monta o datatable
        return Datatables::of( $query )
        ->addColumn('actions', function( $model ) {
            return '<div class="item-action dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="'.url('transferencias/remover/'.$model->{'movimentacoes.id'}).'" class="dropdown-item"><i class="dropdown-icon fe fe-trash"></i> Deletar </a>
                        </div>
                    </div>';
        })
        ->editColumn('movimentacoes.valor', function( $model ) {
            return 'R$ '.number_format($model->{'movimentacoes.valor'},2,',','.');
        })
        ->editColumn('movimentacoes.created_at', function( $model ) {
            return paraLer( $model->{'movimentacoes.created_at'} );
        })
        ->rawColumns(['actions'])
        ->make( true );
    }

    /**
     * Função do builder
     *
     * @param [type] $url
     * @param array $columns
     * @return void
     */
    static function builder( $url, $columns = [] ) {
        return parent::builder( $url, self::$columns );
    }
}

// End of file
