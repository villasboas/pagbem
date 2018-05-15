<?php

namespace App\Observers;

use App\Models\Cobrancas;
use App\Models\Faturas;

class CobrancasObserver {

    /**
     * Quando atualizar uma cobrança
     *
     * @param Cobrancas $cobranca
     * @return void
     */
    public function updated( Cobrancas $cobranca ) {
        if ( $cobranca->status <> 'A' ) {
            foreach( $cobranca->faturas as $fatura ) {
                $fatura->status = $cobranca->status;
                $fatura->save();
            }
        }
    }

    /**
     * Escuta ao evento de criação de cobrança
     *
     * @param  App\Models\Cobrancas  $cobranca
     * @return void
     */
    public function created(Cobrancas $cobranca){

        // Percorre o numero de parcelas da cobranca
        for( $i = 0; $i < $cobranca->parcelas; $i++ ) {

            // Seta o vencimento
            if ( $i == 0 ) {
                $vencimento = date('Y-m-d H:i:s', time() );
            } else {
                $vencimento = date('Y-m-d H:i:s', strtotime( '+'.$i.' months', strtotime( $cobranca->vencimento_primeira_parcela ) ) );
            }

            // Cria a fatura
            $fatura = new Faturas();

            // Preenche os dados
            $fatura->fill([
                'cobrancas_id' => $cobranca->id,
                'codigo'       => \App\Core\Token::generate(),
                'valor'        => $cobranca->total / $cobranca->parcelas,
                'vencimento'   => $vencimento,
                'status'       => 'A'
            ]);

            // Salva a fatura
            $fatura->save();
        }
    }
}

// End of file
