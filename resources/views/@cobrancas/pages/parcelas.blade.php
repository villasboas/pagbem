@extends('@layouts.blank') 
@section('content')
<div class="page">
    <div class="page-main">

        @include( '@components.header' )
        @include( '@components.navbar' )


      <div class="my-3 my-md-5">
        <div class="container">
          <div class="page-header">
            <h1 class="page-title">
              Parcelas
            </h1>
          </div>

          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Cobrança</h3>
                  <div class="card-options">
                      <span class="tag tag-green float-right">Aberta</span>
                  </div>
                </div>
                <div class="card-body">
                  <div class="list-group">
                    <div class="list-group-item">
                      <b>Cliente:</b> <br>  Nome do cliente
                    </div>
                    <div class="list-group-item">
                      <b>Descrição:</b> <br>  Descrição da cobrança
                    </div>
                    <div class="list-group-item">
                      <b>Total:</b> <br>  R$ 300,00
                    </div>
                    <div class="list-group-item">
                      <b>Total pago:</b> <br>  R$ 00,00
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row row-cards row-deck">
            @include('@cobrancas.components.parcelas')
            @include('@cobrancas.components.parcela-form')
          </div>
        </div>
      </div>
    </div>

    @include( '@components.footer' )
  </div>
@endsection