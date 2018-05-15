<?php

namespace App\Http\Controllers\Cobrancas;

use App\Models\Faturas;
use App\Models\Cobrancas;
use Illuminate\Http\Request;
use App\Models\ContasBancarias;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaturasRequest;
use App\Datatables\ParcelasDatatables;

/**
 * @Middleware("web")
 * @Middleware("guard:any")
 * 
 */
class ParcelasController extends Controller {

    /**
     * @Get("/parcelas/datatables/{cobranca}")
     *
     * @param Cobrancas $cobranca
     * @return void
     */
    function datatables( Cobrancas $cobranca ) {
        return ParcelasDatatables::render( $cobranca );
    }

    /**
     * @Post("/parcelas/cobranca/{cobranca}")
     *
     * @return void
     */
    function create(FaturasRequest $request, Cobrancas $cobranca, Faturas $fatura ) {
        try {
            $data = $request->all();
            $data['cobrancas_id'] = $cobranca->id;
            $data['codigo'] = \App\Core\Token::generate();
            $fatura->fill($data)->save();
            return back()->with('success', 'Fatura criada com sucesso!');
        } catch( \Error $e ) {
            return back()->with('error', $e->getMessage() );
        }
    }

    /**
     * @Post("/parcelas/cobranca/{cobranca}/{fatura}")
     *
     * @param FaturasRequest $request
     * @return void
     */
    function store(FaturasRequest $request, Cobrancas $cobranca, Faturas $fatura) {
        try {
            $fatura->fill($request->all())->save();
            return back()->with('success', 'Fatura salva com sucesso');
        } catch( \Error $e ) {
            return back()->with('error','Erro ao salvar a parcela');
        }
    }

    /**
     * @Get("/parcelas/editar/{fatura}")
     *
     * @param Cobrancas $cobranca
     * @param Faturas $fatura
     * @return void
     */
    function showEditForm( Faturas $fatura ) {
        session()->flash('fatura',$fatura);
        $cobranca = $fatura->cobranca;
        return $this->index( $cobranca );
    }

    /**
     * @Get("/parcelas/cobranca/{cobranca}/")
     *
     * @return void
     */
    function index( Cobrancas $cobranca ) {

        // Obtem o builder
        $builder = ParcelasDatatables::builder('parcelas/datatables/'.$cobranca->id );

        // Obtem as contas bancarias
        $contas = ContasBancarias::where('status','A')->get();

        // Mostra view
        return view('@cobrancas.pages.parcelas', [ 
            'title' => 'Parcelas',
            'builder' => $builder,
            'cobranca' => $cobranca,
            'contas' => $contas
        ]);
    }
}

// End of file
