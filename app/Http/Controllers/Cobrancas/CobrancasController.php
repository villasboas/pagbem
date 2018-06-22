<?php

namespace App\Http\Controllers\Cobrancas;

use App\Models\Clientes;
use App\Models\Cobrancas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CobrancaRequest;
use App\Datatables\CobrancasDatatables;

/**
 * @Middleware("web")
 * @Middleware("guard:any")
 */
class CobrancasController extends Controller {

    /**
     * @Get("/cobrancas")
     *
     * @return void
     */
    function index() {     
        
        // Obtem o builder do datatable
        $builder = CobrancasDatatables::builder('cobrancas/datatables');

        // Obtem os clientes
        $clientes = Clientes::where('status', '<>', 'B')->get();

        // Carrega a view
        return view('@cobrancas.pages.home', [ 
            'title' => 'Cobranças',
            'clientes' => $clientes,
            'builder' => $builder
        ]);
    }

    /**
     * @Get("cobrancas/datatables")
     *
     * @return void
     */
    function datatables() {
        return CobrancasDatatables::render();
    }

    /**
     * @Post("/cobrancas")
     *
     * @return void
     */
    function create( CobrancaRequest $request, Cobrancas $cobranca ) {
        try {
            $cobranca->fill( $request->all() )->save();
            return back()->with('success', 'Cobrança criada com sucesso!' );
        } catch( \Error $e ) {
            return back()->with('error', 'Erro ao criar a cobrança.');
        }
    }

    /**
     * @Post("/cobrancas/{cobranca}")
     *
     * @param Cobrancas $cobrancas
     * @return void
     */
    function store( CobrancaRequest $request, Cobrancas $cobranca ) {

        // Preenche o usuário
        $cobranca->fill( removeIfNull( $request->all() ) );
        
        // Salva o usuário
        try {
            $cobranca->save();
            return back()->with('success', 'Cobrança salvo com sucesso.' );
        } catch( \Error $e ) {
            return back()->with('error', $e->getMessage() );
        }
    }

    /**
     * @Get("/cobrancas/{cobranca}")
     *
     * @param Cobrancas $cobranca
     * @return void
     */
    function showEditForm( Cobrancas $cobranca ) {

        // Seta o flash na sessao
        session()->flash('cobranca', $cobranca);

        // Volta o index
        return $this->index();
    }
}

// End of file
