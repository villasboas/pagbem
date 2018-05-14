<?php

namespace App\Http\Controllers\Clientes;

use App\Models\Clientes;
use App\Models\Cidades;
use App\Models\Estados;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientesRequest;
use App\Datatables\ClientesDatatables;


/**
 * @Middleware("web")
 * 
 */
class ClientesController extends Controller {
    
    /**
     * Url do datatables
     *
     * @Get("/clientes/datatables")
     * @return void
     */
    function datatables() {
        return ClientesDatatables::render();
    }

    /**
     * @Get("/clientes")
     *
     * @return void
     */
    function index() {
        
        // Obtem as cidades
        $cidades = Cidades::get();

        // Obtem os estados
        $estados = Estados::get();

        // Obtem o builder
        $builder = ClientesDatatables::builder('clientes/datatables');

        // Volta a view
        return view('@clientes.pages.home', [ 
            'title'   => 'Clientes',
            'cidades' => $cidades,
            'estados' => $estados,
            'builder' => $builder
        ]);
    }

    /**
     * @Post("/clientes/{cliente}")
     *
     * @param ContasBancarias $usuarios
     * @return void
     */
    function store( ContasRequest $request, Clientes $cliente ) {

        // Preenche o usuário
        $cliente->fill( removeIfNull( $request->all() ) );
        
        // Salva o usuário
        try {
            $cliente->save();
            return back()->with('success', 'Cliente salvo com sucesso.' );
        } catch( \Error $e ) {
            return back()->with('error', $e->getMessage() );
        }
    }

    /**
     * @Post("/clientes")
     *
     * @return void
     */
    function create( ClientesRequest $request, Clientes $cliente  ) {
        try {
            $cliente->fill( $request->all() )->save();
            return back()->with('success', 'Cliente salvo com sucesso!' );
        } catch( \Error $e ) {
            return back()->with('error', $e->getMessage() );
        }
    }

    /**
     * @Get("/clientes/remover/{cliente}")
     *
     * @param Usuarios $usuario
     * @return void
     */
    function remove( Clientes $cliente ) {
        try {

            // Remove um usuario
            $cliente->delete();

            // Volta para a pagina original
            return back()->with('success', 'Cliente com sucesso!');
        } catch( \Error $e ) {  

            // Volta a mensagem de erro
            return redirect('clientes')->with( 'error', $e->getMessage() );
        }
    }

    /**
     * @Get("/clientes/{cliente}")
     *
     * @param ContasBancarias $usuarios
     * @return void
     */
    function showEditForm( Clientes $cliente ) {

        // Seta o flash na sessao
        session()->flash('cliente', $cliente);

        // Volta o index
        return $this->index();
    }
}

// End of file
