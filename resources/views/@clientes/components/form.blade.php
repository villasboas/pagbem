<div class="col-5">
    <form action="" class="card">
        <div class="card-header">
            Formulário cliente
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    @fgroup( 'nome', '* Nome', 'Digite seu nome' )
                </div>
                <div class="col">
                    @fgroup( 'sobrenome', '* Sobrenome', 'Digite seu sobrenome' )
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
                    @fgroup( 'documento', '* Nº do documento', 'Digite o seu documento' )
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
                @fgroup('telefone', '* Telefone', '(**) ****-****')
              </div>
              <div class="col">
                @fgroup('celular', '* Celular', '(**) *****-****')
              </div>
            </div>

            <div class="page-header">
              <h6>Dados de localização</h6>
            </div>

            <div class="row">
              <div class="col">
                @fgroup('estado', '* Estado', 'Informe o estado' )
              </div>
              <div class="col">
                @fgroup('cidade', '* Cidade', 'Informe a cidade' )
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                @fgroup('cep', '* CEP')
              </div>
              <div class="col">
                @fgroup('logradouro', '* Logradouro')
              </div>
              <div class="col-2">
                @fgroup('numero', '* Nº', '99' )
              </div>
            </div>

            <div class="row">
              <div class="col">
                @fgroup('bairro', '* Bairro')
              </div>
              <div class="col">
                @fgroup('complemento', 'Complemento' )
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