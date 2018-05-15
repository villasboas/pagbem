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
            'builder' => $builder
        ]);
    }

    /**
     * @Post("/transferencias/{conta}")
     *
     * @param ContasBancarias $usuarios
     * @return void
     */
    function store( ContasRequest $request, ContasBancarias $conta ) {

        // Preenche o usuário
        $conta->fill( removeIfNull( $request->all() ) );
        
        // Salva o usuário
        try {
            $conta->save();
            return back()->with('success', 'Conta bancária salvo com sucesso.' );
        } catch( \Error $e ) {
            return back()->with('error', $e->getMessage() );
        }
    }

    /**
     * @Post("/transferencias")
     *
     * @param TransferenciaRequest $request
     * @return void
     */
    function create( TransferenciaRequest $request, Movimentacoes $movimentacoes ) {
        try {
            $movimentacoes->fill( $request->all() );
            $movimentacoes->tipo = 'S';
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

    /**
     * @Get("/transferencias/{conta}")
     *
     * @param ContasBancarias $usuarios
     * @return void
     */
    function showEditForm( Movimentacoes $movimentacao ) {

        // Seta o flash na sessao
        session()->flash('movimentacao', $movimentacao);

        // Volta o index
        return $this->index();
    }
}

// End of file
