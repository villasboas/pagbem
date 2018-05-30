<?php

namespace App\Http\Controllers\Crons;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faturas as Faturas;

/**
 * Controller de faturas atrasadas
 * @Middleware("web")
 */
class FaturasAtrasadasController extends Controller {
    

    /**
     * Execeuta o CRON
     *
     * @Get("/crons/faturas/baixar")
     * @param Request $request
     * @return void
     */
    function run(Request $request) {
        
        // Obtem as faturas em atrasa
        $faturasAtrasadas = Faturas::where([
            'status' => 'A',
            [ 'vencimento', '<=', agora() ]
        ]);

        // Percorre todas as faturas atrasadas
        foreach( $faturasAtrasadas->cursor() as $fatura ) {

            // Seta o status como vencida
            $fatura->status = "V";
            $fatura->save();

            // Seta o status da cobranca dessa fatura como atrasada tbm
            $fatura->cobranca->status = "V";
            $fatura->cobranca->save();

            // Salva o cliente da cobrança como inadimplente
            $fatura->cobranca->cliente->status = "I";
            $fatura->cobranca->cliente->save();
        }
    }
}

// End of file
