<?php

namespace App\Datatables;

use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;

class ParcelasDatatables extends CoreDatatables {

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
        'Valor' => 'valor',
        'Vencimento' => 'vencimento',
        'Status' => 'status',
        '' => 'actions'
    ];

    /**
     * Renderiza a tabela
     *
     * @return void
     */
    static function render( $cobranca ) {
        
        // Monta a query
        $query = Db::table('faturas')
        ->select(['id', 'valor', 'vencimento', 'status'])
        ->where('cobrancas_id', $cobranca->id );

        // Monta o datatable
        return Datatables::of( $query )
        ->editColumn('status',function($model){
            switch( $model->status ) {
                case 'A':
                    return __tag( 'Aberta', 'blue' );
                break;
                case 'P':
                    return __tag( 'Paga', 'green' );
                break;
                case 'C':
                    return __tag( 'Cancelada', 'red' );
                break;
                case 'V':
                    return __tag( 'Atrasada', 'warning' );
                break;
                default:
                    return $model->status;
            }
        })
        ->addColumn('actions', function( $model ) {
        return '<div class="item-action dropdown">
                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                    <a href="'.url('parcelas/editar/'.$model->id).'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>                    </div>
                </div>';
        })
        ->editColumn('vencimento', function($model){
            return paraLer($model->vencimento);
        })
        ->editColumn('valor', function($model){
            return money($model->valor);
        })
        ->rawColumns(['status', 'actions'])
        ->make( true );
    }

    /**
     * Renderiza a tabela de parcelas sem associalas a uma cobranca
     *
     * @return void
     */
    static function renderWithoutBilling() {

        // Monta a query
        $query = Db::table('faturas')
        ->select(['id', 'valor', 'vencimento', 'status'])
        ->orderBy('id', 'DESC');

        // Monta o datatable
        return Datatables::of( $query )
        ->editColumn('status',function($model){
            switch( $model->status ) {
                case 'A':
                    return __tag( 'Aberta', 'blue' );
                break;
                case 'P':
                    return __tag( 'Paga', 'green' );
                break;
                case 'C':
                    return __tag( 'Cancelada', 'red' );
                break;
                case 'V':
                    return __tag( 'Atrasada', 'warning' );
                break;
                default:
                    return $model->status;
            }
        })
        ->addColumn('actions', function( $model ) {
        return '<div class="item-action dropdown">
                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                    <a href="'.url('parcelas/editar/'.$model->id).'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>                    </div>
                </div>';
        })
        ->editColumn('vencimento', function($model){
            return paraLer($model->vencimento);
        })
        ->editColumn('valor', function($model){
            return money($model->valor);
        })
        ->rawColumns(['status', 'actions'])
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
