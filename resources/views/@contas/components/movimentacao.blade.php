<div class="col-5">
    
        @if($movimentacao = session()->get('movimentacao'))
        <form action="{{ url('transferencias/'.$movimentacao->id) }}" method="POST" class="card">
        @else
        <form action="{{ url('transferencias') }}" method="POST" class="card">
        @endif
    
          {{ csrf_field() }}
    
          <div class="card-header">
              Formulário de transferência
              @if($usuarios = session()->get('conta'))
              <div class="card-options">
                <a href="{{ url('contas' )}}" class="btn btn-info">
                  Voltar
                </a>
              </div>
              @endif
          </div>
          <div class="card-body">

              <div class="row">
                  <div class="col">
                      @select('contas_bancarias_id', '* Conta bancária')
                        @foreach($contas as $conta)
                        @option('movimentacao', 'contas_bancarias_id', $conta->id, $conta->nome )
                        @endforeach
                      @endselect('contas_bancarias_id')
                  </div>
              </div>

              <div class="row">
                <div class="col">
                  @fnumber( 'movimentacao', 'valor', '* Valor')
                </div>
              </div>
    
          </div>
    
          <div class="card-footer">
            <button class="btn btn-success btn-block">
              Informar transferência
            </button>
          </div>
        </form>
    </div>