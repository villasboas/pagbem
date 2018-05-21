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
                        Movimentações
                    </h1>
                </div>

                <div class="row row-cards row-deck">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="card pt-2">
                            <div class="table-responsive">
                                {!! $builder->table(['class' => 'table table-bordered'], true) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include( '@components.footer' )
  </div>
@endsection

@push('scripts')
{!! $builder->scripts() !!}
@endpush()