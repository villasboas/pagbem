<?php

namespace App\Http\Controllers\Crons;

use Illuminate\Http\Request;
use App\Models\Faturas as Faturas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\LinkFatura as LinkFatura;

/**
 * Controller de faturas atrasadas
 * @Middleware("web")
 * 
 */
class LinksPagamentoController extends Controller {
    
    /**
     * Execeuta o CRON
     *
     * @Get("/crons/faturas/emails")
     * 
     * @param Request $request
     * @return void
     */
    function run(Request $request) {

        // Obtem as datas de referencia
        $to   = agora('Y-m-d'); 
        $from = date('Y-m-d', strtotime('+5 days', strtotime(agora())));
        
        // Obtem as faturas em atrasa
        $faturasAbertas = Faturas::where([
            ['status', '=', 'A']
        ])->whereBetween('vencimento', [$to, $from]);

        // Percorre todas as faturas atrasadas
        foreach( $faturasAbertas->cursor() as $fatura ) {

            // Exibe o e-mail
            Mail::to($fatura->cobranca->cliente->email)->send(new LinkFatura(['fatura' => $fatura]));
        }
    }
}

// End of file
