<?php

namespace App\Datatables;

use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;

class UsuariosDatatables extends CoreDatatables {

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
        'Nome'   => 'nome',
        'E-mail' => 'email',
        'Último login' => 'ultimo_login',
        'Último IP' => 'ultimo_ip',
        'Status' => 'status',
        '' => 'actions'
    ];

    /**
     * Renderiza a tabela
     *
     * @return void
     */
    static function render() {
        
        // Monta a query
        $query = Db::table('usuarios')
        ->select(  ['id', 
                    'nome', 
                    'ultimo_ip',
                    'email', 
                    'ultimo_login', 
                    'status',
                    'id as actions' ])
        ->where( 'id', '<>', user()->id );

        // Monta o datatable
        return Datatables::of( $query )
        ->editColumn('status',function($model){
            switch( $model->status ) {
                case 'A':
                    return __tag( 'Ativo', 'green' );
                break;
                case 'B':
                    return __tag( 'Bloqueado', 'red' );
                break;
                default:
                    return $model->status;
            }
        })
        ->editColumn('actions', function( $model ) {
        return '<div class="item-action dropdown">
                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                    <a href="'.url('usuarios/remover/'.$model->id).'" class="dropdown-item"><i class="dropdown-icon fe fe-trash"></i> Deletar </a>
                    <a href="'.url('usuarios/'.$model->id).'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>                    </div>
                </div>';
        })
        ->rawColumns(['status','actions'])
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
