<div class="col-5">
    <form action="" class="card">
        <div class="card-header">
            <h3 class="card-title">
              Formulário parcela
            </h3>
            <div class="card-options">
              <span class="tag tag-green float-right">Aberta</span>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @select('fatura', 'conta_bancaria_id', '* Conta bancária')
                      @option('fatura', 'J', 'CNPJ' )
                      @option('fatura', 'F', 'CPF' )
                    @endselect('tipo_documento')
                </div>
            </div>

            <div class="row">
              <div class="col">
                @fnumber('fatura', 'total', '* Total', 'R$' )
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

        </div>

        <div class="card-footer">
          <button class="btn btn-success btn-block">
            Salvar parcela
          </button>
        </div>
    </form>
</div>