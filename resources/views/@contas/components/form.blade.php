<div class="col-5">
    
    @if($usuarios = session()->get('conta'))
    <form action="{{ url('contas/'.$usuarios->id) }}" method="POST" class="card">
    @else
    <form action="{{ url('contas') }}" method="POST" class="card">
    @endif

      {{ csrf_field() }}

      <div class="card-header">
          Formulário conta bancária
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
                  @fgroup( 'conta','nome', '* Nome', 'Conta principal' )
              </div>
          </div>

          <div class="row">
              <div class="col">
                  @select('bancos_id', '* Banco')
                    @foreach( $bancos as $banco )
                    @option('conta', 'bancos_id', $banco->id, $banco->nome )
                    @endforeach
                  @endselect('bancos_id')
              </div>
              <div class="col">
                  @select('tipo_conta', '* Tipo')
                    @option('conta', 'tipo_conta', 'J', 'CORRENTE' )
                    @option('conta', 'tipo_conta', 'F', 'POUPANÇA' )
                  @endselect('tipo_conta')
              </div>
          </div>

          <div class="row">
            <div class="col-8">
              @fgroup( 'conta','conta', '* Número da conta')
            </div>
            <div class="col-4">
              @fgroup( 'conta','digito_conta', 'Digito' )
            </div>
          </div>

          <div class="row">
            <div class="col-8">
              @fgroup( 'conta','agencia', '* Agência')
            </div>
            <div class="col-4">
              @fgroup( 'conta','digito_agencia', 'Digito' )
            </div>
          </div>

          <div class="page-header">
            <h6>Dados do titular</h6>
          </div>

          <div class="row">
            <div class="col">
              @fgroup( 'conta','titular', 'Nome completo' )
            </div>
          </div>

          <div class="row">
              <div class="col-4">
                  @select('tipo_documento_titular', '* Tipo')
                    @option('contas', 'tipo_documento_titular', 'J', 'CNPJ' )
                    @option('contas', 'tipo_documento_titular', 'F', 'CPF' )
                  @endselect('tipo_documento_titular')
              </div>
              <div class="col">
                  @fgroup( 'conta','documento_titular', '* Nº do documento', 'Informe um documento' )
              </div>
          </div>

          <div class="row">
            <div class="col">
              @femail('conta', 'email_titular', '* E-mail', 'Informe um e-mail' )
            </div>
            <div class="col">
              @fgroup( 'conta', 'celular_titular','celular', '* Celular', '(**) *****-****')
            </div>
          </div>

          <div class="page-header">
            <h6>Dados de disponibilidade</h6>
          </div>

          <div class="row">
            <div class="col">
                @select('status', '* Status')
                  @option('conta', 'status', 'A', 'Ativa' )
                  @option('conta', 'status', 'I', 'Inativa' )
                @endselect('status')
            </div>
          </div>

      </div>

      <div class="card-footer">
        <button class="btn btn-success btn-block">
          Salvar conta bancária
        </button>
      </div>
    </form>
</div>