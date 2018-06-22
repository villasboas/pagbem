<div class="col-5">

  @if($fatura = session()->get('fatura'))
  <form novalidate enctype="multipart/form-data" action="{{ url('/parcelas/cobranca/'.$cobranca->id.'/'.$fatura->id) }}" method="POST" class="card">
  @else  
  <form novalidate enctype="multipart/form-data" action="{{ url('/parcelas/cobranca/'.$cobranca->id) }}" method="POST" class="card">
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
              <input type="file" name="nota_fiscal">
              <br>
              @if($fatura && $fatura->nota_fiscal)
              <a target="blank" href="{{url('storage/'.$fatura->nota_fiscal)}}">Baixar nota fiscal</a>
              @endif
            </div>
          </div>
        </div>

        @if($fatura)
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label class="form-label">Link de pagamento</label>
              <a href="{{ $fatura->link_pagseguro }}">Clique aqui para ver o link</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label class="form-label">Código da parcela (utilizado pelo PagSeguro)</label>
              {{ $fatura->codigo }}
            </div>
          </div>
        </div>
        @endif

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
      <button data-submit="submit" class="btn btn-success btn-block">
        Salvar parcela
      </button>
    </div>
  </form>
</div>

@if($fatura && $fatura->status != 'A' )
  @push('scripts')
  <script>
    $('#status').attr('readonly', 'readonly');
    $('#status').selectpicker('refresh');
  </script>
  @endpush
@endif