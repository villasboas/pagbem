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
              Cobranças
            </h1>
          </div>

          <div class="row row-cards row-deck">
            @include('@components.datatables')
            @include('@cobrancas.components.form')
          </div>
        </div>
      </div>
    </div>

    @include( '@components.footer' )
  </div>
@endsection