<?php

namespace App\Http\Controllers\Cobrancas;

use App\Models\Cobrancas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Datatables\ParcelasDatatables;

/**
 * @Middleware("web")
 * 
 */
class ParcelasController extends Controller {

    /**
     * @Get("/parcelas/datatables/{cobranca}")
     *
     * @param Cobrancas $cobranca
     * @return void
     */
    function datatables( Cobrancas $cobranca ) {
        return ParcelasDatatables::render( $cobranca );
    }

    /**
     *@Get("/parcelas/cobranca/{cobranca}/" )
     *
     * @return void
     */
    function index( Cobrancas $cobranca ) {

        // Obtem o builder
        $builder = ParcelasDatatables::builder('parcelas/datatables/'.$cobranca->id );

        // Mostra view
        return view('@cobrancas.pages.parcelas', [ 
            'title' => 'Parcelas',
            'builder' => $builder,
            'cobranca' => $cobranca
        ]);
    }
}

// End of file
