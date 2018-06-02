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
     * Obtem as contabilidades
     *
     * @return void
     */
    private function __filter() {
        
    }
    
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
    function show(Request $request) {

        // Obtem a data de filtro
        $endAt   = $request->query('end_at', agora('Y-m-d'));
        $startAt = $request->query('start_at', date('Y-m-d', strtotime('-1 month', strtotime($endAt))));

        // Faz a contabilidade das parcelas
        $faturas = Faturas::whereBetween('created_at', [ $startAt, $endAt ])
        ->where('status', '<>', 'C');
        $faturasPagas = Faturas::whereBetween('created_at', [ $startAt, $endAt ])
        ->where('status', 'P');

        // Obtem o builder do datatable
        $builder = ParcelasDatatables::builder('invoices');

        // Renderiza a view
        return view('@dashboard.pages.home', [ 
            'title'        => 'Inicio',
            'builder'      => $builder,
            'faturas'      => $faturas,
            'faturasPagas' => $faturasPagas
        ]);
    }
}

// End of file
