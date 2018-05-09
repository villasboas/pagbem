<div class="col-5">
    <form action="" class="card">
        <div class="card-header">
            Formulário cobrança
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @select('cliente_id', '* Cliente')
                      @option('J', 'CNPJ' )
                      @option('F', 'CPF' )
                    @endselect('tipo_documento')
                </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">*Descrição</label>
                  <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                @fnumber('total', '* Total', 'R$' )
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                @fnumber('parcelas', '* Nº de parcelas' )
              </div>
              <div class="col">
                @fdate('vencimento_primeira_parcela', 'Vencimento da primeira parcela' )
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