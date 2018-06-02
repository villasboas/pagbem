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
              Dashboard
            </h1>
          </div>

          @include('@components.indicadores')

          <div class="row">
            <div class="col-xs-12">
                <div class="card">
                  <div class="card-header">
                    Todas as faturas
                  </div>
                  <div class="card-body pt-2 pb-2">
                      <div class="table-responsive">
                          {!! $builder->table(['class' => 'table table-bordered'], true) !!}
                      </div>
                  </div>
                </div>
            </div>
          </div><!-- invoices datatable -->

        </div>
      </div>
    </div>

    @include( '@components.footer' )
  </div>
@endsection

@push('scripts')
{{ $builder->scripts() }}
@endpush