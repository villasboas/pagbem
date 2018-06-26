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

        // Verifica se a cobrança foi dada como paga
        if ( $cobranca->status == 'C' ) {

            // Percorre todas as faturas da cobrança
            foreach( $cobranca->faturas as $fatura ) {

                // Verifica se a fatura já não foi marcada como paga
                if ( $fatura->status != 'P' ) {

                    // Seta a fatura como cancelada
                    $fatura->status = 'C';
                    $fatura->save();
                }
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
                $vencimento = date('Y-m-d H:i:s', strtotime( $cobranca->vencimento_primeira_parcela ) );
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
