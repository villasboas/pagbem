<div class="col-5">
  @php
  $cobranca = session()->get('cobranca');
  @endphp
  @if($cobranca)
  <form action="{{ url('cobrancas/'.$cobranca->id) }}" method="POST" class="card">
  @else
  <form action="{{ url('cobrancas') }}" method="POST" class="card">
  @endif

    {{ csrf_field() }}
    <div class="card-header">
        Formulário cobrança
        @if($usuarios = session()->get('cobranca'))
        <div class="card-options">
          <a href="{{ url('cobrancas' )}}" class="btn btn-info">
            Voltar
          </a>
        </div>
        @endif
    </div>

    @errorAlert
    @successAlert

    <div class="card-body">
      <div class="row">
        <div class="col">
          @select('clientes_id', '* Cliente')
            @foreach( $clientes as $cliente )
            @option('cobranca', 'clientes_id', $cliente->id, $cliente->nome )
            @endforeach
          @endselect('clientes_id')
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label class="form-label {{ __e('descricao') }}">*Descrição</label>
            <textarea class="form-control {{ __e( 'descricao', 'is-invalid' ) }}" 
                      name="descricao" 
                      id="descricao" 
                      cols="30" 
                      rows="5">{!! $cobranca ? $cobranca->descricao : '' !!}</textarea>
            {!! __bte( 'descricao' ) !!}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          @fnumber('cobranca', 'total', '* Total', 'R$' )
        </div>
      </div>

      <div class="row">
        <div class="col-4">
          @fnumber('cobranca', 'parcelas', '* Nº de parcelas' )
        </div>
        <div class="col">
          @fdate('cobranca', 'vencimento_primeira_parcela', 'Vencimento da primeira parcela' )
        </div>
      </div>

      <div class="row">
        <div class="col">
          @select('status', '* Status')
            @option('cobranca', 'status', 'A', 'Aberta' )
            @option('cobranca', 'status', 'P', 'Paga' )
            @option('cobranca', 'status', 'C', 'Cancelada' )
          @endselect('status')
        </div>
      </div>
    </div>

    <div class="card-footer">
      <button class="btn btn-success btn-block">
        Registrar cobrança
      </button>
    </div>
  </form>
</div>