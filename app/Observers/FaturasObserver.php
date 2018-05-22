<?php

namespace App\Observers;

use PagSeguro;
use App\Models\Faturas;

class FaturasObserver {

    /**
     * Quando atualizar uma cobrança
     *
     * @param Faturas $cobranca
     * @return void
     */
    public function updated(Faturas $fatura) {
        $fatura->cobranca->updateTotal();
    }

    /**
     * Quando atualizar uma cobrança
     *
     * @param Faturas $cobranca
     * @return void
     */
    public function created(Faturas $fatura) {
        $fatura->cobranca->updateTotal();
    }

    /**
     * Escuta ao evento de criação de cobrança
     *
     * @param  App\Models\Faturas  $cobranca
     * @return void
     */
    public function creating(Faturas $fatura){

        // Carrega o lead
        $data = [
            'reference' => $fatura->codigo,
            'items' => [ 
                [
                    'id'           => 1,
                    'description'  => $fatura->cobranca->descricao,
                    'quantity'     => 1,
                    'amount'       => $fatura->valor,
                    'weight'       => 0,
                    'shippingCost' => 0,
                    'width'        => 0,
                    'height'       => 0,
                    'length'       => 0
                ]
            ],
            'shipping' => [
                'address' => [
                    'postalCode' => $fatura->cobranca->cliente->cep,
                    'street'     => $fatura->cobranca->cliente->logradouro,
                    'number'     => $fatura->cobranca->cliente->numero,
                    'district'   => $fatura->cobranca->cliente->bairro,
                    'city'       => $fatura->cobranca->cliente->cidade->nome,
                    'state'      => $fatura->cobranca->cliente->cidade->estado->sigla,
                    'country'    => 'BRA'
                ],
                'type' => 3, 
                'cost' => 0
            ],
            'sender' => [
                'email'     => $fatura->cobranca->cliente->email,
                'name'      => $fatura->cobranca->cliente->nome,
                'documents' => [
                    [
                        'number' => $fatura->cobranca->cliente->documento,
                        'type' => $fatura->cobranca->cliente->tipo_documento == 'F' ? 'CPF' : 'CNPJ'
                    ]
                ],
                'phone'    => $fatura->cobranca->cliente->telefone,
                'bornDate' => null,
            ]
        ];

        // Inicia o checkout
        $checkout = PagSeguro::checkout()->createFromArray($data);

        // Obtem as credenciais
        $credentials = PagSeguro::credentials()->get();

        // Envia o checkout para o pagseguro
        $information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information

        // Verifica se existe um feedback
        if ($information) {
            $fatura->link_pagseguro   = $information->getLink();
        }
    }
}

// End of file
