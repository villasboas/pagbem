<?php

namespace App\Datatables;

use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;

class MovimentacoesDatatable extends CoreDatatables {

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
        'Tipo'   => 'movimentacoes.tipo', 
    ];

    /**
     * Renderiza a tabela
     *
     * @return void
     */
    static function render() {
        
        // Monta a query
        $query = Db::table('movimentacoes')
        ->join('contas_bancarias', 'movimentacoes.contas_bancarias_id', '=', 'contas_bancarias.id', 'left')
        ->select([  'movimentacoes.id as movimentacoes.id', 
                    'contas_bancarias.nome as contas_bancarias.nome', 
                    'movimentacoes.valor as movimentacoes.valor', 
                    'movimentacoes.created_at as movimentacoes.created_at', 
                    'movimentacoes.tipo as movimentacoes.tipo' ])
        ->orderBy('movimentacoes.id', 'DESC');

        // Monta o datatable
        return Datatables::of( $query )
        ->editColumn('contas_bancarias.nome', function($model){
            if ($model->{'contas_bancarias.nome'}) {
                return $model->{'contas_bancarias.nome'};
            } else {
                return 'Pagamento de fatura';
            }
        })
        ->editColumn('movimentacoes.tipo', function($model){
            switch( $model->{'movimentacoes.tipo'}){
                case 'S':
                    return '<label class="label label-danger">Saída</label>';
                break;
                case 'E':
                    return '<label class="label label-success">Entrada</label>';
                break;
            }
        })
        ->editColumn('movimentacoes.valor', function( $model ) {
            return 'R$ '.number_format($model->{'movimentacoes.valor'},2,',','.');
        })
        ->editColumn('movimentacoes.created_at', function( $model ) {
            return date('H:i:s d/m/Y', strtotime( $model->{'movimentacoes.created_at'} ) );
        })
        ->rawColumns(['movimentacoes.tipo'])
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
