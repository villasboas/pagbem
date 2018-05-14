<div class="col-5">
    <form action="" class="card">
        <div class="card-header">
            Formulário conta bancária
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @fgroup( 'conta','nome', '* Nome', 'Conta principal' )
                </div>
            </div>

            <div class="row">
                <div class="col">
                    @select('banco_id', '* Banco')
                      @option('conta', 'banco_id', 'J', '341 - Itau' )
                      @option('conta', 'banco_id', 'F', '661 - Nubank' )
                    @endselect('tipo_documento')
                </div>
                <div class="col">
                    @select('banco_id', '* Tipo')
                      @option('J', 'CORRENTE' )
                      @option('F', 'POUPANÇA' )
                    @endselect('tipo_documento')
                </div>
            </div>

            <div class="row">
              <div class="col-8">
                @fgroup( 'conta','agencia', 'Número da conta')
              </div>
              <div class="col-4">
                @fgroup( 'conta','digito_agencia', 'Digito' )
              </div>
            </div>

            <div class="row">
              <div class="col-8">
                @fgroup( 'conta','agencia', 'Agência')
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
                @fgroup( 'conta','nome_titular', 'Nome completo' )
              </div>
            </div>

            <div class="row">
                <div class="col-4">
                    @select('tipo_documento', '* Tipo')
                      @option('J', 'CNPJ' )
                      @option('F', 'CPF' )
                    @endselect('tipo_documento')
                </div>
                <div class="col">
                    @fgroup( 'conta','documento', '* Nº do documento', 'Digite o seu documento' )
                </div>
            </div>

            <div class="row">
              <div class="col">
                @femail('email', '* E-mail', 'Digite seu e-mail' )
              </div>
              <div class="col">
                @fgroup( 'conta','celular', '* Celular', '(**) *****-****')
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