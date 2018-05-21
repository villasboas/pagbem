<?php

namespace App\Http\Controllers\Financeiro;

use Illuminate\Http\Request;
use App\Models\Movimentacoes;
use App\Http\Controllers\Controller;
use App\Datatables\MovimentacoesDatatable;

/**
 * @Middleware("web")
 * @Guard("any")
 * 
 */
class MovimentacoesController extends Controller {

    /**
     * Url do datatables
     *
     * @Get("/movimentacoes/datatables")
     * @return void
     */
    function datatables() {
        return MovimentacoesDatatable::render();
    }

    /**
     * @Get("movimentacoes")
     *
     * @return void
     */
    function index() {

        // Obtem o builder do datatable
        $builder = MovimentacoesDatatable::builder('movimentacoes/datatables');

        // Volta a view
        return view('@contas.pages.movimentacoes',[
            'title' => 'Movimentações',
            'builder' => $builder
        ]);
    }
}

// End of file
