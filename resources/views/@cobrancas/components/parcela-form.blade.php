<div class="col-5">

  @if($fatura = session()->get('fatura'))
  <form action="{{ url('/parcelas/cobranca/'.$cobranca->id.'/'.$fatura->id) }}" method="POST" class="card">
  @else  
  <form action="{{ url('/parcelas/cobranca/'.$cobranca->id) }}" method="POST" class="card">
  @endif
    
    {{ csrf_field() }}

    <div class="card-header">
        <h3 class="card-title">
          Formulário parcela
        </h3>
        <div class="card-options">
          @if(session()->get('fatura'))
            <a href="{{ url('parcelas/cobranca/'.$cobranca->id) }}" class="btn btn-info">
              Voltar
            </a>
          @endif
        </div>
    </div>
  
    <div class="card-body">
        <div class="row">
          <div class="col">
              @select('conta_bancaria_id', '* Conta bancária')
                @foreach( $contas as $conta )
                @option('fatura', 'conta_bancaria_id', $conta->id, $conta->nome )
                @endforeach
              @endselect('conta_bancaria_id')
          </div>
        </div>

        <div class="row">
          <div class="col">
            @fnumber('fatura', 'valor', '* Valor', 'R$' )
          </div>
          <div>
            @fdate('fatura', 'vencimento', '* Vencimento', '12/12/2019' )
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group pb-1">
              <label class="form-label">Nota fiscal</label>
              <input type="file" name="" id="">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label class="form-label">Link de pagamento</label>
              <a href="">pagseguro.com.br/id_da_cobranca</a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label class="form-label">Código da parcela (utilizado pelo PagSeguro)</label>
              fre232dfs34gg56675
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            @select('status', '* Status')
              @option('fatura', 'status', 'A', 'Aberta' )
              @option('fatura', 'status', 'P', 'Paga' )
              @option('fatura', 'status', 'C', 'Cancelada' )
            @endselect('status')
          </div>
        </div>

    </div>

    <div class="card-footer">
      <button class="btn btn-success btn-block">
        Salvar parcela
      </button>
    </div>
  </form>
</div>