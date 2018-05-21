<?php

namespace App\Http\Controllers\Financeiro;

use Illuminate\Http\Request;
use App\Models\Movimentacoes;
use App\Models\ContasBancarias;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransferenciaRequest;
use App\Datatables\TransferenciasDatatables;

/**
 * @Middleware("web")
 * @Middleware("guard:A")
 * 
 */
class TransferenciasController extends Controller {

    /**
     * Url do datatables
     *
     * @Get("/transferencias/datatables")
     * @return void
     */
    function datatables() {
        return TransferenciasDatatables::render();
    }

    /**
     * @Get("/transferencias")
     *
     * @return void
     */
    function index() {
        
        // Obtem todas as contas bancarias ativas
        $contas = ContasBancarias::where('status','A')->get();
        
        // Obtem o builder do datatable
        $builder = TransferenciasDatatables::builder('transferencias/datatables');

        // Volta a view
        return view('@contas.pages.transferencias',[
            'contas' => $contas,
            'builder' => $builder,
            'title' => 'Transferências'
        ]);
    }

    /**
     * @Post("/transferencias")
     *
     * @param TransferenciaRequest $request
     * @return void
     */
    function create( TransferenciaRequest $request, Movimentacoes $movimentacoes ) {
        try {

            // Preenche os dados da movimentacao
            $movimentacoes->fill( $request->all() );
            $movimentacoes->tipo = 'S';

            // Obtem o saldo
            $saldo = Movimentacoes::getBalance();
            if ( $saldo < $movimentacoes->valor ) {
                return back()->with('error', 'O seu saldo atual é inferior ao valor da transferência!');
            }

            $movimentacoes->save();
            return back()->with('success', 'Transferência registrada com sucesso!');
        } catch( \Error $e ) {
            return back()->with('error', $e->getMessage() );
        }
    }

    /**
     * @Get("/transferencias/remover/{movimentacao}")
     *
     * @return void
     */
    function remove( Movimentacoes $movimentacao ) {
        try {

            // Remove um usuario
            $movimentacao->delete();

            // Volta para a pagina original
            return back()->with('success', 'Conta removida com sucesso!');
        } catch( \Error $e ) {  

            // Volta a mensagem de erro
            return redirect('contas')->with( 'error', $e->getMessage() );
        }
    }
}

// End of file
