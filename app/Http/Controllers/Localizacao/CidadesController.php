<?php

namespace App\Http\Controllers\Localizacao;

use App\Models\Cidades;
use App\Models\Estados;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Middleware("web")
 * Middleware("guard:any")
 * 
 */
class CidadesController extends Controller {

    /**
     * @Get("api/v1/estado/{estado}/cidades")
     *
     * @param Estados $estado
     * @return void
     */
    function list(Request $request, $estado ) {
        return [ 'status' => 200, 'data' => Cidades::where('estados_id', $estado )->get() ];
    }
}

// End of file

