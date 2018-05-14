<div class="col-5">
    <form action="" class="card">
        <div class="card-header">
            Formulário cliente
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    @fgroup( 'cliente','nome', '* Nome', 'Digite seu nome' )
                </div>
                <div class="col">
                    @fgroup( 'cliente','sobrenome', '* Sobrenome', 'Digite seu sobrenome' )
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
                    @fgroup( 'cliente','documento', '* Nº do documento', 'Digite o seu documento' )
                </div>
            </div>

            <div class="page-header">
              <h6>Dados de contato</h6>
            </div>

            <div class="row">
              <div class="col">
                @femail('email', '* E-mail', 'Digite seu e-mail' )
              </div>
            </div>

            <div class="row">
              <div class="col">
                @fgroup( 'cliente','telefone', '* Telefone', '(**) ****-****')
              </div>
              <div class="col">
                @fgroup( 'cliente','celular', '* Celular', '(**) *****-****')
              </div>
            </div>

            <div class="page-header">
              <h6>Dados de localização</h6>
            </div>

            <div class="row">
              <div class="col">
                @fgroup( 'cliente','estado', '* Estado', 'Informe o estado' )
              </div>
              <div class="col">
                @fgroup( 'cliente','cidade', '* Cidade', 'Informe a cidade' )
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                @fgroup( 'cliente','cep', '* CEP')
              </div>
              <div class="col">
                @fgroup( 'cliente','logradouro', '* Logradouro')
              </div>
              <div class="col-2">
                @fgroup( 'cliente','numero', '* Nº', '99' )
              </div>
            </div>

            <div class="row">
              <div class="col">
                @fgroup( 'cliente','bairro', '* Bairro')
              </div>
              <div class="col">
                @fgroup( 'cliente','complemento', 'Complemento' )
              </div>
            </div>

        </div>

        <div class="card-footer">
          <button class="btn btn-success btn-block">
            Salvar cliente
          </button>
        </div>
    </form>
</div>