<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Faturas;
use App\Models\Clientes;
use App\Models\Movimentacoes;
use App\Http\Controllers\Controller;
use App\Datatables\ParcelasDatatables as ParcelasDatatables;

/**
 * @Middleware("web")
 * @Middleware("guard:any")
 * 
 */
class HomeController extends Controller {

    /**
     * 
     * @Get("/invoices")
     * @return void
     */
    function datatables() {
        return ParcelasDatatables::renderWithoutBilling();
    }

    /**
     * @Get("/")
     *
     * @return void
     */
    function show() {

        // Obtem o builder do datatable
        $builder = ParcelasDatatables::builder('invoices');

        // Renderiza a view
        return view('@dashboard.pages.home', [ 
            'title' => 'Inicio',
            'builder' => $builder,
        ]);
    }
}

// End of file
