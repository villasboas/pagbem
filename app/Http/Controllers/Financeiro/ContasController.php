<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Bancos;
use Illuminate\Http\Request;
use App\Models\ContasBancarias;
use App\Http\Requests\ContasRequest;
use App\Http\Controllers\Controller;
use App\Datatables\ContasBancariasDatatables;

/**
 * @Middleware("web")
 * 
 */
class ContasController extends Controller {

    /**
     * Url do datatables
     *
     * @Get("/contas/datatables")
     * @return void
     */
    function datatables() {
        return ContasBancariasDatatables::render();
    }

    /**
     *@Get("/contas")
     *
     * @return void
     */
    function index() {

        // Carrega os bancos
        $bancos = Bancos::get();

        // Obtem o builder do datatable
        $builder = \App\Datatables\ContasBancariasDatatables::builder('contas/datatables');

        // Volta a view formatada
        return view( '@contas.pages.home', [ 
            'title'   => 'Contas Bancárias',
            'builder' => $builder,
            'bancos'  => $bancos
        ]);
    }

    /**
     * @Post("/contas/{conta}")
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
     * @Post("/contas")
     *
     * @return void
     */
    function create( ContasRequest $request, ContasBancarias $conta ) {
        try {
            $conta->fill( $request->all() )->save();
            return back()->with('success', 'Conta adicionada com sucesso!' );
        } catch( \Error $e ) {
            return back()->with('error', $e->getMessage() );
        }
    }

    /**
     * @Get("/contas/remover/{conta}")
     *
     * @param Usuarios $usuario
     * @return void
     */
    function remove( ContasBancarias $conta ) {
        try {

            // Remove um usuario
            $conta->delete();

            // Volta para a pagina original
            return back()->with('success', 'Conta removida com sucesso!');
        } catch( \Error $e ) {  

            // Volta a mensagem de erro
            return redirect('contas')->with( 'error', $e->getMessage() );
        }
    }

    /**
     * @Get("/contas/{conta}")
     *
     * @param ContasBancarias $usuarios
     * @return void
     */
    function showEditForm( ContasBancarias $conta ) {

        // Seta o flash na sessao
        session()->flash('conta', $conta);

        // Volta o index
        return $this->index();
    }
}

// End of file
