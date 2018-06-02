<div class="row">
    <div class="col-xs-12 col-sm-4">
        <div class="card">
        <div class="card-header">
            Clientes
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    Em dia
                </div>
                <div class="card-body">
                    <h1 class="text-success">
                    {{ App\Models\Clientes::where('status', 'A')->count()}}
                    </h1>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Inadimplentes
                </div>
                <div class="card-body">
                    <h1 class="text-danger">
                    {{ App\Models\Clientes::where('status', 'I')->count()}}
                    </h1>
                </div>
            </div>
        </div>
        </div>
    </div><!-- clientes -->

    <div class="col-xs-12 col-sm-4">
        <div class="card">
            <div class="card-header">
                Cobranças
            </div>
            <div class="card-body p-4">
                <div class="card">
                    <div class="card-header">
                        Previstas
                    </div>
                    <div class="card-body p-2 pl-5">
                        <h5 class="text-success">
                        {{ App\Models\Faturas::where('status', '<>', 'C')->count() }}
                        </h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Vencidas
                    </div>
                    <div class="card-body p-2 pl-5">
                        <h5 class="text-danger">
                        {{ App\Models\Faturas::where([['status', 'A'], ['vencimento', '<', agora()]])->count()}}
                        </h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Recebidas
                    </div>
                    <div class="card-body p-2 pl-5">
                        <h5 class="text-success">
                        {{ App\Models\Faturas::where('status', 'P' )->count()}}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- cobrancas -->

    <div class="col-xs-12 col-sm-4">
        <div class="card">

            <form action="" method="GET" class="card-header">
                <div class="row">
                    <div class="col-4">
                        <input  type="date" 
                                name="start_at"
                                class="form-control">
                    </div>
                    <div class="col-4">
                        <input  type="date" 
                                name="end_at"
                                class="form-control">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-block py-1 btn-primary">
                            Filtrar
                        </button>
                    </div>
                </div>
            </form>

            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        Recebido
                    </div>
                    <div class="card-body">
                        <h1 class="text-success">
                            {{money($faturasPagas->sum("valor"))}}
                        </h1>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Previsto
                    </div>
                    <div class="card-body">
                        <h1 class="text-danger">
                            {{money($faturas->sum("valor"))}}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- valores recebidos -->
</div>