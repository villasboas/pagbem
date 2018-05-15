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
        'Código' => 'id',
        'Conta Bancária'  => 'nome',
        'Valor'  => 'valor',
        'Data'   => 'created_at',
        ''       => 'actions'
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
        ->select(['movimentacoes.id', 'nome', 'valor','movimentacoes.created_at', 'movimentacoes.id as actions' ])
        ->where('movimentacoes.tipo', 'S')
        ->orderBy('movimentacoes.id', 'DESC');

        // Monta o datatable
        return Datatables::of( $query )
        ->editColumn('actions', function( $model ) {
            return '<div class="item-action dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a href="'.url('transferencias/remover/'.$model->id).'" class="dropdown-item"><i class="dropdown-icon fe fe-trash"></i> Deletar </a>
                        <a href="'.url('transferencias/'.$model->id).'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>                    </div>
                    </div>';
        })
        ->editColumn('valor', function( $model ) {
            return 'R$ '.number_format($model->valor,2,',','.');
        })
        ->editColumn('created_at', function( $model ) {
            return date('H:i:s d/m/Y', strtotime( $model->created_at ) );
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
